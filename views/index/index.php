<section id="hello" class="home bg-mega">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="main_home">
                <div class="home_text text-center">
                    <div class="col-lg-12 col-xs-12" style="text-align: center;">
                        <div class='animatedParent' data-sequence='500' >
                            <img class="hidden-xs image-responsive animated growIn slower go" style="width: 30%" src="/public/img/logo_open.png" alt="" />
                            <img class="visible-xs image-responsive text-center animated growIn slower go" style="width: 100%;text-align: center;" src="/public/img/logo_open.png" alt="" />
                        </div>

                    </div>

                    <div class='buttons-inline animated fadeInUp slower' data-id='4'>
                        <?php
                        $href = (Session::get('autenticado') == 1) ? '/logout' : '/login';
                        $label_href = (Session::get('autenticado') == 1) ? 'Logout' : 'Login';
                        ?>
                        <a class='btn btn-default ' href='<?php echo $href;?>'><?php echo $label_href; ?></a>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div><!--End off row-->
    </div><!--End off container -->
</section>
<!--End off Home Sections-->
<section id="emissions" class="about" style="background-color: #EEEEEE;padding-top:5px;">
    <div class="row">

        <div class="skill_bottom_content text-center">
            <div class="col-md-4">
                <div class="skill_bottom_item">
                    <h2 class="statistic-counter  label-success text-white"><?php echo $this->Emissions;?></h2>
                    <div class="separator_small"></div>
                    <h5><em>Emissions (CO<sub>2</sub>)</em></h5>
                </div>
            </div>

            <div class="col-md-4">
                <div class="skill_bottom_item">
                    <h2 class="statistic-counter   label-warning text-white">0</h2>
                    <div class="separator_small"></div>
                    <h5><em>Gasoline Saved</em></h5>
                </div>
            </div>
            <div class="col-md-4">
                <div class="skill_bottom_item">
                    <h2 class="statistic-counter   label-danger text-white"><?php echo $this->total_distance;?></h2>
                    <div class="separator_small"></div>
                    <h5><em>Kms. Traveled</em></h5>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="stuff" class="portfolio">

    <div class="container">
        <div class="row">
            <div class="main_portfolio" style="padding: 30px;">
                <div class="col-md-8 col-md-offset-2">
                    <div class="head_title text-center">
                        <h3 class="wow fadeInDown animated animated">CHOOSE YOUR FAVORITE RESTAURANT</h3>

                        <div class="separator_auto"></div>

                    </div>
                </div>

                <div class="portfolio_content">
                    <div class="col-md-12 m-top-30">
                        <?php

                        foreach($this->Enterprise as $E)
                        {
                            ?>
                            <div class="col-md-4">
                                <a href="/menu/showMenu/<?php echo $E['enterprise_id'];?>">
                                    <div class="pricing_item blog_item m-top-20">
                                        <div class="blog_item_img" style="border: solid; border-width: 1px;color:#DDDDDD;">
                                            <img src="/public/uploads/enterprise/profile/<?php echo $E['enterprise_id'];?>/profile.jpg" alt="" />
                                        </div>
                                        <div class="pricing_text roomy-40 text-center">
                                            <h6><?php echo strtoupper($E['name_enterprise']);?></h6>
                                            <p><em><a href=""></a><?php echo $E['category'];?></em></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<section id="special" class="roomy-30-10">
    <div class="container">
        <div class="row pricing_item" style=" background-color: #EEEEEE;padding-top: 30px;">
            <?php
            if(Session::get('autenticado'))
            {
                require_once $params['templates'][0];
            }else{
                require_once $params['templates'][1];
            }
            ?>
        </div>
    </div>
</section>
<section id="about" class="skill" style="padding: 40px;">
    <div class="container">
        <div class="row">
            <div class="main_skill">
                <div class="col-md-6">
                    <div class="skill_content wow fadeIn animated" style="visibility: visible; animation-name: fadeIn;">
                        <h2 class="wow lightSpeedIn animated animated">FOOD IS OUR FUEL</h2>
                        <div class="separator_left"></div>

                        <p class="text-justify wow fadeInLeft animated animated">
                            Worried for the environment, we decided to run this business 
                            riding bicycles instead of scooters or motorcycles. 
                            The only fuel burned by us is food and the only CO2 
                            emitted is...forget about it. We exist because we want to 
                            make people aware of the ecological footprint our lifestyle 
                            brings to table, let’s be kind to our home, Planet Earth.
                        </p>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="skill_bar sm-m-top-50 wow slideInRight animated animated">

                        <div class="teamskillbar clearfix m-top-20 " data-percent="70%">
                            <h6>HAPPY CLIENTS</h6>
                            <div class="teamskillbar-bar" style="width: 70%;"></div>
                        </div> <!-- End Skill Bar -->

                        <div class="teamskillbar clearfix m-top-50" data-percent="90%">
                            <h6>GREAT SERVICES</h6>
                            <div class="teamskillbar-bar" style="width: 90%;"></div>
                        </div> <!-- End Skill Bar -->


                        <div class="teamskillbar clearfix m-top-50" data-percent="35%">
                            <h6>RECORD EMISSIONS</h6>
                            <div class="teamskillbar-bar" style="width: 35%;"></div>
                        </div> <!-- End Skill Bar -->


                    </div>
                </div>
            </div>
        </div><!--End off row-->
    </div><!--End off container -->

</section>
<!--Enterprise Section-->

<section class="skill roomy-100">
    <div class="row">
        <div class="about_bottom_content" style="padding-left: 30px;">
            <div class="col-md-4">
                <div class="about_bottom_item m-top-20">
                    <div class="ab_head">
                        <div class="ab_head_icon">
                            <i class="icofont icofont-earth wow bounceIn animated animated"></i>
                        </div>
                        <h6 class="m-top-20  wow bounceIn animated animated">
                            WE'RE FRIENDLY WITH THE EARTH
                        </h6>
                    </div>
                    <p class="m-top-20 wow fadeIn animated animated">
                        We love to ride a bike and that makes us stress-free so we are in the best 
                        mood, sometimes in a rush just to be on time but happy and friendly at all 
                        times!
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="about_bottom_item m-top-20">
                    <div class="ab_head">
                        <div class="ab_head_icon  wow bounceIn animated animated">
                            <i class="icofont icofont-heart"></i>
                        </div>
                        <h6 class="m-top-20  wow bounceIn animated animated">WE LOVE VEGANISM</h6>
                    </div>
                    <p class="m-top-20 wow fadeInRight animated animated">
                        Animals are a crucial part of Earth so we are friendly with them too. 
                        We reward clients and customers who live their live cruelty-free. 
                        A 5% of our monthly profit is donated to several NGO involved 
                        in animal welfare such as: Anonymous for the Voiceless, The Save Movement, 
                        Delfines en Libertad, Tierra de Animales, PeTA, Animal Liberation Front, etc.
                    </p>
                </div>
            </div>
            

            <div class="col-md-4">
                <div class="about_bottom_item m-top-20">
                    <div class="ab_head">
                        <div class="ab_head_icon">
                            <i class="icofont icofont-bicycle wow bounceIn animated animated"></i>
                        </div>
                        <h6 class="m-top-20  wow bounceIn animated animated"> WE’RE ECOLOGISTS</h6>
                    </div>
                    <p class="m-top-20 wow fadeInLeft animated animated">
                        Ban plastic bags, plastic straws, polystyrene, 
                        fossil fuels or any other toxic behaviour you 
                        have not yet eradicated. 
                    </p>
                </div>
            </div>
            
        </div>
    </div>
</section>



