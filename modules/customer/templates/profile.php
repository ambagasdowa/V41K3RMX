<div class="box box-widget widget-user">
    <!-- Add the bg color to the header using any of the bg-* classes -->
    <div class="widget-user-header bg-green-gradient">
        <h3 class="widget-user-username text-center"><?php echo $this->customerName?></h3>
    </div>
    <div class="widget-user-image">
        <img id="photo_profile_img" class="img-circle" src="/public/uploads/customer/profile/<?php echo $this->customerID;?>/profile.jpg"  alt="User Avatar">
    </div>
    <div class="box-footer">
        <div class="row">
            <div class="col-sm-6 border-right">
                <div class="description-block">
                    <h5 class="description-header"><?php echo $this->cOrders['count'];?></h5>
                    <span class="description-text">ORDERS</span>
                </div>
                <!-- /.description-block -->
            </div>
            <!-- /.col -->

            <!-- /.col -->
            <div class="col-sm-6">
                <div class="description-block">
                    <h5 class="description-header"><?php echo $this->csOrders['count'];?></h5>
                    <span class="description-text">SPECIAL ORDERS</span>
                </div>
                <!-- /.description-block -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

    </div>
</div>
<div class="small-box bg-yellow">
    <div class="inner">
        <h3 style="color: white;"><?php echo $this->cOrders['count']+$this->csOrders['count'];?></h3>

        <p>Orders</p>
    </div>
    <div class="icon">
        <i class="ion fa fa-shopping-cart"></i>
    </div>
    <a href="/index/index#stuff" class="small-box-footer">New Order <i class="fa fa-arrow-circle-right"></i></a>
</div>
