<form class="" action="{{ route('recipe-categories.destroy', ['recipe_category' => $recipeCategory->id]) }}" method="post">
  {{ csrf_field() }}
  {{ method_field('DELETE') }}

  <button type="submit" name="button" class="btn btn-danger">
    Delete
  </button>
</form>
