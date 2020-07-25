
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


$(".post-audit").click(function (event) {

    target = $(event.target);
    const post_id = target.attr("post-id");
    const status = target.attr("post-action-status");

    $.ajax({

        url: "/title/" + post_id +"/status",
        method: "POST",
        data:{"status":status},
        dataType: "json",
        success: function (data) {
            if (data.error !=0){
                alert(data.msg)
                return;
            }
            target.parent().parent().remove();
        }
    })
});
