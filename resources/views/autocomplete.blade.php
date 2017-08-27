<form class="" method="GET" action="{{ route('recipes.find') }}">

<div class="form-group">
    <div class="tagit">
      <div class="tagit_field">
        <!-- <input id="autocomplete" type="text" class="form-control" name="" value="" required autofocus placeholder="Add ingredient"> -->
          <select id="tagit" name="ingredients[]" multiple>
          </select>

          <div class="tagit_actions">
            <input type="submit" class="btn btn-success" value="Find Ingredient">
          </div>
      </div>
    </div>
</div>
</form>
