@extends('admin.dashboard')

@section('title', 'Category Create')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>{{ __('Create Category') }}</h2>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <a href="{{ route('admin.categories.index') }}" class="btn btn-primary">Back</a>
                    </div>
                    <form action="{{ route('admin.categories.store') }}" method="POST">
                        @csrf

                        <!-- title -->
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" id="title" name="title" required class="form-control">
                        </div>

                        <!-- slug -->
                        <div class="mb-3">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" id="slug" name="slug" required class="form-control">
                        </div>

                        <!-- parent -->
                        <div class="mb-3">
                            <label for="title" class="form-label">Parent</label>
                            <select name="parent_id" id="parent_id" class="form-control">
                                <option disabled selected> Please select parent category</option>
                                @foreach($categories as $cate)
                                    <option value="{{ $cate->id }}"> {{ $cate->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success">Submit</button>
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
    console.log('title changed');
    $.get('{{ route('admin.model.check_slug') }}',
      { 'title': $(this).val() },
      function( data ) {
        $('#slug').val(data.slug);
      }
    );
  });
</script>
@endsection