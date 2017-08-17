@extends('layouts.app')

@section('content')
  <ul>
    @forelse($recipeCategories as $recipeCategory)
      <li>
          @include('recipes.categories.show')
      </li>
    @empty
      <p>No recipe categories yet!</p>
    @endforelse
  </ul>
  <a href="{{ route('recipe-categories.create')}}" class="btn btn-primary">Create Category</a>
@endsection
