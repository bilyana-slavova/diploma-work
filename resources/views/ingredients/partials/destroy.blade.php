<form class="" action="{{ route('ingredients.destroy', ['ingredient' => $ingredient->id]) }}" method="post">
  {{ csrf_field() }}
  {{ method_field('DELETE') }}

  <button type="submit" name="button" class="btn btn-danger">
    Delete
  </button>
</form>
