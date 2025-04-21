@extends('admin.dashboard')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="card">
                <div class="card-header">
                    <h2>{{ __('Create Post') }}</h2>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <a href="{{ route('admin.posts.index') }}" class="btn btn-primary">Back</a>
                    </div>
                    <form action="{{ route('admin.posts.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ auth()->id() }}">

                        <div class="mb-3">
                            <label for="title" class="form-label">Title:</label>
                            <input type="text" id="title" name="title" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description:</label>
                            <textarea id="description" name="description" class="form-control" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="meta_title" class="form-label">Meta Title:</label>
                            <input type="text" id="meta_title" name="meta_title" class="form-control" requird>
                        </div>

                        <div class="mb-3">
                            <label for="meta_description" class="form-label">Meta Description:</label>
                            <textarea id="meta_description" name="meta_description" class="form-control"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="slug" class="form-label">Slug:</label>
                            <input type="text" id="slug" name="slug" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="summary" class="form-label">Summary:</label>
                            <textarea id="summary" name="summary" class="form-control"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="published" class="form-label">Published:</label>
                            <select id="published" name="published" class="form-control">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="published_at" class="form-label">Published At:</label>
                            <input type="datetime-local" id="published_at" name="published_at" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary">submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
