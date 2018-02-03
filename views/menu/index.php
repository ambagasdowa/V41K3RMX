<?php
/**
 * Created by PhpStorm.
 * User: cyberio
 * Date: 21/03/17
 * Time: 11:20 PM
 */

?>
<input type="hidden" name="enterprise" id="enterprise" value="<?php echo $this->e_id?>"/>
<!-- End off Stuff Section-->
<section id="stuff" class="portfolio ">
    <div class="container">
        <div class="row">
            <div class="main_portfolio roomy-100">
                <div class="col-md-8 col-md-offset-2">
                    <div class="head_title text-center">
                        <h3>CHOOSE YOUR STUFF</h3>
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
                                    <div class="tab-content"  style="margin-bottom: 50px;">
                                        <?php
                                        $t=1;
                                        foreach ($this->CategoryStuff as $Cat=>$Stuff)
                                        {
                                            #$this->pr($Stuff);
                                            $active = ($t == 1) ? 'active' : '' ;
                                            ?>
                                            <div class="tab-pane <?php echo $active;?>" role="tabpanel" id="tab-<?php echo $t;?>" style="margin-top: 50px;">
                                                <?php
                                                if(!empty($Stuff))
                                                {
                                                    foreach ($Stuff as $stuff)
                                                    {
                                                        ?>
                                                        <div class="col-sm-4 col-lg-4 col-md-4">
                                                        
                                                            <div class="pricing_item blog_item m-top-20">
                                                            
                                                                <div class="blog_item_img">
                                                                
                                                                    <?php
                                                                        $img_stuf = "/public/uploads/enterprise/stuff/".$stuff['stuff_id']."/".$stuff['photo_stuff'];
                                                                    ?>
                                                                    
                                                                    <img class="img-responsive" src="<?php echo $img_stuf; ?>" />
                                                                    
                                                                </div>
                                                                <?php
                                                                if(!empty($_SESSION['user_id']))
                                                                {
                                                                ?>
                                                                    <a class="btn btn-warning pull-right"onclick="addtoFav('<?php echo $stuff['stuff_id']; ?>');" alt="Add Favorite" style="position: absolute; top:5px;right:5px;">
                                                                        <i class="fa fa-heart<?php echo $stuff['favorite']; ?>" id="favorite_<?php echo $stuff['stuff_id']; ?>"></i>
                                                                    </a>
                                                                <?php
                                                                }
                                                                ?>
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
                                                                        echo $stuff['name_stuff']; 
                                                                        ?>
                                                                        
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

                                                                            <a class="btn btn-primary" onclick="addtoCart('<?php echo $stuff['stuff_id']; ?>','<?php echo 'ex' . $stuff['stuff_id']; ?>','1');">
                                                                            <span class="badge " style=" color: #f39c12 !important;" id="how_many_<?php echo $stuff['stuff_id']; ?>">
                                                                            <?php
                                                                            $h_m = (isset($_SESSION['Shopping']['Enterprise'][$stuff['enterprise_id']]['stuff'][$stuff['stuff_id']]['how_many']))
                                                                                ? $_SESSION['Shopping']['Enterprise'][$stuff['enterprise_id']]['stuff'][$stuff['stuff_id']]['how_many']
                                                                                : 0;
                                                                            echo $h_m; ?></span>
                                                                                <i class="fa fa-shopping-cart"></i>
                                                                            </a>
                                                                            
                                                                            <input type="hidden"
                                                                                   id="price_<?php echo 'ex' . $stuff['stuff_id']; ?>"
                                                                                   class="form-control"
                                                                                   value="<?php echo $stuff['price_stuff']; ?>">
                                                                        </center>
                                                                    </p>
                                                                    
                                                                </div>

                                                            </div>
                                                        </div>

                                                        <?php
                                                    }
                                                }
                                                ?>
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
                </div>

            </div>
        </div><!--End off row -->
    </div><!--End off container -->
</section>
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