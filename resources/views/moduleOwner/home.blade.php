@extends('layout.main')
@include('layout.error')
@include('layout.message')

@section('sidebar')
    @include('moduleOwner.sidebar')
@endsection

@section('content')
    <div class="card">
        <a>module owner home</a>
    </div>
@endsection
