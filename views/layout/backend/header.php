<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>.:: VIKER | Dashboard ::.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link rel="icon" type="image/png" href="/public/img/favicon.png">


    <!-- Bootstrap Core CSS -->
    <link href="<?php echo $params['public_css'] ?>form-validation.css" rel="stylesheet">
    <link href="<?php echo $params['public_plugins'] ?>bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo $params['public_plugins'] ?>bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo $params['public_plugins'] ?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!--JQUERY-->
    <script src="<?php echo $params['public_js'] ?>jquery.js"></script>

    <script src="<?php echo $params['public_plugins'] ?>jquery-block-ui/jqueryblockui.js" type="text/javascript"></script>

    <?php
    if(Session::get('autenticado') ) {
        ?>

        <!-- BEGIN PUBLIC CSS PLUGINS -->
        <link href="<?php echo $params['public_plugins'] ?>bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $params['public_plugins'] ?>jquery-metrojs/MetroJs.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $params['public_plugins'] ?>shape-hover/css/demo.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $params['public_plugins'] ?>shape-hover/css/component.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $params['public_plugins'] ?>owl-carousel/owl.carousel.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $params['public_plugins'] ?>owl-carousel/owl.theme.css" />
        <link href="<?php echo $params['public_plugins'] ?>pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>
        <link href="<?php echo $params['public_plugins'] ?>jquery-slider/css/jquery.sidr.light.css" rel="stylesheet" type="text/css" media="screen"/>
        <link rel="stylesheet" href="<?php echo $params['public_plugins'] ?>jquery-ricksaw-chart/css/rickshaw.css" type="text/css" media="screen" >
        <link href="<?php echo $params['public_plugins'] ?>jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo $params['public_plugins'] ?>jquery-notifications/css/messenger.css" rel="stylesheet" type="text/css" media="screen"/>
        <link href="<?php echo $params['public_plugins'] ?>jquery-notifications/css/messenger-theme-flat.css" rel="stylesheet" type="text/css" media="screen"/>
        <link href="<?php echo $params['public_plugins'] ?>bootstrap-datepicker/css/datepicker.min.css" rel="stylesheet" type="text/css" />


        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.0/bootstrap-table.min.css">


        <?php if($modulo=='content'){
           ?>
            <link href="<?php echo $params['public_plugins'] ?>content-builder/scripts/contentbuilder.css" rel="stylesheet" type="text/css" />
            <link href="<?php echo $params['public_plugins'] ?>content-builder/assets/default/content.css" rel="stylesheet" type="text/css" />


            <?php
        }?>

     <!--   //for preview property in agent-->
            <link href="/views/layout/frontend/js/flexslider/flexslider.css" rel="stylesheet" type="text/css" />


        <!-- END PUBLIC PLUGINS -->

        <!-- BEGIN PUBLIC JS PLUGINS -->
       <!-- <script src="<?php /*echo $params['public_js'] */?>datepicker.js" type="text/javascript"></script>-->

        <!-- END PUBLIC JS PLUGINS -->

        <!-- BEGIN CSS LAYOUT CSS -->
        <link href="<?php echo $params['layout_css'] ?>plugins/morris.css" rel="stylesheet">
        <link href="<?php echo $params['layout_css'] ?>animate.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo $params['layout_css'] ?>style.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="/public/assets/css/style.css">
        <link href="<?php echo $params['layout_css'] ?>my-styles.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo $params['layout_css'] ?>responsive.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo $params['layout_css'] ?>custom-icon-set.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo $params['layout_css'] ?>magic_space.css" rel="stylesheet" type="text/css"/>
        <link href="/public/css/vikerStyles.css" rel="stylesheet" type="text/css"/>

        <link href="<?php echo $params['public_plugins']?>jquery-alertify/css/alertify.core.css" rel="stylesheet" type="text/css" media="screen"/>
        <link href="<?php echo $params['public_plugins']?>jquery-alertify/css/alertify.default.css" rel="stylesheet" type="text/css" media="screen"/>
        <script src="<?php echo $params['public_plugins']?>jquery-alertify/js/alertify.min.js" type="text/javascript"></script>
        <!-- END CSS TEMPLATE -->
        <?php


    }else{
        ?>
        <!-- Custom CSS -->
        <link href="<?php echo $params['public_css'] ?>loginModal.css" rel="stylesheet">
        <?php
    }

    if(isset($params['private_css']))
    {
        foreach($params['private_css'] as $script )
        {
            ?>
            <link href="<?php echo $script ?>" rel="stylesheet" type="text/css">
            <?php
        }
    }



    if(isset($params['plugins_css']))
    {
        foreach($params['plugins_css'] as $script )
        {
            ?>
            <link href="<?php echo $script ?>" rel="stylesheet" type="text/css">
            <?php
        }
    }

    /*echo '<pre>';
    print_r($params);
    echo '</pre>';*/
    ?>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCKQ_8dn0X12u6wM4w4DRDwzfZ2bnomV_w&amp;sensore=fales;&amp;libraries=places"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="<?php echo $params['public_plugins']?>jquery-geocomplete/js/jquery.geocomplete.js" type="text/javascript"></script>

</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body >

<?php if(isset($_SESSION['autenticado'])){ include_once('nav-bar.phtml');} ?>

<!-- BEGIN PAGE CONTAINER-->
<input type="hidden" id="type_user" value="<?php echo Session::get('user_type')?>" >
<input type="hidden" id="type_user_id" value="<?php echo Session::get('user_type_id')?>" >


<div class="page-content">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
