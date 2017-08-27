<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecipeIngredient extends Model
{
    //

    public function recipe()
    {
      return $this->belongsTo('App\Recipe');
    }

    public function ingredient()
    {
      return $this->belongsTo('App\Ingredient');
    }

    public function measurement()
    {
      return $this->belongsTo('App\Measurement');
    }

}
