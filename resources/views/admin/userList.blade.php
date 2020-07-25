@extends('layout.main')

@section('sidebar')
    @include('admin.sidebar')
@stop

@section('content')
    @include('layout.message')

    <div class="card">
        <div class="card-header bg-primary text-white">List of User</div>
        <table class="table table-light table-striped table-hover ">
            <thead>
            <tr>
                <th>User ID</th>
                <th>Username</th>
                <th>Name</th>
                <th>Role</th>
                <th>creat_at</th>
                <th>Operation</th>
            </tr>
            </thead>


            @foreach($users as $user)
                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->username}}</td>
                    <td>{{$user->firstname}},{{$user->lastname}}</td>
                    <td>{{$user->role}}</td>
                    <td>{{$user->created_at}}</td>
                    <td>

                        <a href="/admin/{{$user->id}}/delete">Delete</a><br/>
{{--                        @can('update',$user)--}}
                        <a href="/admin/{{$user->id}}/edit">Reset password</a>
{{--                        @endcan()--}}


                    </td>
                </tr>
            @endforeach

        </table>
    </div>


    <!--fen ye-->
    <div class="pagination justify-content-end">
                {{$users->render()}}

    </div>
@stop
