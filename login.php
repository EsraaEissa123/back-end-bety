<?php
ob_start();
session_start();
    include_once "HeaderBefore.php";
?>

<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form method="POST">
						<?php
            
				
			if(isset($_COOKIE['usercookie'])){	
				$_SESSION["id"]=$_COOKIE['usercookie'];
				$_SESSION["name"]=$_COOKIE['usercookiename'];      
				echo("<script> window.open('index.php', '_self')</script>");	 
			}

			if(isset($_POST["btnlogin"]))
			{
				include_once "customer.php";
				$customer=new customer();
				$customer->setemail($_POST["txtuser"]);
				$customer->setphone($_POST["txtuser"]);
				$customer->setpassword($_POST["txtpass"]);
				$rs=$customer->Login();
			  
				if($row=mysqli_fetch_assoc($rs))
				{
					$_SESSION["id"]=$row["cus_id"];
					$_SESSION["name"]=$row["name"];
					if(isset($_POST["checkbox"]))
					{
						setcookie("usercookie",$_SESSION["id"],time()+60*60*24*365);
						setcookie("usercookiename",$_SESSION["name"],time()+60*60*24*365);
					}
					header("Location:index.php");
				}
				else
				{
					echo("<div class='alert alert-warning'>Invaild Email / Phone and password</div>");
				}
			}
		?>
                        
                            
                            <input  placeholder="Email/phone" required name="txtuser"/>
                            
                            
                            <input type="password" placeholder="password " required name="txtpass" />

							<span>
								<input type="checkbox" class="checkbox" name="checkbox"> 
								Keep me signed in
							</span>
							<div class="row justify-content-left">
                                <div class="col-md-8">
                           
                            <h5>Forget Password <a href="CheckUser.php">Click here</a></h5>
                                </div>
                             </div>
							<button type="submit" name="btnlogin" value="login" class="btn btn-default">Login</button >
						   
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form method="post">
						<?php
                    if(isset($_POST["btn"]))
                    {   include_once "customer.php";
                        $customer=new customer();
                        $customer->setname($_POST["txtname"]);
                        $customer->setpassword($_POST["txtpass"]);
                        $customer->setphone($_POST["txtphone"]);
                        $customer->setemail($_POST["txtemail"]);
                        $customer->setaddress($_POST["txtaddress"]);
                        

                        $reg="/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
                        if(preg_match($reg,$_POST["txtpass"]))
                        {

                        $msg=$customer->Add();
                        if($msg=="ok")
                            echo("<div class='alert alert-success'>Your account has been created </div>");
                        else if(strpos($msg,"customer.Email"))
                            echo("<div class='alert alert-warning'>Sorry This Email Is Used</div>");
                        else if(strpos($msg,"customer.Phone"))
                            echo("<div class='alert alert-warning'>Sorry This Phone Is Used</div>");
                        else
                            echo("<div class='alert alert-danger'>$msg </div>");
                        }
                        else
                        echo("<div class='alert alert-warning'>This password is weak , Minimum eight characters, at least one uppercase letter, one lowercase letter, one number and one special character </div>");
                    }
                ?>
							<input type="text" placeholder="Name" required name="txtname" />
							<input type="email" placeholder="Email Address" required name="txtemail" />
                            <input type="password" placeholder="Password" required name="txtpass" />
                            <input type="text" placeholder="phone" required name="txtphone"/>
							<input type="text" placeholder="Address" required name="txtaddress" />

							<button type="submit" class="btn btn-default" name="btn" >Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
    </section><!--/form-->
    <?php
	include_once "footer.php";
    ?>