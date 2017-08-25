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

    public function measurement()
    {
      return $this->belongsTo('App\Measurement');
    }
}
