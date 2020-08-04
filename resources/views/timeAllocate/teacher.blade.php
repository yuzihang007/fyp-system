@extends('layout.main')
@include('layout.error')
@include('layout.message')



@section('sidebar')
    @include('moduleOwner.sidebar')
@stop

@section('content')

    <div class="col-md-12">

        <form class="form-horizontal" method="post" action="{{route('save.time.allocate',['type' => 0])}}">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="card-header bg-primary text-white">List of project title</div>
                </div>
                <div class="panel-body">
                    {{ csrf_field() }}
                    {{ method_field('POST') }}
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">start Time：</label>
                        <div class="col-md-6 col-xs-12">
                            <input type='text' class="form-control" name="start_time" id='datetimepicker2'/>
                        </div>
                    </div>
                    <div class="form-group endtime" hidden>
                        <label class="col-md-3 col-xs-12 control-label">End Time：</label>
                        <div class="col-md-6 col-xs-12">
                            <input type='text' class="form-control" name="end_time" id='datetimepicker1'/>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <button type="submit"  class="btn btn-sm btn-info btn-default submitform">Commit</button>
                </div>
            </div>
        </form>
    </div>



    <!--fen ye-->
    <div class="pagination justify-content-end">
        {{--        {{$list->render()}}--}}

    </div>
@stop

@section('js')
    <script>
        $(function () {
            var now_time = new Date(new Date().toLocaleDateString()).getTime();
            console.log(now_time);
            $('#datetimepicker1').datetimepicker({
                fontAwesome:'font-awesome',
                format: 'yyyy-mm-dd hh:ii',
                locale: moment.locale('en'),
                minView: 1,
                autoclose: true
            });
            var picker = $('#datetimepicker2').datetimepicker({
                fontAwesome:'font-awesome',
                format: 'yyyy-mm-dd hh:ii',
                locale: moment.locale('en'),
                startDate: new Date(now_time + 24*4*60*60*1000),
                minView: 1,
                autoclose: true
            });
            picker.on('changeDate', function (e) {
                $('.endtime').attr("hidden", false);
                var pick_time = timestampToTime(e.date);
                $('#datetimepicker1').datetimepicker('setStartDate',e.date);
                $('#datetimepicker1').datetimepicker('setEndDate',new Date(Date.parse(pick_time) + 15*60*60*1000));

            });

            function timestampToTime(value){
                var date=new Date(value);
                var Y= date.getFullYear() + '-';
                var M = (date.getMonth()+1 < 10 ? '0'+(date.getMonth()+1) : date.getMonth()+1) + '-';
                var D = (date.getDate() < 10 ? '0'+(date.getDate()) : date.getDate());
                return Y+M+D;
            }
        });

    </script>
@endsection
