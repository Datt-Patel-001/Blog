@extends('admin.dashboard')

@section('content')
<div class="container-fluid">
     <div class="card">
        <div class="card-header">
            <h2 class="h4">{{ __('Roles') }}</h2>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <a href="{{ route('admin.roles.create') }}" class="btn btn-primary">Add Roles</a>
            </div>
        
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($roles)
                            @foreach($roles as $role)
                                <tr>
                                    <td>{{ $role->id }}</td>
                                    <td>{{ $role->title }}</td>
                                    <td>
                                        <a href="{{ route('admin.roles.edit', $role->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('admin.roles.destroy', $role->id) }}" method="post" class="d-inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
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
@endsection
