@extends('layout.main')
@include('layout.error')
@include('layout.message')

@section('sidebar')
    @include('admin.sidebar')
     @endsection
@section('content')

<div class="container" >
    <div class="row justify-content-center">
        <div class="col-md-12">
            <card class="card">
                <div class="card-header">Create a new user</div>

                <card class="card-body">
                    <form method="POST" action="{{url('/admin/createUser')}}">
                        @csrf

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">Username</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                            </div>
                        </div>

                        <div class="text-center">

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            </div>
                        </div>

{{--                        <div class="form-group row">--}}
{{--                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">--}}
{{--                            </div>--}}
{{--                        </div>--}}


                        <div class="form-check-inline">
                            <label for="Role1">
                                <input class="form-check-input" type="radio" name="role" id="Role" value="1" checked>
                                <label class="form-check-label" for="Role1">Admin</label>
                            </label>
                        </div>

                        <div class="form-check-inline">
                            <label for="Role2">
                                <input class="form-check-input" type="radio" name="role" id="Role2" value="2" checked>
                                <label class="form-check-label" for="Role2">Assessor</label>
                            </label>
                        </div>

                        <div class="form-check-inline">
                            <label for="Role3">
                                <input class="form-check-input" type="radio" name="role" id="Role3" value="3" checked>
                                <label class="form-check-label" for="Role3">Module Owner</label>
                            </label>
                        </div>

                        <div class="form-check-inline">
                            <label for="Role4">
                                <input class="form-check-input" type="radio" name="role" id="Role4" value="4" checked>
                                <label class="form-check-label" for="Role4">Student</label>
                            </label>
                        </div>

                        <div class="form-check-inline">
                            <label for="Role5">
                                <input class="form-check-input" type="radio" name="role" id="Role5" value="5" checked>
                                <label class="form-check-label" for="Role5">Supervisor</label>
                            </label>
                        </div>
                        </div>



                        <div class="form-group row py-2 mb-3">
                            <div class="col-md-12  text-center">
                                <button type="submit" class="btn btn-primary text-center">
                                   Create
                                </button>
                            </div>
                        </div>


                    </form>
                </card>
            </card>
        </div>
    </div>
</div>
    @endsection

