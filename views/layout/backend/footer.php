            </div>
        </div>
    </div>
</div>

            <!-- Master Modal -->

<div class="modal fade" id="modal_master" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h6 id="modal_title"></h6>
            </div>
            <div class="modal-body" id="content_modal"></div>
            <div class="modal-footer">

                <button type="button" class="btn btn-default bg-yellow" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo BASE_URL?>public/js/jquery.validate.js"></script>

<!--[if lt IE 9]> -->
<script src="<?php echo $params['public_plugins'] ?>respond.js"></script>
<![endif]-->

<!-- BEGIN JS PLUGINS -->
<!--<script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.0/jquery-ui.js"></script>-->
<script src="<?php echo $params['public_plugins'] ?>bootstrap-wysihtml5/wysihtml5-0.3.0.min.js" type="text/javascript"></script>
<script src="<?php echo $params['public_plugins'] ?>bootstrap-wysihtml5/bootstrap-wysihtml5.min.js" type="text/javascript"></script>
<script src="<?php echo $params['public_plugins'] ?>jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
<!--<script src="//cdnjs.cloudflare.com/ajax/libs/lodash.js/3.5.0/lodash.min.js"></script>-->
<!--<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>-->
            <!-- Bootstrap Core JavaScript -->
            <script>$.widget.bridge('uitooltip', $.ui.tooltip);</script>
            <script src="<?php echo $params['public_plugins'] ?>bootstrap/js/bootstrap.min.js"></script>
            <script src="<?php echo $params['public_plugins'] ?>bootstrap-modal/js/bootstrap-modal.js"></script>
            <script src="<?php echo $params['public_plugins'] ?>bootstrap-modal/js/bootstrap-modalmanager.js"></script>
            <script src="<?php echo $params['public_plugins'] ?>bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>



<script src="<?php echo $params['public_plugins'] ?>breakpoints.js" type="text/javascript"></script>
<script src="<?php echo $params['public_plugins'] ?>jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
<script src="<?php echo $params['public_plugins'] ?>jquery-lazyload/jquery.lazyload.min.js" type="text/javascript"></script>
<script src="<?php echo $params['public_plugins'] ?>jquery-scrollbar/jquery.scrollbar.min.js" type="text/javascript"></script>
<script src="<?php echo $params['public_plugins'] ?>jquery-notifications/js/messenger.min.js" type="text/javascript"></script>
<script src="<?php echo $params['public_plugins'] ?>jquery-notifications/js/messenger-theme-future.js" type="text/javascript"></script>
<script src="/public/assets/js/plugins.js"></script>
<script src="/public/assets/script.js"></script>


<!--content builder-->
<script src="<?php echo $params['public_plugins'] ?>content-builder/scripts/contentbuilder.js" type="text/javascript"></script>
<script src="<?php echo $params['public_plugins'] ?>content-builder/scripts/saveimages.js" type="text/javascript"></script>
<!--content builder-->

<!-- Latest compiled and minified JavaScript -->
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.0/bootstrap-table.min.js"></script>


<script type="text/javascript" src="/views/layout/frontend/js/flexslider/jquery.flexslider-min.js"></script>


<script src="<?php echo $params['public_js'] ?>jquery.confirm.js"></script>
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN CORE TEMPLATE JS -->
<script src="<?php echo $params['layout_js'] ?>core.js" type="text/javascript"></script>

            
<!--SERVER-->            
            
<script src="<?php echo $params['public_js'] ?>modals.js"></script>
<!--<script src="<?php /*echo $params['public_js'] */?>server.js"></script>-->
<script src="<?php echo $params['public_js'] ?>task.js"></script>
            

 <!--END SERVER-->            
            
<?php

if($params['plugins_js'])
{
    foreach($params['plugins_js'] as $script )
    {
        ?>
        <script src="<?php echo $script ?>" type="text/javascript"></script>
        <?php
    }
}

if($params['js'])
{
    foreach($params['js'] as $js )
    {
        ?>
        <script src="<?php echo $js ?>" type="text/javascript"></script>
        <?php
    }
}

if($params['public_scripts'])
{
    foreach($params['public_scripts'] as $script )
    {
        ?>
        <script src="<?php echo $script ?>" type="text/javascript"></script>
        <?php
    }
}

if($params['private_scripts'])
{
    foreach($params['private_scripts'] as $script )
    {
        ?>
        <script src="<?php echo $script ?>" type="text/javascript"></script>
        <?php
    }
}

?>



            <script type="text/javascript">
    $(document).ready(function () {
        $('.popover-content').scrollbar();
        $('[data-toggle="tooltip"]').tooltip();




    });

    
</script>

<!-- END CORE TEMPLATE JS -->


</body>
</html>