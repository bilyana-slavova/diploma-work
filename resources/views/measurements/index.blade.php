@extends('layouts.app')

@section('content')
  <ul>
    @forelse($measurements as $measurement)
      <li>
          @include('measurements.show')
      </li>
    @empty
      <p>No measurements yet!</p>
    @endforelse
  </ul>
  <a href="{{ route('measurements.create')}}" class="btn btn-primary">Create Measurement</a>
@endsection
