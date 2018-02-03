<?php
#$this->pr($this->Enterprise);
?>
<div class="row">
<div class="col-xs-12 col-lg-6">

    <div class="box box-success">
        <div class="box-header with-border">
            <i class="fa fa-user-o"></i><h1 class="box-title">Customer Profile</h1>
        </div>
        <div class="box-body">
            <input id="user_id" type="hidden" value="<?php echo $this->Customer['user_id'];?>">
            <input id="enterprise_id" type="hidden" value="<?php echo $this->enterpriseID;?>">
            <div class="col-lg-6">

            <label>First Name</label>

            <div class="input-group">
                <input type="text" class="form-control" f="first_name" onchange="updateProfileU(this)"
                    placeholder="First Name"
                    value="<?php echo $this->Customer['first_name'];?>"
                >
                <span class="input-group-addon"><i class="fa fa-user-o"></i></span>
            </div>
            </div>
            <div class="col-lg-6">
            <label>Last Name</label>

            <div class="input-group">
                <input type="text" class="form-control" f="last_name" onchange="updateProfileU(this)"
                   placeholder="Last Name"
                   value="<?php echo $this->Customer['last_name'];?>"
                >
                <span class="input-group-addon"><i class="fa fa-user-o"></i></span>
            </div>
            </div>
            <div class="col-lg-6">
                <label>Username</label>
                <div class="input-group">
                    <input type="text" class="form-control"
                           placeholder="Username"
                           value="<?php echo $this->Customer['username'];?>"
                           readonly>
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                </div>
            </div>
            <div class="col-lg-6">
                <label>Password</label>

                <div class="input-group">
                    <input type="text" class="form-control" f="password_clean" onchange="updateProfileU(this)"
                           placeholder="Password"
                           value="<?php echo $this->Customer['password_clean'];?>"
                    >
                    <span class="input-group-addon"><i class="fa fa-eye-slash"></i></span>
                </div>
            </div>
        </div>
        <br/>
    </div>
</div>
<div class="col-xs-12 col-lg-6">
    <div class="box box-warning">
        <div class="box-header with-border">
            <i class="fa fa- fa-building-o"></i><h1 class="box-title">Your Enterprise</h1>
        </div>
        <div class="box-body">
            <div class="col-lg-12">
                <label>Company Name</label>

                <div class="input-group">
                    <input type="text" class="form-control"
                           placeholder="First Name"
                           value="<?php echo $this->Enterprise['name_enterprise'];?>" readonly>
                    <span class="input-group-addon"><i class="fa fa-user-o"></i></span>
                </div>
            </div>
            <div class="clear"></div>
            <div class="col-lg-6">
                <label>Hour Open</label>

                <div class="input-group clockpicker">
                    <input  type="text"  id="hour_ini"
                            f="hour_ini"
                            class="form-control"  onchange="updateProfileE(this)""
                            value="<?php echo $this->Enterprise['hour_ini'];?>">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-time"></span>
                    </span>
                </div>
            </div>
            <div class="col-lg-6">
                <label>Hour Close</label>

                <div class="input-group clockpicker">
                    <input  type="text"  id="hour_end"
                            f="hour_end"
                            class="form-control" onchange="updateProfileE(this)"
                            value="<?php echo $this->Enterprise['hour_end'];?>">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-time"></span>
                    </span>
                </div>
            </div>
        </div>
        <br/>
    </div>
</div>
</div>
<div class="row">
    <div class="col-xs-12 col-lg-6">
        <div class="box box-danger">
            <div class="box-header with-border">
                <i class="fa fa-connectdevelop"></i><h1 class="box-title">Logo Enterprise</h1>
            </div>
            <div class="box-body">
                <div class="col-lg-12">
                    <?php
                    require_once $params['templates'][0];
                    ?>
                </div>
                <div class="col-lg-12">
                    <div>
                        <div class="panel panel-danger" style="background-color: white">
                            <div class="panel-heading">Change Logotype</div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <input id="photo_profile" name="photo_profile[]" type="file" multiple class="file-loading">
                                        <div id="errorBlock" class="help-block"></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <br/>
        </div>
    </div>
    <div class="col-xs-12 col-lg-6">
        <div class="box box-comments">
            <div class="box-header with-border">
                <i class="fa  fa-map-marker"></i><h1 class="box-title">Change Address</h1>
            </div>
            <div class="box-body">
                <div class="col-lg-12">
                    <label class="pull-right">Drag the marker for the new address</label>

                    <?php
                    require_once $params['templates'][1];
                    ?>
                </div>
                <div class="clear"></div>
            </div>
            <br/>
        </div>
    </div>
</div>

<script>
    window.onload = function()
    {
        //setImportFile(<?php echo $this->customerID;?>);
        setFileInputProfile(<?php echo $this->Enterprise['enterprise_id'];?>);
        $('.clockpicker').clockpicker({
            placement: 'bottom',
            align: 'left',
            autoclose: true
        });
    };
</script>