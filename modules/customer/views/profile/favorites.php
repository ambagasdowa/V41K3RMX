<?php
$Stuff = $this->Stuff;
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


<script>
    $(document).on('ready', function () {
        
        $('.kv-uni-star').rating({
            theme: 'krajee-uni',
            filledStar: '&#x2605;',
            emptyStar: '&#x2606;'
        });
        

        $('.kv-uni-star').on(
                'change', function () {
                    console.log('Rating selected: ' + $(this).val());
                });
    });
</script>