<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    //
    public function recipeIngredient()
   {
       return $this->hasMany('App\RecipeIngredient');
   }

   /**
     * The users that have added this recipe to their favorites.
     */
    public function favoriters()
    {
        return $this->belongsToMany('App\User', 'favorite_recipes', 'recipe_id', 'user_id');
    }
}
