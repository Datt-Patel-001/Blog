@extends('admin.dashboard')

@section('content')
<div class="container-fluid mt-4">
    <div class="card">
        <div class="card-header">
            <h3>Post Details</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <td>{{ $post->id }}</td>
                </tr>
                <tr>
                    <th>Title</th>
                    <td>{{ $post->title }}</td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>{{ $post->description }}</td>
                </tr>
                <tr>
                    <th>Meta Title</th>
                    <td>{{ $post->meta_title }}</td>
                </tr>
                <tr>
                    <th>Meta Description</th>
                    <td>{{ $post->meta_description }}</td>
                </tr>
                <tr>
                    <th>Slug</th>
                    <td>{{ $post->slug }}</td>
                </tr>
                <tr>
                    <th>Summary</th>
                    <td>{{ $post->summary }}</td>
                </tr>
                <tr>
                    <th>Published</th>
                    <td>{{ $post->published ? 'Yes' : 'No' }}</td>
                </tr>
                <tr>
                    <th>Published At</th>
                    <td>{{ $post->published_at }}</td>
                </tr>
            </table>
            <a href="{{ route('admin.posts.index') }}" class="btn btn-primary">Back</a>
        </div>
    </div>
</div>
@endsection
