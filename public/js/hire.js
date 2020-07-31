
// $.ajaxSetup({
//     headers: {
//         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//     }
// });


$(".hire-audit").click(function (event) {

    target = $(event.target);
    const hire_id = target.attr("hire-id");
    const status = target.attr("hire-action-status");

    $.ajax({

        url: "/application/" + hire_id +"/status",
        method: "POST",
        data:{"allocationStatus":status},
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
