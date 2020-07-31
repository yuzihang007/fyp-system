@include('layout.error')

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document @yield('title')</title>

    <!-- CSS only -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css?tk=1594870707812') }}">
    <!-- JS, Popper.js, and jQuery -->
    <script src="{{ asset('js/jquery.min.js?tk=1594870707812') }}"></script>
    <script src="{{ asset('js/popper.min.js?tk=1594870707812') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js?tk=1594870707812') }}"></script>

<style>

</style>
</head>
<body>


<!--head of login page-->
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <div class="container">
            <a class="navbar-brand text-light">Aston University</a>
        </div>
    </nav>


    <div class="jumbotron-fluid bg-dark text-light">
        <div class="container">
            <p>Welcome to FYP System</p>
        </div>
    </div>

<!--login card-->
<div class="container" >
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Login</div>

                <div class="card-body">

                    <!--login Form-->
                    <form method="POST" action="{{url('/login')}}">
                        @csrf

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">Username</label>
                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control
                                        @error('username') is-invalid @enderror" name="username"
                                       value="{{ old('username') }}" required autocomplete="username" autofocus>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                            <div class="col-md-6">
                                <input id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror"
                                       name="password" required autocomplete="new-password">
                            </div>
                        </div>



                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>
    </body>
</html>

