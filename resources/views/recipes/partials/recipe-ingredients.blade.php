<div class="ingredients">
  <a href="" class="btn btn-success" id="addIngredient">Add</a>

  <div class="ingredient">
    <div class="form-group{{ $errors->has('ingredient') ? ' has-error' : '' }}">
        <label for="ingredient" class="col-md-4 control-label">Ingredient</label>

        <div class="col-md-6">
            <input id="ingredient" type="text" class="form-control" name="ingredient" value="{{ old('ingredient') }}" required autofocus>

            @if ($errors->has('ingredient'))
                <span class="help-block">
                    <strong>{{ $errors->first('ingredient') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
        <label for="amount" class="col-md-4 control-label">Amount</label>

        <div class="col-md-3">
            <input id="amount" type="text" class="form-control" name="amount" value="{{ old('amount') }}" required autofocus>

            @if ($errors->has('amount'))
                <span class="help-block">
                    <strong>{{ $errors->first('amount') }}</strong>
                </span>
            @endif
        </div>

        @if($measurements->count())
        <div class="col-md-3">
          <select id="measurement" class="form-control" name="measurement" required>
            @foreach($measurements as $measurement)
              <option value="{{ $measurement->id }}">{{ $measurement->name }}</option>
            @endforeach
          </select>

            @if ($errors->has('measurement'))
                <span class="help-block">
                    <strong>{{ $errors->first('measurement') }}</strong>
                </span>
            @endif
        </div>
      @endif
    </div>
    <!-- <div class="form-group{{ $errors->has('measurement') ? ' has-error' : '' }}">
        <label for="measurement" class="col-md-4 control-label">Measurement</label>
    </div> -->
  </div>
</div>
