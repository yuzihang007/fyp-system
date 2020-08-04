
@extends('layout.main')
@include('layout.error')
@section('sidebar')
    @include('supervisor.sidebar')
@stop

@section('content')


    <div class="panel-body" style="padding: 10px 0px;">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="{{route('module.student.wait_allocate')}}">Waiting</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled active" href="#" tabindex="-1" aria-disabled="true">All Apply</a>
            </li>
        </ul>
    </div>

    <div class="card">
        <div class="card-header bg-primary text-white">Student Application</div>
        <table class="table table-light table-striped table-hover ">
            <thead>
            <tr>
                <th>Student</th>
                <th>Programme</th>
                <th>Email</th>
                <th>Sun</th>
                <th>Project Title</th>
                <th>Choice order</th>
                <th>Rate Student</th>
                <th>Hired!</th>
                <th>Prov. Alloc.</th>
            </tr>
            </thead>
            @forelse($list as $key => $item)
                <tr>
                    <td>{{$item->username}}</td>
                    <td>{{json_decode($item->suitable_for)[0]}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->topic_id}}</td>
                    <td>{{$item->title}}</td>
                    <td>{{$item->choice_order}}</td>
                    <td>
                        <form action="/application/{{$item->id}}/mark">
                            <div class="form-check-inline">
                                <label for="titleMark2">
                                    <input class="form-check-input supervisorMarkStudent" type="radio" name="supervisorMarkStudent" value="-2" @if($item->supervisor_mark_student==-2) checked @endif>
                                    <label class="form-check-label" for="titleMark2">-2</label>
                                </label>
                            </div>
                            <br/>

                            <div class="form-check-inline">
                                <label for="titleMark2">
                                    <input class="form-check-input supervisorMarkStudent" type="radio" name="supervisorMarkStudent" value="-1" @if($item->supervisor_mark_student==-1) checked @endif>
                                    <label class="form-check-label" for="titleMark2">-1</label>
                                </label>
                            </div>
                            <br/>


                            <div class="form-check-inline">
                                <label for="titleMark2">
                                    <input class="form-check-input supervisorMarkStudent" type="radio" name="supervisorMarkStudent" value="0" @if($item->supervisor_mark_student==0) checked @endif>
                                    <label class="form-check-label" for="titleMark2">0</label>
                                </label>
                            </div>
                            <br/>

                            <div class="form-check-inline">
                                <label for="titleMark2">
                                    <input class="form-check-input supervisorMarkStudent" type="radio" name="supervisorMarkStudent" value="1" @if($item->supervisor_mark_student==1) checked @endif>
                                    <label class="form-check-label" for="titleMark2">1</label>
                                </label>
                            </div>
                            <br/>


                            <div class="form-check-inline">
                                <label for="titleMark2">
                                    <input class="form-check-input supervisorMarkStudent" type="radio" name="supervisorMarkStudent" value="2" @if($item->supervisor_mark_student==2) checked @endif>
                                    <label class="form-check-label" for="titleMark2">2</label>
                                </label>
                            </div>
                            <br/>

                            <button type="submit"  class="btn btn-sm btn-info btn-default submitform">Mark</button>
                        </form>
                    </td>
                    <td>
                        @if($item->choice_order==1)
                            <button type="button"  class="btn btn-sm btn-info btn-default hire-audit" hire-id="{{$item->id}}" hire-action-status="1" @if($item->allocation_status==1) disabled @endif>Hire</button></td>
                    @endif

                    <td></td>
                </tr>
            @empty
                None
            @endforelse

        </table>
    </div>


    <!--fen ye-->
    <div class="pagination justify-content-end">
        {{$list->render()}}

    </div>

@stop

@section('js')
@endsection