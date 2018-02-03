<div class="scrollup">
    <a href="#"><i class="fa fa-chevron-up"></i></a>
</div>
<!--<footer id="footer" class="footer bg-black navbar-fixed-bottom">
    <div class="container">
        <div class="row">
            <div class="main_footer text-center p-top-40 p-bottom-30">
                <p class="wow fadeInRight" data-wow-duration="1s">
                    Copyright  ©
                    <a href="http://viker.mx">
                    viker.mx
                    </a>
                </p>
            </div>
        </div>
    </div>
</footer>-->
<footer id="footer" class="footer bg-black">
    <div class="container">
        <div class="row">
            <div class="main_footer text-center p-top-40 p-bottom-30">
                <p class="wow fadeInRight animated" data-wow-duration="1s" style="visibility: visible; animation-duration: 1s; animation-name: fadeInRight;">


                    All Rights Reserved
                    © <a>viker.mx</a> 2017
                </p>
            </div>
        </div>
    </div>
</footer>
<!-- scroll up-->


<!-- End off scroll up -->

<!--<div class="text-center copyright panel-footer navbar-fixed-bottom bg-black">Copyright  © <a href="http://viker.mx" target="_blank">viker.mx</a></div>-->
</div> <!--culmn -->
<!-- JS includes -->

<script src="/public/assets/js/slick.min.js"></script>
<script src="/public/assets/js/jquery.collapse.js"></script>
<script src="/public/assets/js/bootsnav.js"></script>


<!-- paradise slider js -->

<script src="/public/assets/js/plugins.js"></script>
<script src="/public/assets/js/main.js"></script>
<!--<script src="/public/assets/js/notify.js"></script>-->

<script src="<?php echo $params['public_js'] ?>modals.js"></script>
<script src="/public/assets/script.js"></script>


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
<div class="modal fade" id="modal_master" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h6 id="modal_title"></h6>
            </div>
            <div class="modal-body" id="content_modal"></div>
            <div class="modal-footer">

                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

</body>

</html>


