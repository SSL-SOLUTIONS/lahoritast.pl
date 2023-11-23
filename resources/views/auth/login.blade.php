<!DOCTYPE html>
<html>

<head>
    <title>Lahori Taste</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type="">

    <style>
        .main-login-page {
            position: relative;
        }

        .main-login-page::before {
            content: "";
            background-color: #ec671a;
            background-size: cover;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }



        @media (max-width: 576px) {
            .main-login-page::before {
                width: 100%;
                height: 100%;
            }

            .custom-card {
                margin: 0;
            }
        }
    </style>
</head>

<body>
    <div class="container main-login-page">
        <div style="margin-top: 110px;" class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col-sm-10 col-12">
                <div style="background-color: rgba(232, 231, 231, 1);" class="card custom-card">
                    <div>
                        <h2 class="card-header d-flex justify-content-center align-items-center">
                            <a href="{{route('main')}}">
                                <img class="img-fluid" style="height: 40px; margin-right: 10px;" src="{{ asset('images/new logo lahori taste 2 (1).png') }}" alt="">
                            </a>
                        </h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email"><b><i class="fas fa-envelope"></i> Email:</b></label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter Your Email" required>
                                @error('email')
                                <span class="invalid-feedback" role="alert" id="email-error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password"><b><i class="fas fa-lock"></i> Password:</b></label>
                                <div class="input-group">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Enter Your Password" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="far fa-eye" id="togglePassword"></i>
                                        </span>
                                    </div>
                                </div>
                                @error('password')
                                <span class="invalid-feedback" role="alert" id="password-error">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-danger btn-block"><b>Login</b></button>
                        </form>
                        <p class="text-center mt-3">Don't have an account?
                            <a href="{{ route('register') }}" class="text-decoration-none">Sign Up</a>
                        </p>
                        <p class="text-center">
                            <a href="{{ route('password.request') }}" class="text-decoration-none">Forgot Your Password?</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
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


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>