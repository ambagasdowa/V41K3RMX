<style>
    #mapCanvas {
        width: 100%;
        height: 350px;
        /*float: left;*/
    }

    #infoPanel {
        float: center;
        margin-left: 10px;
    }

    #infoPanel div {
        margin-bottom: 5px;
    }
</style>

<div id="panel">
    <!--<input id="city_country" type="textbox" value="Berlin, Germany">-->
    <!--<input type="button" value="Locate Me" onclick="initMap()">-->
</div>
    <div class="col-md-12">
        <div class="about_content">
            <h1 class="text-center wow rubberBand animated animated" style="color: #f0ad4e" >Want anything from other place?</h1>
        </div>
        <div class="separator_auto"></div>
        <div id="markerStatus" style="font-size: 14px;color:#00a65a"><i>If this is not your current location, click and drag the marker...</i></div>
        <div id="mapCanvas" ></div>


        <form id="order_data" action="" method="post" role="form">
            <div id="infoPanel" class="wow bounceIn animated animated">

                <!--<b>Current position:</b>-->
                <input type="hidden" id="info"/>
                <input type="hidden" id="geo_lat" name="geo_lat"/>
                <input type="hidden" id="geo_lng" name="geo_lng"/>
                <input type="hidden" id="street" name="street"/>
                <input type="hidden" id="total_viker" name="total_viker" value="<?php echo SCYCLER;?>"/>
                <b style="color: #1f962d">Closest Matching Address:</b>
                <div id="address" style="color: #1f962d"></div>
                <hr/>
                <label><h5 style="color: #f0ad4e">Complete your Address:</h5></label>

                <div class="form-group">
                    <input type="text" name="geo_ext" id="geo_ext" class="form-control" placeholder="Outdoor Number" value="">
                </div>
                <div class="form-group">
                    <input type="text" name="geo_int" id="geo_int" class="form-control" placeholder="Interior Number" value="">
                </div>

                <hr/>
                <div class="form-group">
                    <label><h5 style="color: #dd4b39">Tell us where you want us to pick up your stuff...</h5></label>
                    <input type="text" name="special_delivery_where" id="special_delivery_where" class="form-control" placeholder="Name of the place or pick-up address" value="">
                </div>
                <div class="form-group">
                    <textarea class="form-control text4rea" id="special_delivery"  name="special_delivery" rows="3" placeholder="Describe what do you want..."></textarea>
                </div>

            </div>
        </form>
        <div class="row" style="padding-top: 50px;">
            <div style="text-align: center;">
                <a id="shipping_costs" class="btn btn-success wow fadeInUp animated animated" style="color: white" onclick="oSpecialDelivery();">ORDER NOW!!</a>

            </div>
        </div>
        <div class="separator_auto"></div>

    </div>

<script>
    window.onload = function(){
        initMap();
    }
</script>