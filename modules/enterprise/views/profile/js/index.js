function setFileInputProfile(e_id)
{
    $("#photo_profile").fileinput({
        uploadUrl: '/enterprise/uploader/photo_profile/'+e_id,
        maxFilePreviewSize: 10240,
        maxFileCount: 1,
        allowedFileExtensions: ["jpg"],
        overwriteInitial: true,
        initialPreviewAsData: true,
        initialPreviewFileType: 'image',
        showUpload: false,
        showRemove: false,
        append: true
    }).on("filebatchselected", function(event, files){
        $("#photo_profile").fileinput("upload");
    }).on('fileuploaded', function(event, data) {

        d = new Date();
        $(".photo_profile_img").attr("src", "/public/uploads/enterprise/profile/"+e_id+"/profile.jpg?"+d.getTime());

    });

}

function updateProfileU(obj)
{
    var f = $(obj).attr('f');
    var v = $(obj).val();

    $.ajax({
        url: '/enterprise/profile/update_profile',
        type: "POST",
        dataType: "json",
        data: {
            user_id:$('#user_id').val(),
            enterprise_id:$('#enterprise_id').val(),
            f:f,
            v:v,
        }
        ,
        success: function (json) {
            //console.log(json);
            alertify.set({ delay: 1000 });
            alertify.log("Profile updated...");
        },
        error: function (xhr, textStatus, errorThrown) {
            console.log(textStatus);
            console.log(errorThrown);
            showMessage("VIKER: " + errorThrown + ". " + textStatus, 'error');
        }
    });
}

function updateProfileE(obj)
{
    var f = $(obj).attr('f');
    var v = $(obj).val();

    $.ajax({
        url: '/enterprise/profile/update_enterprise',
        type: "POST",
        dataType: "json",
        data: {
            user_id:$('#user_id').val(),
            enterprise_id:$('#enterprise_id').val(),
            f:f,
            v:v,
        }
        ,
        success: function (json) {
            //console.log(json);
            alertify.set({ delay: 1000 });
            alertify.log("Enterprise updated...");
        },
        error: function (xhr, textStatus, errorThrown) {
            console.log(textStatus);
            console.log(errorThrown);
            showMessage("VIKER: " + errorThrown + ". " + textStatus, 'error');
        }
    });
}

function updateAddressE()
{

    $.ajax({
        url: '/enterprise/profile/update_address',
        type: "POST",
        dataType: "json",
        data: {
            user_id:$('#user_id').val(),
            enterprise_id:$('#enterprise_id').val(),
            geo_lat:$('#geo_lat').val(),
            geo_lng:$('#geo_lng').val(),
            geo_str:$('#geo_str').val(),
            geo_int:$('#geo_int').val(),
            geo_ext:$('#geo_ext').val(),
        }
        ,
        success: function (json) {
            //console.log(json);
            alertify.set({ delay: 1000 });
            alertify.log("Address Enterprise updated...");
        },
        error: function (xhr, textStatus, errorThrown) {
            console.log(textStatus);
            console.log(errorThrown);
            showMessage("VIKER: " + errorThrown + ". " + textStatus, 'error');
        }
    });
}


/*function setFileInputProfile(user_id)
{
    var folder = ['profile'];
    $.each (folder, function (i,f) {
        var files = [];

        $.ajax({
            type: 'GET',
            url :'/ajax/get_files_uploaded/'+user_id+'/customer/profile',
            dataType: "json",
            success: function (data) {
                var files = [];
                $.each(data['fileContent'], function (index,item) {
                    files.push(item)
                });
                var up_url = '';
                var ft = '';
                switch (f)
                {
                    case 'profile':
                        up_url = '/customer/uploader/photo_profile/'+user_id;
                        ft = 'photo_profile';
                        break;
                    default:
                        up_url = '/customer/uploader/photo_profile/'+user_id;
                        ft = 'photo_profile';
                        break;

                }
                $("#"+ft).fileinput({
                    uploadUrl: up_url,
                    maxFilePreviewSize: 10240,
                    maxFileCount: 1,
                    allowedFileExtensions: ["jpg"],
                    overwriteInitial: false,
                    initialPreviewAsData: true,

                    initialPreview:files,
                    initialPreviewFileType: 'image',
                    initialPreviewConfig:data['fileType'],
                    append: true,
                    showUpload: true,
                    showRemove: true,
                }).on("filebatchselected", function(event, files){
                    $("#photo_profile").fileinput("upload");
                }).on('fileuploaded', function(event, data) {

                    d = new Date();
                    $("#photo_profile_img").attr("src", "/public/uploads/customer/profile/"+user_id+"/profile.jpg?"+d.getTime());
                });

            },
            error: function (xhr, status, err) {
                console.log(status);
                console.log(err);
            }
        });

    });
}*/



