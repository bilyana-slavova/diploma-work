@extends('layouts.app')

@section('content')
<h2 style="text-align: center">Add or Delete Ingredient Category</h2>
<br>
  <ul class="categories">
    @forelse($ingredientCategories as $ingredientCategory)
      <li>
          @include('ingredients.categories.show')

          @include('ingredients.categories.destroy')
      </li>
    @empty
      <p>No ingredient categories yet!</p>
    @endforelse
  </ul>

  <div style="text-align: center">
    <a href="{{ route('ingredient-categories.create')}}" class="btn btn-primary">Create Ingredient
      Category</a>
  </div>
@endsection
