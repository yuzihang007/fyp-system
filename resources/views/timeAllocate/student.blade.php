@extends('layout.main')
@include('layout.error')
@include('layout.message')



@section('sidebar')
    @include('moduleOwner.sidebar')
@stop

@section('content')

    <div class="card">
        <div class="card-header bg-primary text-white">List of project title</div>
        <div class="row">
            <div class='col-sm-6'>
                <div class="form-group">
                    <label>start Time：</label>
                    <!--指定 date标记-->
                    <div class='input-group date'>
                        <input type='text' class="form-control" id='datetimepicker2'/>
                        <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
                    </div>
                </div>
            </div>
            <div class='col-sm-6'>
                <div class="form-group">
                    <label>End Time：</label>
                    <!--指定 date标记-->
                    <div class='input-group date'>
                        <input type='text' class="form-control" id='datetimepicker1'hidden/>
                        <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
                    </div>
                </div>
            </div>

        </div>

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
                $('#datetimepicker1').attr("hidden", false);
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
