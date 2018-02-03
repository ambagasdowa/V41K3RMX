<section class="">
    <div class="row">
        <!-- /.col -->
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#new_orders" data-toggle="tab">My Orders</a></li>
                    <li ><a href="#sp_orders" data-toggle="tab">Special Orders</a></li>

                </ul>
                <div class="tab-content">
                    <div class="active tab-pane" id="new_orders">
                        <div class="box box-warning">
                            <div class="box-header with-border">
                                <h3 class="box-title">Latest Orders</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                            <?php
                            if($this->Orders)
                            {
                            ?>
                                <div class="table-responsive">
                                    <table class="table no-margin">
                                        <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>From</th>
                                            <th>Request Time</th>
                                            <th>Preparation Time</th>
                                            <th>Details</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        #$this->pr($this->params);

                                        
                                            foreach ($this->Orders as $o)
                                            {
                                            ?>
                                                <tr>
                                                    <td style="min-width: 50px"><a href="#"><?php echo str_pad($o['order_id'],5,'0',0);?></a></td>
                                                    <td style="min-width: 150px"><?php echo $o['Enterprise']['name_enterprise'];?></td>
                                                    <td style="max-width: 40px"><span class="label label-success"><?php echo substr($o['date_order'],10,6);?></span></td>
                                                    <td style="max-width: 50px">
                                                        <div class="input-group clockpicker">
                                                            <input  type="text"  id="time_prepare_<?php echo $o['order_id']?>"
                                                                    f="time_prepare" order_id="<?php echo $o['order_id']?>"
                                                                    class="form-control" onchange="setTimePrepare(this)"
                                                                    value="<?php echo $o['time_prepare'];?>" readonly>
                                                            <span class="input-group-addon">
                                                                <span class="glyphicon glyphicon-time"></span>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-icon-toggle btn-default bg-green"
                                                                data-toggle="tooltip" data-placement="top"
                                                                onclick="openModal(this)"
                                                                data-order_id="<?php echo $o['order_id'];?>"
                                                                url="/customer/order/authCycler"
                                                                title="Order Details" >
                                                                <i class="fa fa-eye"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                        
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php
                            }else{
                                echo '<div class="callout callout-warning">
                                <h4 class="text-white">No orders found!</h4>
                              </div>';
                            }
                            ?>
                                <!-- /.table-responsive -->
                            </div>

                        </div>
                    </div>

                    <div class="tab-pane" id="sp_orders">
                        <div class="box box-warning">
                            <div class="box-header with-border">
                                <h3 class="box-title">Latest Orders</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <?php
                                if($this->sOrders){
                                ?>
                                <div class="table-responsive">
                                    <table class="table no-margin">
                                        <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>From</th>
                                            <th>Request Time</th>
                                            <th>Details</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        #$this->pr($this->params);

                                        #$this->pr($this->Orders);
                                        foreach ($this->sOrders as $o)
                                        {
                                            ?>
                                            <tr>
                                                <td style="min-width: 50px"><a href="#"><?php echo str_pad($o['order_id'],5,'0',0);?></a></td>
                                                <td style="min-width: 150px"><?php echo $o['special_delivery_where'];?></td>
                                                <td style="max-width: 40px"><span class="label label-success"><?php echo substr($o['date_order'],10,6);?></span></td>

                                                <td>
                                                    <button type="button" class="btn btn-icon-toggle btn-default bg-green"
                                                            data-toggle="tooltip" data-placement="top"
                                                            onclick="openModal(this)"
                                                            data-order_id="<?php echo $o['order_id'];?>"
                                                            url="/customer/order/authCyclerS"
                                                            title="Order Details" >
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php
                                    }else{
                                        echo '<div class="callout callout-warning">
                                        <h4 class="text-white">No orders found!</h4>
                                    </div>';
                                    }
                                ?>
                                <!-- /.table-responsive -->
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<script>
    window.onload = function()
    {
        setTimeout('getOrdersNowE($("#enterprise_id").val())',30000);

    }
</script>