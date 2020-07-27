
@extends('layout.main')
@include('layout.error')
@section('sidebar')
    @include('supervisor.sidebar')
@stop

@section('content')




        <div class="card">
            <div class="card-header bg-primary text-white">Student Application</div>
            <table class="table table-light table-striped table-hover ">
                <thead>
                <tr>
                    <th>Application</th>
                    <th>User_id</th>
                    <th>Title_id</th>

{{--                    <th>Topic ID</th>--}}
{{--                    <th>Title</th>--}}
{{--                    <th>Suitable for</th>--}}
{{--                    <th>Student</th>--}}
{{--                    <th>StudentNum</th>--}}
{{--                    <th>Student Email</th>--}}
{{--                    <th>Program</th>--}}
                    <th>Choice Order</th>
                    <th>Rate student</th>
                    <th>Hired</th>

                </tr>
                </thead>


                @foreach($applicationStudents as $applicationStudent)
                    <tr>
                        <td>{{$applicationStudent->id}}</td>
                        <td>{{$applicationStudent->user_id}}</td>
                        <th scope="row">{{$applicationStudent->title_id}}</th>
                        <td>{{$applicationStudent->preferenceOrder}}</td>

{{--                        <th scope="row">{{$data->topic_id}}{{$data->title_id}}</th>--}}
{{--                        <td>{{$data->project_title}}</td>--}}
{{--                        <td>{{$data->suitable_for}}</td>--}}
{{--                        <td>{{$data->name}}</td>--}}
{{--                        <td>{{$data->studentNumber}}</td>--}}
{{--                        <td>{{$data->email}}</td>--}}
{{--                        <td>{{$data->program}}</td>--}}
{{--                        <td>{{$data->preferenceOrder}}</td>--}}

                        <td>

                            <form type="POST" action="/application/{{$applicationStudent->id}}/mark">
                                @csrf
                                <div class="form-check-inline">
                                    <label for="titleMark2">
                                        <input class="form-check-input" type="radio" name="supervisorMarkStudent" id="supervisorMarkStudent" value="-2" checked>
                                        <label class="form-check-label" for="titleMark2">-2</label>
                                    </label>
                                </div>
                                <br/>

                                <div class="form-check-inline">
                                    <label for="titleMark2">
                                        <input class="form-check-input" type="radio" name="supervisorMarkStudent" id="supervisorMarkStudent" value="-1" checked>
                                        <label class="form-check-label" for="titleMark2">-1</label>
                                    </label>
                                </div>
                                <br/>


                                <div class="form-check-inline">
                                    <label for="titleMark2">
                                        <input class="form-check-input" type="radio" name="supervisorMarkStudent" id="supervisorMarkStudent" value="0" checked>
                                        <label class="form-check-label" for="titleMark2">0</label>
                                    </label>
                                </div>
                                <br/>


                                <div class="form-check-inline">
                                    <label for="titleMark2">
                                        <input class="form-check-input" type="radio" name="supervisorMarkStudent" id="supervisorMarkStudent" value="1" checked>
                                        <label class="form-check-label" for="titleMark2">1</label>
                                    </label>
                                </div>
                                <br/>


                                <div class="form-check-inline">
                                    <label for="titleMark2">
                                        <input class="form-check-input" type="radio" name="supervisorMarkStudent" id="supervisorMarkStudent" value="2" checked>
                                        <label class="form-check-label" for="titleMark2">2</label>
                                    </label>
                                </div>
                                <br/>


                                <button type="submit"  class="btn btn-info btn-default post-audit">Mark</button>

                            </form>

                        </td>

                        <td>
                            @if($applicationStudent->preferenceOrder==1)
                                <button type="button"  class="btn btn-info btn-default hire-audit"
                                        hire-id="{{$applicationStudent->id}}" hire-action-status="1" disabled="{{$applicationStudent->allocationStatus==1}}">Hire</button>
                            @else
                            @endif
                        </td>
                    </tr>
                @endforeach

            </table>
        </div>


{{--        <!--fen ye-->--}}
{{--        <div class="pagination justify-content-end">--}}
{{--                            {{$data->render()}}--}}

{{--        </div>--}}









@stop

