<form class="" action="{{ route('recipes.destroy', ['recipe' => $recipe->id]) }}" method="post">
  {{ csrf_field() }}
  {{ method_field('DELETE') }}

  <button type="submit" name="button" class="btn btn-danger">
    x
  </button>
</form>
