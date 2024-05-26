<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title> Login </title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ url('/img/favicon.png') }}">

    <link rel="stylesheet" href="{{ url('/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ url('/css/font-awesome.min.css') }}">

    <link rel="stylesheet" href="{{ url('/css/feathericon.min.css') }}">

    <link rel="stylesheet" href="{{ url('/plugins/morris/morris.css') }}">

    <link rel="stylesheet" href="{{ url('/css/style.css') }}">
</head>

<body>

    <div class="main-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">
                <div class="loginbox">
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <h1>Login</h1>
                            <p class="account-subtitle">Access to our dashboard</p>
                            
                            @include('_message')

                            <form action="{{ url('login') }}" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input class="form-control" type="email" name="email" placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="password" name="password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" name="remember" id="remember">
                                    <label for="remember">Remember Me</label>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-block" type="submit">Login</button>
                                </div>
                            </form>

                            <div class="text-center forgotpass"><a href="{{ url('forgot-password') }}">Forgot Password?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ url('/js/jquery-3.6.0.min.js') }}"></script>

    <script src="{{ url('/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ url('/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

    <script src="{{ url('/js/script.js') }}"></script>
</body>

</html>
