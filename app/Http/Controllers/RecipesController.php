<?php

namespace App\Http\Controllers;

use App\Recipe;
use App\RecipeCategory;
use App\Measurement;
use App\Ingredient;
use Auth;

use App\Http\Requests\StoreRecipe;

use Illuminate\Http\Request;

class RecipesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes = Recipe::all();
        $recipes->load('category', 'ingredients', 'favoriters');

          $recipes = $this->setFavoritedAttribute($recipes);
        return view('recipes.index', compact('recipes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Recipe::class);

        $recipeCategories = RecipeCategory::all();
        $measurements = Measurement::all();
        $ingredients = !is_null(old('ingredients')) ? old('ingredients') : [];
        // dd($ingredients);

        return view('recipes.create', compact('recipeCategories', 'measurements', 'ingredients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRecipe $request)
    {
        $this->authorize('create', Recipe::class);

        $recipe = new Recipe;

        $recipe->name = $request->name;
        $recipe->category_id = $request->category;
        $recipe->prep_time = $request->prep_time;
        $recipe->cook_time = $request->cook_time;
        $recipe->instructions = $request->instructions;
        $recipe->user_id = Auth::user()->id;
        $recipe->save();

        $ingredients = $this->formatIngredient($request->ingredients);

        // dd($ingredients);
        $recipe->ingredients()->attach($ingredients);
        // TODO: redirect user to the newly created recipe's page
        return back()->withMessage('success', 'Successfully created new recipe!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function show(Recipe $recipe)
    {
        $recipe->load('recipeIngredients.measurement', 'recipeIngredients.ingredient');
        $recipe->ingredients = $recipe->recipeIngredients;

        return view('recipes.show', compact('recipe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipe $recipe)
    {
        $this->authorize('update', $recipe);

        if (is_null(old('ingredients'))) {

          $recipe->load('ingredients');

          $ingredients = $recipe->ingredients->map(function ($item) {
            return [
              'id' => $item->id,
              'name' => $item->name,
              'amount' => $item->pivot->amount,
              'measurement' => $item->pivot->measurement_id
            ];
          });
        } else {
          $ingr = Ingredient::whereIn('id', collect(old('ingredients'))->pluck('id'))->get();
          // dd($ingr);
          $ingredients = old('ingredients');
        }

        $recipeCategories = RecipeCategory::all();
        $measurements = Measurement::all();

        return view('recipes.edit', compact('recipe', 'recipeCategories', 'measurements', 'ingredients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRecipe $request, Recipe $recipe)
    {
        $this->authorize('update', $recipe);

        $recipe->name = $request->name;
        $recipe->category_id = $request->category;
        $recipe->prep_time = $request->prep_time;
        $recipe->cook_time = $request->cook_time;
        $recipe->instructions = $request->instructions;

        $recipe->save();
        $ingredients = $this->formatIngredient($request->ingredients);
        $recipe->ingredients()->sync($ingredients);
        return redirect()->route('recipes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe)
    {
        $this->authorize('delete', $recipe);

        $recipe->delete();

        return back();
    }

    /**
     *
     * Favorite the specified resource.
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function favorite(Recipe $recipe)
    {
        $this->authorize('favorite', $recipe);

        Auth::user()->favoriteRecipes()->toggle($recipe->id);

        return back();
    }

    public function getFavorite(Recipe $recipe)
    {
        // $this->authorize('favorite', $recipe);

        $recipes = Auth::user()->favoriteRecipes;

        return view('recipes.favorites', compact('recipes'));
    }

    public function find(Request $request)
    {
        $ingredients = $request->ingredients;

        if (! count($ingredients)) {
          $recipes = collect([]);
          return view('recipes.index', compact('recipes'));
        }

        $recipes = Recipe::with('favoriters')
        ->whereHas('ingredients', function ($query) use ($ingredients) {
            $query->whereIn('id', $ingredients);
        }, '=', count($ingredients))->get();

        $recipes = $this->setFavoritedAttribute($recipes);
        
        return view('recipes.index', compact('recipes'));
    }

    public function formatIngredient($ingredients)
    {
      $formatted = collect($ingredients)->keyBy('id');

      foreach ($formatted as $key => $ingredient) {
        $temp = $ingredient;
        $temp['measurement_id'] = $ingredient['measurement'];
        unset($temp['id']);
        unset($temp['measurement']);

        $formatted[$key] = $temp;
      }

      return $formatted;
    }

    public function setFavoritedAttribute($recipes)
    {
       return $recipes->map(function ($recipe) {
         $recipe->favorited = Auth::check() && $recipe->favoriters->where('id', Auth::id())->count();
         return $recipe;
       });

    }
}
