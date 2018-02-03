<?php
$nav_style = ($controlador == 'menu' || $controlador == 'orders' ) ? ' ':' white no-background ';

if( $controlador !== 'checkout'  ) {
    ?>
    <nav class="navbar navbar-default navbar-fixed <?php echo $nav_style; ?> bootsnav">
        <!-- Start Top Search -->
        <div class="top-search">
            <div class="container">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    <input type="text" class="form-control" placeholder="Search">
                    <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
                </div>
            </div>
        </div>
        <!-- End Top Search -->

        <div class="container">
            <!-- Start Atribute Navigation -->
            <div class="attr-nav">
                <ul>
                    <?php
                    if ($metodo !== 'shopping')
                    {
                    ?>
                        <?php
                            $display = (!empty(Session::get('Shopping'))) ? 'block': 'none';
                        ?>
                        <li id="shopping_fa" class="" style="display: <?php echo $display;?>;color:#f39c12 !important">
                            <a href="/menu/shopping"><i class="fa fa-shopping-bag fa-2x" style="color:#f39c12 !important"></i></a>
                        </li>
                        <!--<li class="search"><a href="#"><i class="fa fa-search"></i></a></li>-->
                    <?php
                    }else{
                    ?>
                    <!--<li class="side-menu">
                        <a href="#" id="cart_total" onclick="getTOTALSIDE();">
                            <i class="fa fa-shopping-bag fa-2x animated growIn slower go" style="color:#f39c12 !important"></i>

                        </a>
                    </li>-->

                        <li id="shopping_fa" class="" style="display: <?php echo $display;?>;color:#f39c12 !important">
                            <a href="#" onclick="startCheckout();"><i class="fa fa-shopping-bag fa-2x" style="color:#f39c12 !important"></i></a>
                        </li>
                    <?php
                    }

                    if ($controlador == 'login')
                    {
                        ?>
                        <li class="wow slideInRight animated animated"><a href="/"><i class="fa fa-home fa-2x"></i></a></li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
            <!-- End Atribute Navigation -->

            <!-- Start Header Navigation -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-bars fa-2x"></i>
                </button>
                <a class="navbar-brand" href="/">

                    <img src="/public/assets/images/logo.png" class="logo logo-display m-top-10 wow slideInLeft animated animated" alt="">
                    <img src="/public/assets/images/logo_mini.png" class="logo logo-scrolled wow bounceIn animated animated" alt="">

                </a>
            </div>
            <!-- End Header Navigation -->
            <?php
            if ($controlador == 'index')
            {
                if(empty(Session::get('user_type')))
                {
                    $dash = 'login';
                }else {
                    $dash = (Session::get('user_type') !== 'cycler') ? Session::get('user_type') : 'orders/index';
                    if(Session::get('user_type') == 'customer')
                    {
                        $dash = 'customer';
                    }

                }


                $special = (Session::get('autenticado')) ?
                    '<li class="animated animated fadeInRight slower go">
                        <a href="#special"><i class="fa fa-star fa-2x"></i></a>
                    </li>'
                    : '' ;
                echo '<div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                
                    <li class="animated growIn slower go"><a href="/'.$dash.'">Dash</a></li>
                    <li class="animated growIn slower go"><a href="#stuff">Stuff</a></li>
                    '.$special.'
                    <li class="animated growIn slower go"><a href=""><li class=""><a href="#about"><i class="fa fa-info fa-2x" style="color:#f39c12 !important"></i></a></li></a></li>

                    
                </ul>
            </div>';
            }else{
                echo '<ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                    <li><a >&nbsp;</a></li>
                </ul>';
            }
            ?>
           <!-- /.navbar-collapse -->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <!--<div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                    <?php
/*                    if ($controlador == 'index') {
                        */?>
                        <li class="#hello"><a href="/menu/shopping"><i class="fa fa-shopping-bag"></i></a></li>
                        <li class="#enterprise"><a href="/menu/shopping"><i class="fa fa-shopping-bag"></i></a></li>

                        <?php
/*                    }
                    */?>
                    <!--<li><a href="#service">Services</a></li>
                    <li><a href="#portfolio">Portfolio</a></li>
                    <li><a href="#pricing">Pricing</a></li>
                    <li><a href="#blog">Blog</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>


        <!-- Start Side Menu -->
        <div class="side">
            <a href="#" class="close-side"><i class="fa fa-times"></i></a>
            <div class="widget">

                <div class="box box-warning">
                    <div class="box-header with-border">
                    </div>
                    <div class="box-body">
                        <div class="col-lg-12">
                            <h3 class="text-center m-top-20">
                                    <span id="granTotal" class="label label-danger">
                                        <?php echo number_format(Session::get('gtotal'), 2, '.', ','); ?>
                                    </span>
                            </h3>
                        <div/>
                        <div class="col-lg-12">
                            <h3 class="text-center text-white">+</h3>
                        </div>
                        <div class="col-lg-12">
                            <h3 class="text-center ">
                                <span id="granTotal_cycler"
                                  name="granTotal_cycler"
                                  class="label label-warning">
                                    $<?php echo number_format(Session::get('cycler'), 2, '.', ','); ?>
                                </span>
                            </h3>
                        <div/>
                            <div class="col-lg-12">
                                <h3 class="text-center text-white">=</h3>
                            </div>
                            <div class="col-lg-12">
                                <h3 class="text-center ">
                                <span id="granTotal_cycler_amount"
                                      name="granTotal_cycler_amount"
                                      class="label label-success">
                                    $<?php echo number_format(Session::get('gtotal')+Session::get('cycler'), 2, '.', ','); ?>
                                </span>
                                </h3>
                                <div/>
                        <br/>
                        <form id="checkout_shop" action="" method="post" role="form">
                            <?php
                                $total_pay = Session::get('cycler') + Session::get('gtotal');
                            ?>
                            <input type="hidden"
                                   id="granTotal_float"
                                   name="gran_total"
                                   value="<?php echo $total_pay; ?>">
                            <input type="hidden"
                                   id="granTotal_cycler_float"
                                   name="granTotal_cycler_float"
                                   value="<?php echo Session::get('cycler');?>">
                            <input type="hidden"
                                   id="total_pay_real"
                                   name="total_pay_real"
                                   value="<?php echo Session::get('gtotal');?>">

                            <label>You pay with...</label>
                            <div class="form-group has-warning">
                                <input type="text" id="pay_with" name="pay_with" class="form-control number"
                                       maxlength="5" onchange="getChange(this.value);">
                            </div>
                            <div class="form-group has-warning">
                                <input type="hidden" class="form-control" id="pay_change" name="pay_change" value="" readonly>                            </div>
                        </form>

                        <button id="proceed_btn" type="button" class="btn btn-block btn-success btn-sm disabled"
                                onclick="javascript:void(0);">Proceed
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Side Menu -->

    </nav>
<?php
}
?>