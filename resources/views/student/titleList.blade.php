@extends('layout.main')
@include('layout.error')
@include('layout.message')



@section('sidebar')
    @include('student.sidebar')
@stop

@section('content')

{{--    </div>--}}
    <div class="card">
        <div class="card-header bg-primary text-white">List of project title</div>
        <table class="table table-light table-striped table-hover ">
            <thead>
            <tr>
                <th>Topic ID</th>
                <th>Title</th>
                <th>Suitable For</th>
                <th>Keywords</th>
                <th>renshu</th>
                <th>Supervisor's Name</th>
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

                    <th>{{$title->titleSelections_count}}</th>
                    <td><a href="{{url('/profile',$title->user->id)}}">{{$title->user->firstname}},{{$title->user->lastname}}</a></td>
                    <td>


                        <form method="POST" action="/title/{{$title->id}}/select">
                            @csrf

{{--                            @if(Auth::user()->preference($title->preferenceOrder = 3 && $title->preferenceOrder != 2 && $title->preferenceOrder != 3)->exists())--}}
                            @if($title->checkFirst(Auth::id())->exists())

                                <div class="form-check-inline">
                                    <label for="titleMark2">
                                        <input class="form-check-input" type="radio" name="preferenceOrder" id="preferenceOrder" value="2" checked>
                                        <label class="form-check-label" for="titleMark2">Second Choice</label>
                                    </label>
                                </div>
                                <br/>

                                <div class="form-check-inline">
                                    <label for="titleMark3">
                                        <input class="form-check-input" type="radio" name="preferenceOrder" id="preferenceOrder" value="3" checked>
                                        <label class="form-check-label" for="titleMark3">Third Choice</label>
                                    </label>
                                </div>
                                <br/>

                            @else

                                <div class="form-check-inline">
                                    <label for="titleMark1">
                                        <input class="form-check-input" type="radio" name="preferenceOrder" id="preferenceOrder" value="1"  checked>
                                        <label class="form-check-label" for="titleMark1">First choice</label>
                                    </label>
                                </div>
                                <br/>

                                <div class="form-check-inline">
                                    <label for="titleMark2">
                                        <input class="form-check-input" type="radio" name="preferenceOrder" id="preferenceOrder" value="2" checked>
                                        <label class="form-check-label" for="titleMark2">Second Choice</label>
                                    </label>
                                </div>
                                <br/>

                                <div class="form-check-inline">
                                    <label for="titleMark3">
                                        <input class="form-check-input" type="radio" name="preferenceOrder" id="preferenceOrder" value="3" checked>
                                        <label class="form-check-label" for="titleMark3">Third Choice</label>
                                    </label>
                                </div>
                                <br/>


                            @endif





                        <div>
                            @if($title->titleSelection(Auth::id())->exists())
                            @else
                            <button type="submit"  class="btn btn-info btn-default post-audit">Apply</button>
                            @endif
                        </div>
                        <br>
                        </form>
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


