function openModal(obj)
{
    var modal_url     = $(obj).attr('url');
    var modal_title   = $(obj).attr('title');


    $('#modal_master').modal('show');
    $('#button_confirm').attr('onclick',$(obj).attr('data-click'));
    //blockUI('modal_content');
    $.ajax({
            url: modal_url,
            type: "POST",
            dataType: "json",
            data: {
                order_id:$(obj).attr('data-order_id'),
            }
            ,
            success: function (json) {
                $('#modal_title').html(modal_title);
                $('#content_modal').html(json.html);
                $('#button_confirm').attr('onclick',$(obj).attr('data-click'));
                //unblockUI('modal_content');
            },
            error: function (xhr, textStatus, errorThrown) {
                console.log(textStatus);
                console.log(errorThrown);
            }
    });
}


function setIagree(obj){
    $.ajax({
        url: '/login/autologin',
        type: "POST",
        dataType: "json",
        data: {
            mid:$(obj).attr('mid'),
        }
        ,
        success: function (json) {
            showMessage(json.message, 'success');
            setTimeout(3000);
            window.location = '/dashboard';
        },
        error: function (xhr, textStatus, errorThrown) {
            showMessage("w00t: " + errorThrown, 'error');
        }
    });
}