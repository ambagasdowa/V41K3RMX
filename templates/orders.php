<?php
#$this->pr($this->Orders);
#$this->pr($this->myOrders);

?>

<div class="col-md-12">
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#new_orders" data-toggle="tab">New Orders</a></li>
            <li class=""><a href="#my_orders" data-toggle="tab">My Orders</a></li>
            <li class=""><a href="#sp_orders" data-toggle="tab">Special Orders</a></li>

        </ul>
        <div class="tab-content">
            <div class="active tab-pane" id="new_orders">
                <div class="box box-info">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <br/>
                       <p>
                           <div class="portfolio_content">
                               <div id="content" class="col-md-12 m-top-30">
                                   <?php
                                   if(!empty($this->Orders)){

                                   foreach($this->Orders as $o)
                                   {
                                   ?>
                                   <div class="col-md-6 col-xs-12 col-lg-4 item">
                                       <a href="#">
                                           <div class="pricing_item blog_item m-top-20">
                                               <div class="blog_item_img">
                                                   <img src="https://maps.googleapis.com/maps/api/staticmap?key=AIzaSyC1Ap3sfh7J8-dtaa-i-gNd8i92X6fAMIM&center=<?php echo $o['geo_lat'];?>,<?php echo $o['geo_lng'];?>&markers=color:red%7C<?php echo $o['geo_lat'];?>,<?php echo $o['geo_lng'];?>&zoom=18&size=300x170"/>
                                               </div>
                                               <div class="blog_text">
                                                   <br/>
                                                   <?php echo $o['geo_str']?>
                                                   <br/>
                                                   <?php echo 'Outdoor No: '.$o['geo_ext'];?>
                                                   <?php if(!empty($o['geo_ext'])){echo ' | Interior No: '.$o['geo_ext'];}?>
                                                   <div class="clear"></div>
                                               </div>

                                               <div class="col-lg-3 text-center"></div>
                                               <div class="col-lg-6 text-center">
                                               <div class="box-body box-profile">
                                                   <br/>
                                                   <img class="profile-user-img img-responsive img-circle" src="/public/uploads/enterprise/profile/<?php echo $o['enterprise_id']; ?>/<?php echo $o['Enterprise']['logo_enterprise'];?>"
                                                        alt="User profile picture">
                                               </div>
                                               </div>
                                               <div class="col-lg-3 text-center"></div>
                                               <div class="clear"></div>
                                               <div class="pricing_text roomy-40 text-center">

                                                   <h6><?php echo strtoupper($o['Enterprise']['name_enterprise']);?></h6>
                                                    <p>
                                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                                            <h7><em>Order Time </em></h7>
                                                            <br/>
                                                            <span class="label label-success pull-center">
                                                                    <?php echo substr($o['date_order'],10,6);?>
                                                            </span>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                                            <h7><em>Ready on</em></h7>
                                                            <br/>
                                                            <span class="label label-success pull-center">
                                                                    <?php echo $o['time_prepare'];?>
                                                            </span>
                                                        </div>
                                                        <div class="clear"></div>
                                                    </p>
                                                <p>
                                                    <?php
                                                    switch ($o['status'])
                                                    {
                                                        case 'NEW':

                                                            $onclick = 'openModal(this);return false;';
                                                            $label_href  = 'REQUEST';
                                                            $data_status = 'CYCLER';
                                                            $fa_icon = '<i class="fa fa-bicycle"></i>';
                                                            $url = '/orders/requestDelivery';
                                                            break;
                                                        case 'CYCLER':
                                                            $onclick = 'openModal(this);return false;';
                                                            $label_href  = 'AUTH PENDING';
                                                            $data_status = 'AUTH';
                                                            $fa_icon = '<i class="fa fa-bicycle"></i>';
                                                            $url = '/orders/authRequest';
                                                            break;

                                                        case 'AUTH':
                                                            $onclick = 'openModal(this);return false;';
                                                            $label_href  = 'AUTHORIZE';
                                                            $data_status = 'PROCESSING';
                                                            $fa_icon = '<i class="fa fa-bicycle"></i>';
                                                            $url = '/orders/deliveryProcessing';
                                                            break;
                                                        case 'PROCESSING':
                                                            $onclick = 'javascript:void(0);';
                                                            $label_href  = 'PROCESSING';
                                                            $data_status = 'ON ROUTE';
                                                            $fa_icon = '<i class="fa fa-bicycle"></i>';
                                                            $url = '';
                                                            break;
                                                        case 'ON ROUTE':

                                                            $onclick = 'javascript:void(0);';
                                                            $label_href  = 'ON ROUTE';
                                                            $data_status = 'DELIVERED';
                                                            $fa_icon = '<i class="fa fa-bicycle"></i>';
                                                            break;
                                                        case 'DELIVERED':
                                                            $onclick = '';
                                                            $url = '/orders/deliveryProcessing';
                                                            $label_href  = 'DELIVERED';
                                                            $data_status = 'COMPLETED';
                                                            $fa_icon = '<i class="fa fa-bicycle"></i>';
                                                            break;
                                                    }
                                                    $href ='';
                                                    $label_href ='Next';
                                                    ?>
                                                    <!--<a class='btn btn-success' onclick='<?php /*echo $href;*/?>'><?php /*echo $label_href; */?></a>-->
                                                    <!-- <div class="input-group">
                                                         <input class="form-control" type="text" id="search-by-id"
                                                                placeholder="Search by Member ID" value=""
                                                                onkeyup="getMember();"
                                                         >
                                                         <span class="input-group-addon warning">
                            <span class="arrow"></span>
                             <i class="fa fa-align-justify"></i>
                            </span>
                                                     </div>-->
                                                    <br/>

                                                    <a href="/orders/request/<?php echo $o['order_id'];?>/<?php echo $data_status?>">
                                                        <button type="button" class="btn btn-icon-toggle btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Member history"
                                                            onclick="setGeoLocCycler();"  title="Request Delivey"   url="/orders/requestDelivery"   data-order_id="c" data-status="<?php echo $data_status;?>" data-click="confirmDelivery(<?php echo $o['order_id']?>)">
                                                        <i class="fa fa-bicycle"></i>
                                                    </button>
                                                    </a>

                                                </p>
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                    <?php
                                    }

                                    ?>
                                    <?php
                                    }else{
                                    ?>
                                        <div class="alert alert-warning alert-dismissible">
                                            <h4><i class="icon fa fa-warning"></i> Notice!!</h4>
                                            New Orders not found
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>

                        </p>
                    </div>
                </div>
                <div class="clear"></div><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
            </div>
            <div class="tab-pane" id="my_orders">
                <div class="box box-info">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <br/>
                        <p>
                            <div class="portfolio_content">
                                <div class="col-md-12 m-top-30">
                                    <?php
                                    if(!empty($this->myOrders)){

                                    foreach($this->myOrders as $o)
                                    {
                                    ?>
                                    <div class="col-md-4">
                                        <a href="#">
                                            <div class="pricing_item blog_item m-top-20">
                                                <div class="blog_item_img">
                                                    <img src="https://maps.googleapis.com/maps/api/staticmap?key=AIzaSyC1Ap3sfh7J8-dtaa-i-gNd8i92X6fAMIM&center=<?php echo $o['geo_lat'];?>,<?php echo $o['geo_lng'];?>&markers=color:red%7C<?php echo $o['geo_lat'];?>,<?php echo $o['geo_lng'];?>&zoom=18&size=300x170"/>
                                                </div>
                                                <div class="blog_text">
                                                    <br/>
                                                    <?php echo $o['geo_str']?>
                                                    <br/>
                                                    <?php echo 'Outdoor No: '.$o['geo_ext'];?>
                                                    <?php if(!empty($o['geo_ext'])){echo ' | Interior No: '.$o['geo_ext'];}?>
                                                    <div class="clear"></div>
                                                </div>

                                                <div class="col-lg-3 text-center"></div>
                                                <div class="col-lg-6 text-center">
                                                    <div class="box-body box-profile">
                                                        <br/>
                                                        <img class="profile-user-img img-responsive img-circle" src="/public/uploads/enterprise/profile/<?php echo $o['enterprise_id']; ?>/<?php echo $o['Enterprise']['logo_enterprise'];?>"
                                                             alt="User profile picture">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 text-center"></div>
                                                <div class="clear"></div>
                                                <div class="pricing_text roomy-40 text-center">

                                                    <h6><?php echo strtoupper($o['Enterprise']['name_enterprise']);?></h6>
                                                <p>
                                                <div class="col-md-6 col-sm-6 col-xs-6">
                                                    <h7><em>Order Time </em></h7>
                                                    <br/>
                                                    <span class="label label-success pull-center">
                                                            <?php echo substr($o['date_order'],10,6);?>
                                                    </span>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-6">
                                                    <h7><em>Ready on</em></h7>
                                                    <br/>
                                                    <span class="label label-success pull-center">
                                                            <?php echo $o['time_prepare'];?>
                                                    </span>
                                                </div>
                                                <div class="clear"></div>
                                                </p>
                                                <p>
                                                    <?php
                                                    switch ($o['status'])
                                                    {
                                                        case 'NEW':
                                                            $onclick = 'openModal(this);return false;';
                                                            $label_href  = 'REQUEST';
                                                            $data_status = 'CYCLER';
                                                            $fa_icon = '<i class="fa fa-bicycle"></i>';
                                                            $url = '/orders/requestDelivery';
                                                            break;
                                                        case 'CYCLER':
                                                            $onclick = 'openModal(this);return false;';
                                                            $label_href  = 'AUTH PENDING';
                                                            $data_status = 'AUTH';
                                                            $fa_icon = '<i class="fa fa-bicycle"></i>';
                                                            $url = '/orders/authRequest';
                                                            break;
                                                        case 'AUTH':
                                                            $onclick = 'openModal(this);return false;';
                                                            $label_href  = 'AUTHORIZE';
                                                            $data_status = 'PROCESSING';
                                                            $fa_icon = '<i class="fa fa-bicycle"></i>';
                                                            $url = '/orders/deliveryProcessing';
                                                            break;
                                                        case 'PROCESSING':
                                                            $onclick = 'javascript:void(0);';
                                                            $label_href  = 'PROCESSING';
                                                            $data_status = 'ON ROUTE';
                                                            $fa_icon = '<i class="fa fa-bicycle"></i>';
                                                            $url = '';
                                                            break;
                                                        case 'ON ROUTE':
                                                            $onclick = 'javascript:void(0);';
                                                            $label_href  = 'ON ROUTE';
                                                            $data_status = 'DELIVERED';
                                                            $fa_icon = '<i class="fa fa-bicycle"></i>';
                                                            break;
                                                        case 'DELIVERED':
                                                            $onclick = '';
                                                            $url = '/orders/deliveryProcessing';
                                                            $label_href  = 'DELIVERED';
                                                            $data_status = 'COMPLETED';
                                                            $fa_icon = '<i class="fa fa-bicycle"></i>';
                                                            break;
                                                    }
                                                    $href ='';
                                                    $label_href ='Next';
                                                    ?>
                                                    <!--<a class='btn btn-success' onclick='<?php /*echo $href;*/?>'><?php /*echo $label_href; */?></a>-->
                                                    <!-- <div class="input-group">
                                                         <input class="form-control" type="text" id="search-by-id"
                                                                placeholder="Search by Member ID" value=""
                                                                onkeyup="getMember();"
                                                         >
                                                         <span class="input-group-addon warning">
                                    <span class="arrow"></span>
                                    <i class="fa fa-align-justify"></i>
                                    </span>
                                                     </div>-->
                                                    <br/>

                                                    <a href="/orders/view_route/<?php echo $o['order_id'];?>/">
                                                        <button type="button" class="btn btn-icon-toggle btn-primary" data-toggle="tooltip" data-placement="top"
                                                                 title="Show Route Delivey" data-status="<?php echo $data_status;?>">
                                                            <i class="fa fa-bicycle"></i>
                                                        </button>
                                                    </a>

                                                </p>
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    }else{
                                        ?>
                                        <div class="alert alert-warning alert-dismissible">
                                            <h4><i class="icon fa fa-warning"></i> Your Orders!</h4>
                                            You don't have any Order Request
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>

                        </p>
                    </div>
                </div>
                <div class="clear"></div><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
            </div>
            <div class="tab-pane" id="sp_orders">
                <div class="box box-info">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <br/>
                        <p>
                            <div class="portfolio_content">
                                <div class="col-md-12 m-top-30">
                                    <?php
                                    if(!empty($this->spOrders)){

                                    foreach($this->spOrders as $o)
                                    {
                                    ?>
                                    <div class="col-md-4">
                                        <a href="#">
                                            <div class="pricing_item blog_item m-top-20">
                                                <div class="blog_item_img">
                                                    <img src="https://maps.googleapis.com/maps/api/staticmap?key=AIzaSyC1Ap3sfh7J8-dtaa-i-gNd8i92X6fAMIM&center=<?php echo $o['geo_lat'];?>,<?php echo $o['geo_lng'];?>&markers=color:red%7C<?php echo $o['geo_lat'];?>,<?php echo $o['geo_lng'];?>&zoom=18&size=300x170"/>
                                                </div>
                                                <div class="blog_text">
                                                    <br/>
                                                    <?php echo $o['geo_str']?>
                                                    <br/>
                                                    <?php echo 'Outdoor No: '.$o['geo_ext'];?>
                                                    <?php if(!empty($o['geo_ext'])){echo ' | Interior No: '.$o['geo_ext'];}?>
                                                    <div class="clear"></div>
                                                </div>

                                                <div class="col-lg-3 text-center"></div>
                                                <!--<div class="col-lg-6 text-center">
                                                    <div class="box-body box-profile">
                                                        <br/>
                                                        <img class="profile-user-img img-responsive img-circle" src="/public/img/user/<?php /*echo $o['enterprise_id']; */?>/profile/<?php /*echo $o['Enterprise']['logo_enterprise'];*/?>"
                                                             alt="User profile picture">
                                                    </div>
                                                </div>-->
                                                <div class="col-lg-3 text-center"></div>
                                                <div class="clear"></div>
                                                <div class="pricing_text roomy-40 text-center">

                                                    <h5><?php echo strtoupper($o['Customer']['first_name'].' '.$o['Customer']['last_name']);?></h5>
                                                    <p>
                                                        <?php
                                                        $search = array('(',')',' ','-');
                                                        ?>
                                                        <a href="tel:<?php echo str_replace($search,"",$o['Customer']['phone_number'])?>">
                                                            <i class="fa fa-phone fa-2x"></i>
                                                        </a>
                                                    </p>

                                                    <div class="clear"></div><hr/>
                                                    <div class="blog_text">
                                                        <br/>
                                                        <span class="label label-success pull-center">
                                                                Address Pickup
                                                        </span>
                                                        <strong><?php echo $o['special_delivery_where']?></strong>
                                                        <br/>
                                                        <div class="clear"></div>
                                                    </div>
                                                    <div class="blog_text">
                                                        <br/>
                                                        <strong><?php echo $o['special_delivery']?></strong>
                                                        <br/>
                                                        <div class="clear"></div>
                                                    </div>

                                                    <p>
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <h7><em>Order Time </em></h7>
                                                        <br/>
                                                        <span class="label label-success pull-center">
                                                                <?php echo substr($o['date_order'],10,6);?>
                                                        </span>
                                                    </div>

                                                    <div class="clear"></div>
                                                    </p>
                                                    <p>
                                                        <?php
                                                        switch ($o['status'])
                                                        {
                                                            case 'NEW':
                                                                $onclick = 'openModal(this);return false;';
                                                                $label_href  = 'REQUEST';
                                                                $data_status = 'CYCLER';
                                                                $fa_icon = '<i class="fa fa-bicycle"></i>';
                                                                $url = '/orders/requestDelivery';
                                                                break;

                                                            case 'SPECIAL':
                                                                $onclick = 'javascript:void(0);';
                                                                $label_href  = 'ON ROUTE';
                                                                $data_status = 'DELIVERED';
                                                                $fa_icon = '<i class="fa fa-bicycle"></i>';
                                                                break;

                                                        }
                                                        $href ='';
                                                        $label_href ='Next';
                                                        ?>

                                                        <br/>

                                                        <a href="/orders/request_sp/<?php echo $o['order_id'];?>/<?php echo $data_status?>">
                                                            <button type="button" class="btn btn-icon-toggle btn-primary"
                                                                    data-toggle="tooltip" data-placement="top"
                                                                    title="Show Route Delivey"
                                                                    data-status="<?php echo $data_status;?>">
                                                                <i class="fa fa-bicycle"></i>
                                                            </button>
                                                        </a>

                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    }else{
                                        ?>
                                        <div class="alert alert-warning alert-dismissible">
                                            <h4><i class="icon fa fa-warning"></i> Your Orders!</h4>
                                            You don't have any Order Request
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>

                        </p>
                    </div>
                </div>
                <div class="clear"></div><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
            </div>


        </div>

        <!-- /.tab-content -->
    </div>
    <!-- /.nav-tabs-custom -->
</div>
<div class="clearfix"></div>
