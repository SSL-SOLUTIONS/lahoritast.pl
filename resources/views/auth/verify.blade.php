<!DOCTYPE html>
<html>
<head>
    <title>Lahori Taste</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="">

    <style>
        body {
            background-color:  #ec671a;
        }

        .main-verification-page {
            position: relative;
            background-color:  #ec671a;
            background-size: cover;
        }

        .custom-card {
            background-color: rgba(232, 231, 231, 1);
            margin-top: 150px;
        }

        .custom-card .card-header {
            background-color: transparent;
            text-align: center;
            font-size: 24px;
        }

        .custom-card .card-body {
            background-color: transparent;
            text-align: center;
        }
    </style>

</head>

<body>
    <div class="container main-verification-page">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col-sm-10 col-12">
                <div class="card custom-card">
                    <div class="card-header">Verify Your Email Address</div>
                    <div class="card-body">
                        @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            A fresh verification link has been sent to your email address.
                        </div>
                        @endif
                        Before proceeding, please check your email for a verification link.
                        If you did not receive the email,
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">click here to request another</button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
