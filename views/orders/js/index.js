function getOrders(e_id)
{
    $('#enterprise_id').val(e_id);
    getOrdersNowE($('#enterprise_id').val());
    setTimeout('getOrders($("#enterprise_id").val())',30000);
}

function getOrdersNow()
{
    $.ajax({
        url: 'orders/get_orders',
        type: "POST",
        dataType: "json",
        data: {
            user_id:$("#user_id").val(),
        }
        ,
        success: function (json) {
            console.log(json);
        },
        error: function (xhr, textStatus, errorThrown) {
            console.log(xhr);
        }
    });
}


function getOrdersNowE(e_id)
{
    $('#enterprise_id').val(e_id);
    $.ajax({
        url: '/ajax/get_orders_e',
        type: "POST",
        dataType: "json",
        data: {
            enterprise_id:e_id,
        }
        ,
        success: function (json)
        {
            $("#orders_results").html(json.html_orders);

            $('.clockpicker').clockpicker({
                placement: 'right',
                align: 'left',
                autoclose: true
            });

        },
        error: function (xhr, textStatus, errorThrown)
        {
            console.log(textStatus);
        }
    });

}

function pauseOrders() {
    setTimeout('getOrdersNowE($("#enterprise_id").val())',99999);
    _removeTimeout;
}