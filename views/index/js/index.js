/**
 * Created by Eduardo on 2/11/16.
 */
//sliders//
var s;
$(function(){


    $('.slider-content-index').show();

    $('#containerVideo').owlCarousel({
        items:1,
        loop: true,
        nav:false,
        autoplay:true,
        autoplayTimeout:4000

    });


    initialize_owl($('#news-articles'));

    $('a[href="#tab-1"]').on('shown.bs.tab', function () {
        initialize_owl($('#news-articles'));
    }).on('hide.bs.tab', function () {
        destroy_owl($('#news-articles'));
    });

    $('a[href="#tab-2"]').on('shown.bs.tab', function () {
        initialize_owl($('#professionals-articles'));
    }).on('hide.bs.tab', function () {
        destroy_owl($('#professionals-articles'));
    });

    $('a[href="#tab-3"]').on('shown.bs.tab', function () {
        initialize_owl($('#tsu-articles'));
    }).on('hide.bs.tab', function () {
        destroy_owl($('#tsu-articles'));
    });

    $('.next-new-article').click(function () {

        s.trigger('next.owl.carousel');
    });
    $('.next-professionals-article').click(function () {
        s.trigger('next.owl.carousel');
    });

    $('.next-tsu-article').click(function () {
        s.trigger('next.owl.carousel');
    });




    $(".btn-tab").click(function(){
        var div = $(this).children('div');
        var img = $(this).data('logo');
        $('.logo-img').removeClass('active');
        if(!div.hasClass('active')){

            div.addClass('active');
        }

    });




});

function initialize_owl(el) {
    el.owlCarousel({
        loop: true,
        margin: 10,
        dots:false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 4
            }
        }
    });
     s = el;


}




function destroy_owl(el) {
    el.data('owlCarousel').destroy();
}
/*
$('#form-footer').validate({
    focusInvalid: false,
    ignore: "",
    rules: {
        footer_name:{
            required:true
        },
        footer_email:{
            required:true,
            email:true
        },
        footer_message:{
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

        $.ajax({
            url: "/ajax/sendFormFooter",
            type: "POST",
            dataType: "json",
            data: {
                name:$('#footer_name').val(),
                email:$('#footer_email').val(),
                message:$('#footer_message').val()
            }
            ,
            success:
                function(json)
                {
                    if(json.result==true)
                    {
                        $('.alert-success').show();
                    }else{
                        $('.alert-danger').show();
                    }

                    $('.input-with-icon').removeClass('success-control').children('i').removeClass('fa fa-check');
                    $('#footer_name').val('');
                    $('#footer_email').val('');
                    $('#footer_message').val('');

                },
            error:
                function(xhr, textStatus, errorThrown) {
                   // showMessage("w00t: "+errorThrown,'error');
                    $('#alert-danger').show();
                }

        });
    }
});*/


