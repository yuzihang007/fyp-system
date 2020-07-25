@extends('layout.main')
@include('layout.error')



@section('sidebar')
    @include('supervisor.sidebar')
@stop

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">create project title</div>
    <div class="card-body">
        @include('title._titleForm')
    </div>
</div>
@stop
