@extends('layout.main')

@section('sidebar')
    @include('supervisor.sidebar')
@stop


@section('content')

    <div class="card">
        <div class="card-header bg-primary text-white">Profile</div>
        <div class="card-body">
            @foreach($data as $data)
                <div>
                    <label class="inline">Name : {{$data->name}}</label>
                </div>
                <div>
                    <label class="inline">Email : {{$data->email}}</label>
                </div>
                <div>
                    <label class="inline">Expertise : {{$data->expertise}}</label>
                </div>

                <div>
{{--                    <a href="{{'profile/update',\Illuminate\Support\Facades\Auth::user()->id}}">Edit</a>--}}
                </div>

        </div>
    </div>
    @endforeach
@stop
