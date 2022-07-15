<!DOCTYPE html>
<html lang="en">

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
        margin: 20px;
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

    .card {
        background-color: transparent;
        border: 2px solid white;
        width: 500px
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
    <div class="container" id="form-regis" aria-hidden="true">
        <div class="row justify-content-center">

            <div class="modal-bg">
                <div class="card-header">{{ __('Register') }} <button type="button" id="closed" class="close"
                        aria-label="Close">&times;</button></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

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

                        <div class="col-md-6">
                            <input type="hidden" class="form-control @error('username') is-invalid @enderror"
                                name="level" value="user" required autocomplete="username" autofocus>

                            @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
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
                                    required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm"
                                class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" id="regis" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>