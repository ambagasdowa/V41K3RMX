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
    <div class="col-md-6">
        <div id="mapCanvas"></div>
    </div>
    <div class="col-md-6">
        <form id="order_data" action="" method="post" role="form">
            <div id="infoPanel">
                <div id="markerStatus" style="font-size: 14px;color:#00a65a"><i>Click and Drag the Marker.</i></div>
                <!--<b>Current position:</b>-->
                <input type="hidden" id="info"/>
                <input type="hidden" id="geo_lat" name="geo_lat"/>
                <input type="hidden" id="geo_lng" name="geo_lng"/>
                <input type="hidden" id="street" name="street"/>
                <b>Closest Matching Address:</b>
                <div id="address"></div>
                <b>References:</b>
                <div class="form-group">
                    <input type="text" name="number_ext" id="number_ext" class="form-control" placeholder="Outdoor Number" value="">
                </div>
                <div class="form-group">
                    <input type="text" name="number_int" id="number_int" class="form-control" placeholder="Interior Number" value="">
                </div>
                <div class="form-group">
                    <textarea class="form-control" id="frontage_desc"  name="frontage_desc" rows="3" placeholder="Describe Frontage"></textarea>
                </div>

            </div>
        </form>
        <div class="row" style="padding-bottom: 20px;" id="htmlCosts">

        </div>
        <div class="row" style="padding-bottom: 20px;" id="htmlPayment">

        </div>
        <div class="row" style="padding-bottom: 20px;">
            <div style="text-align: center;">

                <a href="#" id="shipping_costs" class="btn btn-primary" onclick="determinateCostsCycler();">Shipping Costs!!</a>
            </div>
        </div>
        <br/>
        <br/>

    </div>
<script>
    window.onload = function(){
        initMap();
    }
</script>