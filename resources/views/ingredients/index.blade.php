@extends('layouts.app')

@section('content')
  <ul class="categories">
    @forelse($ingredients as $ingredient)
      <li>
        {{ $ingredient->name }}

        @include('ingredients.partials.destroy')
      </li>
    @empty
      <p>No ingredients yet!</p>

    @endforelse
  </ul>
  <a href="{{ route('ingredients.create') }}" class="btn btn-primary">Create Ingredient</a>
@endsection
