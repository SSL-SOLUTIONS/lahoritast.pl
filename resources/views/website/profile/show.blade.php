@extends('layouts.website')
@section('content')
<br><br>
                <h1 style="text-align: center;">My Profile</h1>
<style>
    .profile-container {
       
        background: none;
        color: white;
    }

    .profile-content {
        background: #1a1e21; /* Adjust the rgba values and opacity as needed */
        backdrop-filter: blur(5px); /* Adjust the blur radius as needed */
        text-align: center; /* Center-align the profile content */
        padding: 15px;
        border-radius: 40px; /* Add some padding for space around content */
    }
</style>
<div class="container profile-container">
    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{ session()->get('success') }}
        </div>
    @endif
    <div class="row justify-content-center"> <!-- Center the row content -->
        <div class="col-lg-10 col-md-10 col-sm-3">
            <div class="card profile-content"> <!-- Add the profile-content class here -->
                <div class="text-center mt-3">
                    @if($user->image)
                        <img src="{{ asset('/img/users/' . $user->image) }}" alt="Profile Image" class="rounded-circle" width="150">
                    @else
                        <i class="fas fa-user icon rounded-circle" style="font-size: 150px;"></i>
                    @endif
                </div>
                <div class="card-body text-center">
                    <h3><b>Name:</b>{{ $user->name }}</h3>
                    <h3><b>Email:</b>{{ $user->email }}</h3>
                    <h3><b>Contact Number:</b>{{ $user->phone }}</h3>
                    <h3><b>Address:</b> {{ $user->address }}</h3>
                    <a style="color: white;" href="{{ route('profile.edit', ['profile' => $user->id]) }}" class="btn btn-danger">Edit Profile</a>
                </div>
            </div>
        </div>
    </div>
</div>
<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button style="color: white;" type="submit" onclick="return confirm('Are you sure you want to Logout?')" class="btn btn-danger mt-3 ml-5">Logout</button>
</form>
</div>
<br>
@endsection
