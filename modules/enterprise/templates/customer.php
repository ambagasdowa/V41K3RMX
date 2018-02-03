<?php
#$this->pr($this->Order);
#$this->pr($this->Cycler);
#$this->pr($this->Customer);
?>
<div class="box box-widget widget-user">
    <!-- Add the bg color to the header using any of the bg-* classes -->
    <div class="widget-user-header bg-green-active">
        <h3 class="widget-user-username text-center"><?php echo $this->Customer['first_name'] . ' ' . $this->Customer['last_name']; ?></h3>
    </div>
    <div class="widget-user-image">
        <img class="img-circle" src="/public/img/user/<?php echo $this->Customer['user_id'] ?>/profile/profile.jpg"
             alt="User Avatar">
    </div>
    <div class="box-footer">
                <img src="https://maps.googleapis.com/maps/api/staticmap?key=AIzaSyC1Ap3sfh7J8-dtaa-i-gNd8i92X6fAMIM&center=<?php echo $this->Order['geo_lat'] ?>,<?php echo $this->Order['geo_lng'] ?>&markers=color:red%7C<?php echo $this->Order['geo_lat'] ?>,<?php echo $this->Order['geo_lng'] ?>&zoom=18&size=220x100"/>
                <br/>
                <?php echo $this->Order['geo_str'] ?>
                <br/>
                <?php echo 'Outdoor No: ' . $this->Order['geo_ext']; ?>
                <?php if (!empty($this->Order['geo_ext'])) {
                    echo ' | Interior No: ' . $this->Order['geo_ext'];
                } ?>
                <br/>


    </div>
    <div class="text-center">
    <button type="button" class="btn btn-icon-toggle btn-default bg-green"
            data-toggle="tooltip" data-placement="top"

            order_id="<?php echo $this->Order['order_id']; ?>"
            title="Send Message to Customer">
        <i class="fa fa-comment-o"></i>
    </button>
    <div class="clear"></div>
        <br/>
    </div>

</div>