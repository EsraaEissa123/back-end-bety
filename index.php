<?php
session_start();
    if(isset($_SESSION["id"]))
        include_once "HeaderAfter.php";
    else
        include_once "HeaderBefore.php";
?>

	
	<section id="slider"><!--slider-->
	    <div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner"  >
							<div class="item active">
								<div class="col-sm-6">
									<h1><span></span>Bety</h1>
									<h2>For homemade food</h2>
									<p>Homemade Food delivered to your doorstep. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="images/home/girl1.jpg"  class="girl img-responsive" alt="" />
									<img src="images/home/pricing.png"  class="pricing" alt="" />
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span></span>Bety</h1>
									<h2>For homemade food</h2>
									<p>Homemade Food delivered to your doorstep. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="images/home/girl2.jpg" class="girl img-responsive" alt="" />
									<img src="images/home/pricing.png"  class="pricing" alt="" />
								</div>
							</div>
							
							<div class="item">
								<div class="col-sm-6">
									<h1><span></span>Bety</h1>
									<h2>For homemade food</h2>
									<p>Homemade Food delivered to your doorstep. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="images/home/girl3.jpg" class="girl img-responsive" alt="" />
									<img src="images/home/pricing.png" class="pricing" alt="" />
								</div>
							</div>
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		

		
		
			</div>
		</section><!--/slider-->
		<hr>
		

<div class="title">
                <center><h2>Our Chefs</h2></center>
                <hr>
            </div>
            <div class="row">
				
		
	<section>
		<div class="container">
			
		
						<?php
           
                include_once "category.php";
                $chef=new Category();
                $rs=$chef->GetAll();
                $arr_rows = array();
												

              while($row=mysqli_fetch_assoc($rs))
              {
                $arr_rows[] = $row;
                $_SESSION[ 'customer' ] = $arr_rows;

            ?>
                <div class="tab-content"col-md-6" style="margin-bottom: 25px;>
							<div class="tab-pane fade active in" id="all" >
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
                                            <a href="foodpage.php?chef_id=<?php echo($row["chef_id"]); ?>&catno=<?php echo($row["CategoryNo"]); ?>"><img src="chef/<?php echo($row["chef_id"]); ?>.jpg" alt="img"></a>

												<h2><?php echo($row["chef_name"]); ?></h2>
												<p><?php echo($row["details"]); ?></p>
											</div>
											
										</div>
									</div>
								</div>
			  </div>
				<?php
              }
                ?>

            </div>
        </div>
						
					</div><!--/category-tab-->
					
						
					<!--features_items-->
</section>
	
     <form method="post">

	 <section class="recent-food-sec">
        <div class="container">
            <div class="title">
                <?php 
                include_once "food.php";
                $chef=new food();
                ?>
                <h2>All meals</h2>
                <hr>
            </div>
            <div class="row">
            <?php
                
                if(isset($_GET["chef_id"]))
                    $rs=$chef->GetAllBychef();
                else
                     $rs=$chef->GetAll();
              while($row=mysqli_fetch_assoc($rs))
              {
            ?>
            <div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
                                    <img src="food/<?php echo($row["food_code"]); ?>.jpg"alt="img">
										<h2><?php echo($row["price"]); ?></h2>
										<p><?php echo($row["food_name"]); ?></p>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<h2><?php echo($row["price"]); ?></h2>
											<?php $no=$row["food_code"]; if(isset($_SESSION["id"])) echo('<input type="submit" class="btn-sm btn-warning" value="add to cart" name="btncart'.$row["food_code"].'"/>'); else echo('<a href="login.php">add to cart</a>'); ?></h6>
										</div>
									</div>
									<?php
                            if(isset($_POST["btncart".$row["food_code"]])) 
                            {
                                include_once "Orders.php";
                                $order=new Orders();
                               $q= $order->AddOrder($row["food_code"],1);
                              if($q!="ok")
                                 $order->UpdatyOrder($row["food_code"],1);
                                echo("<div class='alert alert-success'>Item in cart </div>");

								


                            }
                        ?>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
									</ul>
								</div>
							</div>
						</div>
                
              <?php
              }
              ?>
           
    </section>

    </form >


					
					
	<?php
	include_once "footer.php";
    ?>