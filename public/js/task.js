
function sndTaskVerifier()
{
    sendMsg({event:'task_verifier'})
}

function sndTaskAgent()
{
    sendMsg({event:'task_agent'})
}

function new_task_verifier()
{
    //2 for verifiers
        getNotifications(2);
}

function new_task_agent()
{
    //3 for agents
  
    getNotifications(3);
}

function delete_not(obj)
{
   var div = $(obj).parent();


    var id= $(obj).attr('data-id');

    $.ajax({
        url: "/task/deleteNotifications",
        type: "POST",
        dataType: "json",
        async: false,
        data: {
            id:id
        },
        success:
            function(json)
            {
                console.log(json);
                if(json.response !== false)
                {
                    $(div).fadeOut(300,function(){
                        $(div).remove();
                    });
                    $('#notifications_number').html(json.data);
                    $('#notifications_number').attr('data-value',json.data);

                }else{
                    showMessage('Error deleting notification','error');
                }
            }
        ,
        error:
            function(xhr, textStatus, errorThrown)
            {
                showMessage("w00t: "+errorThrown);
            }
    });


}

function getNotifications($group_id)
{
    $.ajax({
        url: "/task/getNotifications",
        type: "POST",
        dataType: "json",
        async: false,
        data: {
            group_id:$group_id
        },
        success:
            function(json)
            {

                var n= $('#notification-list').children('div');
                n.html('');
                if(json.response !== false)
                {

                    var tasks= json.notification;
                    $('#notifications_number').html(tasks.length);
                    $('#notifications_number').attr('data-value',tasks.length);



                    $.each(tasks, function(i,noti){

                        if($group_id==3)
                        {
                            var del_btn='<i class="fa fa-remove pull-right notification-delete" onclick="delete_not(this)"  data-id="'+noti.id+'" ></i>'
                        }else{
                            var del_btn='';
                        }


                        var html='<div class="notification-messages info ">' + del_btn +
                            '<div class="message-wrapper">' +
                            '<div class="heading">' +
                            ' "'+noti.subject+'" ' +
                            '</div>' +
                            '<div class="description">' +
                            ' "'+noti.description+'" ' +
                            '</div>' +
                            '</div>' +
                            '<div class="date pull-left"> "'+noti.date_created+'" </div>'+
                            '<div class="clearfix"></div>';

                        n.append(html);
                    });
                   // var tasks = parseFloat($('#notifications_number').attr('data-value'));
                   // tasks+= 1 ;
                }else{
                    $('#notifications_number').html(0);
                    $('#notifications_number').attr('data-value',0);
                    n.html('');

                }
            }
        ,
        error:
            function(xhr, textStatus, errorThrown)
            {
                showMessage("w00t: "+errorThrown);
            }
    });
}

function getAgentInquiries()
{
    $.ajax({
        url: "/task/getInquiries",
        type: "POST",
        dataType: "json",
        async: false,
        data: {
            id:'',
        },
        success:
            function(json)
            {

                var n= $('#badge-inquiries');
                n.html('');
                if(json.response !== false)
                {

                   n.html(json.data);

                }else{


                }
            }
        ,
        error:
            function(xhr, textStatus, errorThrown)
            {
                showMessage("w00t: "+errorThrown);
            }
    });
}

