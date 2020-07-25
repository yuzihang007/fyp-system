@extends('layout.main')
@include('layout.error')
@include('layout.message')

@section('sidebar')
    @include('admin.sidebar')
@endsection

@section('content')
    <div class="card">
        <a>admin home</a>
    </div>
@endsection
