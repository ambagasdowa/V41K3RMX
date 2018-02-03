    <style type="text/css">
        #map-canvas {
            width: 100%;
            height: 350px;
            /*float: left;*/
        }

    </style>
    <div class="row">


    <div id="map-canvas"></div>
    <div id="markerStatus" style="font-size: 14px;color:#00a65a"><i>If this is not your current location, click and drag the marker...</i></div>
    <div id="address" style="color: #1f962d"></div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-xs-6">
            <div class="form-group">
                <label>Street Number</label>
                <input name="geo_ext" id="geo_ext" type="text" class="form-control" placeholder="Outdoor Number"  value="<?php echo $this->Enterprise['geo_int']?>">
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-xs-6">
            <div class="form-group">
                <label>Interior Number</label>
                <input name="geo_int" id="geo_int" type="text" class="form-control" placeholder="Outdoor Number"  value="<?php echo $this->Enterprise['geo_ext']?>">
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="form-group">
                <?php
                $address = (!empty($this->Enterprise['geo_str'])) ? $this->Enterprise['geo_str'] : 'Playa del Carmen, México';
                ?>
                <div class="input-group input-group">
                    <input id="geo_str" name="geo_str" type="text"  class="form-control" value="<?php echo $address;?>" readonly/>
                    <span class="input-group-btn">
                    <button  onclick="updateAddressE();" id="find"  type="button" class="btn btn-warning btn-flat">Save</button>
                </span>
                </div>
            </div>
        </div>
        <input id="geo_lat" name="geo_lat" type="hidden" value="<?php echo $this->Enterprise['geo_lat'];?>">
        <input id="geo_lng" name="geo_lng" type="hidden" value="<?php echo $this->Enterprise['geo_lng'];?>">
    </div>
<script>

    var geocoder;

    function geocodePosition(pos)
    {
        geocoder.geocode({
            latLng: pos
        }, function(responses) {
            if (responses && responses.length > 0) {
                updateMarkerAddress(responses[0].formatted_address);
            } else {
                updateMarkerAddress('Cannot determine address at this location.');
            }
        });
    }

    function updateMarkerStatus(str)
    {
        document.getElementById('markerStatus').innerHTML = str;
    }

    function updateMarkerPosition(latLng)
    {
        $('#geo_lat').val(latLng.lat());
        $('#geo_lng').val(latLng.lng());
    }

    function updateMarkerAddress(str)
    {
        document.getElementById('address').innerHTML = str;
        $('#street').val(str);
        $('#geo_str').val(str);
    }

    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
            'Error: The Geolocation service failed.' :
            'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
    }


    function initialize() {
        geocoder = new google.maps.Geocoder();
        var latLng = new google.maps.LatLng(<?=$this->Enterprise['geo_lat'];?>,<?=$this->Enterprise['geo_lng'];?>);
        var map = new google.maps.Map(document.getElementById('map-canvas'), {
            zoom: 15,
            center: latLng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });
        var marker = new google.maps.Marker({
            position: latLng,
            title: 'Draggable Marker',
            map: map,
            draggable: true
        });

        /*// Update marker position txt.
        updateMarkerPositionTxt(latLng);

        // Add dragging event listeners.
        google.maps.event.addListener(marker, 'dragstart', function() {
            updateMarkerStateTxt('Dragging start...');
        });

        google.maps.event.addListener(marker, 'drag', function() {
            updateMarkerStateTxt('Dragging...');
            updateMarkerPositionTxt(marker.getPosition());
        });

        google.maps.event.addListener(marker, 'dragend', function() {
            updateMarkerStateTxt('Drag ended');
        });

        google.maps.event.addListener(marker, 'dragstart', function() {
            updateMarkerAddress('Dragging...');
        });*/
        updateMarkerPosition(latLng);
       // geocodePosition(marker.getPosition());

        // Add dragging event listeners.
        google.maps.event.addListener(marker, 'dragstart', function() {
            updateMarkerAddress('Dragging...');
        });

        google.maps.event.addListener(marker, 'drag', function() {
            updateMarkerStatus('Dragging...');
            updateMarkerPosition(marker.getPosition());
        });

        google.maps.event.addListener(marker, 'dragend', function() {
            updateMarkerStatus('New Address found:');
            geocodePosition(marker.getPosition());
            map.panTo(marker.getPosition());
        });

        google.maps.event.addListener(map, 'click', function(e) {
            updateMarkerPosition(e.latLng);
            geocodePosition(marker.getPosition());
            marker.setPosition(e.latLng);
            map.panTo(marker.getPosition());
        });

    }

    // Onload handler to fire off the app:
    google.maps.event.addDomListener(window, 'load', initialize);
</script>