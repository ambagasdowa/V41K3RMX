<?php
#$this->pr($this->Order);

?>

<section id="stuff" class="portfolio">
    <div class="container">
        <div class="row">
            <div class="main_portfolio roomy-100">
                <div class="col-md-8 col-md-offset-2">
                    <div class="head_title text-center">
                        <h3>ROUTE DELIVERY</h3>
                        <div class="separator_auto"></div>

                    </div>
                </div>

                <div class="portfolio_content">
                    <div class="col-md-12 m-top-30">
                        <div class="col-md-8 col-sm-12 col-xs-12">
                            <div class="row">
                                <?php include_once(ROOT.'templates/route_cycler.php'); ?>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12 text-center">
                            <div class="row">
                                <h6 class="text-center m-top-20">
                                    TOTAL ORDER
                                    <div class="clear"></div>
                                    <br/>
                                    <span id="granTotal" class="label label-success">
                                        $<?php echo number_format($this->Order['total_order'],2,'.',',')?>
                                    </span>
                                </h6>
                            </div>
                            <div class="row">
                                <h6 class="text-center m-top-20">
                                    CHANGE
                                    <div class="clear"></div>
                                    <br/>
                                    <span id="granTotal" class="label label-success">
                                        $<?php echo number_format($this->Order['total_change'],2,'.',',')?>
                                    </span>
                                </h6>
                            </div>
                            <div class="row">
                                <h6 class="text-center m-top-20">
                                    YOURS
                                    <div class="clear"></div>
                                    <br/>
                                    <span id="granTotal" class="label label-warning">
                                        $<?php echo number_format($this->Order['total_vikers'],2,'.',',')?>
                                    </span>
                                </h6>
                            </div>
                            <div class="row" >
                                <a href="/orders/index#my_orders">
                                    <button  id="button_confirm" type="button" class="btn btn-primary">ORDERS</button>
                                </a>
                                <button  id="button_confirm" type="button" class="btn btn-default bg-green" onclick="completeDelivery(<?php echo $this->Order['order_id']?>)">COMPLETE</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

