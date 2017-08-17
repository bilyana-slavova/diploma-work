<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IngredientCategory extends Model
{
    protected $table='ingredient_category';

    public function ingredient()
   {
       return $this->hasMany('App\Ingredient');
   }
}
