<?php

namespace App\Http\Controllers;

use App\IngredientCategory;
use Illuminate\Http\Request;

class IngredientCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ingredientCategories = IngredientCategory::all();

        return view('ingredients.categories.index', compact('ingredientCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ingredients.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ingredientCategory = new IngredientCategory;

        $ingredientCategory->name = $request->name;
        $ingredientCategory->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\IngredientCategory  $ingredientCategory
     * @return \Illuminate\Http\Response
     */
    public function show(IngredientCategory $ingredientCategory)
    {
        return view('ingredients.categories.show', compact('ingredientCategory'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\IngredientCategory  $ingredientCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(IngredientCategory $ingredientCategory)
    {
        return view('ingredients.categories.edit', compact('ingredientCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\IngredientCategory  $ingredientCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IngredientCategory $ingredientCategory)
    {
        $ingredientCategory->name = $request->name;

        $ingredientCategory->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\IngredientCategory  $ingredientCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(IngredientCategory $ingredientCategory)
    {
      $ingredientCategory->delete();

      return view('ingredients.categories.index');
    }
}
