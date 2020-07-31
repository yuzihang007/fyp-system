
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


$(".post-audit").click(function (event) {

    target = $(event.target);
    var post_id = target.attr("post-id");
    var status = target.attr("post-action-status");

    //询问框
    layer.confirm('Do you want to update the status?', {
        btn: ['yes', 'cancel'], //按钮
        area: ['320px', '186px'],
        skin: 'demo-class'
    }, function () {
        $.ajax({
            type: "POST",
            dataType: "json",
            data:{"status":status},
            url: "/title/" + post_id +"/status",
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

});