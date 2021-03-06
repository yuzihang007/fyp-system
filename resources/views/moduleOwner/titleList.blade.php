@extends('layout.main')
@include('layout.error')
@include('layout.message')



@section('sidebar')
    @include('moduleOwner.sidebar')
@stop

@section('content')
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#">Passed Topic</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('module.wait.vetting')}}">Waiting for vetting</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="#">waiting for adjusting</a>
        </li>
    </ul>

<div class="card">
    <div class="card-header bg-primary text-white">List of project title</div>
    <table class="table table-light table-striped table-hover">
        <thead>
        <tr>
            <th>Topic ID</th>
            <th>Title</th>
            <th>Suitable For</th>
            <th>Keywords</th>
            <th>Supervisor's Name</th>
            <th>Vetting Status</th>
            <th>Operation</th>
        </tr>
        </thead>


        @foreach($titles as $title)
            <tr>
                <th scope="row">{{$title->topic_id}}{{$title->id}}</th>
                <td ><a href="{{url('title/detail',$title->id)}}">{{$title->project_title}}</a></td>
                <td>
                    @foreach($title->suitable_for as $suitable_for)
                        <li>{{$suitable_for}}</li>
                    @endforeach
                </td>
                <td>{{$title->keywords}}</td>
                <td>{{$title->user->firstname}},{{$title->user->lastname}}</td>
                <th>{{$title->status}}</th>
                <td>
                    @if($title->status==0)
                    <button type="button"  class="btn btn-info btn-default post-audit"
                            post-id="{{$title->id}}" post-action-status="1">Pass</button>
                    <button type="button" class="btn btn-info btn-default post-audit"
                            post-id="{{$title->id}}" post-action-status="-1">Fail</button>
                    @elseif($title->status==1)
                        <button type="button" class="btn btn-info btn-default post-audit"
                                post-id="{{$title->id}}" post-action-status="-1">Fail</button>
                    @elseif($title->status==-1)
                        <button type="button"  class="btn btn-info btn-default post-audit"
                                post-id="{{$title->id}}" post-action-status="1">Pass</button>
                    @endif
                </td>
            </tr>
        @endforeach

    </table>
</div>


<!--fen ye-->
<div class="pagination justify-content-end">
                    {{$titles->render()}}

</div>
@stop

