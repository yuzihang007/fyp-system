@extends('layout.main')
@include('layout.error')
@include('layout.message')



@section('sidebar')
    @include('student.sidebar')
@stop

@include('popup.apply')

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
                <th>Choice Number</th>
                <th>Supervisor's Name</th>
                <th>Operation</th>
            </tr>
            </thead>


            @foreach($list as $key => $title)
                <tr>
                    <td scope="row">{{$title->topic_id}}{{$title->id}}</td>
                    <td ><a href="{{url('title/detail',$title->id)}}">{{$title->project_title}}</a></td>
                    <td>
                        @foreach($title->suitable_for as $suitable_for)
                            <li>{{$suitable_for}}</li>
                        @endforeach
                    </td>
                    <td>{{$title->keywords}}</td>



                    <td>{{$title->titleSelections_count}}</td>
                    <td>{{$title->choice_number}}</td>
                    <td><a href="{{url('/profile',$title->user->id)}}">{{$title->full_name}}</a></td>
                    <td>
                        @if(!$title->titleSelection(Auth::id())->exists() && $apply->count() < 3)
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#applyModal" data-key="{{$key}}">
                                Apply
                            </button>
                        @endif

{{--                        <button type="button" class="btn btn-info btn-default" data-toggle="modal" data-target="#addModal">Apply</button>--}}

{{--                        <form method="POST" action="/title/{{$title->id}}/select">--}}
{{--                            @csrf--}}

{{--                                <div class="form-check-inline">--}}
{{--                                    <label for="titleMark1">--}}
{{--                                        <input class="form-check-input" type="radio" name="preferenceOrder" id="preferenceOrder" value="1"  checked>--}}
{{--                                        <label class="form-check-label" for="titleMark1">First choice</label>--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                                <br/>--}}

{{--                                <div class="form-check-inline">--}}
{{--                                    <label for="titleMark2">--}}
{{--                                        <input class="form-check-input" type="radio" name="preferenceOrder" id="preferenceOrder" value="2" checked>--}}
{{--                                        <label class="form-check-label" for="titleMark2">Second Choice</label>--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                                <br/>--}}
{{--                                <div class="form-check-inline">--}}
{{--                                    <label for="titleMark3">--}}
{{--                                        <input class="form-check-input" type="radio" name="preferenceOrder" id="preferenceOrder" value="3" checked>--}}
{{--                                        <label class="form-check-label" for="titleMark3">Third Choice</label>--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                                <br/>--}}


{{--                        <div>--}}
{{--                            @if(!$title->titleSelection(Auth::id())->exists())--}}
{{--                            <button type="submit"  class="btn btn-info btn-default">Apply</button>--}}
{{--                            @endif--}}
{{--                        </div>--}}
{{--                        <br>--}}
{{--                        </form>--}}
                    </td>

                </tr>

            @endforeach
        </table>
    </div>


    <!--fen ye-->
    <div class="pagination justify-content-end">
        {{$list->render()}}

    </div>
@stop

@section('js')
    <script>
        var datas = @json($list)['data'];

    $('#applyModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var recipient = button.data('key');

    var data = datas[recipient];

    var modal = $(this);
    console.log(data.id);
    modal.find('#titleMk').val(data.id);
    });
    </script>
@endsection

