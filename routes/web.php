<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('about');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/recipes/{recipe}/favorite', 'RecipesController@favorite')->name('recipes.favorite');
Route::get('/recipes/favorite', 'RecipesController@getFavorite')->name('recipes.favorites.index');
Route::get('/ingredients/find', 'IngredientsController@find');

Route::resource('recipes', 'RecipesController');

Route::resource('ingredients', 'IngredientsController');

Route::resource('recipe-categories', 'RecipeCategoriesController', ['parameters' => [
    'recipe_category' => 'category'
]]);

Route::resource('recipe-ingredients', 'RecipeIngredientsController', ['parameters' => [
    'recipe_ingredient' => 'ingredient'
]]);

Route::resource('ingredient-categories', 'IngredientCategoriesController');

Route::resource('measurements', 'MeasurementsController');
