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
    <h2>Add Menu Item</h2>
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <label for="name" class="col-md-2 col-form-label">Item Name</label>
            <div class="col-md-6">
                <input type="text" class="form-control" id="name" name="name" required value="{{ old('name') }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="description" class="col-md-2 col-form-label">Description</label>
            <div class="col-md-6">
                <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="price" class="col-md-2 col-form-label">Price</label>
            <div class="col-md-6">
                <input type="number" class="form-control" id="price" name="price" step="0.01" required value="{{ old('price') }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="category_id" class="col-md-2 col-form-label">Category</label>
            <div class="col-md-6">
                <select name="category_id" id="category_id" class="form-control">
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="quantity" class="col-md-2 col-form-label">Quantity</label>
            <div class="col-md-6">
                <input type="text" class="form-control" id="quantity" name="quantity" required value="{{ old('quantity') }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="image" class="col-md-2 col-form-label">Image</label>
            <div class="col-md-6">
                <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
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
