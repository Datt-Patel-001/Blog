@extends('admin.dashboard')

@section('content')
<div class="container-fluid">
    <div class="card shadow-lg">
        <div class="card-header">
            <h2 class="mb-0">Edit User Details</h2>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Back</a>
            </div>
            <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- User Name -->
                <div class="mb-3">
                    <label for="user_name" class="form-label">User Name</label>
                    <input type="text" id="user_name" name="user_name" value="{{ $user->user_name }}" required class="form-control">
                </div>

                <div class="row">
                    <!-- First Name -->
                    <div class="col-md-6 mb-3">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" id="first_name" name="first_name" value="{{ $user->first_name }}" required class="form-control">
                    </div>

                    <!-- Last Name -->
                    <div class="col-md-6 mb-3">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" id="last_name" name="last_name" value="{{ $user->last_name }}" required class="form-control">
                    </div>
                </div>
                <div class="row">
                    <!-- Email -->
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" value="{{ $user->email }}" required class="form-control">
                    </div>

                    {{-- Password --}}
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Password</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Leave empty to keep the same">
                    </div>
                </div>
                <!-- Roles -->
                <div class="mb-3">
                    <label for="roles" class="form-label">Select Roles</label>
                    <select id="roles" name="roles[]" multiple class="select2 form-select">
                        <option value="">Please Select Roles</option>
                        @foreach($roles as $role)
                        <option value="{{ $role->id }}" {{ in_array($role->id, $user->roles()->pluck('id')->toArray() ?? []) ? 'selected' : '' }}>
                            {{ $role->title }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit" class="btn btn-primary w-100">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
