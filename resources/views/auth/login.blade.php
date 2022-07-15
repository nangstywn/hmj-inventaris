<!DOCTYPE html>
<html lang="en" aria-hidden="true">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://www.gstatic.com/firebasejs/5.8.6/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.5.9/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.8.6/firebase-database.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.5.9/firebase-messaging.js"></script>
    <style>
    h2 {
        background-color: none;
        color: white;
        font-family: sans-serif;
        text-align: center;
        width: 45%;
        margin: auto;
        padding: 20px;
    }

    body {
        background-image: url("{{asset('assets/images/img_bg_1.jpg')}}");
        background-repeat: no-repeat;
        background-size: cover;
    }

    /*.container {
        width: 400px;
        height: 200px;
        position: absolute;
        top: 50%;
        left: 50%;
        margin-top: -140px;
        margin-left: -240px;
        text-align: center;
        padding: 40px;
        color: white;
        font-size: 24px;
    }*/
    /* .forme {
        margin-top: 100px;
    } */

    .forme .sudut {
        float: left;
        display: inline;
    }

    ul {
        list-style-type: none;
        display: inline-block;
        float: right;
        margin-top: 1px;
        margin-right: 100px;
    }

    li {
        margin: 5px;
        font-size: 18px;
    }

    .forme a {
        color: white;
        text-decoration: none;
        margin-left: 5px;
        border: 1px solid white;
        padding: 5px 25px;
    }

    .forme a:hover {
        color: black;
        background-color: white;
        transition: 0.6s;
    }

    #gtco-logo {
        margin-top: 50px;
        margin-left: 80px;
    }

    .modal-bg {
        display: flex;
        flex-direction: column;
        justify-content: center;
        background-color: rgba(0, 0, 0, 0.5);
        border: 2px solid white;
        width: 500px
    }

    .card-header {
        background-color: white;

    }

    .container {
        display: flex;
        margin-top: 100px;
        justify-content: center;
    }

    label {
        color: white;
    }
    </style>
</head>

<body>
    <div class="col-xs-5">
        <div id="gtco-logo">
            <img src="{{asset('assets/images/logo.png')}}" height="70px" width="80px">
            <img src="{{asset('assets/images/si.png')}}" height="80px" width="80px">
            <img src="{{asset('assets/images/tk.png')}}" height="90px" width="90px">
            <img src="{{asset('assets/images/mi.png')}}" height="80px" width="80px">
            <img src="{{asset('assets/images/ka.png')}}" height="90px" width="100px">

            @if (Route::has('login'))
            <ul class="forme">
                @auth
                <li class="sudut"><a href="{{ route('home') }}">Home</a></li>
                @else
                <li class="sudut"><a href="{{route('login')}}" id="login">Login</a></li>
                @if (Route::has('register'))
                <li class="sudut"><a href="{{route('register')}}" id="register">Register</a></li>
                @endif
                @endauth
            </ul>
            @endif
        </div>
    </div>
    <div class="container" id="form">
        <div class="justify-content-center">
            <div class="modal-bg">
                <div class="card-header">{{ __('Login') }}
                    <button type="button" id="close" class="close" aria-label="Close"></button>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="username"
                                class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>
                            <div class="col-md-6">
                                <input id="username" type="text"
                                    class="form-control @error('username') is-invalid @enderror" name="username"
                                    value="{{ old('username') }}" required autocomplete="username" autofocus>
                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <input type="hidden" name="device_token" id="device_token">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                                @if (Route::has('password.request'))
                                <a class="btn btn-link" id="send" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('js/firebase.js')}}"></script>
</body>

</html>