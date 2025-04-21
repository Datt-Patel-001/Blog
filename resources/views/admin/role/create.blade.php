@extends('admin.dashboard')

@section('content')
<div class="container-fluid">
    <div class="card shadow-lg">
        <div class="card-header">
            <h2>Role Details</h2>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <a href="{{ route('admin.roles.index') }}" class="btn btn-outline-primary">Back</a>
            </div>
            <form action="{{ route('admin.roles.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" id="title" name="title" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="permissions" class="form-label">Permissions</label>
                    <select id="permissions" name="permissions[]" multiple class="form-select select2">
                        @isset($permissions)
                            @foreach($permissions as $permission)
                                <option value="{{ $permission->id }}">{{ $permission->title }}</option>
                            @endforeach
                        @endisset
                    </select>
                </div>
                
                <div class="mb-3">
                    <button type="button" class="btn btn-sm btn-secondary mt-1 select-all">Select All</button>
                    <button type="button" class="btn btn-sm btn-secondary mt-1 remove-all">Remove All</button>
                </div>
                
                <div>
                    <button type="submit" class="btn btn-success w-100">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
