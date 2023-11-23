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
    <h2>Edit Category</h2>
    <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group row">
            <label for="title" class="col-md-2 col-form-label">Category Title</label>
            <div class="col-md-6">
                <input type="text" class="form-control" id="title" name="title" value="{{ $category->title }}" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="description" class="col-md-2 col-form-label">Description</label>
            <div class="col-md-6">
                <textarea class="form-control" id="description" name="description">{{ $category->description }}</textarea>
            </div>
        </div>

        <div class="form-group row">
            <label for="image" class="col-md-2 col-form-label">Image</label>
            <div class="col-md-6">
                <input type="file" class="form-control" id="image" name="image">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6 offset-md-2">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('categories.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </div>
    </form>
</div>

@endsection
