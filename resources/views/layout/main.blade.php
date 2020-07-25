<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document @yield('title')</title>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
{{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}

    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>--}}
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
{{--    <script src="{{ asset('js/app.js') }}"></script>--}}
    <script src="{{ asset('js/owner.js') }}" defer ></script>



    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>


    @section('style')
    @show
</head>
<body>


@section('head')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand " href="">Final Year Project System</a>
            <button class="=navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon" ></span>
            </button>

            <!--lift of navbar-->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href=""></a>

                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="" role="button"
                               data-toggle="dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  >{{ Auth::user()->username }}
                                <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-lg-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    logout
                                </a>

                                <form id="logout-form" action="{{url('/logout')}}" method="POST" style="display: none;">
                                    @csrf
                                </form>

                                <a class="dropdown-item" href="{{url('/profile',\Illuminate\Support\Facades\Auth::user()->id)}}">Profile</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
@show

@section('banner')
    <div class="jumbotron-fluid bg-light">
        <div class="container">
{{--            <a class="display-4">Fyp System</a>--}}
            <p>welcome to our system</p>
        </div>
    </div>
@show





@section('middle')
    <!--Head of web page-->
    <div class="container-fluid">
        <div class="row">
            <!--left of web page-->
            <div class="col-lg-3">
                @yield('sidebar')
            </div>


            <!--right of web page-->
            <div class="col-lg-9">
                @yield('content')
            </div>
        </div>
    </div>
@show

@section('foot')
    <div class="jumbotron-fluid">
        <div class="container">
            <span>@2020 Hugh</span>
        </div>
    </div>
@show


</body>
</html>
