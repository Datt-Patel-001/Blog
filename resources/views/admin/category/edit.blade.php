@extends('admin.dashboard')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>{{ __('Update Category') }}</h2>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <a href="{{ route('admin.categories.index') }}" class="btn btn-primary">Back</a>
                    </div>
                    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- title -->
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" id="title" name="title" value="{{ $category->title }}" required class="form-control">
                        </div>

                        <!-- slug -->
                        <div class="mb-3">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" id="slug" name="slug" value="{{ $category->slug }}" required class="form-control">
                        </div>

                        <!-- parent -->
                        <div class="mb-3">
                            <label for="parent" class="form-label">Parent Category</label>
                            <select id="parent" name="parent_id" class="form-control">
                                <option value="">Select Parent Category</option>
                                @foreach($categories as $parent)
                                    <option value="{{ $parent->id }}" {{ $category->parent_id == $parent->id ? 'selected' : '' }}>{{ $parent->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
  $('#title').change(function(e) {
    $.get('{{ route('admin.model.check_slug') }}',
      { 'title': $(this).val() },
      function( data ) {
        $('#slug').val(data.slug);
      }
    );
  });
</script>
@endsection
