function setFileInputProfile(user_id)
{
    $("#photo_profile").fileinput({
        uploadUrl: '/customer/uploader/photo_profile/'+user_id,
        maxFilePreviewSize: 10240,
        maxFileCount: 1,
        allowedFileExtensions: ["jpg"],
        overwriteInitial: true,
        initialPreviewAsData: true,
        initialPreviewFileType: 'image',
        showUpload: false,
        showRemove: false,
        append: true
    /*}).on('fileuploaded', function(event, data) {

        d = new Date();
        $("#photo_profile_img").attr("src", "/public/uploads/customer/profile/"+user_id+"/profile.jpg?"+d.getTime());

    });*/
    }).on("filebatchselected", function(event, files){
        $("#photo_profile").fileinput("upload");
    }).on('fileuploaded', function(event, data) {

        d = new Date();
        $("#photo_profile_img").attr("src", "/public/uploads/customer/profile/"+user_id+"/profile.jpg?"+d.getTime());

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