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
    <h2>Edit User</h2>

    @if ($user->image)
        <img src="{{ asset('img/users/' . $user->image) }}" alt="Profile Image" width="100">
    @else
        No image
    @endif

    <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group row">
            <label for="image" class="col-md-2 col-form-label">Profile Image</label>
            <div class="col-md-6">
                <input type="file" name="image" class="form-control">
            </div>
        </div>

        <div class="form-group row">
            <label for="name" class="col-md-2 col-form-label">Name</label>
            <div class="col-md-6">
                <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-md-2 col-form-label">Email</label>
            <div class="col-md-6">
                <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="phone" class="col-md-2 col-form-label">Phone</label>
            <div class="col-md-6">
                <input type="phone" name="phone" class="form-control" value="{{ $user->phone }}" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="address" class="col-md-2 col-form-label">Address</label>
            <div class="col-md-6">
                <input type="address" name="address" class="form-control" value="{{ $user->address }}" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-2 col-form-label">Password (leave empty to keep current)</label>
            <div class="col-md-6">
                <input type="password" name="password" class="form-control">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6 offset-md-2">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
</div>
@endsection
