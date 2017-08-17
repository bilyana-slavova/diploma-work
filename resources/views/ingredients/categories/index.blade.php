@extends('layouts.app')

@section('content')
  <ul>
    @forelse($ingredientCategories as $ingredientCategory)
      <li>
          @include('ingredients.categories.show')
      </li>
    @empty
      <p>No ingredient categories yet!</p>
    @endforelse
  </ul>
  <a href="{{ route('ingredient-categories.create')}}" class="btn btn-primary">Create Ingredient Category</a>
@endsection
