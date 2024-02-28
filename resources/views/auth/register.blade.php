<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $pageTitle }}</title>

    <!-- Page Icon -->
    <link rel="icon" href="{{ asset('image/icon.png') }}">

    <!-- Custom Css -->
    <link rel="stylesheet" href="{{ asset('assets/css/default.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">

    <!-- Fontawesome Css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<div class="auth-form">
    <form method="POST" action="{{ route('user.register') }}">
        <h1>{{ $pageTitle }}</h1>

        <div class="input-group">
            <label for="username">User Name</label>
            <input type="text" id="username" name="username" value="{{ old('username') }}" placeholder="Enter Your Username Here">
        </div>

        <div class="input-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Enter Your Email Here">
        </div>

        <div class="input-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" value="{{ old('password') }}" placeholder="Enter Your Password Here">
        </div>

        <div class="input-group">
            <label for="confirm-password">Confirm Password</label>
            <input type="password" id="confirm-password" name="confirm-password" value="{{ old('confirm-password') }}" placeholder="Enter Your Confirm Password Here">
        </div>

        <hr>

        <div class="submit-btn">
            <input type="submit" class="btn btn-blue" name="register" value="Register">
        </div>

        <div class="ask">
            If you already have an account? <a href="{{ route('user.login') }}" >Login</a>
        </div>

        <div class="back-to-previous text-center">
            <a href="{{ $baseUrl }}">
                <button type="button" class="btn btn-light fs-13">
                    <i class="fa-solid fa-arrow-left-long"></i> Back
                </button>
            </a>
        </div>
    </form>
</div>
</body>
</html>
