@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-2">
          <div >
            <div class="recipe-info">
              <header class="recipe_header">
                <h3>{{ $recipe->name }}</h3>

                @can('update', $recipe)
                  <a class="btn btn-primary btn-edit"href="{{ route('recipes.edit', ['recipe' => $recipe->id])}}"> <span class="glyphicon glyphicon-pencil"></span></a>
                @endcan

                @can('delete', $recipe)
                  @include('recipes.partials.destroy')
                @endcan
              </header>

              <div class="recipe_info">
                <div class="recipe_row">Recipe Category: <strong>{{ $recipe->category->name }}</strong></div>

                <div class="recipe_row">
                  Ingredients:
                  <ul>
                  @foreach($recipe->ingredients as $ingredient)
                    <li>
                      <strong>{{ $ingredient->ingredient->name . (! $loop->last ? ', ' : '')  }}
                           {{ $ingredient->amount }} {{ $ingredient->measurement->name }}

                         </strong>
                    </li>
                  @endforeach
                  </ul>
                </div>

                <div class="recipe_row">Preparation Time: <strong>{{ $recipe->prep_time }} min</strong></div>

                <div class="recipe_row">Cooking Time: <strong>{{ $recipe->cook_time }} min</strong></div>

                <div class="recipe_row">Instructions: <br><strong>{{ $recipe->instructions}}</strong></div>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
