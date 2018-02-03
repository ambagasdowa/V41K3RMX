<?php
#$this->pr($this->Product);
?>
<div class="row">
    <div class="col-xs-12 col-lg-12">
    <div class="box box-success">
        <div class="box-header with-border">
            <i class="fa fa-cube"></i><h1 class="box-title">General Information</h1>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-lg-4">
                    <label>Stuff Name</label>

                    <div class="input-group">
                        <input type="text" class="form-control" onchange="updateProduct(this)"
                               placeholder="First Name" f="name_stuff"
                               value="<?php echo $this->Product['name_stuff'];?>">
                        <span class="input-group-addon"><i class="fa fa-tags"></i></span>
                    </div>
                </div>
                <div class="col-lg-4">
                    <label>Price Stuff</label>

                    <div class="input-group ">
                        <input  type="text"  id="hour_end"
                                f="price_stuff"
                                class="form-control" onchange="updateProduct(this)"
                                value="<?php echo $this->Product['price_stuff'];?>">
                        <span class="input-group-addon">
                            <span class="fa fa-dollar"></span>
                        </span>
                    </div>
                </div>
                <div class="col-lg-4">
                    <label>Preparation Time</label>

                    <div class="input-group clockpicker">
                        <input  type="text"  id="hour_ini"
                                f="time_stuff"
                                class="form-control" onchange="updateProduct(this)"
                        value="<?php echo $this->Product['time_stuff'];?>">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-time"></span>
                        </span>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
            <div class="row">
                <div class="col-lg-6">
                    <label>Stuff Description</label>

                    <div class="form-group ">
                        <textarea class="form-control input" id="special_delivery"  
                                  name="special_delivery" rows="3" f="desc_stuff"  onchange="updateProduct(this)"
                                  placeholder="Stuff Description"><?php echo $this->Product['desc_stuff'];?></textarea></div>
                </div>
                <div class="col-lg-6">
                    <label>Category</label>
                    <select class="form-control text4rea" f="category_id"  onchange="updateProduct(this)">
                        <?php
                        echo '<option value="">Choose one</option>';
                        foreach($this->CategoryStuff as $cat)
                        {
                            $selected = ($cat['category_id'] == $this->Product['category_id']) ? 'selected' : '' ;
                            echo '<option '.$selected.' value="'.$cat['category_id'].'">'.$cat['name_cat'].'</option>';
                        
                        }
                        ?>
                    </select>
                </div>
            </div>
            
            
        </div>
        <br/>
    </div>
</div>
    <div class="col-xs-12 col-lg-12">
        <div class="box box-warning">
            <div class="box-header with-border">
                <i class="fa fa-picture-o"></i><h1 class="box-title">Photo Stuff</h1>
            </div>
            <div class="box-body">
                <div class="col-lg-6">
                    <?php
                    require_once $params['templates'][0];
                    ?>
                </div>
                <div class="col-lg-6">
                    <div>
                        <div class="panel panel-danger" style="background-color: white">
                            <div class="panel-heading">Change Photo</div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <input id="photo_product" name="photo_product[]" type="file" multiple class="file-loading">
                                        <div id="errorBlock" class="help-block"></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <br/>
        </div>
    </div>


</div>
<input  type="hidden"  id="stuff_id"
        value="<?php echo $this->Product['stuff_id'];?>">

<input  type="hidden"  id="photo_update"
        f="photo_stuff"
        value="<?php echo $this->Product['photo_stuff'];?>">

<script>
    
    
    window.onload = function()
    {
        setFileInputProfile('<?php echo $this->Product['stuff_id'];?>');
        $('.clockpicker').clockpicker({
            placement: 'bottom',
            align: 'left',
            autoclose: true
        });
    };
</script>