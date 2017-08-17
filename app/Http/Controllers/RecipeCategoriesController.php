<?php

namespace App\Http\Controllers;

use App\RecipeCategory;
use Illuminate\Http\Request;

class RecipeCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipeCategories = RecipeCategory::all();

        return view('recipes.categories.index', compact('recipeCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', RecipeCategory::class);
        return view('recipes.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', RecipeCategory::class);
        $recipeCategory = new RecipeCategory;

        $recipeCategory->name = $request->name;

        $recipeCategory->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RecipeCategory  $recipeCategory
     * @return \Illuminate\Http\Response
     */
    public function show(RecipeCategory $recipeCategory)
    {
        return view('recipes.categories.show', compact('recipeCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RecipeCategory  $recipeCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(RecipeCategory $recipeCategory)
    {
        $this->authorize('update', $recipeCategory);

        return view('recipes.categories.edit', compact('recipeCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RecipeCategory  $recipeCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RecipeCategory $recipeCategory)
    {
        $this->authorize('update', $recipeCategory);

        $recipeCategory->name = $request->name;

        $recipeCategory->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RecipeCategory  $recipeCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(RecipeCategory $recipeCategory)
    {
        $this->authorize('delete', $recipeCategory);

        $recipeCategory->delete();

        return view('recipes.categories.index');
    }
}
