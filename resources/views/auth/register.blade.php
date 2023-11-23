<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lahori Taste</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type="">

    <style>
        body {
            background-color: #ec671a;
        }

        .custom-card {
            background-color: rgba(255, 255, 255, 1);
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center mt-2 mb-2">
            <div class="col-lg-6 col-md-8 col-sm-10 col-12">
                <div class="card custom-card">
                    <div>
                        <h2 class="card-header d-flex justify-content-center align-items-center">
                            <a href="{{route('main')}}">
                                <img class="img-fluid" style="height: 40px; margin-right: 10px;" src="{{ asset('images/new logo lahori taste 2 (1).png') }}" alt="">
                            </a>
                        </h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('register') }}" method="post">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="name"><b><i class="fas fa-user"></i> Name:</b></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter your name" required>
                                    @error('name')
                                    <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email"><b><i class="fas fa-envelope"></i> Email:</b></label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter your email" required>
                                    @error('email')
                                    <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone"><b><i class="fas fa-phone"></i> Phone:</b></label>
                                <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Enter your phone number" required>
                                @error('phone')
                                <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="address"><b><i class="fas fa-map-marker-alt"></i> Address:</b></label>
                                <input type="text" class="form-control" id="address" name="address" placeholder="Enter your address" required>
                            </div>
                            <div class="form-group">
                                <label for="password"><b><i class="fas fa-lock"></i> Password:</b></label>
                                <div class="input-group">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Enter your password" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="far fa-eye" id="togglePassword"></i>
                                        </span>
                                    </div>
                                </div>
                                @error('password')
                                <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="confirm-password"><b><i class="fas fa-lock"></i> Confirm Password:</b></label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm your password" required>

                            </div>

                            <button type="submit" class="btn btn-danger btn-block"><b>Register</b></button>
                        </form>
                        <p class="text-center mt-3">Already have an account? <a href="{{'login'}}">Login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const passwordInput = document.getElementById('password');
            const togglePassword = document.getElementById('togglePassword');

            togglePassword.addEventListener('click', function() {
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    togglePassword.classList.remove('far-eye');
                    togglePassword.classList.add('far-eye-slash');
                } else {
                    passwordInput.type = 'password';
                    togglePassword.classList.remove('far-eye-slash');
                    togglePassword.classList.add('far-eye');
                }
            });
        });
    </script>
</body>

</html>