<section id="special_stuff" class="portfolio ">
    <div class="container">
        <div class="row">
            <div class="main_portfolio roomy-100">
                <div class="col-md-8 col-md-offset-2">
                    <div class="head_title text-center">
                        <h3 class="animated fadeInDown">ROUTE DELIVERY STUFF</h3>
                        <div class="separator_auto"></div>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
                    </div>
                </div>

                <div class="portfolio_content">
                    <div class="col-md-12">
                        <div class="row">
                            <div  class="col-sm-12">
                                <h3>&nbsp;</h3>
                                <hr/>
                                <div class="col-md-8 col-md-8 col-sm-8 col-xs-8">
                                    <?php include_once(ROOT.'templates/route_cycler.php'); ?>
                                </div>

                                <div class="col-md-4 col-sm-4 col-xs-4 text-center">
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
                                            <span id="granTotal" class="label label-warning">
                                                $<?php echo number_format($this->Order['total_change'],2,'.',',')?>
                                            </span>
                                        </h6>
                                    </div>
                                    <div class="row">
                                        <h6 class="text-center m-top-20">
                                            YOURS
                                            <div class="clear"></div>
                                            <br/>
                                            <span id="granTotal" class="label label-danger">
                                                $<?php echo number_format($this->Order['total_vikers'],2,'.',',')?>
                                                </span>
                                        </h6>
                                    </div>

                                    <div class="clear"></div>
                                    <br/>
                                    <div class="row">
                                        <?php
                                            $onClick = ($this->Order['status'] == 'SPECIAL') ? 'location.href="/orders/index"': $this->btn_confirm.'('.$this->Order['order_id'].')';
                                            $labelBtn= ($this->Order['status'] == 'SPECIAL') ? 'ORDERS': 'CONFRIM';
                                        ?>
                                        <button  id="button_confirm" type="button" class="btn btn-primary" onclick='<?php echo $onClick;?>'><?php echo $labelBtn;?></button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div><!--End off row -->
    </div><!--End off container -->
</section>
