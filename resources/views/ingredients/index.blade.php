@extends('layouts.app')

@section('content')
<a href="{{ route('ingredients.create') }}">Create Ingredient</a>

  <ul>
    @forelse($ingredients as $ingredient)
      <li>
        {{ $ingredient->name }}

        @include('ingredients.partials.destroy')
      </li>
    @empty
      <p>No ingredients yet!</p>
    @endforelse
  </ul>
@endsection
