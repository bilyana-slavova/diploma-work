@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="recipe">
            <div class="recipe-info">
              <h3>{{ $recipe->name }}</h3>

              <p><strong>{{ $recipe->prep_time }}</strong></p>

              <p><strong>{{ $recipe->cook_time }}</strong></p>
            </div>
          </div>
          @include('recipes.partials.destroy')
        </div>
    </div>
</div>
@endsection
