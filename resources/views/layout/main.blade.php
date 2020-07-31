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
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css?tk=1594870707812') }}">
{{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}

    <!-- JS, Popper.js, and jQuery -->
    <script src="{{ asset('js/jquery.min.js?tk=1594870707812') }}"></script>
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>--}}
    <script src="{{ asset('js/popper.min.js?tk=1594870707812') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js?tk=1594870707812') }}"></script>
{{--    <script src="{{ asset('js/app.js') }}"></script>--}}
{{--    <script src="{{ asset('js/owner.js?tk=15948707072') }}" defer ></script>--}}
{{--    <script src="{{ asset('js/hire.js?tk=1594870707812') }}" defer ></script>--}}
    <script src="{{ asset('layer/layer.js') }}"></script>



    <!-- include summernote css/js -->
    <link href="{{ asset('css/summernote.min.css?tk=1594870707812') }}" rel="stylesheet">
    <script src="{{ asset('js/summernote.min.js?tk=1594870707812') }}"></script>


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

                                @if(auth()->user()->role === 4)
                                    <a class="dropdown-item" href="{{url('student/profile',\Illuminate\Support\Facades\Auth::user()->id)}}">Profile</a>
                                @else
                                    <a class="dropdown-item" href="{{url('supervisor/profile',\Illuminate\Support\Facades\Auth::user()->id)}}">Profile</a>
                                @endif
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

@yield('js')

</body>
</html>
