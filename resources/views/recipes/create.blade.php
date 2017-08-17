@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create Recipe</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('recipes.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        @if($recipeCategories->count())
                        <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                            <label for="category" class="col-md-4 control-label">Category</label>

                            <div class="col-md-6">
                                <select id="category" class="form-control" name="category_id" required>
                                  @foreach($recipeCategories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                  @endforeach
                                </select>

                                @if ($errors->has('category'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        @endif

                        <div class="form-group{{ $errors->has('prep_time') ? ' has-error' : '' }}">
                            <label for="prep_time" class="col-md-4 control-label">Preparation Time</label>

                            <div class="col-md-6">
                                <input id="prep_time" type="number" class="form-control" name="prep_time" value="{{ old('prep_time') }}" min="0" required>

                                @if ($errors->has('prep_time'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('prep_time') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('cook_time') ? ' has-error' : '' }}">
                            <label for="cook_time" class="col-md-4 control-label">Cooking Time</label>

                            <div class="col-md-6">
                                <input id="cook_time" type="number" class="form-control" name="cook_time" value="{{ old('cook_time') }}" min="0" required>

                                @if ($errors->has('cook_time'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cook_time') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('instructions') ? ' has-error' : '' }}">
                            <label for="instructions" class="col-md-4 control-label">Instructions</label>

                            <div class="col-md-6">
                                <textarea id="instructions" class="form-control" name="instructions" required>{{ old('instructions') }}</textarea>

                                @if ($errors->has('instructions'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('instructions') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Create
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
