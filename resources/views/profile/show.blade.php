@extends('layout.main')

@section('sidebar')
    @include('supervisor.sidebar')
@stop


@section('content')

    <div class="card">
        <div class="card-header bg-primary text-white">Profile</div>
        <div class="card-body">

                <div>
                    <label class="inline">Username : {{$user->username}}</label>
                </div>
            <div>
                <label class="inline">First Name : {{$user->firstname}}</label>
            </div>
            <div>
                <label class="inline">Middle Name : {{$user->middlename}}</label>
            </div>
            <div>
                <label class="inline">Last Name : {{$user->lastname}}</label>
            </div>
            <div>
                <label>Email : {{$user->email}}</label>
            </div>
            <div>
                <label>Expertise: {{$user->expertise}}</label>
            </div>

            <div>

                <a href="{{'profile/update',\Illuminate\Support\Facades\Auth::user()->id}}">Edit</a>
            </div>


        </div>


    </div>
@stop
