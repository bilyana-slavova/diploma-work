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

   public function recipeCategory()
   {
      return $this->belongsTo('App\RecipeCategory');
    }

    public function instruction()
   {
       return $this->hasMany('App\Insctruction');
   }


}
