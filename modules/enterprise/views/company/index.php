
<input type="hidden" id="user_id" value="<?php echo Session::get('user_id')?>">
<input type="hidden" id="enterprise_id" value="">
<div class="col-md-12" id="enterprise_results">
    <?php
        require_once $params['templates'][0];
    ?>
</div><div class="col-md-12" id="orders_results">

</div>