@extends('admin.dashboard')

@section('content')
<div class="container-fluid">
    <div class="card shadow-lg">
        <div class="card-header">
            <h2 class="mb-0">Users Details</h2>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Back</a>
            </div>
            <form action="{{ route('admin.users.store') }}" method="POST">
                @csrf
                
                <div class="mb-3">
                    <label for="user_name" class="form-label">User Name</label>
                    <input type="text" id="user_name" name="user_name" class="form-control" required>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" id="first_name" name="first_name" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" id="last_name" name="last_name" class="form-control" required>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password" class="form-control" required minlength="3">
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="roles" class="form-label">Select Roles</label>
                    <select id="roles"  name="roles[]" class="select2 form-select" multiple>
                        <option value="">Please Select Roles</option>
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->title }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="mb-3">
                    <button type="submit" class="btn btn-success w-100">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection