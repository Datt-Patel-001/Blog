@extends('admin.dashboard')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header bg-light">
            <h2 class="h5 mb-0">Post</h2>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <a href="{{ route('admin.posts.create')}}" class="btn btn-primary">Add</a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Meta Title</th>
                            <th>Meta Description</th>
                            <th>Slug</th>
                            <th>Summary</th>
                            <th>Published</th>
                            <th>Published At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($posts)
                        @foreach($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->description }}</td>
                            <td>{{ $post->meta_title }}</td>
                            <td>{{ $post->meta_description }}</td>
                            <td>{{ $post->slug }}</td>
                            <td>{{ $post->summary }}</td>
                            <td>{{ $post->published }}</td>
                            <td>{{ $post->published_at }}</td>
                            <td>
                                <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                                <a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-sm btn-success">View</a>
                            </td>
                        </tr>
                        @endforeach
                        @endisset
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
