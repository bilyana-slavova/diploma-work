@extends('layouts.app')

@section('content')
  <ul>
    @forelse($recipes as $recipe)
      <li>
        <p>{{ $recipe->name }}</p>
      </li>
    @empty
      <p>No recipes yet!</p>
    @endforelse
  </ul>
@endsection
