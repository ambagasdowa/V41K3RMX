<div class="row">
    <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-offset-1 col-xs-10">
        <div class="error-container row" >
            <div class="error-main">
                <div class="error-number">
                    <h3 class="text-center"><?php if($this->mensaje) echo $this->mensaje; ?></h3>
                </div>
                <br>
                <br>
                <?php if(!Session::get('autenticado') && !Session::get('lock')): ?>
                    <div class="row">
                        <p class="text-center">
                            <a class="btn btn-success" href="<?php echo BASE_URL . 'login'; ?>">Login</a>
                        </p>

                    </div>
                <?php else:?>
                    <div class="error-description" >
                        The page your looking for is not here<br>
                    </div>
                    <div class="error-description-mini">
                        <a href="<?php echo BASE_URL; ?>">Home</a>
                    </div>

                    <br>
                <?php endif; ?>

            </div>
            <br>
        </div>
    </div>
</div>