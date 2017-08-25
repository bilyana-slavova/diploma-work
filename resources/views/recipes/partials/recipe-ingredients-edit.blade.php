
  @if ($index === 0)
  <a href="" class="btn btn-success" id="addIngredient">Add</a>
  @endif

  <div class="ingredient">
    <div class="form-group{{ $errors->has('ingredients.'.$index.'.id') ? ' has-error' : '' }}">
        <label for="ingredient" class="col-md-4 control-label">Ingredient</label>

        <div class="col-md-6">

            <select class="ingredient-name" name="ingredients[{{$index}}][id]" multiple>
                <option value="{{ $ingredient['id'] }}" selected>{{ $ingredient['name'] }}</option>
            </select>

            <!-- <input type="hidden" name="ingredients[{{$index}}][id]" value="{{ old('ingredients.'.$index.'.id') }}" required> -->

            @if ($errors->has('ingredients.'.$index.'.id'))
                <span class="help-block">
                    <strong>{{ $errors->first('ingredients.'.$index.'.id') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('ingredients.'.$index.'.amount') ? ' has-error' : '' }}">
        <label for="amount" class="col-md-4 control-label">Amount</label>

        <div class="col-md-3">
            <input id="amount" type="text" class="form-control" name="ingredients[{{$index}}][amount]" value="{{ $ingredient['amount'] }}" required autofocus>

            @if ($errors->has('ingredients.'.$index.'.amount'))
                <span class="help-block">
                    <strong>{{ $errors->first('ingredients.'.$index.'.amount') }}</strong>
                </span>
            @endif
        </div>

        @if($measurements->count())
        <div class="col-md-3">
          <select id="measurement" class="form-control" name="ingredients[{{$index}}][measurement]" required>
            @foreach($measurements as $measurement)
              <option value="{{ $measurement->id }}">{{ $measurement->name }}</option>
            @endforeach
          </select>

            @if ($errors->has('ingredients.'.$index.'.measurement'))
                <span class="help-block">
                    <strong>{{ $errors->first('ingredients.'.$index.'.measurement') }}</strong>
                </span>
            @endif
        </div>
      @endif
    </div>
    <!-- <div class="form-group{{ $errors->has('measurement') ? ' has-error' : '' }}">
        <label for="measurement" class="col-md-4 control-label">Measurement</label>
    </div> -->
  </div>
