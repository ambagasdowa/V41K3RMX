<input type="hidden" id="user_id" value="<?php echo Session::get('user_id')?>">
<section id="order_stuff" class="portfolio ">
    <div class="container">
        <div class="row">
            <div class="main_portfolio">

                <div class="portfolio_content">
                    <div class="col-lg-12 col-xs-12 text-center">
                        <div class="col-lg-1 col-xs-1"></div>
                        <div class="col-lg-3 col-xs-12">
                            <!-- small box -->

                            <div class="info-box bg-green">
                                <span class="info-box-icon"><i class="ion fa fa-motorcycle"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Emissions (CO<sub>2</sub>)</span>
                                    <span class="info-box-number"><?php echo $this->Emissions;?></span>

                                    <div class="progress">
                                        <div class="progress-bar" style="width: <?php echo $this->Emissions;?>%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-xs-12">
                            <!-- small box -->
                            <div class="info-box bg-yellow">
                                <span class="info-box-icon"><i class="ion fa fa-tint"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Liters of fuel saved</span>
                                    <span class="info-box-number">0</span>

                                    <div class="progress">
                                        <div class="progress-bar" style="width: 0%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-xs-12">
                            <!-- small box -->

                            <div class="info-box bg-red">
                                <span class="info-box-icon"><i class="ion fa fa-road"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Kms Traveled</span>
                                    <span class="info-box-number"><?php echo ($this->total_distance>0) ? $this->total_distance : 0;?></span>

                                    <div class="progress">
                                        <div class="progress-bar" style="width: <?php echo $this->total_distance;?>%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clear"></div>
                <hr/>


                    <div class="col-md-8">
                        <?php
                        require_once $params['templates'][0];
                        ?>
                    </div>
                    <div class="col-md-3">
                        <?php
                        require_once $params['templates'][1];
                        ?>
                    </div>
                </div>

            </div>
        </div><!--End off row -->
    </div><!--End off container -->
</section>
