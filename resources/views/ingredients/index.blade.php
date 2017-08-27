@extends('layouts.app')

@section('content')
<h2 style="text-align:center;">Add or Delete Ingredient</h2>
<br>

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

  <div style="text-align: center">
    <a href="{{ route('ingredients.create') }}" class="btn btn-primary">Create Ingredient</a>
  </div>
@endsection
