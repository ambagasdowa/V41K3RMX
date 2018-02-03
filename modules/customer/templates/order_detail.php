<style>
    .pricing_top_border{
        height: 4px;
        width:100%;
        background-color: #ff6863;
    }

    .pricing_item{
        position: relative;
        box-shadow: 2px 2px 5px rgba(0,0,0,.3);
    }
    .pricing_head{
        background-color: #f7f7f7;

    }
    .pricing_price_border{
        background-color: #ff6863;
        padding: 10px;
        border-radius: 50%;
        margin: 0 auto;
        width: 150px;
        height: 150px;
        position: absolute;
        top: 18.6%;
        left: 25%;
        right: 25%;
    }
    .pricing_price_border .pricing_price{
        background-color: #ff6863;
        border: 2px solid;
        border-color: #fff;
        width: 130px;
        height: 130px;
        border-radius: 50%;
        padding-top: 23%;
    }
    .pricing_price_border .pricing_price h3{
        margin-bottom: 5px;
        font-size:2.822rem;
        font-weight: 600;
        font-family: 'Montserrat', sans-serif;
    }
    .pricing_price_border .pricing_price p{
        font-size:0.929rem;
    }
    .pricing_body{
        overflow: hidden;
    }
    .pricing_body ul{
        width:55%;
        margin: 0 auto;
    }
    .pricing_body ul li{
        line-height: 3rem;
    }
    .pricing_body ul li i{
        margin-right: 10px;
    }

    ul.cart-list{
        padding: 0 !important;
    }



    ul.cart-list > li{
        position: relative;
        border-bottom: solid 1px #efefef;
        padding: 15px 15px 23px 15px !important;
    }

    ul.cart-list > li > a.photo{
        padding: 0 !important;
        margin-right: 15px;
        float: left;
        display: block;
        width: 50px;
        height: 50px;
        left: 15px;
        top: 15px;
    }

    ul.cart-list > li img{
        width: 50px;
        height: 50px;
        border: solid 1px #efefef;
    }

    ul.cart-list > li > h6{
        margin: 0;
    }

    ul.cart-list > li > h6 > a.photo{
        padding: 0 !important;
        display: block;
    }

    ul.cart-list > li > p{
        margin-bottom: 0;
    }

    ul.cart-list > li.total{
        background-color: #f5f5f5;
        padding-bottom: 15px !important;
    }

    ul.cart-list > li.total > .btn{
        display: inline-block;
        border-bottom: solid 1px #efefef !important;
    }

    ul.cart-list > li .price{
        font-weight: bold;
    }

    ul.cart-list > li.total > span{
        padding-top: 8px;
    }

    /*
Separator
*/
    .separator_left{
        width:85px;
        height:2px;
        margin:20px 0px;
        background: #ff6863;
    }
    .separator_auto{
        width:85px;
        height:2px;
        margin:20px auto;
        background: #ff6863;
    }
    .separator_small{
        width:30px;
        height:2px;
        margin:20px 0px;
        background: #ff6863;
    }

    /*
Skill Section style
=======================*/

    /* Skill bar*/

    .teamskillbar {
        position:relative;
        display:block;
        margin-bottom:15px;
        width:100%;
        background: #f2f2f2;
        height:10px;
        -webkit-transition:0.4s linear;
        transition:0.4s linear;
        -webkit-transition-property:width, background-color;
        transition-property:width, background-color;
    }
    .teamskillbar h6{
        position: absolute;
        top:-25px;
        left:0;
    }
    .teamskillbar-bar {
        height:10px;
        width:0px;
        background:#ff6863;
        position: absolute;
        left:0px;
        top:0px;
    }


    .skill_bottom_content{}
    .skill_bottom_item .separator_small{
        margin: 20px auto;
    }


</style>

<div class="pricing_item sm-m-top-30">
    <div class="pricing_top_border"></div>
        <?php
        echo '<ul class="cart-list">';

            $subtotal = 0;
            if($this->StuffType !== 'SPECIAL')
            {
                foreach ($this->Stuff as $s_id => $Stuff) {
                    if (is_int($s_id) && $Stuff['how_many_stuff'] !== 0) {
                        ?>

                        <li>

                            <a href="#" class="photo">
                                <img class="cart-thumb" alt=""
                                     src="/public/uploads/enterprise/stuff/<?php echo $Stuff['stuff_id']; ?>/<?php echo $Stuff['photo_stuff']; ?>"
                                />
                            </a>
                            <h6>
                                <a href="#"><?php echo $Stuff['name_stuff']; ?></a>
                                <p><?php echo $Stuff['desc_stuff']; ?></p>
                                <div class="product-img pull-right">
                                <span
                                        id="item_how2_cart_<?php echo $e . '-' . $s_id; ?>"
                                        class="label label-danger"
                                >   <?php echo $Stuff['how_many_stuff']; ?>
                                </span>&nbsp;&nbsp;
                                <span
                                        id="item_how2_cart_<?php echo $e . '-' . $s_id; ?>"
                                        class="label label-danger"
                                >   <?php echo $Stuff['price_stuff']; ?>
                                </span>
                                </div>
                            </h6>

                        </li>
                        <?php
                        $final_price = $Stuff['price_stuff'] * $Stuff['how_many_stuff'];
                        $subtotal += $final_price;

                    }
                }
            }
            echo '</ul>';


    if($this->StuffType !== 'SPECIAL')
    {
    ?>
    <div class="pricing_body bg-white padding-20">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <h6>Comments</h6>
            <div class="form-group has-warning">
            <p>
                <?php echo (!empty($this->Order['notes_order'])) ? $this->Order['notes_order'] : 'No comments for this order...'; ?>
            </p>
            </div>
        </div>
        <div class="text-center">
            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="skill_bottom_item">

                    <h6><em>Cycler</em></h6>
                    <div class="separator_small"></div>

                    <h6 class="statistic-counter"><?php echo number_format($this->Order['total_vikers'], 2, '.', ','); ?></h6>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="skill_bottom_item">
                    <h6><em>Subtotal</em></h6>
                    <div class="separator_small"></div>
                    <h6 class="statistic-counter"><?php echo number_format($subtotal, 2, '.', ','); ?></h6>
                </div>
            </div>
            <?php
            $subtotal += $this->Order['total_vikers'];
            ?>

        </div>
    </div>
    <?php
    }else{
        ?>
        <div class="pricing_body bg-white padding-20">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <h6 style="color: #1f962d"><b>Name Place / Address</b></h6>
                <div class="form-group has-warning">
                    <p>
                        <?php echo $this->Order['special_delivery_where']; ?>
                    </p>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <h6 style="color: #1f962d">What do you want</h6>
                <div class="form-group has-warning">
                    <p>
                        <?php echo $this->Order['special_delivery']; ?>
                    </p>
                </div>
            </div>
            <div class="text-center">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="skill_bottom_item">

                        <h6><em>Cycler</em></h6>
                        <div class="separator_small"></div>

                        <h6 class="statistic-counter"><?php echo number_format($this->Order['total_viker'], 2, '.', ','); ?></h6>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="skill_bottom_item">
                        <h6><em>Subtotal</em></h6>
                        <div class="separator_small"></div>
                        <h6 class="statistic-counter"><?php echo number_format($subtotal, 2, '.', ','); ?></h6>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</div>