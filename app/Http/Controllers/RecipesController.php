<?php

namespace App\Http\Controllers;

use App\Recipe;
use App\RecipeCategory;

use App\Requests\StoreRecipe;

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

        return view('recipes.create', compact('recipeCategories'));
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
        $recipe->category_id = $request->category_id;
        $recipe->prep_time = $request->prep_time;
        $recipe->cook_time = $request->cook_time;
        $recipe->instructions = $request->instructions;

        $recipe->save();

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

        return view('recipes.edit', compact('recipe'));
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
        $recipe->category_id = $request->category_id;
        $recipe->prep_time = $request->prep_time;
        $recipe->cook_time = $request->cook_time;
        $recipe->instructions = $request->instructions;

        $recipe->save();
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

        return view('recipes.index');
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

        return back();
    }
}
