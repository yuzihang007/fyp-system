@extends('layout.main')
@include('layout.error')
@include('layout.message')
@section('sidebar')
    @include('student.sidebar')
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <a> Welcome {{ auth()->user()->name }}</a>
        </div>
    </div>

@endsection
