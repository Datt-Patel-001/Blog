@extends('admin.dashboard')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h2 class="mb-0">Users Details</h2>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Back</a>
            </div>
            <table class="table table-bordered">
                <tbody>
                    @isset($user)
                    <tr>
                        <td class="font-weight-bold">User Name</td>
                        <td>{{ $user->user_name }}</td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">Email</td>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">First Name</td>
                        <td>{{ $user->first_name }}</td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">Last Name</td>
                        <td>{{ $user->last_name }}</td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">Roles</td>
                        <td>{{ $user->roles }}</td>
                    </tr>
                    @endisset
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
