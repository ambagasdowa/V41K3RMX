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
<div class="row">
    <div class="col-md-6"  style="padding-left: 30px">
        <div class="about_content">
            <h2 class="text-center wow rubberBand animated animated" style="color: #dd4b39"> Want anything from other place?</h2>
            <div class="separator_auto" ></div>
            <p class="text-justify" >
                Anything you need from other unlisted restaurant or from any other store. 
                Write down what you want and drag the pin in the map where you want us to 
                pick up your stuff. 
            </p>

        </div>
        <br/><br/>
        <div id="mapCanvas"></div>
        <div class="separator_auto" ></div>
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <a href="/login"><input type="button" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-success wow rubberBand animated animated" style="color: white" value="LOGIN NOW!!"></a>
            </div>
        </div>
        <br/>

    </div>
    <div class="col-md-6" style="padding: 30px;">
        <div class="panel panel-login">
            <div class="panel-heading">
                <div class="row">
                    <div class="text-center m-t-50  wow bounceInRight animated animated">
                        <img src="/public/img/special_delivery.png">
                    </div>
                </div>


                <hr>
            </div>
            <div class="panel-body">
                <div class="row">

                    <div class="col-lg-12 wow swing animated animated">

                        <form id="register-form" action="" method="post" role="form" >

                            <input type="hidden" name="type" id="type" value="2">
                            <div class="form-group">
                                <input type="text" name="first_name" id="first_name" tabindex="1" class="form-control reg_info" placeholder="First Name" value="">
                            </div>
                            <div class="form-group">
                                <input type="text" name="last_name" id="last_name" tabindex="1" class="form-control reg_info" placeholder="Last Name"  >
                            </div>
                            <div class="form-group">
                                <input type="text" name="phone_number" id="phone_number" tabindex="1" class="form-control reg_info" placeholder="Phone Number"  maxlength="10" onKeyPress="return onlyNum(event)" value="">
                            </div>

                            <div class="form-group">
                                <input type="text" name="email" id="email" tabindex="1" class="form-control reg_info" placeholder="Email Address" value="" >
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" id="password" tabindex="2" class="form-control reg_info" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control reg_info" placeholder="Confirm Password">
                            </div>

                            <div class="form-group">

                                </br>
                                <div class="row">
                                    <div class="col-sm-6 col-sm-offset-3">
                                        <input type="button" onclick="profileRequest();" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-danger  wow fadeInUp animated animated" value="Send Request!!">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    window.onload = function(){

        initMap();
        $("#mapCanvas").css("pointer-events", "none");
        activeRegisterForm();

        $("#phone_number").mask("(999) 999-9999");
    }
</script>

