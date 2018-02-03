<div class="col-xs-12 col-lg-12 ">
    <div class="box box-success">
        <div class="box-header with-border">
            <i class="fa fa-user-o"></i><h1 class="box-title">Customer Profile</h1>
        </div>
        <div class="box-body">
            <h5>General Data</h5>
            <div class="col-lg-6">
            <label>First Name</label>

            <div class="input-group">
                <input type="text" class="form-control"
                    placeholder="First Name"
                    value="<?php echo $this->Customer['first_name'];?>"
                >
                <span class="input-group-addon"><i class="fa fa-user-o"></i></span>
            </div>
            </div>
            <div class="col-lg-6">
            <label>Last Name</label>

            <div class="input-group">
                <input type="text" class="form-control"
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
                    <input type="password" class="form-control"
                           placeholder="Password"
                           value="<?php echo $this->Customer['password_clean'];?>"
                    >
                    <span class="input-group-addon"><i class="fa fa-eye-slash"></i></span>
                </div>
            </div>

        </div>
        <br/>

        <!-- /.box-body -->
    </div>


    <div class="box box-warning">
        <div class="box-header with-border">
            <i class="fa fa-camera-retro"></i><h1 class="box-title">Photo Profile</h1>
        </div>
        <div class="box-body">
            <div class="col-lg-8">

                <div id="import_weeks_content">
                    <div class="panel panel-danger" style="background-color: white">
                        <div class="panel-heading">Profile Photo</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <input id="photo_profile" name="photo_profile[]" type="file" multiple class="file-loading">
                                    <div id="errorBlock" class="help-block"></div>
                                </div>
                            </div>
                            <div class="row">
                                <a id="import_db" onclick="importWeeks();" class="btn btn-danger-dark pull-right" style="margin-right: 15px;display: none">
                                    Import to DB &nbsp;&nbsp;<i class="fa fa-paper-plane"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <?php
                require_once $params['templates'][0];
                ?>
            </div>
        </div>
    </div>
</div>




<script>
window.onload = function()
{
    //setImportFile(<?php echo $this->customerID;?>);
    setFileInputProfile(<?php echo $this->customerID;?>);
};
    </script>