<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    //
    public function ingredients()
   {
       return $this->belongsToMany('App\Ingredient', 'recipe_ingredients', 'recipe_id', 'ingredient_id');
   }

   public function category()
  {
      return $this->belongsTo('App\RecipeCategory');
  }

   /**
     * The users that have added this recipe to their favorites.
     */
    public function favoriters()
    {
        return $this->belongsToMany('App\User', 'favourite_recipes', 'recipe_id', 'user_id');
    }
}
