<form>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">

            <?php
            $address = (!empty($this->Enterprise['geo_str'])) ? $this->Enterprise['geo_str'] : 'Playa del Carmen, México';
            ?>

                <h3>Address-Details</h3>
                <a id="reset" href="#" style="display:none;">Reset Marker</a>
                <input id="lat" name="lat" type="text" value="<?php echo $this->Enterprise['geo_lat'];?>">
                <input id="lng" name="lng" type="text" value="<?php echo $this->Enterprise['geo_lng'];?>">
                <input id="formatted_address" name="formatted_address" type="hidden"  class="form-control" value="">

            <div class="form-group">
                <div class="input-group input-group">
                    <input id="geocomplete" type="text"  class="form-control" placeholder="Type in an address" value="<?php echo $address;?>" />
                    <span class="input-group-btn">
                        <button id="find"  type="button" class="btn btn-warning btn-flat">Search Address</button>
                    </span>
                </div>
            </div>
            <div class="col-lg-4 col-md-3 col-xs-6">
            <div class="form-group">
                <label>Street Number</label>
                <input name="street_number" type="text" class="form-control" placeholder="Outdoor Number"  value="">
            </div>
            </div>
            <div class="col-lg-4 col-md-4 col-xs-6">
            <div class="form-group">
                <label>Postal Code</label>
                <input name="postal_code" type="text"  class="form-control" value="" readonly>
            </div>
            </div>
            <div class="col-lg-4 col-md-4 col-xs-4">
                <div class="form-group">
                    <a class="btn btn-app pull-right" onclick="updateAddressE();"><i class="fa fa-save"></i> Save</a>
                </div>
            </div>

        </div>
    </div>
    <div class="row">

    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="map_canvas" style="height:400px;width: 100%"></div>
    </div>
    </div>

    <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="form-group">
                <label>Locality</label>
                <input name="locality" type="text"  class="form-control" value="" readonly>
            </div>
            </div>
            <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="form-group">
                <label>Country</label>
                <input name="country" type="text"  class="form-control" value="" readonly>
            </div>
            </div>
            <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="form-group">
                <label>Country Code</label>
                <input name="country_short" type="text"  class="form-control" value="" readonly>
            </div>
            </div>
            <div class="col-lg-12 col-md-3 col-xs-12">
            <div class="form-group">
                <label>State</label>
                <input name="administrative_area_level_1" class="form-control"  type="text" value="" readonly>
            </div>
            </div>
    </div>

    </form>
</div>


<script>
    $(function(){
        var latLng = new google.maps.LatLng(<?=$this->Enterprise['geo_lat'];?>,<?=$this->Enterprise['geo_lng'];?>);
        $("#geocomplete").geocomplete({
            map: ".map_canvas",
            mapOptions: {
                zoom: 18
            },
            markerOptions: {
                draggable: true
            },
            details: "form",

        });




        $("#geocomplete").bind("geocode:dragged", function(event, latLng){
            $("input[name=lat]").val(latLng.lat());
            $("input[name=lng]").val(latLng.lng());
        });


        $("#reset").click(function(){
            $("#geocomplete").geocomplete("resetMarker");
            return false;
        });

        $("#find").click(function(){
            $("#geocomplete").trigger("geocode");
        }).click();



    });


</script>
