<?php
/**
 * Created by PhpStorm.
 * User: cyberio
 * Date: 21/03/17
 * Time: 11:20 PM
 */
?>
<section id="order_stuff" class="portfolio ">
    <div class="container">
        <div class="row">
            <div class="main_portfolio roomy-100">
                <div class="col-md-8 col-md-offset-2">
                    <div class="head_title text-center">
                        <h3 class="animated fadeInDown">CHOOSE AN ORDER TO DELIVERY STUFF</h3>
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

                                <?php
                                require_once $params['templates'][0];
                                ?>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div><!--End off row -->
    </div><!--End off container -->
</section>
<input type="hidden" name="enterprise" id="enterprise" value="<?php echo $this->e_id?>"/>

