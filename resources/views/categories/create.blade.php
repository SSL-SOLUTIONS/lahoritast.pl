@extends('admin')

@section('content')
<div class="container">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <h2>Add Category</h2>
    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <label for="title" class="col-md-2 col-form-label">Item title</label>
            <div class="col-md-6">
                <input type="text" class="form-control" id="title" name="title" required value="{{ old('title') }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="description" class="col-md-2 col-form-label">Description</label>
            <div class="col-md-6">
                <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
            </div>
        </div>

        <div class="form-group row">
            <label for="image" class="col-md-2 col-form-label">Image</label>
            <div class="col-md-6">
                <input type="file" class="form-control" id="image" name="image" required value="{{ old('image') }}">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6 offset-md-2">
                <button type="submit" class="btn btn-success">Add</button>
            </div>
        </div>
    </form>
</div>
@endsection
