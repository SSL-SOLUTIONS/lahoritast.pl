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
    <h2>Create User</h2>
    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <label for="image" class="col-md-2 col-form-label">Profile Image</label>
            <div class="col-md-6">
                <input type="file" name="image" class="form-control">
            </div>
        </div>

        <div class="form-group row">
            <label for="name" class="col-md-2 col-form-label">Name</label>
            <div class="col-md-6">
                <input type="text" name="name" class="form-control" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-md-2 col-form-label">Email</label>
            <div class="col-md-6">
                <input type="email" name="email" class="form-control" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="phone" class="col-md-2 col-form-label">Phone</label>
            <div class="col-md-6">
                <input type="phone" name="phone" class="form-control" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="address" class="col-md-2 col-form-label">Address</label>
            <div class="col-md-6">
                <input type="address" name="address" class="form-control" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-2 col-form-label">Password</label>
            <div class="col-md-6">
                <input type="password" name="password" class="form-control" required>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6 offset-md-2">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </div>
    </form>
</div>
@endsection
