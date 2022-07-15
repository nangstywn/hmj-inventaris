<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{URL::asset('assets/images/logo.png')}}">
    <title>HMJTI - Inventaris</title>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{URL::asset('vendor/jquery-3.2.1.min.js')}}"></script>
    <style>
    body {
        background-image: url("{{asset('assets/images/img_bg_1.jpg')}}");
        background-repeat: no-repeat;
        background-size: cover;
    }

    h2 {
        background-color: none;
        color: white;
        font-family: sans-serif;
        text-align: center;
        width: 45%;
        margin: auto;
        padding: 20px;
    }

    .forme a {
        color: white;
        text-decoration: none;
        margin-left: 5px;
        border: 1px solid white;
        padding: 5px 25px;
    }

    .forme .sudut {
        float: left;
        display: inline;
    }

    ul {
        list-style-type: none;
        display: inline-block;
        float: right;
        margin-top: 1px;
        margin-right: 50px;
    }

    li {
        margin: 5px;
        font-size: 18px;
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

    b {
        font-size: 40px;
        color: white;
        text-align: center;
    }

    .container {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top: 100px;
        justify-content: space-between;
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
    <div class="container" id="container">
        <h2>Aplikasi Inventaris</h2>
        <b>Himpunan Mahasiswa Jurusan <br>STMIK Akakom Yogyakarta</b>
    </div>
    <script>
    // $(document).ready(function() {
    //     $('#form, #form-regis').hide();
    //     $('#login').click(function() {
    //         //$('#container').hide();
    //         $('#form-regis').hide('slow');
    //         $('#form').animate({
    //             height: 'toggle'
    //         });
    //         $('#send, #close').click(function() {
    //             $('#form').hide('fadeIn');
    //             $('#container').show();
    //         });
    //     });
    //     $('#register').click(function() {
    //         //$('#container').hide();
    //         $('#form').hide('slow');
    //         $('#form-regis').animate({
    //             height: 'toggle'
    //         });
    //         $('#regis, #closed').click(function() {
    //             $('#form-regis').hide('slow');
    //             $('#container').show();
    //         });
    //     });
    // });
    </script>
</body>

</html>