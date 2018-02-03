/**
/**
 * Created by admin on 4/8/16.
 */
$(document).ready(function() {

    var user_id=$('#user_id').val();
    
    $('#form_profile').validate({
        focusInvalid: false,
        ignore: "",
        rules: {
            name: {
                required: true
            },
            last_name:{
                required:true
            },
            email: {
                required:true,
                email: true
            }


        },

        invalidHandler: function (event, validator) {
            //display error alert on form submit
            if (!validator.numberOfInvalids())
                return;

            $('html, body').animate({
                scrollTop: $(validator.errorList[0].element).offset().top
            }, 2000);
        },

        errorPlacement: function (error, element) { // render error placement for each input type
            var icon = $(element).parent('.input-with-icon').children('i');
            var parent = $(element).parent('.input-with-icon');
            icon.removeClass('fa fa-check').addClass('fa fa-exclamation');
            parent.removeClass('success-control').addClass('error-control');
        },

        highlight: function (element) { // hightlight error inputs
            var parent = $(element).parent();
            parent.removeClass('success-control').addClass('error-control');
        },

        unhighlight: function (element) { // revert the change done by hightlight

        },

        success: function (label, element) {
            var icon = $(element).parent('.input-with-icon').children('i');
            var parent = $(element).parent('.input-with-icon');
            icon.removeClass("fa fa-exclamation").addClass('fa fa-check');
            parent.removeClass('error-control').addClass('success-control');
        },

        submitHandler: function (form) {
            form.submit();
        }
    });

    $('#form-address').validate({
        focusInvalid: false,
        ignore: "",
        rules: {
            address: {
                required:true,
            },
            zip: {
                required:true,
            },
            state: {
                required:true,
            },
            city: {
                required:true,
            },
            country: {
                required:true,
            }

        },

        invalidHandler: function (event, validator) {
            //display error alert on form submit
            if (!validator.numberOfInvalids())
                return;

            $('html, body').animate({
                scrollTop: $(validator.errorList[0].element).offset().top
            }, 2000);
        },

        errorPlacement: function (error, element) { // render error placement for each input type
            var icon = $(element).parent('.input-with-icon').children('i');
            var parent = $(element).parent('.input-with-icon');
            icon.removeClass('fa fa-check').addClass('fa fa-exclamation');
            parent.removeClass('success-control').addClass('error-control');
        },

        highlight: function (element) { // hightlight error inputs
            var parent = $(element).parent();
            parent.removeClass('success-control').addClass('error-control');
        },

        unhighlight: function (element) { // revert the change done by hightlight

        },

        success: function (label, element) {
            var icon = $(element).parent('.input-with-icon').children('i');
            var parent = $(element).parent('.input-with-icon');
            icon.removeClass("fa fa-exclamation").addClass('fa fa-check');
            parent.removeClass('error-control').addClass('success-control');
        },

        submitHandler: function (form) {
            
            
            $.ajax({
                url: "/enterprise/profile/add_address",
                type: "POST",
                dataType: "json",
                data: $('#form-address').serialize()+'&user_id='+user_id
                ,
                success:
                    function(json)
                    {
                       if(json.result==true)
                       {
                           $('.default').each(function(){
                               if($(this).data('type')=='address')
                               {
                                   $(this).removeClass('fa-check-square-o checked').addClass('fa-square-o');
                               }

                           });
                           
                           var append='<p>' +
                               '<span class="edit_address">'+json.data.address+'</span>' +
                               ' <i class="fa fa-trash text-danger pull-right delete" data-type="address" data-id="'+json.data.id+'"></i>'+
                                '<i class="fa fa-check-square-o pull-right default checked" data-type="address" data-id="'+json.data.id+'"></i>' +
                               '</p>';

                           $('#data_address').append(append);

                           $('#form-address').clearForm();

                           $('#modal-address').modal('hide');
                       }
                    },
                error:
                    function(xhr, textStatus, errorThrown) {
                        showMessage("w00t: "+errorThrown,'error');
                    }

            });
        }
    });

    $('#form-phone').validate({
        focusInvalid: false,
        ignore: "",
        rules: {
            type_phone: {
                required:true,
            },
            phone: {
                required:true,
                number:true
            }
            

        },

        invalidHandler: function (event, validator) {
            //display error alert on form submit
            if (!validator.numberOfInvalids())
                return;

            $('html, body').animate({
                scrollTop: $(validator.errorList[0].element).offset().top
            }, 2000);
        },

        errorPlacement: function (error, element) { // render error placement for each input type
            var icon = $(element).parent('.input-with-icon').children('i');
            var parent = $(element).parent('.input-with-icon');
            icon.removeClass('fa fa-check').addClass('fa fa-exclamation');
            parent.removeClass('success-control').addClass('error-control');
        },

        highlight: function (element) { // hightlight error inputs
            var parent = $(element).parent();
            parent.removeClass('success-control').addClass('error-control');
        },

        unhighlight: function (element) { // revert the change done by hightlight

        },

        success: function (label, element) {
            var icon = $(element).parent('.input-with-icon').children('i');
            var parent = $(element).parent('.input-with-icon');
            icon.removeClass("fa fa-exclamation").addClass('fa fa-check');
            parent.removeClass('error-control').addClass('success-control');
        },

        submitHandler: function (form) {
            

            $.ajax({
                url: "/enterprise/profile/add_phone",
                type: "POST",
                dataType: "json",
                data: $('#form-phone').serialize()+'&user_id='+user_id
                ,
                success:
                    function(json)
                    {
                        if(json.result==true)
                        {
                            console.log(json);


                            $('.default').each(function(){

                                if($(this).data('type')=='phones')
                                {
                                    $(this).removeClass('fa-check-square-o checked').addClass('fa-square-o');
                                }

                            });

                            var append='<p>' +
                                '<span class="edit_phone">'+json.data.phone+'</span>' +
                                ' <i class="fa fa-trash text-danger pull-right delete" data-type="phones" data-id="'+json.data.id+'"></i>'+
                                '<i class="fa fa-check-square-o pull-right default checked" data-type="phones" data-id="'+json.data.id+'"></i>' +
                                '</p>';


                            $('#data-phone').append(append);
                            $('#form-phone').clearForm();
                            $('#modal-phone').modal('hide');
                        }
                    },
                error:
                    function(xhr, textStatus, errorThrown) {
                        showMessage("w00t: "+errorThrown,'error');
                    }

            });
        }
    });

    $('#form-email').validate({
        focusInvalid: false,
        ignore: "",
        rules: {
            email: {
                required:true,
                email:true
            }

        },

        invalidHandler: function (event, validator) {
            //display error alert on form submit
            if (!validator.numberOfInvalids())
                return;

            $('html, body').animate({
                scrollTop: $(validator.errorList[0].element).offset().top
            }, 2000);
        },

        errorPlacement: function (error, element) { // render error placement for each input type
            var icon = $(element).parent('.input-with-icon').children('i');
            var parent = $(element).parent('.input-with-icon');
            icon.removeClass('fa fa-check').addClass('fa fa-exclamation');
            parent.removeClass('success-control').addClass('error-control');
        },

        highlight: function (element) { // hightlight error inputs
            var parent = $(element).parent();
            parent.removeClass('success-control').addClass('error-control');
        },

        unhighlight: function (element) { // revert the change done by hightlight

        },

        success: function (label, element) {
            var icon = $(element).parent('.input-with-icon').children('i');
            var parent = $(element).parent('.input-with-icon');
            icon.removeClass("fa fa-exclamation").addClass('fa fa-check');
            parent.removeClass('error-control').addClass('success-control');
        },

        submitHandler: function (form) {


            $.ajax({
                url: "/enterprise/profile/add_email",
                type: "POST",
                dataType: "json",
                data: $('#form-email').serialize()+'&user_id='+user_id
                ,
                success:
                    function(json)
                    {
                        if(json.result==true)
                        {

                            $('.default').each(function(){

                                if($(this).data('type')=='email')
                                {
                                    $(this).removeClass('fa-check-square-o checked').addClass('fa-square-o');
                                }

                            });

                            var append='<p>' +
                                '<span class="edit_phone">'+json.data.email+'</span>' +
                                ' <i class="fa fa-trash text-danger pull-right delete" data-type="emails" data-id="'+json.data.id+'"></i>'+
                                '</p>';

                            $('#data-email').append(append);
                            $('#form-email').clearForm();
                            $('#modal-email').modal('hide');
                        }else{
                            
                            var email_field=$('#form-email').find(':input[name="email"]');
                            email_field.parent('.input-with-icon').children('i').removeClass('fa fa-check').addClass('fa fa-exclamation');
                            email_field.parent('.input-with-icon').removeClass('success-control').addClass('error-control');

                            showMessage(json.message,'error');
                        }
                    },
                error:
                    function(xhr, textStatus, errorThrown) {
                        showMessage("w00t: "+errorThrown,'error');
                    }

            });
        }
    });
    
});