<form class="" action="{{ route('measurements.destroy', ['measurement' => $measurement->id]) }}" method="post">
  {{ csrf_field() }}
  {{ method_field('DELETE') }}

  <button type="submit" name="button" class="btn btn-danger">
    Delete
  </button>
</form>
