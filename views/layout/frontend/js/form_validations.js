/* Webarch Admin Dashboard 
/* This JS is only for DEMO Purposes - Extract the code that you need
-----------------------------------------------------------------*/
var tab ='resell';

$(document).ready(function() {				
	

    $('#user_login').validate({
        errorElement: 'span',
        errorClass: 'error',
        focusInvalid: false,
        ignore: "",
        rules: {
            email: {
                required: true,
                minlength: 2,
                email: true
            },
            password: {
                required: true,
                minlength: 2
            }
        },

        invalidHandler: function (event, validator) {
            //display error alert on form submit
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

    $('#book-form').validate({
        errorElement: 'span',
        errorClass: 'error',
        focusInvalid: false,
        ignore: "",
        rules: {
            bookname: {
                minlength: 2,
                required: true
            },
            bookemail: {
                required: true,
                email: true
            },
            bookphone: {
                required: true,
            },
            bookcomments:{
                required:true
            }
        },

        invalidHandler: function (event, validator) {
            //display error alert on form submit
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

            var $btn = $('.book-now-btn').button('loading')
            // business logic...

            $.ajax({
                url: "/properties/sendRequestInquirie",
                type: "POST",
                dataType: "json",
                data: {
                    type:4,
                    name:$('#bookname').val(),
                    email:$('#bookemail').val(),
                    comments:$('#bookcomments').val(),
                    prop_id:$('#pid').val(),
                    user_id:$('#uid').val(),
                    telephone:$("#bookphone").val()

                },
                success:
                    function(json)
                    {
                        if(json.result==true)
                        {
                            $('.alert-success-book').removeClass('hide');
                            $('#bookname').val('').removeClass('error-control').removeClass('succes-control');
                            $('#bookemail').val('').removeClass('error-control').removeClass('succes-control');
                            $('#arrival').val('').removeClass('error-control').removeClass('succes-control');
                            $('#departure').val('').removeClass('error-control').removeClass('succes-control');
                            $('#guests').val('').removeClass('error-control').removeClass('succes-control');
                            $('#bookcomments').val('').removeClass('error-control').removeClass('succes-control');

                        }else{
                            $('.alert-error-book').removeClass('hide');
                            $('#bookname').val('').removeClass('error-control').removeClass('succes-control');
                            $('#bookemail').val('').removeClass('error-control').removeClass('succes-control');
                            $('#arrival').val('').removeClass('error-control').removeClass('succes-control');
                            $('#departure').val('').removeClass('error-control').removeClass('succes-control');
                            $('#guests').val('').removeClass('error-control').removeClass('succes-control');
                            $('#bookcomments').val('').removeClass('error-control').removeClass('succes-control');
                        }
                        $btn.button('reset')
                    },
                error:
                    function(xhr, textStatus, errorThrown)
                    {
                        $btn.button('reset')
                    }
            });



        }

    });

    $('#form-timeshare').validate({
        errorElement: 'span',
        errorClass: 'error',
        focusInvalid: false,
        ignore: "",
        rules: {
            name:{
                required: true
            },
            last_name:{
                required: true
            },
            email: {
                required: true,
                email: true
            },
            phone:{
                required:true
            },
            resort:{
                required:true
            }
        },

        invalidHandler: function (event, validator) {
            //display error alert on form submit
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
            $('.loading').show();
            $.ajax({
                url: "/properties/sendEmailRentMyPlace",
                type: "POST",
                dataType: "json",
                data: {
                    type:3,
                    first_name:$('#name_t').val(),
                    last_name:$('#last_name_t').val(),
                    email:$('#email_t').val(),
                    phone_number:$('#phone_t').val(),
                    resort_name:$('#resort_t').val(),
                    subject:tab
                },
                success:
                    function(json)
                    {
                        if(json.result==true)
                        {
                            $('.alert-success-form-i-want').show();
                        }else{
                            $('.alert-error-form-i-want').show();
                        }

                        $('#form-timeshare').find('input').each(function(){
                            $(this).removeClass('success-control');
                            $(this).removeClass('error-control');
                        });
                        $('#form-timeshare').find('i').each(function(){
                            $(this).removeClass('fa fa-exclamation');
                            $(this).removeClass('fa fa-check');
                        });

                        $('#first_name_rent').val('');
                        $('#last_name_rent').val('');
                        $('#email_question_rent').val('');
                        $('#phone_number_rent').val('');
                        $('#resort_name_rent').val('');
                        $('.loading').hide();
                    },
                error:
                    function(xhr, textStatus, errorThrown)
                    {

                    }
            });

        }

    });

    $('#form-ad-temp').validate({
        errorElement: 'span',
        errorClass: 'error',
        focusInvalid: false,
        ignore: "",
        rules: {
            name:{
                required: true
            },
            last_name:{
                required: true
            },
            email: {
                required: true,
                email: true
            },
            phone:{
                required:true
            }
        },

        invalidHandler: function (event, validator) {
            //display error alert on form submit
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
            $('#loading-form-ad').show();
            $.ajax({
                url: "/properties/sendEmailRentMyPlace",
                type: "POST",
                dataType: "json",
                data: {
                    first_name:$('#name_form_ad').val(),
                    last_name:$('#last_name_form_ad').val(),
                    email:$('#email_form_ad').val(),
                    phone_number:$('#phone_form_ad').val()
                },
                success:
                    function(json)
                    {
                        if(json.result==true)
                        {
                            $('.alert-success-form-ad').show();
                        }else{
                            $('.alert-error-form-ad').show();
                        }

                        $('#form-ad-temp').find('input').each(function(){
                            $(this).removeClass('success-control');
                            $(this).removeClass('error-control');
                        });
                        $('#form-ad-temp').find('i').each(function(){
                            $(this).removeClass('fa fa-exclamation');
                            $(this).removeClass('fa fa-check');
                        });

                        $('#name_form_ad').val('');
                        $('#last_name_form_ad').val('');
                        $('#email_form_ad').val('');
                        $('#phone_form_ad').val('');
                        $('#loading-form-ad').hide();
                    },
                error:
                    function(xhr, textStatus, errorThrown)
                    {

                    }
            });

        }

    });

    $('#form-ad').validate({
        errorElement: 'span',
        errorClass: 'error',
        focusInvalid: false,
        ignore: "",
        rules: {
            email: {
                required: true,
                minlength: 2,
                email: true,
                remote:{
                    url: "/user/checkEmail",
                    type: "post",

                }

            },
            password: {
                required: true,
                minlength: 8
            },
            confirm:{
                equalTo:'#password',
                required: true
            },
            terms_conditions:{
                required:true
            }
        },
        messages: {
            email: {
                required: "You must enter your email",
                remote:'Email already exist'
            },
            password: {
                required: "You must enter your password",
                minlength : "Minimun length 8"
            },
            confirm: {
                equalTo : "Password dont match"
            },
            terms_conditions:{
                required:'You need to accept Terms and Conditions'
            }
        },

        invalidHandler: function (event, validator) {
            //display error alert on form submit
        },

        errorPlacement: function (error, element) { // render error placement for each input type


            var icon = $(element).parent('.input-with-icon').children('i');
            var parent = $(element).parent('.input-with-icon');
            icon.removeClass('fa fa-check').addClass('fa fa-exclamation');
            parent.removeClass('success-control').addClass('error-control');
            error.appendTo(parent.next('p'));
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



});

function setTab(val) {
   tab=val;
}

$('.tab-link').click(function(){
    var other =$('.tab-link').not(this);

    $.each(other,function(key,value){

        $(value).children('li').removeClass('active')
    });

    $(this).children('li').addClass('active');
});

