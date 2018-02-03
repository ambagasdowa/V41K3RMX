

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Viker | Food & Stuff Delivery</title>

    <!-- Google fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700' rel='stylesheet' type='text/css'>


    <!-- font awesome -->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- bootstrap -->
    <link rel="stylesheet" href="/public/assets/bootstrap/css/bootstrap.min.css" />

    <!-- animate.css -->
    <link rel="stylesheet" href="/public/assets/animate/animate.css" />

    <!-- Sweet Alerts-->
    <script src="/public/plugins/bootstrap-sweetalert/js/sweetalert.js" type="text/javascript"></script>
    <link href="/public/plugins/bootstrap-sweetalert/css/sweetalert.css" rel="stylesheet" type="text/css" media="screen"/>


    <!-- jquery -->
    <script src="/public/assets/jquery.js"></script>

    <!-- wow script -->
    <script src="/public/assets/wow/wow.min.js"></script>

    <!-- slider -->
    <script src="/public/assets/slidingheader/classie.js"></script>

    <!-- boostrap -->
    <script src="/public/assets/bootstrap/js/bootstrap.js" type="text/javascript" ></script>

    <!-- jquery mobile -->
    <script src="/public/assets/mobile/touchSwipe.min.js"></script>

    <!-- jquery mobile -->
    <script src="/public/assets/respond/respond.js"></script>
    <script src="/public/plugins/bootstrap-slider/js/bootstrap-slider.js"></script>
    <link rel="stylesheet" href="/public/plugins/bootstrap-slider/css/slider.css">


    <script src="/public/js/app.js"></script>




    <script>

        function activeRegisterForm()
        {
            $('#register-form-link').addClass('active');
            $('#login-form-link').removeClass('active');
            $("#register-form").delay(100).fadeIn(100);
            $("#login-form").fadeOut(100);
        }

    </script>


    <!-- gallery -->
    <script src="/public/assets/gallery/jquery.blueimp-gallery.min.js"></script>
    <link rel="stylesheet" href="/public/assets/gallery/blueimp-gallery.min.css">

    <!-- favicon -->
    <link rel="shortcut icon" href="/public/img/favicon.png" type="image/x-icon">
    <link rel="icon" href="/public/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="/public/assets/slidingheader/layout-simple.css" />
    <link rel="stylesheet" href="/public/assets/style.css">
    <link rel="stylesheet" href="/public/assets/menu-list.css">


    <link href="/public/plugins/jquery-alertify/css/alertify.core.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="/public/plugins/jquery-alertify/css/alertify.default.css" rel="stylesheet" type="text/css" media="screen"/>

    <script src="/public/plugins/jquery-alertify/js/alertify.min.js" type="text/javascript"></script>

</head>
<input type="hidden" name="enterprise" id="enterprise" value="1"/>
<div id="containet" class="container--open" >
    <nav class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">

            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
            </button> <a class="navbar-brand" href="/index/index/1"><b>VIKER</b></a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="">
                    <a class="car-btn" href="/menu/shopping">Shopping Cart <span class="badge" >Order</span></a>
                </li>
                <li>
                    <a href="#">Link 2</a>
                </li>

            </ul>
        </div>

    </nav>


    <section class="items-wrap">
        <div >

            <div class="row">
                <div class="about">
                    <div class="overlay spacer text-center">
                        <div class="container">
                            <h2><b>Viker</b></h2>
                            <h4>Choose a Category</h4>

                        </div>
                    </div>
                </div>
            </div>

            <div class="spacer">
                <div class="container-fluid">
                    <div>
                        <ul class="nav nav-tabs">
                            <li class="active" ><a href="#tab-1" role="tab" data-toggle="tab">Burgers</a></li>
                            <li  ><a href="#tab-2" role="tab" data-toggle="tab">Jochos</a></li>
                            <li  ><a href="#tab-3" role="tab" data-toggle="tab">Drinks</a></li>
                            <li  ><a href="#tab-4" role="tab" data-toggle="tab">Sides</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" role="tabpanel" id="tab-1">
                                <p>
                                <div class="article-list">
                                    <div class="row articles">
                                        <div class="col-md-4 col-sm-6 item">
                                            <a href="#"><img class="img-responsive"
                                                             src="/public/img/menu/1.jpg"/></a>
                                            <h3 class="name">Marvins $<span
                                                    style="color:#3c763d;"
                                                    id="subtotal_ex1">80.00</span>
                                            </h3>
                                            <div class="well">
                                                <input id="ex1" type="text"
                                                       class="slide"
                                                       data-slider-min="1"
                                                       data-slider-max="20"
                                                       data-slider-step="1"
                                                       data-slider-value="1"/>
                                                <b>
                                                            <span style="padding-left: 10px;color: #0a6ea0"
                                                                  id="ex1CurrentSliderValLabel">
                                                                <span
                                                                    id="ex1SliderVal">1</span>
                                                            </span>
                                                </b>
                                                <a href="javascript:void(0)"
                                                   onclick="addtoCart('1','ex1');"
                                                   class="action"><i
                                                        class="glyphicon glyphicon-plus-sign"></i></a>
                                                <input type="hidden"
                                                       id="price_ex1"
                                                       class="form-control"
                                                       value="80.00">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6 item">
                                            <a href="#"><img class="img-responsive"
                                                             src="/public/img/menu/1.jpg"/></a>
                                            <h3 class="name">Greenchy $<span
                                                    style="color:#3c763d;"
                                                    id="subtotal_ex2">70.00</span>
                                            </h3>
                                            <div class="well">
                                                <input id="ex2" type="text"
                                                       class="slide"
                                                       data-slider-min="1"
                                                       data-slider-max="20"
                                                       data-slider-step="1"
                                                       data-slider-value="1"/>
                                                <b>
                                                            <span style="padding-left: 10px;color: #0a6ea0"
                                                                  id="ex2CurrentSliderValLabel">
                                                                <span
                                                                    id="ex2SliderVal">1</span>
                                                            </span>
                                                </b>
                                                <a href="javascript:void(0)"
                                                   onclick="addtoCart('2','ex2');"
                                                   class="action"><i
                                                        class="glyphicon glyphicon-plus-sign"></i></a>
                                                <input type="hidden"
                                                       id="price_ex2"
                                                       class="form-control"
                                                       value="70.00">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6 item">
                                            <a href="#"><img class="img-responsive"
                                                             src="/public/img/menu/1.jpg"/></a>
                                            <h3 class="name">Chorica $<span
                                                    style="color:#3c763d;"
                                                    id="subtotal_ex3">70.00</span>
                                            </h3>
                                            <div class="well">
                                                <input id="ex3" type="text"
                                                       class="slide"
                                                       data-slider-min="1"
                                                       data-slider-max="20"
                                                       data-slider-step="1"
                                                       data-slider-value="1"/>
                                                <b>
                                                            <span style="padding-left: 10px;color: #0a6ea0"
                                                                  id="ex3CurrentSliderValLabel">
                                                                <span
                                                                    id="ex3SliderVal">1</span>
                                                            </span>
                                                </b>
                                                <a href="javascript:void(0)"
                                                   onclick="addtoCart('3','ex3');"
                                                   class="action"><i
                                                        class="glyphicon glyphicon-plus-sign"></i></a>
                                                <input type="hidden"
                                                       id="price_ex3"
                                                       class="form-control"
                                                       value="70.00">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6 item">
                                            <a href="#"><img class="img-responsive"
                                                             src="/public/img/menu/1.jpg"/></a>
                                            <h3 class="name">Chickita $<span
                                                    style="color:#3c763d;"
                                                    id="subtotal_ex5">80.00</span>
                                            </h3>
                                            <div class="well">
                                                <input id="ex5" type="text"
                                                       class="slide"
                                                       data-slider-min="1"
                                                       data-slider-max="20"
                                                       data-slider-step="1"
                                                       data-slider-value="1"/>
                                                <b>
                                                            <span style="padding-left: 10px;color: #0a6ea0"
                                                                  id="ex5CurrentSliderValLabel">
                                                                <span
                                                                    id="ex5SliderVal">1</span>
                                                            </span>
                                                </b>
                                                <a href="javascript:void(0)"
                                                   onclick="addtoCart('5','ex5');"
                                                   class="action"><i
                                                        class="glyphicon glyphicon-plus-sign"></i></a>
                                                <input type="hidden"
                                                       id="price_ex5"
                                                       class="form-control"
                                                       value="80.00">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6 item">
                                            <a href="#"><img class="img-responsive"
                                                             src="/public/img/menu/1.jpg"/></a>
                                            <h3 class="name">Sloppy Yaca $<span
                                                    style="color:#3c763d;"
                                                    id="subtotal_ex6">70.00</span>
                                            </h3>
                                            <div class="well">
                                                <input id="ex6" type="text"
                                                       class="slide"
                                                       data-slider-min="1"
                                                       data-slider-max="20"
                                                       data-slider-step="1"
                                                       data-slider-value="1"/>
                                                <b>
                                                            <span style="padding-left: 10px;color: #0a6ea0"
                                                                  id="ex6CurrentSliderValLabel">
                                                                <span
                                                                    id="ex6SliderVal">1</span>
                                                            </span>
                                                </b>
                                                <a href="javascript:void(0)"
                                                   onclick="addtoCart('6','ex6');"
                                                   class="action"><i
                                                        class="glyphicon glyphicon-plus-sign"></i></a>
                                                <input type="hidden"
                                                       id="price_ex6"
                                                       class="form-control"
                                                       value="70.00">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                </p>
                            </div>
                            <div class="tab-pane " role="tabpanel" id="tab-2">
                                <p>
                                <div class="article-list">
                                    <div class="row articles">
                                        <div class="col-md-4 col-sm-6 item">
                                            <a href="#"><img class="img-responsive"
                                                             src="/public/img/menu/1.jpg"/></a>
                                            <h3 class="name">Marvins Jocho $<span
                                                    style="color:#3c763d;"
                                                    id="subtotal_ex4">70.00</span>
                                            </h3>
                                            <div class="well">
                                                <input id="ex4" type="text"
                                                       class="slide"
                                                       data-slider-min="1"
                                                       data-slider-max="20"
                                                       data-slider-step="1"
                                                       data-slider-value="1"/>
                                                <b>
                                                            <span style="padding-left: 10px;color: #0a6ea0"
                                                                  id="ex4CurrentSliderValLabel">
                                                                <span
                                                                    id="ex4SliderVal">1</span>
                                                            </span>
                                                </b>
                                                <a href="javascript:void(0)"
                                                   onclick="addtoCart('4','ex4');"
                                                   class="action"><i
                                                        class="glyphicon glyphicon-plus-sign"></i></a>
                                                <input type="hidden"
                                                       id="price_ex4"
                                                       class="form-control"
                                                       value="70.00">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                </p>
                            </div>
                            <div class="tab-pane " role="tabpanel" id="tab-3">
                                <p>
                                <div class="article-list">
                                    <div class="row articles">

                                    </div>
                                </div>
                                </p>
                            </div>
                            <div class="tab-pane " role="tabpanel" id="tab-4">
                                <p>
                                <div class="article-list">
                                    <div class="row articles">

                                    </div>
                                </div>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div><!-- /container -->
<script>
    jQuery(document).ready(function($) {
        $('.slide').each(function (){
            $("#"+this.id).slider();
            $("#"+this.id).on("slide", function(slideEvt) {
                $("#"+this.id+"SliderVal").text(slideEvt.value);
                cantItems(slideEvt.value,this.id);
            });
        });

    });

    function cantItems(v,id)
    {
        cant = parseFloat(v);
        price= parseFloat($('#price_'+id).val());
        subt = parseFloat(cant*price).toFixed(2);
        $("#subtotal_"+id).text(subt);
        $("#"+id).attr('data-slider-value',v);
    }

</script><!--
<html...continue> -->
<!--
<body...continue> -->
<div class="text-center copyright panel-footer navbar-fixed-bottom">Copyright  © <a href="http://viker.mx" target="_blank">viker.mx</a></div>

<!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
    <!-- The container for the modal slides -->
    <div class="slides"></div>
    <!-- Controls for the borderless lightbox -->
    <h3 class="title">title</h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <!-- The modal dialog, which will be used to wrap the lightbox content -->
</div>

<!-- custom script -->
<script src="/public/assets/script.js"></script>
<link rel="stylesheet" href="/public/css/vikerStyles.css">
</body>
</html>