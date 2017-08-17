<form class="" action="{{ route('ingredient-categories.destroy', ['ingredient_category' => $ingredientCategory->id]) }}" method="post">
  {{ csrf_field() }}
  {{ method_field('DELETE') }}

  <button type="submit" name="button" class="btn btn-danger">
    Delete
  </button>
</form>
