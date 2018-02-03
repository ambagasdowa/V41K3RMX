function setFileInputProfile(stuff_id)
{
    $("#photo_product").fileinput({
        uploadUrl: '/enterprise/uploader/photo_product/'+stuff_id,
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
        $("#photo_product").fileinput("upload");
    }).on('fileuploaded', function(event, data) {
        var filename = data.files[0].name;
        d = new Date();
        
        filename=filename.replace("-","_");

        $(".photo_product_img").attr("src", "/public/uploads/enterprise/stuff/"+stuff_id+"/"+filename+"?"+d.getTime());
        $("#photo_update").val(""+filename+"");
        updateProduct($("#photo_update"));

    });

}

function updateProduct(obj)
{
    var f = $(obj).attr('f');
    var v = $(obj).val();
    //console.log(obj);
    $.ajax({
        url: '/enterprise/products/update_product',
        type: "POST",
        dataType: "json",
        data: {
            stuff_id:$('#stuff_id').val(),
            f:f,
            v:v,
        }
        ,
        success: function (json) {
            //console.log(json);
            alertify.set({ delay: 1000 });
            alertify.log("Product updated...");
        },
        error: function (xhr, textStatus, errorThrown) {
            showMessage("VIKER: " + errorThrown + ". " + textStatus, 'error');
        }
    });
}

function updateCategory(obj)
{
    var f = $(obj).attr('f');
    var v = $(obj).val();
    var category_id = $(obj).attr('cat_id');
    //console.log(obj);
    $.ajax({
        url: '/enterprise/products/update_category',
        type: "POST",
        dataType: "json",
        data: {
            category_id:category_id,
            f:f,
            v:v,
        }
        ,
        success: function (json) {
            //console.log(json);
            alertify.set({ delay: 1000 });
            alertify.log("Category updated...");
        },
        error: function (xhr, textStatus, errorThrown) {
            showMessage("VIKER: " + errorThrown + ". " + textStatus, 'error');
        }
    });
}

function addCategory()
{
    $.ajax({
        url: '/enterprise/products/add_category',
        type: "POST",
        dataType: "json",
        data: {
            enterprise_id:$('#enterprise').val(),
            tab_cat:$('#tab_cat').val(),
            name_cat:$('#name_cat').val(),

        }
        ,
        success: function (json) {
            //console.log(json);
            alertify.set({ delay: 1000 });
            alertify.log("Category Inserted...");

            setTimeout("location.reload();", 1500);
        },
        error: function (xhr, textStatus, errorThrown) {
            showMessage("VIKER: " + errorThrown + ". " + textStatus, 'error');
        }
    });
}
