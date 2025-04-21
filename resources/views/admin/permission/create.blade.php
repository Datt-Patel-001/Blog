@extends('admin.dashboard')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>{{ __('Create Permission') }}</h2>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <a href="{{ route('admin.permissions.index') }}" class="btn btn-primary">Back</a>
                    </div>
                    <form action="{{ route('admin.permissions.store') }}" method="POST">
                        @csrf

                        <!-- Title -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Title</label>
                            <input type="text" id="title" name="title" required class="form-control">
                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
