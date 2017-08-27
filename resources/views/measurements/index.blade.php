@extends('layouts.app')

@section('content')
<h2 style="text-align: center">Add or Delete Measurement</h2>
<br>
  <ul class="categories">
    @forelse($measurements as $measurement)
      <li>
          @include('measurements.show')
      </li>
    @empty
      <p>No measurements yet!</p>
    @endforelse
  </ul>
  <div style="text-align: center">
    <a href="{{ route('measurements.create')}}" class="btn btn-primary">Create Measurement</a>
  </div>
@endsection
