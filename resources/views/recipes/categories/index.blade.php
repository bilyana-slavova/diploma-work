@extends('layouts.app')

@section('content')
<h2 style="text-align: center">Add or Delete Recipe Category</h2>
<br>
  <ul class="categories">
    @forelse($recipeCategories as $recipeCategory)
      <li>
          @include('recipes.categories.show')
      </li>
    @empty
      <p>No recipe categories yet!</p>
    @endforelse
  </ul>
  <div style="text-align: center">
    <a href="{{ route('recipe-categories.create')}}" class="btn btn-primary">Create Recipe Category</a>
  </div>
@endsection
