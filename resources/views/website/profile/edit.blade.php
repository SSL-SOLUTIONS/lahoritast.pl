@extends('layouts.website')

@section('content')
<br><br><br>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div style="color: white;" class="bg-danger card-header">Edit Profile</div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('profile.update', ['profile' => $user->id]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                        <label for="name"><b><i class="fas fa-user"></i> Name</b></label>
                            <input type="text" id="name" name="name" value="{{ $user->name }}" class="form-control">
                        </div>

                        <div class="form-group">
                        <label for="email"><b><i class="fas fa-envelope"></i> Email</b></label>
                            <input type="email" id="email" name="email" value="{{ $user->email }}" class="form-control">
                        </div>

                        <div class="form-group">
                        <label for="phone"><b><i class="fas fa-phone"></i> Phone Number</b></label>
                            <input type="text" id="phone" name="phone" value="{{ $user->phone }}" class="form-control">
                        </div>

                        <div class="form-group">
                        <label for="address"><b><i class="fas fa-map-marker-alt"></i> Address</b></label>
                            <input type="text" id="address" name="address" value="{{ $user->address }}" class="form-control">
                        </div>

                        <div class="form-group">
                        @if($user->image)
                        <img src="{{ asset('/img/users/' . $user->image) }}" alt="Profile Image" class="rounded-circle" width="50">
                    @else
                    <i class="fas fa-user icon rounded-circle" style="font-size: 130px;"></i>
                    @endif
                            <label for="image"><b>Profile Image</b></label>
                            <input type="file" id="image" name="image" class="form-control-file">
                        </div>

                        <button  style="color: white;" type="submit" class="btn btn-danger">Update Profile</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br>

@endsection
