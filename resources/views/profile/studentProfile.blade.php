@extends('layout.main')
@include('layout.error')
@include('layout.message')



@section('sidebar')
    @include('student.sidebar')
@stop


@section('content')

    <div class="card">
        <div class="card-header bg-primary text-white">Profile</div>
        <div class="card-body">
            @foreach($data as $data)
                <div>
                    <label class="inline"> Student Name : {{$data->name}}</label>
                </div>
            <div>
                <label class="inline">Student Number : {{$data->studentNumber}}</label>
            </div>
            <div>
                <label class="inline">Email : {{$data->email}}</label>
            </div>
            <div>
                <label class="inline">Program : {{$data->program}}</label>
            </div>


            <div>

                <a href="{{url('student/profile/edit')}}">Edit</a>

            </div>


        </div>
    </div>
    @endforeach
@stop
