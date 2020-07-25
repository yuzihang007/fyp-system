@extends('layout.main')
@include('layout.error')
@include('layout.message')

@section('sidebar')
    @include('assessor.sidebar')
@endsection

@section('content')
    <div class="card">
        <a>assessor home</a>
    </div>
@endsection


