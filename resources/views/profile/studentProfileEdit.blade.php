@extends('layout.main')
@include('layout.error')
@include('layout.message')



@section('sidebar')
    @include('student.sidebar')
@stop

@section('content')


    {{$student->name}}
    {{$student->email}}
@stop
