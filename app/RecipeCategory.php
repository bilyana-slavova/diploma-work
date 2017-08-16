<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecipeCategory extends Model
{

    protected $table = 'recipe_category';

    public function recipe()
    {
      return $this->hasMany('App\Recipe');
    }

}
