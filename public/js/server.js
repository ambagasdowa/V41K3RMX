var t_u = $('#type_user').val();
var t_u_id = $('#type_user_id').val();

$(document).ready(function () {
    getNotifications(t_u_id);
    getAgentInquiries();
});


var conn = new WebSocket('ws://latitude21resorts.com:8080');
conn.onopen = function(e) {
    console.log("Connection established!");

    sendMsg({event:'connect',type:t_u})

};

conn.onmessage = function(e) {
    var data = JSON.parse(e.data);

    if(data.event == 'connect') {
        alert('conectado');
    } else if (data.event == 'error') {
        error(data);
    } else if (data.event == 'new_task_verifier') {
        new_task_verifier(data);
    }else if (data.event == 'new_task_agent') {
        new_task_agent(data);
    }
};

var sendMsg = function(obj) {
    conn.send(JSON.stringify(obj));
};


function error(data)
{
    console.log(data);
}