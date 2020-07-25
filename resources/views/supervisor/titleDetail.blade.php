@extends('layout.main')

@section('sidebar')
    @include('supervisor.sidebar')
@stop


@section('content')

    <card>
        <div class="container">
            <div class="card-header">Project Details</div>
            <div class="card-body">
                <div>Topic ID:{{$title->topic_id}}{{$title->id}}</div><hr>
                <div>Topic:{{$title->project_title}}</div><hr>
                <div>Suitable for:@foreach($title->suitable_for as $suitable_for)
                        {{$suitable_for}}
                    @endforeach</div><hr>
                <div>Keywords:{{$title->keywords}}</div><hr>
                <div>Description:{{$title->description}}</div>
            </div>
        </div>
    </card>
@stop

