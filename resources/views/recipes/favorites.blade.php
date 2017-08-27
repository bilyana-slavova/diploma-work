@extends('layouts.app')

@section('content')
<h2 style=" margin-bottom: 20px; text-align: center; ">Welcome To Your Favoroite Recipes!</h2>
<h3 style=" margin-bottom: 20px; text-align: center; ">Tap <span class="glyphicon glyphicon-heart"></span> to save any recipe you like.</h3>

<div class="row">
  @forelse($recipes as $recipe)
    <div class="col-md-4">
      <div class="recipe">
        <header class="recipe_header">
          <h3>{{ $recipe->name }}</h3>

          @can('delete', $recipe)
            @include('recipes.partials.destroy')
          @endcan
        </header>

        <div class="recipe_info">
          <p><strong><i>{{ $recipe->category->name }}</i></strong></p>

          <p>
            Ingredients:
            @foreach($recipe->ingredients as $ingredient)
              {{ $ingredient->name . (! $loop->last ? ', ' : '')  }}
            @endforeach
          </p>

          <p>Preparation Time: <strong>{{ $recipe->prep_time }} min</strong></p>

          <p>Cooking Time: <strong>{{ $recipe->cook_time }} min</strong></p>
        </div>

        <div class="recipe_actions">
          <form class="" action="{{ route('recipes.favorite', ['recipe' => $recipe->id]) }}" method="post">
            {{ csrf_field() }}
            <button type="submit" class="btn-circle btn-favorited">
              <span class="glyphicon glyphicon-heart"></span>
            </button>

          </form>
        </div>
      </div>
    </div>
    @empty
      <h2>No recipes yet!</h2>
  @endforelse
</div>

@endsection
