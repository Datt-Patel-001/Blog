@extends('admin.dashboard')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h2 class="h4">{{ __('Users') }}</h2>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Add User</a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($users)
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->user_name }}</td>
                                    <td>{{ $user->first_name ?? '-' }}</td>
                                    <td>{{ $user->last_name ?? '-' }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @can('admin_update_user')
                                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        @endcan
                                        @can('admin_delete_user')
                                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="post" class="d-inline-block">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        @endcan
                                        @can('admin_read_user')
                                            <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-sm btn-info">View</a>
                                        @endcan
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
