@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          {{ $ingredient->name }}

          @include('ingredients.partials.destroy')
        </div>
    </div>
</div>
@endsection
