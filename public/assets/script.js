 
(function() {
    $('#login-form-link').click(function(e) {
        $("#login-form").delay(100).fadeIn(100);
        $("#register-form").fadeOut(100);
        $('#register-form-link').removeClass('active');
        $(this).addClass('active');
        e.preventDefault();
    });
    $('#register-form-link').click(function(e) {
        $("#register-form").delay(100).fadeIn(100);
        $("#login-form").fadeOut(100);
        $('#login-form-link').removeClass('active');
        $(this).addClass('active');
        e.preventDefault();
    });
})();

jQuery(document).ready(function($)
{
    $(".scroll").click(function(event){
    event.preventDefault();
    $('html,body').animate({scrollTop:$(this.hash).offset().top}, 800,'swing');
    });

    $('a[href="#navbar-more-show"], .navbar-more-overlay').on('click', function(event) {
        event.preventDefault();
        $('body').toggleClass('navbar-more-show');
        if ($('body').hasClass('navbar-more-show'))	{
            $('a[href="#navbar-more-show"]').closest('li').addClass('active');
        }else{
            $('a[href="#navbar-more-show"]').closest('li').removeClass('active');
        }
        return false;
    });
}); //jQuery(document).ready

function onlyNum(e)
{
    key = e.keyCode ? e.keyCode : e.which
    // backspace
    if (key == 8) return true
    // 0-9
    if (key > 47 && key < 58) {
        if (e.value == "") return true
        regexp = /.[0-9]{2}$/
        return !(regexp.test(e.value))
    }
    // .
    if (key == 46) {
        if (field.value == "") return false
        regexp = /^[0-9]+$/
        return regexp.test(e.value)
    }
    // other key
    return false
}

function profileRequest()
{
    request = 1;
    blockAjax();

    $(".reg_info").each(function()
    {

        if($(this).val()==='')
        {
            request = 0;
            //btn.button('reset');
        }

    });
    var pass = $('#password').val();
    var confirmPass = $('#confirm-password').val();

    if(request === 1)
    {
        if($('#password').text() === $('#confirm-password').text())
        {
            waitCursor('wait');
            var dataInArray = $('#register-form').serializeArray();
            $.ajax({
                url: "/ajax/profileRequest",
                type: "POST",
                dataType: "json",
                async: false,
                data: {
                    dataInArray: dataInArray,
                },
                success: function (json) {
                    console.log(json);
                    swal(json.message_a, json.message_b, json.message_t);
                    waitCursor('auto');
                    ublockAjax();
                    $('#login-form-link').addClass('active');
                    $("#login-form").delay(100).fadeIn(100);
                    $("#register-form").fadeOut(100);

                    $(".reg_info").each(function () {
                        $(this).val('');
                    });
                    $('#register-form-link').removeClass('active');

                }
                ,
                error: function (xhr, textStatus, errorThrown) {
                    console.log(textStatus);
                    console.log(errorThrown);
                }
            });
        }else{
            swal('Viker', 'The password must match', 'warning');
            request = 0;
            return false;
            $('#password').val('');
            $('#confirm-password').val('');
            ublockAjax();
        }
    }else{
            swal('Viker','Please Fill all Fields','warning');
            ublockAjax();
    }
    ublockAjax();
}

function addtoCart(stuff_id,id,from_menu)
{
    $.ajax({
        url: "/ajax/addStuff/"+from_menu,
        type: "POST",
        dataType: "json",
        async: false,
        data: {
            stuff_id    : stuff_id,
            enterprise  : $('#enterprise').val(),
            price       : $('#price_'+id).val(),
            how_many    : 1,
        },
        success:
            function(json)
            {
                console.log(json);
                alertify.set({ delay: 1000 });
                alertify.log("Item added");
                $('#shopping_fa').show();
                $('#shopping_fa').addClass('animated growIn slower go');
                var how_many_t = parseInt($('#how_many_'+stuff_id).html());
                $('#how_many_'+stuff_id).html(parseInt(how_many_t+1));
                return false;
            }
        ,
        error:
            function(xhr, textStatus, errorThrown)
            {
                console.log(json);
            }
    });
}

function addtoFav(stuff_id)
{
    $.ajax({
        url: "/ajax/addStuffFav/",
        type: "POST",
        dataType: "json",
        async: false,
        data: {
            stuff_id    : stuff_id,
            enterprise  : $('#enterprise').val(),
        },
        success:
            function(json)
            {
                console.log(json);
                alertify.set({ delay: 1000 });
                alertify.log(json.message);
                $("#favorite_"+stuff_id).removeClass('fa-heart-o');
                $("#favorite_"+stuff_id).addClass('fa-heart');
                return false;
            }
        ,
        error:
            function(xhr, textStatus, errorThrown)
            {
                console.log(json);
            }
    });
}

function delStuff(e_id,s_id)
{

    $.ajax({
        url: "/ajax/delStuff",
        type: "POST",
        dataType: "json",
        async: false,
        data: {
            stuff_id    : s_id,
            enterprise  : e_id,
        },
        success:
            function(json)
            {
                console.log(json);
                $('#how_many_'+stuff_id).html(parseInt(0));
            }
        ,
        error:
            function(xhr, textStatus, errorThrown)
            {
                console.log(json);
            }
    });
}

function addCommas(str) {
    var parts = (str + "").split("."),
        main = parts[0],
        len = main.length,
        output = "",
        first = main.charAt(0),
        i;

    if (first === '-') {
        main = main.slice(1);
        len = main.length;
    } else {
        first = "";
    }
    i = len - 1;
    while(i >= 0) {
        output = main.charAt(i) + output;
        if ((len - i) % 3 === 0 && i > 0) {
            output = "," + output;
        }
        --i;
    }
    // put sign back
    output = first + output;
    // put decimal part back
    if (parts.length > 1) {
        output += "." + parts[1];
    }
    return output;
}

function getChange(payW)
{
    var gtotal = parseFloat($('#granTotal_float').val());
    $('#pay_with').val(payW);

    var change = parseFloat(payW - gtotal);
    if(change >= 0 )
    {
        alertify.set({ delay: 1000 });
        alertify.log("Thank you, Now you can proceed...");
        /*$("#proceed_btn").removeClass('disabled');
        $("#proceed_btn").attr('onclick','startCheckout();');*/
        var h = $(document).height();
        $("html, body").animate({scrollTop:h+"px"});
        $("#order_now").show();
        $('#order_now').addClass('animated growIn slower go');

        $("#pay_change").val(change);

    }else{
        alertify.set({ delay: 1000 });
        alertify.log("You need more money...");
        $("#proceed_btn").addClass('disabled');
        $("#proceed_btn").attr('onclick','javascript:void(0);');
    }
}

function getTOTAL(gSubtotal)
{
    $.ajax({
        url: "/ajax/get_total",
        type: "POST",
        dataType: "json",
        async: true,
        data: {
            /*granTotal_float: $('#granTotal_float').val(),*/
            granTotal_float: gSubtotal,
        },
        success:
            function(json)
            {
                $("#granTotal").text('$'+json.gtotal);
            }
        ,
        error:
            function(xhr, textStatus, errorThrown)
            {
                console.log(json);
            }
    });
}


function getTOTALSIDE()
{
    $.ajax({
        url: "/ajax/get_total_s",
        type: "POST",
        dataType: "json",
        async: true,

        success:
            function(json)
            {
                $("#granTotal").text('$'+addCommas(json.gtotal));
            }
        ,
        error:
            function(xhr, textStatus, errorThrown)
            {
                console.log(textStatus);
            }
    });
}

function determinateCostsCycler()
{
    var shopping_data = $('#shopping_data').serializeArray();
    var checkout_shop = $('#checkout_shop').serializeArray();
    var order_data = $('#order_data').serializeArray();
    $("#mapCanvas").css("pointer-events", "none");

    $.ajax({
        url: "/ajax/determinateCostsCycler",
        type: "POST",
        dataType: "json",
        async: false,
        data: {
            shopping_data: shopping_data,
            checkout_shop: checkout_shop,
            order_data: order_data,
        },
        success: function (json) {
            /*$('#cycler_cost').html(json.cycler_cost);
            $('#total_cost').html(json.total_pay_real);
            $('#kmDistance').html('['+json.kmDistance+'Kms]');*/
            $('#htmlCosts').html(json.htmlCosts);
            $('#htmlPayment').html(json.htmlPayment);
            /*$('#order_now').show();*/

            $('#shipping_costs').hide();
            var h = $(document).height();
            $("html, body").animate({scrollTop:h+"px"});

            $('#cycler_cost').addClass('animated growIn slower go');
            $('#total_cost').addClass('animated growIn slower go');


        }
        ,
        error: function (xhr, textStatus, errorThrown) {
            console.log(json);
        }
    });
}


function startCheckout()
{
    var payW = parseFloat($('#pay_with').val());
    var shopping_data = $('#shopping_data').serializeArray();
    var checkout_shop = $('#checkout_shop').serializeArray();
    //if(payW >= 0) {
        $.ajax({
            url: "/ajax/startCheckout",
            type: "POST",
            dataType: "json",
            async: false,
            data: {
                shopping_data: shopping_data,
                checkout_shop: checkout_shop,
            },
            success: function (json) {
                /*if(json.orderData.status=='success')
                 {*/
                alertify.set({delay: 5000});
                alertify.log("Thank you, Now your order has begun to generated...");
                $.ajax({
                    url: "/ajax/checkSession",
                    type: "POST",
                    dataType: "json",
                    async: false,
                    data: {
                        orderData: json.orderData,
                        stuffData: json.stuffData

                    },
                    success: function (json) {
                        window.location = json.url;

                    }
                    ,
                    error: function (xhr, textStatus, errorThrown) {
                        console.log(json);
                    }
                });
                //}
            }
            ,
            error: function (xhr, textStatus, errorThrown) {
                console.log(json);
            }
        });
    /*}else {
        alertify.set({ delay: 1000 });
        alertify.log("You need more money...");
    }*/
}

function oSpecialDelivery()
{
    var validate = true;
    var order_data = $('#order_data').serializeArray();

    if($('#special_delivery').val() == ''){
        var message = 'Describe your Special Stuff...';
        validate = false;
    }

    if($('#geo_int').val() == ''){
        var message = 'Please Fill Outdoor Number Field';
        validate = false;
    }

    if(validate == true) {
        $.ajax({
            url: "/ajax/oSpecialDelivery",
            type: "POST",
            dataType: "json",
            async: false,
            data: {
                order_data: order_data,
            },
            success: function (json) {
                if (json.orderData.status == 'success') {
                    console.log(json);
                    swal('Viker', 'Your order has been Received');
                    setTimeout(function () {
                        window.location.href = '/';
                    }, 2000);
                    alertify.set({delay: 15000});
                    alertify.log("Shortly a Cycler will take the order...");
                }
            }
            ,
            error: function (xhr, textStatus, errorThrown) {
                console.log(json);
            }
        });
    }else{
        alertify.log(message);
    }
}


function orderCheckout()
{
    var order_data = $('#order_data').serializeArray();
    var checkout_shop = $('#checkout_shop').serializeArray();
    $.ajax({
        url: "/ajax/orderCheckout",
        type: "POST",
        dataType: "json",
        async: false,
        data: {
            order_data: order_data,
            checkout_shop: checkout_shop,
        },
        success:
            function(json)
            {
                if(json.orderData.status=='success')
                {
                    console.log(json);
                    swal('Viker','Your order has been Received');
                    setTimeout(function() {
                        window.location.href = '/';
                    }, 2000);
                    alertify.set({ delay: 15000 });
                    alertify.log("Shortly a Cycler will take the order...");
                }
            }
        ,
        error:
            function(xhr, textStatus, errorThrown)
            {
                console.log(json);
            }
    });
}

function confirmDelivery(order_id) {
    $.ajax({
        url: "/orders/confirmDelivery",
        type: "POST",
        dataType: "json",
        async: false,
        data: {
            order_id: order_id,
        },
        success:
            function(json)
            {
                if(json.successo==true)
                {
                    console.log(json);
                    swal('Viker',json.messageo,'success');
                    setTimeout(function() {
                        window.location.href = '/orders';
                    }, 2000);
                    alertify.set({ delay: 15000 });
                    alertify.log("Shortly we will send your confirm...");
                }
            }
        ,
        error:
            function(xhr, textStatus, errorThrown)
            {
                console.log(json);
            }
    });
}



function confirmSDelivery(order_id) {
    $.ajax({
        url: "/orders/confirmSDelivery",
        type: "POST",
        dataType: "json",
        async: false,
        data: {
            order_id: order_id,
        },
        success:
            function(json)
            {
                if(json.successo==true)
                {
                    console.log(json);
                    swal('Viker',json.messageo,'success');
                    setTimeout(function() {
                        window.location.href = '/orders';
                    }, 2000);
                    alertify.set({ delay: 15000 });
                    alertify.log("Shortly we will send your confirm...");
                }
            }
        ,
        error:
            function(xhr, textStatus, errorThrown)
            {
                console.log(json);
            }
    });
}

function completeDelivery(order_id) {
    $.ajax({
        url: "/orders/completeDelivery",
        type: "POST",
        dataType: "json",
        async: false,
        data: {
            order_id: order_id,
        },
        success:
            function(json)
            {
                if(json.successo==true)
                {
                    console.log(json);
                    swal('Viker',json.messageo,'success');
                    setTimeout(function() {
                        window.location.href = '/orders';
                    }, 2000);
                    alertify.set({ delay: 15000 });
                    alertify.log("Thanks for your reply");
                }
            }
        ,
        error:
            function(xhr, textStatus, errorThrown)
            {
                console.log(json);
            }
    });
}

function hideElment(e) {
    var display = $('#'+e).css('display');
    if(display == 'block')
    {
        $('#'+e).hide();
    }else{
        $('#'+e).show();
    }
}

function waitCursor(status) {
    $('body').css('cursor', status);
}

function blockAjax()
{
    $.blockUI({ css: {
        border: 'none',
        padding: '15px',
        backgroundColor: '#000',
        '-webkit-border-radius': '10px',
        '-moz-border-radius': '10px',
        opacity: .5,
        color: '#fff'
    } });
}

function ublockAjax()
{
    $.unblockUI();
}


function setGeoLocCycler()
{
    $.ajax({
        url: "/orders/get_geoloc_cycler",
        type: "POST",
        dataType: "json",
        async: true,
        data: {
            cycler_geo_lat:$('#cycler_geo_lat').val(),
            cycler_geo_lng:$('#cycler_geo_lng').val()
        },
        success:
            function(json)
            {
                console.log(json);
            }
        ,
        error:
            function(xhr, textStatus, errorThrown)
            {
                console.log(textStatus);
            }
    });
}


/* * * * *  * *
*             *
* Google Maps *
*             *
* * * * * * * */

var map, infoWindow;
var geocoder;
function initMap() {
    geocoder = new google.maps.Geocoder();
    map = new google.maps.Map(document.getElementById('mapCanvas'), {
        center: {lat: -34.397, lng: 150.644},
        zoom: 18
    });
    infoWindow = new google.maps.InfoWindow;
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };
            var marker = new google.maps.Marker({
                position: pos,
                map: map,
                draggable: true,
                title: 'Your position'
            });
            /*infoWindow.setPosition(pos);
             infoWindow.setContent('Your position');
             marker.addListener('click', function() {
             infoWindow.open(map, marker);
             });
             infoWindow.open(map, marker);*/
            map.setCenter(pos);


            updateMarkerPosition(marker.getPosition());
            geocodePosition(pos);

            // Add dragging event listeners.
            google.maps.event.addListener(marker, 'dragstart', function() {
                updateMarkerAddress('Dragging...');
            });

            google.maps.event.addListener(marker, 'drag', function() {
                updateMarkerStatus('Dragging...');
                updateMarkerPosition(marker.getPosition());
            });

            google.maps.event.addListener(marker, 'dragend', function() {
                updateMarkerStatus('Drag ended');
                geocodePosition(marker.getPosition());
                map.panTo(marker.getPosition());
            });

            google.maps.event.addListener(map, 'click', function(e) {
                updateMarkerPosition(e.latLng);
                geocodePosition(marker.getPosition());
                marker.setPosition(e.latLng);
                map.panTo(marker.getPosition());
            });

        }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
        });
    } else {
        // Browser doesn't support Geolocation
        handleLocationError(false, infoWindow, map.getCenter());
    }

}

function geocodePosition(pos)
{
    geocoder.geocode({
        latLng: pos
    }, function(responses) {
        if (responses && responses.length > 0) {
            updateMarkerAddress(responses[0].formatted_address);
        } else {
            updateMarkerAddress('Cannot determine address at this location.');
        }
    });
}

function updateMarkerStatus(str)
{
    document.getElementById('markerStatus').innerHTML = str;
}

function updateMarkerPosition(latLng)
{
    $('#geo_lat').val(latLng.lat());
    $('#geo_lng').val(latLng.lng());
}

function updateMarkerAddress(str)
{
    document.getElementById('address').innerHTML = str;
    $('#street').val(str);
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(browserHasGeolocation ?
        'Error: The Geolocation service failed.' :
        'Error: Your browser doesn\'t support geolocation.');
    infoWindow.open(map);
}
