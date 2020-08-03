
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


$(".hire-audit").click(function (event) {

    target = $(event.target);
    var hire_id = target.attr("hire-id");
    var status = target.attr("hire-action-status");

    //询问框
    layer.confirm('Sure you want to submit it?', {
        btn: ['yes', 'cancel'], //按钮
        area: ['320px', '186px'],
        skin: 'demo-class'
    }, function () {
        $.ajax({
            type: "POST",
            dataType: "json",
            data:{"allocationStatus":status},
            url: "/application/" + hire_id +"/status",
            success: function (res) {
                console.log(res);
                layer.msg('success', {
                    icon: 1,
                    time: 1500 //2秒关闭（如果不配置，默认是3秒）
                }, function(){
                    location.reload();
                });
            },
            error(res){
                console.log(res.responseJSON.msg);
                layer.open({
                    title:false,
                    content:'<span>'+res.responseJSON.msg+'</span>',
                    btn:false,
                    time:3000,
                    closeBtn:0,
                });
            }
        });
    }, function () {

    });
    // $.ajax({
    //
    //     url: "/application/" + hire_id +"/status",
    //     method: "POST",
    //     data:{"allocationStatus":status},
    //     dataType: "json",
    //     success: function (data) {
    //         if (data.error !=0){
    //             alert(data.msg)
    //             return;
    //         }
    //         target.parent().parent().remove();
    //     }
    // })
});
