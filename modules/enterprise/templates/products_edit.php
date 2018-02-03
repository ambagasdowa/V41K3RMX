<?php
    require_once $params['templates'][1];
?>


<input type="hidden" name="enterprise" id="enterprise" value="<?php echo $this->e_id?>"/>
<!-- End off Stuff Section-->
        <div class="row">
            <div class="main_portfolio ">
                <div class="portfolio_content">
                        <div class="row">
                                <h3>&nbsp;</h3>
                                <hr/>
                                <div class="col-xs-12">
                                    <!-- required for floating -->
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs ">
                                        <?php
                                        $t=1;
                                        foreach($this->CategoryStuff as $Cat=>$Stuff){
                                            $active = ( $t== 1) ? 'class="active"':'';
                                            ?>
                                            <li <?php echo $active;?> ><a href="#tab-<?php echo $t;?>" onclick="slideTab();" role="tab" data-toggle="tab"><?php echo $Cat;?></a></li>
                                            <?php
                                            $t++;
                                        }
                                        ?>
                                    </ul>
                                </div>
                                <div class="col-xs-12">
                                    <!-- Tab panes -->
                                    <div class="tab-content"  style="margin-bottom: 10px;">
                                        <?php
                                        $t=1;
                                        foreach ($this->CategoryStuff as $Cat=>$Stuff)
                                        {
                                            #$this->pr($Stuff);
                                            $active = ($t == 1) ? 'active' : '' ;
                                            ?>
                                            <div class="tab-pane <?php echo $active;?>" role="tabpanel" id="tab-<?php echo $t;?>" style="margin-top: 10px;margin-bottom: 50px;">
                                                <?php
                                                if(!empty($Stuff))
                                                {
                                                    foreach ($Stuff as $stuff)
                                                    {
                                                        ?>
                                                        <div class="col-sm-12 col-lg-4 col-md-4 shadow-post">
                                                            <div class="pricing_item blog_item m-top-20 "  style="position: relative;box-shadow: 2px 2px 5px rgba(0,0,0,.3);">
                                                                <div class="blog_item_img">
                                                                    <img class="img-responsive" src="/public/uploads/enterprise/stuff/<?php echo $stuff['stuff_id']?>/<?php echo $stuff['photo_stuff']?>" />
                                                                </div>

                                                                <div class="blog_text roomy-40 roomy-10-10">
                                                                    <h2 class="pull-right label label-success">
                                                                        $<span
                                                                            style="color:#FFFFFF;"
                                                                            id="subtotal_ex<?php echo $stuff['stuff_id'] ?>">
                                                                            <?php echo $stuff['price_stuff'] ?>
                                                                        </span>
                                                                    </h2>
                                                                    <h5 style="color:#1CA347;">
                                                                        <?php
                                                                        echo $stuff['name_stuff']; ?>

                                                                    </h5>

                                                                    <div class="">
                                                                        <?php
                                                                        /*$points =(strlen($stuff['desc_stuff']) > 65) ? '...': '';

                                                                        echo substr($stuff['desc_stuff'],0,70).$points;*/
                                                                        echo $stuff['desc_stuff']
                                                                        ?>
                                                                    </div>
                                                                    <p>
                                                                    <center>

                                                                        <b>
                                                                                <span style="padding-left: 5px;color: #3c763d;display: none;"
                                                                                      id="ex<?php echo $stuff['stuff_id']; ?>CurrentSliderValLabel">
                                                                                    <span id="<?php echo 'ex' . $stuff['stuff_id']; ?>SliderVal">1</span>
                                                                                </span>
                                                                        </b>

                                                                        <a href="/enterprise/products/editp/<?php echo $stuff['stuff_id']; ?>" class="btn btn-danger text-center">Edit

                                                                            <i class="fa fa-edit"></i>
                                                                        </a>
                                                                        <input type="hidden"
                                                                               id="price_<?php echo 'ex' . $stuff['stuff_id']; ?>"
                                                                               class="form-control"
                                                                               value="<?php echo $stuff['price_stuff']; ?>">
                                                                    </center>
                                                                    </p>
                                                                    <br/>
                                                                </div>

                                                            </div>
                                                        </div>

                                                        <?php
                                                    }
                                                    
                                                }
                                                ?>
                                                <div class="col-sm-12 col-lg-4 col-md-4 shadow-post">
                                                            <div class="pricing_item blog_item m-top-20 "  style="position: relative;box-shadow: 2px 2px 5px rgba(0,0,0,.3);">
                                                                <div class="blog_item_img">
                                                                    <img class="img-responsive" src="/public/uploads/enterprise/stuff/new_product.jpg" />
                                                                </div>

                                                                <div class="blog_text roomy-40 roomy-10-10">
                                                                    <h2 class="pull-right label label-success">
                                                                        $<span
                                                                            style="color:#FFFFFF;"
                                                                            id="subtotal_ex<?php echo $stuff['stuff_id'] ?>">
                                                                            <?php echo '0.00'; ?>
                                                                        </span>
                                                                    </h2>
                                                                    <h5 style="color:#1CA347;">
                                                                        <?php echo '<strong>Add new Stuff</strong>' ?>

                                                                    </h5>

                                                                    <div class="">
                                                                        <?php
                                                                        /*$points =(strlen($stuff['desc_stuff']) > 65) ? '...': '';

                                                                        echo substr($stuff['desc_stuff'],0,70).$points;*/
                                                                        echo 'Your Stuff Description...<br/><br/>';
                                                                        ?>
                                                                    </div>
                                                                    <p>
                                                                    <center>

                                                                        <a href="/enterprise/products/addp/<?php echo $stuff['enterprise_id']?>/<?php echo $stuff['category_id']?>" class="btn btn-danger text-center">Add Stuff

                                                                            <i class="fa fa-edit"></i>
                                                                        </a>
                                                                        
                                                                    </center>
                                                                    </p>
                                                                    <br/>
                                                                </div>

                                                            </div>
                                                        </div>
                                            </div>
                                            <?php
                                            $t++;

                                        }
                                        ?>
                                        
                                        <div class="clearfix"></div>
                                    </div>
                                    
                                    <div class="clearfix"></div>
                                </div>

                        </div>
                </div>

            </div>
        </div><!--End off row -->
<!-- End off Stuff Section-->


<script>
    jQuery(document).ready(function($) {
        $('.slide').each(function (){

            $("#"+this.id).slider();
            $("#"+this.id).on("slide", function(slideEvt) {
                $("#"+this.id+"SliderVal").text(slideEvt.value);
                cantItems(slideEvt.value,this.id);
            });
        });

    });

    function cantItems(v,id)
    {
        cant = parseFloat(v);
        price= parseFloat($('#price_'+id).val());
        subt = parseFloat(cant*price).toFixed(2);
        $("#subtotal_"+id).text(subt);
        $("#"+id).attr('data-slider-value',v);
    }

    function slideTab() {
        $('.slide').each(function (){
            $("#"+this.id).slider();
            $("#"+this.id).on("slide", function(slideEvt) {
                $("#"+this.id+"SliderVal").text(slideEvt.value);
                cantItems(slideEvt.value,this.id);
            });
        });
    }
</script>