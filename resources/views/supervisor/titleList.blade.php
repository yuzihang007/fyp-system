@extends('layout.main')

@section('sidebar')
    @include('supervisor.sidebar')
@stop

@section('content')
    @include('layout.message')

    <div class="card">
        <div class="card-header bg-primary text-white">List of project title</div>
        <table class="table table-light table-striped table-hover ">
            <thead>
            <tr>
                <th>Topic ID</th>
                <th>Title</th>
                <th>Suitable For</th>
                <th>Keywords</th>
                <th>vetting status</th>
                <th>Operation</th>
            </tr>
            </thead>


            @foreach($titles as $title)
                <tr>
                    <th scope="row">{{$title->topic_id}}{{$title->id}}</th>
                    <td>{{$title->project_title}}</td>
                    <td>
                    @foreach($title->suitable_for as $suitable_for)
                        <li>{{$suitable_for}}</li>
                    @endforeach
                    </td>
                    <td>{{$title->keywords}}</td>
                    <td>{{$title->status}}</td>
                    <td>

                        <a href="{{url('title/detail',$title->id)}}">detail</a>
                        @can('update',$title)
                        <a href="/title/{{$title->id}}/edit">edit</a>
                        @endcan
                        @can('delete',$title) <a href="/title/{{$title->id}}/delete">delete</a>@endcan


                    </td>
                </tr>
            @endforeach

        </table>
    </div>


    <!--fen ye-->
    <div class="pagination justify-content-end">
{{--                {{$titles->render()}}--}}

    </div>
@stop
