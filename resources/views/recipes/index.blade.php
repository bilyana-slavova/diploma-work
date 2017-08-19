@extends('layouts.app')

@section('content')
  <ul>
    @forelse($recipes as $recipe)
      <li>
        <p>{{ $recipe->name }}</p>
      </li>
    @empty
      <p>No recipes yet!</p>
      <a href="{{ route('recipes.create')}}" class="btn btn-primary">Create Recipe</a>
    @endforelse
  </ul>
@endsection
