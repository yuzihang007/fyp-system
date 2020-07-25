@extends('layout.main')
@include('layout.error')
@include('layout.message')

@section('sidebar')
    @include('supervisor.sidebar')
@endsection

@section('content')
    <div class="card">
        <a>supervisor home</a>
    </div>
@endsection
