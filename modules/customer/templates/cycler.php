<?php
#$this->pr($this->Order);
#$this->pr($this->Cycler);
#$this->pr($this->Customer);
?>

<?php
if(!empty($this->Cycler)) {
    ?>
    <div class="box box-widget widget-user">
        <!-- Add the bg color to the header using any of the bg-* classes -->
        <div class="widget-user-header bg-yellow-active">
            <h3 class="widget-user-username text-center"><?php echo $this->Cycler['first_name'] . ' ' . $this->Cycler['last_name']; ?></h3>
        </div>
        <div class="widget-user-image">
            <img class="img-circle" src="/public/img/user/<?php echo $this->Cycler['user_id'] ?>/profile/profile.jpg"
                 alt="User Avatar">
        </div>
        <div class="box-body box-profile">
            <hr/>

            <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                    <b>Emissions (CO<sub>2</sub>)</b> <a class="pull-right"><?php echo $this->Emissions;?></a>
                </li>
                <li class="list-group-item success">
                    <b>Gasoline Saved</b> <a class="pull-right">0</a>
                </li>
                <li class="list-group-item">
                    <b>Kms. Record</b> <a class="pull-right"><?php echo $this->total_distance;?></a>
                </li>
            </ul>
        </div>
        <div class="box-footer">
            <div class="row text-center">
                <div>
                    <button type="button" class="btn btn-icon-toggle btn-default bg-green"
                            data-toggle="tooltip" data-placement="top"

                            order_id="<?php echo $this->Order['order_id']; ?>"
                            title="Send Message to Cycler">
                        <i class="fa fa-comment-o"></i>
                    </button>
                    <!--<button type="button" class="btn btn-icon-toggle btn-default bg-green"
                            data-toggle="tooltip" data-placement="top"
                            onclick="confirmProcessing(this);"
                            order_id="<?php /*echo $this->Order['order_id']; */?>"
                            title="Confirm Request Cycler">
                        <i class="fa fa-bicycle"></i>
                    </button>-->


                </div>

            </div>
            <!-- /.row -->
        </div>
    </div>
<?php
}else{
    ?>
    <div class="callout callout-warning">
        <div class="text-center"><i class="fa fa-bicycle fa-4x text-white"></i></div>
        <h6 class="text-white text-center">Cycler Request Not yet</h6>
    </div>
    <?php
}
?>