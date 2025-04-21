@extends('admin.dashboard')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="card">
                <div class="card-header">
                    <h2>{{ __('Edit Post') }}</h2>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <a href="{{ route('admin.posts.index') }}" class="btn btn-primary">Back</a>
                    </div>
                    <form action="{{ route('admin.posts.update', $post->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label for="title" class="form-label">Title:</label>
                            <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $post->title) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description:</label>
                            <textarea id="description" name="description" class="form-control" required>{{ old('description', $post->description) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="meta_title" class="form-label">Meta Title:</label>
                            <input type="text" id="meta_title" name="meta_title" class="form-control" value="{{ old('meta_title', $post->meta_title) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="meta_description" class="form-label">Meta Description:</label>
                            <textarea id="meta_description" name="meta_description" class="form-control">{{ old('meta_description', $post->meta_description) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="slug" class="form-label">Slug:</label>
                            <input type="text" id="slug" name="slug" class="form-control" value="{{ old('slug', $post->slug) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="summary" class="form-label">Summary:</label>
                            <textarea id="summary" name="summary" class="form-control">{{ old('summary', $post->summary) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="published" class="form-label">Published:</label>
                            <select id="published" name="published" class="form-control">
                                <option value="1" {{ old('published', $post->published) == 1 ? 'selected' : '' }}>Yes</option>
                                <option value="0" {{ old('published', $post->published) == 0 ? 'selected' : '' }}>No</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="published_at" class="form-label">Published At:</label>
                            <input type="datetime-local" id="published_at" name="published_at" class="form-control" value="{{ old('published_at', $post->published_at ? \Illuminate\Support\Carbon::parse($post->published_at)->format('Y-m-d\\TH:i')  : '') }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection