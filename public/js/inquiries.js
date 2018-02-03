function sendRequestInquirie(obj)
{
    blockUI('content-review');
    $.ajax({
        url: $(obj).attr('url'),
        type: "POST",
        dataType: "json",
        data: {
            prop_id:$(obj).attr('prop_id'),
            user_id:$(obj).attr('user_id'),
            name:$("#traveler_name").val(),
            telephone:$("#traveler_telephone").val(),
            email:$("#traveler_email").val(),
            comment:$("#traveler_comment").val()
        }
        ,
        success: function (json) {
            $('#content-review').html(json.html);
            unblockUI('content-review');
            showMessage(json.message);

            $('#traveler_name').val('');
            $('#traveler_telephone').val('');
            $('#traveler_email').val('');
            $('#traveler_comment').val('');
        },
        error: function (xhr, textStatus, errorThrown) {
            showMessage("w00t: " + errorThrown, 'error');
        }
    });
    
}