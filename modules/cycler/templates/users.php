
<div class="grid simple">
    <div class="grid-title no-border">
        <div class="row" id="content-users">

            <h2 class="text-center">Members</h2>


            <div class="col-lg-3">
                <div class="input-group">
                    <input class="form-control" type="text" id="search-by-id"
                           placeholder="Search by Member ID" value="<?php if(isset($this->mid)) { echo $this->mid; }?>"
                           onkeyup="getMember();"
                    >
                   <span class="input-group-addon warning">
                   <span class="arrow"></span>
                    <i class="fa fa-align-justify"></i>
                   </span>
                </div>
            </div>

            <div class="col-lg-9">
                <button class="btn btn-orange pull-right " data-toggle="modal" data-target="#upgrade-modal">Memberships</button>

            </div>

            <div class="col-lg-12 text-center paginacion">
                <?php if(isset($this->paginacion)){ echo $this->paginacion;} ?>
            </div>

            <div class="col-lg-12">

                <table class="table no-more-tables users-table">
                    <thead>
                    <tr>

                        <!--<th width="10%">Avatar</th>-->
                        <th>Member ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Summary</th>
                        <th>Membership</th>
                        <th width="23%" class="text-right">Actions</th>

                    </tr>
                    </thead>

                    <tbody id="main_users_list">
                    <?php
                    include_once(ROOT.'modules/enterprise/templates/users-data.php');
                    ?>
                    </tbody>
                </table>
            </div>


        </div>

        <div class="row text-center paginacion"  >
            <?php if(isset($this->paginacion)){ echo $this->paginacion;} ?>
        </div>
    </div>
</div>
<script>
    $("#search-by-id").focus();
</script>