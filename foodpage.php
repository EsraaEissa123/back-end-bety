<?php
session_start();
    if(isset($_SESSION["id"]))
        include_once "HeaderAfter.php";
    else
        include_once "HeaderBefore.php";
?>
 <section class="recent-food-sec">
        <div class="container">
            <div class="title">
                <?php 
                include_once "food.php";
                $chef=new food();
                  $name=$chef-> Getchefbyid();
                    $row=mysqli_fetch_assoc($name)
                ?>
                <h2>Chef <?php echo($row["chef_name"]); ?> 's meals</h2>
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
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<h2><?php echo($row["price"]); ?></h2>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
									</div>
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

<?php
include_once "Footer.php";
?>