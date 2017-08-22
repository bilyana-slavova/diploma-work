<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    public function ingredientCategory()
    {
       return $this->belongsTo('App\IngredientCategory');
    }

    public function recipes()
   {
       return $this->belongsToMany('App\Recipe', 'recipe_ingredients', 'ingredient_id', 'recipe_id');
   }
}
