
@extends('layout.main')
@include('layout.error')
@section('sidebar')
    @include('supervisor.sidebar')
@stop

@section('content')

    @foreach($records as $record)

        user id :{{$record->user_id}}
        title id :{{$record->title_id}}
        {{$record->preferenceOrder}}
        {{$record->project_title}}


{{--       @foreach($titles as $title)--}}
{{--           {{$title->project_title}}--}}
{{--       @endforeach--}}

    @endforeach
{{--    <div class="card">--}}
{{--        <div class="card-header bg-primary text-white">Student Application</div>--}}
{{--        <table class="table table-light table-striped table-hover ">--}}
{{--            <thead>--}}
{{--            <tr>--}}
{{--                <th>Topic ID</th>--}}
{{--                <th>Title</th>--}}
{{--                <th>Student</th>--}}
{{--                <th>Student Email</th>--}}
{{--                <th>Suitable for</th>--}}
{{--                <th>Program</th>--}}
{{--                <th>Choice Order</th>--}}
{{--                <th>Rate student</th>--}}
{{--                <th>Hired</th>--}}

{{--            </tr>--}}
{{--            </thead>--}}


{{--            @foreach($titles as $title)--}}
{{--                <tr>--}}
{{--                    <th scope="row">{{$title->topic_id}}{{$title->id}}</th>--}}
{{--                    <td>{{$title->project_title}}</td>--}}
{{--                    <td>--}}
{{--                        @foreach($title->suitable_for as $suitable_for)--}}
{{--                            <li>{{$suitable_for}}</li>--}}
{{--                        @endforeach--}}
{{--                    </td>--}}

{{--                    <td>--}}
{{--                        @foreach($title->students as $student)--}}
{{--                           <li>{{$student->firstname}}{{$student->lastname}}</li>--}}
{{--                        @endforeach--}}
{{--                    </td>--}}

{{--                    <td>--}}
{{--                        @foreach($title->students as $student)--}}
{{--                        <li>{{$student->email}}</li>--}}
{{--                        @endforeach--}}
{{--                    </td>--}}

{{--                    <td></td>--}}
{{--                    <td>--}}
{{--                        @foreach($title->students as $student)--}}
{{--                            <li>{{$student->pivot->preferenceOrder}}</li>--}}
{{--                        @endforeach--}}
{{--                    </td>--}}
{{--                    <td>--}}

{{--                        <form>--}}
{{--                            @csrf--}}
{{--                            <div class="form-check-inline">--}}
{{--                                <label for="titleMark2">--}}
{{--                                    <input class="form-check-input" type="radio" name="markStudent" id="markStudent" value="-2" checked>--}}
{{--                                    <label class="form-check-label" for="titleMark2">-2</label>--}}
{{--                                </label>--}}
{{--                            </div>--}}
{{--                            <br/>--}}
{{--                            <div class="form-check-inline">--}}
{{--                                <label for="titleMark2">--}}
{{--                                    <input class="form-check-input" type="radio" name="markStudent" id="markStudent" value="-1" checked>--}}
{{--                                    <label class="form-check-label" for="titleMark2">-1</label>--}}
{{--                                </label>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                        <a href="{{url('title/detail',$title->id)}}">detail</a>--}}
{{--                        @can('update',$title)--}}
{{--                            <a href="/title/{{$title->id}}/edit">edit</a>--}}
{{--                        @endcan()--}}
{{--                        @can('delete',$title) <a href="/title/{{$title->id}}/delete">delete</a>@endcan--}}


{{--                    </td>--}}
{{--                </tr>--}}
{{--            @endforeach--}}

{{--        </table>--}}
{{--    </div>--}}


{{--    <!--fen ye-->--}}
{{--    <div class="pagination justify-content-end">--}}
{{--                        {{$titles->render()}}--}}

{{--    </div>--}}


{{--<div class="card">--}}
{{--    <div class="card-header bg-primary text-white">Student Application</div>--}}
{{--    <table class="table table-light table-striped table-hover ">--}}
{{--        <thead>--}}
{{--        <tr>--}}
{{--            <th>Topic ID</th>--}}
{{--            <th>Title</th>--}}
{{--            <th>Student</th>--}}
{{--            <th>Student Email</th>--}}
{{--            <th>Suitable for</th>--}}
{{--            <th>Program</th>--}}
{{--            <th>Choice Order</th>--}}
{{--            <th>Rate student</th>--}}
{{--            <th>Hired</th>--}}

{{--        </tr>--}}
{{--        </thead>--}}


{{--        @foreach($users as $user)--}}
{{--            <tr>--}}
{{--                <th scope="row">--}}
{{--                    @foreach($user->studentTitles as $sTitles)--}}
{{--                        {{$sTitles->topic_id}}{{$sTitles->id}}--}}
{{--                    @endforeach()--}}
{{--                </th>--}}

{{--                <td>--}}
{{--                    @foreach($user->studentTitles as $sTitles)--}}
{{--                        {{$sTitles->project_title}}--}}
{{--                    @endforeach()--}}
{{--                </td>--}}

{{--                <td>{{$user->firstname}}</td>--}}

{{--                <td>{{$user->email}}</td>--}}

{{--                <td>--}}
{{--                    @foreach($user->studentTitles as $sTitles)--}}
{{--                        @foreach($sTitles->suitable_for as $suitable_for)--}}
{{--                        <li>{{$suitable_for}}</li>--}}
{{--                        @endforeach--}}
{{--                    @endforeach--}}
{{--                </td>--}}


{{--                <td></td>--}}
{{--                <td> @foreach($user->studentTitles as $sTitles)--}}
{{--                        {{$sTitles->pivot->preferenceOrder}}--}}
{{--                    @endforeach</td>--}}
{{--                <td>--}}

{{--                    <form>--}}
{{--                        @csrf--}}
{{--                        <div class="form-check-inline">--}}
{{--                            <label for="titleMark2">--}}
{{--                                <input class="form-check-input" type="radio" name="markStudent" id="markStudent" value="-2" checked>--}}
{{--                                <label class="form-check-label" for="titleMark2">-2</label>--}}
{{--                            </label>--}}
{{--                        </div>--}}
{{--                        <br/>--}}
{{--                        <div class="form-check-inline">--}}
{{--                            <label for="titleMark2">--}}
{{--                                <input class="form-check-input" type="radio" name="markStudent" id="markStudent" value="-1" checked>--}}
{{--                                <label class="form-check-label" for="titleMark2">-1</label>--}}
{{--                            </label>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                    <a href="{{url('title/detail',$title->id)}}">detail</a>--}}
{{--                    @can('update',$title)--}}
{{--                        <a href="/title/{{$title->id}}/edit">edit</a>--}}
{{--                    @endcan()--}}
{{--                    @can('delete',$title) <a href="/title/{{$title->id}}/delete">delete</a>@endcan--}}


{{--                </td>--}}
{{--            </tr>--}}
{{--        @endforeach--}}

{{--    </table>--}}
{{--</div>--}}


{{--<!--fen ye-->--}}
{{--<div class="pagination justify-content-end">--}}
{{--    {{$users->render()}}--}}

{{--</div>--}}


@stop

