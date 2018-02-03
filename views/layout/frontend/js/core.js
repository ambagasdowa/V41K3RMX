
$(document).ready(function () {


    $(".collapse_icon").click(function(){
        var i=$(this).find('i');
        if(i.hasClass('fa-minus-circle'))
        {
            i.removeClass('fa-minus-circle').addClass('fa-plus-circle');
        }else if(i.hasClass('fa-plus-circle')){
            i.removeClass('fa-plus-circle').addClass('fa-minus-circle');
        }
    });

    $('#buy-and-ad').click(function(){
        $('#modal-ad').modal('show');
    });

    $('#sticky-menu').sticky({topSpacing:0,zIndex:10000});

    var bottom = $('footer').height();
    var map = $('#map_canvas').height();
    var menu = $('#sticky-menu').height();
    var doforyou = $('#doForYou').height();


    $('#slider-vertical').sticky({
        topSpacing: 0,
        bottomSpacing: bottom + doforyou +  180
    });

    $('.div-callnow').sticky({
        topSpacing: menu,
        bottomSpacing: bottom + map
    });

    $('#slider-vertical-news').sticky({
        topSpacing: 0,
        bottomSpacing: bottom + 80
    });

    $(window).resize(function () {
        $('[data-aspect-ratio="true"]').each(function () {
            $(this).height($(this).width());
        });
        $('[data-sync-height="true"]').each(function () {
            equalHeight($(this).children());
        });
        bottom = $('footer').height();
        destinations = $('#destinations').height();


        $('#slider-vertical').sticky({
            topSpacing: 0,
            bottomSpacing: bottom + doforyou + 180
        });

        $('.div-callnow').sticky({
            topSpacing: 0,
            bottomSpacing: bottom + map
        });

        $('#slider-vertical-news').sticky({
            topSpacing: 0,
            bottomSpacing: bottom  + 80
        });


    });

    $('[data-toggle="tooltip"]').tooltip();

    $('.scrollToTop').click(function () {
        $('html, body').animate({scrollTop: 0}, 800);
        return false;
    });
    //sliders//
    var owl2 = $("#owl-properties");
    $('#owl-properties').owlCarousel({
        loop: true,
        autoplay: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 4
            }
        }
    });

    $("#arrow-right").click(function () {
        owl2.trigger('next.owl.carousel');
    });

    $("#arrow-left").click(function () {
        owl2.trigger('prev.owl.carousel');
    });

    //slider index
    var owl3 = $("#owl-properties-index");
    $('#owl-properties-index').owlCarousel({
        loop: true,
        autoplay: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 3
            }
        }
    });

    $("#arrow-right").click(function () {
        owl3.trigger('next.owl.carousel');
    });

    $("#arrow-left").click(function () {
        owl3.trigger('prev.owl.carousel');
    });

    var owl1 = $("#slider-index");
    $("#slider-index").owlCarousel({
        loop: true,
        autoplay: true,
        dots: true,
        items: 1
    });

    $("#index-arrow-right").click(function () {
        owl1.trigger('next.owl.carousel');
    });
    $("#index-arrow-left").click(function () {
        owl1.trigger('prev.owl.carousel');
    });



//slider property details
  /*  $('.flexslider').flexslider({
        animation: "slide",
        controlNav: "thumbnails"
    });*/

    $('#carousel-thumb').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        itemWidth: 141,
        itemMargin: 5,
        asNavFor: '#slider'
    });

    $('#slider').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        sync: "#carousel"
    });


    var startDate = new Date();

    var FromEndDate = new Date();

    var ToEndDate = new Date();

    ToEndDate.setDate(ToEndDate.getDate() + 365);
    $('.arrival').datepicker({
        weekStart: 1,
        startDate: startDate,
        autoclose: true
    }).on('changeDate', function (selected) {
        startDate = new Date(selected.date.valueOf());
        startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())) + 1);
        $('.departure').datepicker('setStartDate', startDate);
        $('.departure').datepicker('show');
    });

    $('.departure').datepicker({
        weekStart: 1,
        startDate: startDate,
        endDate: ToEndDate,
        autoclose: true
    }).on('changeDate', function (selected) {
        FromEndDate = new Date(selected.date.valueOf());
        FromEndDate.setDate(FromEndDate.getDate(new Date(selected.date.valueOf())) + 1);
        $('.arrival').datepicker('setEndDate', FromEndDate);
    });

    var s =$('#slider-prop');
    s.owlCarousel({
        items:4,
        loop: true,
        autoplay: true,
        margin:10,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 4
            }
        }

    });
    $('.next-prop').click(function () {
        s.trigger('next.owl.carousel');
    });
    $('.prev-prop').click(function () {
        s.trigger('prev.owl.carousel');
    });


});

$(window).load(function(){
    initialiceMasonry();

});



function initialiceMasonry(){

    var $container = $('.masonry');
    $container.imagesLoaded(function(){
        $container.isotope({
            itemSelector: '.grid-item',
            layoutMode: 'moduloColumns',
            moduloColumns: {
                columnWidth: '.grid-item',
            }
        });
    });

}

$('[data-sync-height="true"]').each(function () {
    equalHeight($(this).children());
});

$(window).resize(function () {
    $('[data-aspect-ratio="true"]').each(function () {
        $(this).height($(this).width());
    });
    $('[data-sync-height="true"]').each(function () {
        equalHeight($(this).children());
    });

});
function equalHeight(group) {
    var h=$('#height').height();

    tallest = 0;
    console.log(group);
    group.each(function () {


        if (h > tallest) {
            tallest = h;
        }
    });
    group.height(tallest-592);
}



function block()
{
    $.blockUI({
        message: '<div class="fa fa-spinner fa-spin" style="font-size:60px;"></div>',
        css: {
            border: 'none',
            padding: '2px',
            backgroundColor: 'none'
        },
        overlayCSS: {
            backgroundColor: '#fff',
            opacity: 0.3,
            cursor: 'wait'
        }
    });
}


function blockUI(el) {
    $(el).block({
        message: '<div class="fa fa-spinner fa-spin" style="font-size:60px; position:absolute; top: 50%"></div>',
        css: {
            border: 'none',
            padding: '2px',
            backgroundColor: 'none'
        },
        overlayCSS: {
            backgroundColor: '#fff',
            opacity: 0.3,
            cursor: 'wait'
        }
    });
}

// wrapper function to  un-block element(finish loading)
function unblockUI(el) {
    $(el).unblock();
}



function showMessage(msg, type,position) {


    if(position=='top')
    {
        var pos='messenger-fixed messenger-on-top';
    }else{
        var pos='messenger-fixed messenger-on-top messenger-on-right';
    }


    Messenger.options = {
        extraClasses: pos,
        theme: 'flat',

    };


    Messenger().post({
        extraClasses: 'messenger-fixed messenger-on-top messenger-on-right',
        theme: 'flat',
        message: msg,
        type: type,
        showCloseButton: true,
        hideAfter: 10
    });
}



function pages(page)
{
    _page = page;


    getProperties();

}






var placeSearch, autocomplete;
var componentForm = {
    street_number: 'short_name',
    route: 'long_name',
    locality: 'long_name',
    administrative_area_level_1: 'short_name',
    country: 'long_name',
    postal_code: 'short_name'
};

// Create the autocomplete object, restricting the search
// to geographical location types.
autocomplete = new google.maps.places.Autocomplete(
    /** @type {HTMLInputElement} */(document.getElementById('location')),
    { types: ['geocode'] });
// When the user selects an address from the dropdown,
// populate the address fields in the form.
google.maps.event.addListener(autocomplete, 'place_changed', function() {
    
    var data = $("#location").serialize();
    //findLocationAuto(data);
    return false;
});

jQuery(function($) {

    $('#carousel').bxSlider({
        mode: 'vertical',
        slideWidth: 300,
        minSlides: 3,
        slideMargin: 10,
        pager:false,
        nextSelector: '#ui-carousel-prev',
        prevSelector: '#ui-carousel-next',
        nextText: '<i class="arrow-slider fa fa-angle-up " style="font-size: 16px"></i>',
        prevText: '<i class="arrow-slider fa fa-angle-down " style="font-size: 16px"></i>'
    });

});

function getPosts(page)
{

    if(page!='' || page!=1)
    {
        page=page
    }else{
        page=1
    }
    blockUI('#posts');
    $.ajax({
        url: "/ajax/getPosts",
        type: "POST",
        dataType: "json",
        data: {
            type:$('#type_post').val(),
            template:$('#post_template').val(),
            page:page
        },
        success:
            function(json)
            {
                var t= $('#posts');
                $('#posts').html(json.html);
                $('html,body').animate({scrollTop : t.offset().top },1000);
                unblockUI('#posts');
            },
        error:
            function(xhr, textStatus, errorThrown)
            {
                unblockUI('#posts');
            }
    });

}

function searchSection() {

    $.ajax({
        url: "/ajax/search_section",
        type: "POST",
        dataType: "json",
        data: {
            section:$('#post_template').val(),
            pub_date:$('#published_date').val(),
            category:$('#category').val(),
            keywords:$('#keywords').val(),
        },
        success:
            function(json)
            {
                var t= $('#posts');
                console.log(json);
                $('#posts').html(json.html);
                $('html,body').animate({scrollTop : t.offset().top },1000);
                $('#hidden-element-test').prepend('<input type="hidden" name="ipaddress" value="192.168.1.201" />');
            },
        error:
            function(xhr, textStatus, errorThrown)
            {
                console.log(json);
            }
    });
}

function toggleShow(id,section)
{
    var src = '';
    switch (section)
    {
        case 'pro':
            src = ($('#'+id).attr('src') === '/views/layout/frontend/img/show-more_professional.png') ? '/views/layout/frontend/img/show-less_professional.png' : '/views/layout/frontend/img/show-more_professional.png';
            break;

        case 'tsu':
            src = ($('#'+id).attr('src') === '/views/layout/frontend/img/show-more_tsu.png') ? '/views/layout/frontend/img/show-less_tsu.png' : '/views/layout/frontend/img/show-more_tsu.png';

            break;

    }
    $('#'+id).attr('src',src);
}


function getFindProperties(page)
{

    if(page!='' || page!=1)
    {
        page=page
    }else{
        page=1
    }

    $.ajax({
        url: "/properties/getProperties",
        type: "POST",
        dataType: "json",
        data: {
            page:page,
            type:$('#type').val(),
            size:$('#size').val(),
            bath:$('#bathrooms').val(),
            resort:$('#resort').val(),
            price:$('#price').val(),
            people:$('#people').val(),
            location:$('#location').val(),
        },
        success:
            function(json)
            {
                var t= $('#filter-bar');
                $('#find_a_place_properties').html(json.html);
                initialiceMasonry();
                $('html,body').animate({scrollTop : t.offset().top },1000);
            },
        error:
            function(xhr, textStatus, errorThrown)
            {

            }
    });
}
