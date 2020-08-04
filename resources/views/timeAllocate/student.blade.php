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
                    <label>选择日期：</label>
                    <!--指定 date标记-->
                    <div class='input-group date'>
                        <input type='text' class="form-control" id='datetimepicker1' />
                        <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
                    </div>
                </div>
            </div>
            <div class='col-sm-6'>
                <div class="form-group">
                    <label>选择日期+时间：</label>
                    <!--指定 date标记-->
                    <div class='input-group date'>
                        <input type='text' class="form-control" id='datetimepicker2'/>
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


        // function initDateTimePicker(startTime, endTime, timeFormat, minview) {
        //     $(startTime).datetimepicker("remove");
        //     $(startTime).datetimepicker({
        //         language: sessionStorage.getItem("lang"),
        //         autoclose: true,
        //         todayHighlight: true,
        //         endDate: new Date(),
        //         format: timeFormat,
        //         startView: minview,
        //         minView: minview,
        //     }).on("changeDate", function() {
        //         var value = $(startTime).val();
        //         $(endTime).datetimepicker("remove");
        //         $(endTime).datetimepicker({
        //             language: sessionStorage.getItem("lang"),
        //             autoclose: true,
        //             todayHighlight: true,
        //             endDate: new Date(),
        //             startDate: value,
        //             format: timeFormat,
        //             startView: minview,
        //             minView: minview,
        //         })
        //     });
        //     $(endTime).datetimepicker("remove");
        //     $(endTime).datetimepicker({
        //         language: sessionStorage.getItem("lang"),
        //         autoclose: true,
        //         todayHighlight: true,
        //         endDate: new Date(),
        //         format: timeFormat,
        //         startView: minview,
        //         minView: minview,
        //     }).on("changeDate", function() {
        //         var value = $(endTime).val();
        //         $(startTime).datetimepicker("remove");
        //         $(startTime).datetimepicker({
        //             language: sessionStorage.getItem("lang"),
        //             autoclose: true,
        //             todayHighlight: true,
        //             endDate: value,
        //             format: timeFormat,
        //             startView: minview,
        //             minView: minview,
        //         })
        //     });
        // }

        /*4.17版本一些可能用得到的方法参数*/
        /*
                showClose:true	//是否显示关闭 按钮
                /*viewMode: 'days',//天数模块展示，months则为以月展示
                daysOfWeekDisabled: false,//星期几 禁止选择,参数 [num],多个逗号隔开
                calendarWeeks: false,	//显示 周 是 今年第几周
                toolbarPlacement:'default', //工具摆放的位置，top 则为上，默认为底
                showTodayButton:false,	//是否工具栏 显示 直达今天天数的 按钮，默认false
                showClear:false, //是否 工具栏显示  清空 输入框  的按钮。默认false
        */
    </script>
@endsection
