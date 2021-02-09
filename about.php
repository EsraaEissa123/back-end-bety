<?php
ob_start();
session_start();
    if(isset($_SESSION["id"]))
        include_once "HeaderAfter.php";
    else
        include_once "HeaderBefore.php";
?>
<section>
    <!-- Start About Page  -->
    <div class="about-box-main">
        <div class="container">
            <div class="row">
				<div class="col-lg-6">
                    <div class="banner-frame"> <img class="img-fluid" src="food/about-img.jpg" alt="" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <h2 class="noo-sh-title-top">We are <span>BETY company</span></h2>
                    <p>
                   The idea started in college when we realize the problem of our colleagues who Expatriates were away from their families, they need homemade food.
On the other hand, there are good chefs who need to sell their food.
so we gather the chefs to with who needs homemade food.
                    </p>
                </div>
            </div>
            <div class="row my-5">
                <div class="col-sm-6 col-lg-4">
                    <div class="service-block-inner">
                        <h3>We are Trusted</h3>
                        <p>We We make research about the chefs to ensure the quality and efficient so you can trust us.</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="service-block-inner">
                        <h3>We are Professional</h3>
                        <p>We have variety of food desert and drinks, he recieve your comlaints and solve your problem urgently  </p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="service-block-inner">
                        <h3>We are Expert</h3>
                        <p>We know what are you need, we do are survies and studies. </p>
                    </div>
                </div>
            </div>
            </section>
            <?php
            include_once "Footer.php";
            ?> 