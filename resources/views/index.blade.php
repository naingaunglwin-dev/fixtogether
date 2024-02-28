<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FixTogether</title>
    <link rel="icon" href="{{ asset('image/icon.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/default.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
</head>
<body>
    <div class="welcome-page-container">
        <div class="logo-container">
            <div class="logo">
                <img src="{{ asset('image/logo.png') }}" alt="logo" width="100%">
            </div>
        </div>
        <div class="content">
            <h1>Welcome,</h1>
            <div class="body">
                <p>Let's fix together your coding problems with developers from around the world...</p>
            </div>
            <div class="auth-buttons">
                <a href="{{ route('user.login') }}">
                    <button class="btn btn-light">
                        Login
                    </button>
                </a>

                <a href="{{ route('user.register') }}">
                    <button class="btn btn-orange">
                        Create an account
                    </button>
                </a>
            </div>
        </div>
    </div>
</body>
</html>
