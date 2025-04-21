@extends('admin.dashboard')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>{{ __('Permissions') }}</h2>
                </div>
                <div class="card-body">
                    <a href="{{ route('admin.permissions.create') }}" class="btn btn-primary mb-3">Add Permission</a>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($permissions)
                            @foreach($permissions as $permission)
                            <tr>
                                <td>{{ $permission->id }}</td>
                                <td>{{ $permission->title }}</td>
                                <td>
                                    <a href="{{ route('admin.permissions.edit', $permission->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('admin.permissions.destroy', $permission->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
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
</div>
@endsection
