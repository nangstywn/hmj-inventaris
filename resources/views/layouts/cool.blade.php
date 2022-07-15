<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title Page-->
    <link rel="icon" href="{{URL::asset('assets/images/logo.png')}}">
    <title>Inventaris HMJTI - @yield('title')</title>

    <!-- Fontfaces CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link href="{{URL::asset('/css/font-face.css')}}" rel="stylesheet" media="all">
    <link href="{{URL::asset('/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{URL::asset('/vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{URL::asset('/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet"
        media="all">

    <!-- Bootstrap CSS-->
    <link href="{{URL::asset('vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->

    <link href="{{URL::asset('vendor/animsition/animsition.min.css')}}" rel="stylesheet" media="all">
    <link href="{{URL::asset('vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet"
        media="all">
    <script src="{{URL::asset('vendor/jquery-3.2.1.min.js')}}"></script>
    <link href="{{URL::asset('vendor/wow/animate.css')}}" rel="stylesheet" media="all">
    <link href="{{URL::asset('vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" media="all">
    <link href="{{URL::asset('vendor/slick/slick.css')}}" rel="stylesheet" media="all">
    <!-- <link href="{{URL::asset('vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <script src="{{URL::asset('vendor/select2/select2.min.js')}}"></script> -->
    <link href="{{URL::asset('vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{URL::asset('css/theme.css')}}" rel="stylesheet" media="all">
    <!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->
    <!--link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" /-->
    <!--link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet"-->
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!--script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></!--script-->
    <!--script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></!--script-->
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <!--script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></!--script-->
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.8.6/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.5.9/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.8.6/firebase-database.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.5.9/firebase-messaging.js"></script>

    <link rel="manifest" href="manifest.json">

    <style>
    li>a {
        color: white;
    }

    .log img {
        display: block;
        margin-left: 70px;
        margin-top: 20px;
        overflow-y: hidden;
    }

    .logo img {
        margin-left: 50px;
    }

    label {
        font-weight: bold;
    }

    .js-arrow i {
        position: relative;
        transform: translateY(-50%);
        margin-left: 0px;
        margin-top: 15px;
        float: right;

    }
    </style>

</head>

<body>
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="{{url('/')}}">
                            <img src="{{URL::asset('assets/images/logo.png')}}" alt="CoolAdmin" width="80px" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li>
                            <a href="{{route('ti.index')}}">
                                <i class="fas fa-chart-bar"></i>Inventaris</a>
                        </li>
                        @if(auth()->user()->level=='admin-ti')
                        <li>
                            <a href="{{route('admin-category.index')}}">
                                <i class="fas fa-table"></i>Kategori</a>
                        </li>
                        @endif
                        <li>
                            <a href="{{route('ti.pinjam.index')}}">
                                <i class="far fa-check-square"></i>Peminjaman</a>
                        </li>
                        <li>
                            <a href="calendar.html">
                                <i class="fas fa-calendar-alt"></i>Calendar</a>
                        </li>
                        <li>
                            <a href="map.html">
                                <i class="fas fa-map-marker-alt"></i>Maps</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Pages</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="login.html">Login</a>
                                </li>
                                <li>
                                    <a href="register.html">Register</a>
                                </li>
                                <li>
                                    <a href="forget-pass.html">Forget Password</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-desktop"></i>UI Elements</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="button.html">Button</a>
                                </li>
                                <li>
                                    <a href="badge.html">Badges</a>
                                </li>
                                <li>
                                    <a href="tab.html">Tabs</a>
                                </li>
                                <li>
                                    <a href="card.html">Cards</a>
                                </li>
                                <li>
                                    <a href="alert.html">Alerts</a>
                                </li>
                                <li>
                                    <a href="progress-bar.html">Progress Bars</a>
                                </li>
                                <li>
                                    <a href="modal.html">Modals</a>
                                </li>
                                <li>
                                    <a href="switch.html">Switchs</a>
                                </li>
                                <li>
                                    <a href="grid.html">Grids</a>
                                </li>
                                <li>
                                    <a href="fontawesome.html">Fontawesome Icon</a>
                                </li>
                                <li>
                                    <a href="typo.html">Typography</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="{{url('/')}}">
                    <img src="{{URL::asset('assets/images/akakom.png')}}" alt="Cool Admin" width="50px" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="has-sub" id="ti">
                            @if(auth()->user()->level=='admin-ti' || auth()->user()->level=='user')
                            <a class="js-arrow ti" href="#">
                                <img src="{{URL::asset('assets/images/logo.png')}}" alt="CoolAdmin" width="30px" /> HMJ
                                TI <i class="right fas fa-angle-left"></i></a>

                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li class="{{ Route::is('home') ? 'active' : '' }}">
                                    <a href="{{route('home')}}"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
                                </li>
                                <li class="{{ Route::is('ti.index') ? 'active' : '' }}">
                                    <a href="{{route('ti.index')}}"><i class="fas fa-chart-bar"></i>Inventaris</a>
                                </li>
                                @if(auth()->user()->level=='admin-ti')
                                <li class="{{ Route::is('admin-category.index') ? 'active' : '' }}">
                                    <a href="{{route('admin-category.index')}}">
                                        <i class="fas fa-table"></i>Kategori</a>
                                </li>
                                @endif
                                <li class="{{ Route::is('ti.pinjam.index') ? 'active' : '' }}">
                                    <a href="{{route('ti.pinjam.index')}}"><i
                                            class="far fa-check-square"></i>Peminjaman</a>
                                </li>
                            </ul>
                            @endif
                        </li>
                        <li class="has-sub" id="si">
                            @if(auth()->user()->level=='admin-si' || auth()->user()->level=='user')
                            <a class="js-arrow si" href="#">
                                <img src="{{URL::asset('assets/images/si.png')}}" alt="CoolAdmin" width="30px" />
                                HMJ SI <i class="right fas fa-angle-left"></i></a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li class="{{ Route::is('home') ? 'active' : '' }}">
                                    <a href="{{route('home')}}"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
                                </li>
                                <li class="{{ Route::is('si.index') ? 'active' : '' }}">
                                    <a href="{{route('si.index')}}"><i class="fas fa-chart-bar"></i>Inventaris</a>
                                </li>
                                @if(auth()->user()->level=='admin-si')
                                <li class="{{ Route::is('admin-category.index') ? 'active' : '' }}">
                                    <a href="{{route('admin-category.index')}}">
                                        <i class="fas fa-table"></i>Kategori</a>
                                </li>
                                @endif
                                <li class="{{ Route::is('si.pinjam.index') ? 'active' : '' }}">
                                    <a href="{{route('si.pinjam.index')}}"><i
                                            class="far fa-check-square"></i>Peminjaman</a>
                                </li>
                            </ul>
                            @endif
                        </li>
                        <li class="has-sub" id="tk">
                            @if(auth()->user()->level=='admin-tk' || auth()->user()->level=='user')
                            <a class="js-arrow tk" href="#">
                                <img src="{{URL::asset('assets/images/tk.png')}}" alt="CoolAdmin" width="30px" /> HMJ
                                TK <i class="right fas fa-angle-left"></i></a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li class="{{ Route::is('home') ? 'active' : '' }}">
                                    <a href="{{route('home')}}"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
                                </li>
                                <li class="{{ Route::is('tk.index') ? 'active' : '' }}">
                                    <a href="{{route('tk.index')}}"><i class="fas fa-chart-bar"></i>Inventaris</a>
                                </li>
                                @if(auth()->user()->level=='admin-tk')
                                <li class="{{ Route::is('admin-category.index') ? 'active' : '' }}">
                                    <a href="{{route('admin-category.index')}}">
                                        <i class="fas fa-table"></i>Kategori</a>
                                </li>
                                @endif
                                <li class="{{ Route::is('tk.pinjam.index') ? 'active' : '' }}">
                                    <a href="{{route('tk.pinjam.index')}}"><i
                                            class="far fa-check-square"></i>Peminjaman</a>
                                </li>
                            </ul>
                            @endif
                        </li>
                        <li class="has-sub" id="mi">
                            @if(auth()->user()->level=='admin-mi' || auth()->user()->level=='user')
                            <a class="js-arrow mi" href="#">
                                <img src="{{URL::asset('assets/images/mi.png')}}" alt="CoolAdmin" width="30px" />
                                HMJ MI <i class="right fas fa-angle-left"></i></a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li class="{{ Route::is('home') ? 'active' : '' }}">
                                    <a href="{{route('home')}}"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
                                </li>
                                <li class="{{ Route::is('mi.index') ? 'active' : '' }}">
                                    <a href="{{route('mi.index')}}"><i class="fas fa-chart-bar"></i>Inventaris</a>
                                </li>
                                @if(auth()->user()->level=='admin-mi')
                                <li class="{{ Route::is('admin-category.index') ? 'active' : '' }}">
                                    <a href="{{route('admin-category.index')}}">
                                        <i class="fas fa-table"></i>Kategori</a>
                                </li>
                                @endif
                                <li class="{{ Route::is('mi.pinjam.index') ? 'active' : '' }}">
                                    <a href="{{route('mi.pinjam.index')}}"><i
                                            class="far fa-check-square"></i>Peminjaman</a>
                                </li>
                            </ul>
                            @endif
                        </li>
                        <li class="has-sub" id="ka">
                            @if(auth()->user()->level=='admin-ka' || auth()->user()->level=='user')
                            <a class="js-arrow ka" href="#">
                                <img src="{{URL::asset('assets/images/ka.png')}}" alt="CoolAdmin" width="30px" />
                                HMJ KA <i class="right fas fa-angle-left"></i></a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li class="{{ Route::is('home') ? 'active' : '' }}">
                                    <a href="{{route('home')}}"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
                                </li>
                                <li class="{{ Route::is('ka.index') ? 'active' : '' }}">
                                    <a href="{{route('ka.index')}}"><i class="fas fa-chart-bar"></i>Inventaris</a>
                                </li>
                                @if(auth()->user()->level=='admin-ka')
                                <li class="{{ Route::is('admin-category.index') ? 'active' : '' }}">
                                    <a href="{{route('admin-category.index')}}">
                                        <i class="fas fa-table"></i>Kategori</a>
                                </li>
                                @endif
                                <li class="{{ Route::is('ka.pinjam.index') ? 'active' : '' }}">
                                    <a href="{{route('ka.pinjam.index')}}"><i
                                            class="far fa-check-square"></i>Peminjaman</a>
                                </li>
                            </ul>
                            @endif
                        </li>
                        <!-- <li class="has-sub {{ Route::is('apis.kawal_corona') ? 'active' : '' }}" id="">
                            <a href="{{route('apis.kawal_corona')}}"><i class="fas fa-tachometer-alt"></i>Api
                                Corona</a>
                        </li> -->
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="get">
                                <input class="au-input au-input--xl" type="text" name="search"
                                    placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <div class="header-button">
                                <div class="noti-wrap">
                                    @if(auth()->user()->level!='user')
                                    <div class="noti__item js-item-menu show-order">
                                        <i class="zmdi zmdi-comment-more"></i>
                                        <span class="quantity">{{$numberAlert->whereHas('detail', function ($query) {
                                                $query->whereHas('inventaris', function ($query) {
                                                    $query->whereHas('user', function ($query) {
                                                        $query->where('level', Auth::user()->level);
                                                    });
                                                });
                                            })->where('read_at', null)->count()}}</span>
                                        <div class="mess-dropdown js-dropdown ">
                                            <div class="mess__title">
                                                <p>Kamu memiliki {{$numberAlert->whereHas('detail', function ($query) {
                                                $query->whereHas('inventaris', function ($query) {
                                                    $query->whereHas('user', function ($query) {
                                                        $query->where('level', Auth::user()->level);
                                                    });
                                                });
                                            })->where('read_at', null)->count()}} pesan baru</p>
                                            </div>
                                            <div class="order-notification" style="overflow:auto; height:400px">

                                            </div>
                                            <div class="mess__footer">
                                                <a href="#">View all messages</a>
                                            </div>
                                        </div>
                                    </div>
                                    @endif

                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            @if(Auth::user()->level=='admin-ti')
                                            <img src="{{URL::asset('assets/images/hmjti.png')}}" alt="ti" />
                                            @elseif(Auth::user()->level=='admin-si')
                                            <img src="{{URL::asset('assets/images/si.png')}}" alt="si" />
                                            @elseif(Auth::user()->level=='admin-tk')
                                            <img src="{{URL::asset('assets/images/tk.png')}}" alt="tk" />
                                            @elseif(Auth::user()->level=='admin-mi')
                                            <img src="{{URL::asset('assets/images/mi.png')}}" alt="mi" />
                                            @elseif(Auth::user()->level=='admin-ka')
                                            <img src="{{URL::asset('assets/images/ka.png')}}" alt="ka" />
                                            @elseif(Auth::user()->level=='admin-ka')
                                            <img src="{{URL::asset('assets/images/ka.png')}}" alt="ka" />
                                            @elseif(Auth::user()->level=='user')
                                            <img src="{{URL::asset('assets/images/users.png')}}" width="20px"
                                                alt="user" />
                                            @endif
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"><span>Hello,</span> <span
                                                    class="text-dark">{{ Auth::user()->name }}</span> <i
                                                    data-feather="chevron-down" class="svg-icon"></i></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        @if(Auth::user()->level=='admin-ti')
                                                        <img src="{{URL::asset('assets/images/hmjti.png')}}" alt="ti" />
                                                        @elseif(Auth::user()->level=='admin-si')
                                                        <img src="{{URL::asset('assets/images/si.png')}}" alt="si" />
                                                        @elseif(Auth::user()->level=='admin-tk')
                                                        <img src="{{URL::asset('assets/images/tk.png')}}" alt="tk" />
                                                        @elseif(Auth::user()->level=='admin-mi')
                                                        <img src="{{URL::asset('assets/images/mi.png')}}" alt="mi" />
                                                        @elseif(Auth::user()->level=='admin-ka')
                                                        <img src="{{URL::asset('assets/images/ka.png')}}" alt="ka" />
                                                        @elseif(Auth::user()->level=='user')
                                                        <img src="{{URL::asset('assets/images/users.png')}}"
                                                            width="50px" alt="user" />
                                                        @endif
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#">{{ Auth::user()->name }}</a>
                                                    </h5>
                                                    <span class="email">{{ Auth::user()->email }}</span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-account" id="keluar"></i>Account</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-settings"></i>Setting</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-money-box"></i>Billing</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="{{url('logout')}}">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- END HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p10">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="card" class="card">
                                    @yield('content')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- modal small -->
            <!-- end modal static -->

        </div>
        <!-- END PAGE CONTAINER-->

    </div>

    <!-- Jquery JS-->


    <!-- Bootstrap JS-->
    <script src="{{URL::asset('vendor/bootstrap-4.1/popper.min.js')}}"></script>
    <script src="{{URL::asset('vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
    <!-- Vendor JS       -->
    <script src="{{URL::asset('vendor/slick/slick.min.js')}}">
    </script>
    <script src="{{URL::asset('vendor/wow/wow.min.js')}}"></script>
    <script src="{{URL::asset('vendor/animsition/animsition.min.js')}}"></script>
    <script src="{{URL::asset('vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}">
    </script>
    <script src="{{URL::asset('vendor/counter-up/jquery.waypoints.min.js')}}"></script>
    <script src="{{URL::asset('vendor/counter-up/jquery.counterup.min.js')}}">
    </script>
    <script src="{{URL::asset('vendor/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{URL::asset('vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{URL::asset('vendor/chartjs/Chart.bundle.min.js')}}"></script>
    <script src="{{URL::asset('vendor/select2/select2.min.js')}}">
    </script>
    <!-- Main JS-->
    <script src="{{URL::asset('js/main.js')}}"></script>
    <script src="{{URL::asset('js/ajax.js')}}"></script>
    <script src="{{asset('js/firebase.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @include('sweetalert::alert')
    <script>
    // ES6 Modules or TypeScript
    import Swal from 'sweetalert2';

    // CommonJS
    const Swal = require('sweetalert2')
    </script>

    <script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.noti__item').on('click ', function() {
            //alert('Kok gabisa');
            //$('.show-order').toggleClass('show-dropdown')
            $.ajax({
                url: "{{ route('pinjam.notif') }}",
                type: 'POST',
                dataType: 'html',
                success: function(data) {
                    //console.log(data)
                    $('.order-notification').html(data);
                }
            })
        });
    });
    $(document).ready(function() {
        let level = "{{ Auth::user()->level }}"
        if (level != 'user') {
            $(".js-arrow").trigger('click');
        } else {
            $('#ti li a').click(function() {
                $(".has-sub").trigger('open');
            })
        }
    });

    $('.js-arrow').on('click', function() {
        $(this).find('i').toggleClass('right fas fa-angle-left right fas fa-angle-down');
    });
    </script>

</body>

</html>
<!--end document-->