@extends('admin.dashboard')

@section('content')
<div class="container-fluid mt-5">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="h5 mb-0">Edit Tag</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.tags.update',$tag->id)}}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group mb-2">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $tag->title }}" placeholder="Enter Title">
                </div>
                <button type="submit" class="btn btn-success">Add</button>
            </form>
        </div>
    </div>
@endsection