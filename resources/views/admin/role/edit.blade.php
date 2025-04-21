@extends('admin.dashboard')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-lg">
                <div class="card-header">
                    <h2 class="mb-0">{{ __('Role Details') }}</h2>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <a href="{{ route('admin.roles.index') }}" class="btn btn-outline-primary">Back</a>
                    </div>
                    <form action="{{ route('admin.roles.update', $role->id) }}" method="POST">
                        @method('PUT')
                        @csrf

                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" id="title" name="title" required value="{{ $role->title }}" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="permissions" class="form-label">Permissions</label>
                            <select id="permissions" name="permissions[]" multiple class="form-select select2">
                                @isset($permissions)
                                    @foreach($permissions as $permission)
                                        <option value="{{ $permission->id }}" {{ in_array($permission->id, $role->permissions()->pluck('id')->toArray() ?? []) ? 'selected' : '' }}>
                                            {{ $permission->title }}
                                        </option>
                                    @endforeach
                                @endisset
                            </select>
                            <button type="button" class="btn btn-sm btn-secondary mt-2 select-all">Select All</button>
                            <button type="button" class="btn btn-sm btn-secondary mt-2 remove-all">Remove All</button>
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary w-100">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
