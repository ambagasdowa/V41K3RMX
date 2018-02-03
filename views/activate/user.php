<?php
/**
 * Created by PhpStorm.
 * User: cyberio
 * Date: 3/22/17
 * Time: 1:39 PM
 */
?>
<section id="hello" class="home bg-mega">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="main_home">
                <div class="home_text text-center">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="panel panel-login">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <a href="#" class="active" id="login-form-link">Login</a>
                                    </div>

                                </div>
                                <hr>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <?php
                                        if (isset($this->msg))
                                        {
                                        ?>
                                            <div class="text-center m-t-50">
                                                <img src="/public/assets/images/logo_mini.png">
                                                <h3 class="text-center"><?php echo $this->msg; ?></h3>
                                            </div>
                                            <hr class="hr-green">
                                            <div class="m-t-30 m-b-50 ">
                                        <?php
                                        }

                                        if (isset($this->form) && $this->form == 1)
                                        {
                                        ?>
                                            <form id="login-form" action="/login" method="post" role="form" style="display: block;">

                                            <div class="form-group">
                                                <input type="text" name="email" id="email" tabindex="1" class="form-control" placeholder="Username (E-mail)" value="">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                                            </div>
                                            <!--<div class="form-group text-center">
                                                <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                                                <label for="remember"> Remember Me</label>
                                            </div>-->
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-6 col-sm-offset-3">
                                                        <input type="hidden" name="submitButton" value="1">
                                                        <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-primary" value="Login">
                                                    </div>
                                                </div>
                                            </div>

                                            </form>
                                        <?php
                                        }
                                        ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div><!--End off row-->
    </div><!--End off container -->
</section>



