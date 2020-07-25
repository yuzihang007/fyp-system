@extends('layout.main')


@section('content')
    <div class="card">
        <div class="card-header bg-primary text-white">List of project title</div>
        <table class="table table-light table-striped table-hover ">
            <thead>
            <tr>
                <th>Topic ID</th>
                <th>Title</th>
                <th>Suitable For</th>
                <th>keywords</th>
                <th>Staff's Name</th>
                <th>Operation</th>
            </tr>
            </thead>


            @foreach($titles as $title)
                <tr>
                    <th scope="row">{{$title->topic_id}}{{$title->id}}</th>
                    <td>{{$title->project_title}}</td>
                    <td>{{$title->suitable_for}}</td>
                    <td>{{$title->keywords}}</td>
                    <td>{{$title->user->firstname}},{{$title->user->lastname}}</td>
                    <td>
                        <a href="{{url('title/detail',$title->id)}}">detail</a>
                        <a href="">edit</a>
                        <a href="">delete</a>
                    </td>
                </tr>
            @endforeach

        </table>
    </div>
@stop



