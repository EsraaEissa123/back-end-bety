<?php
    ob_start();
    session_start();
    if(isset($_SESSION["id"]))
        include_once "HeaderAfter.php";
    else
        header("Location:login.php");
?>
   
<div class="breadcrumb">
        <div class="container">
            <a class="breadcrumb-item" href="index.html">Home</a>
            <span class="breadcrumb-item active">Edit Profile</span>
        </div>
    </div>
    <section class="static about-sec" >
        <div class="container">
            <center>
            <h1>Edit My Profile</h1>
           
            <div class="form py-4" style="border-style: groove;width: 65%;">
                <form method="post" enctype="multipart/form-data">
                <?php
                    if(isset($_POST["btn"]))
                    {   
                        include_once "customer.php";
                        $customer=new customer();
                        $customer->setname($_POST["txtname"]);
                        $customer->setpassword($_POST["txtpass"]);
                        $customer->setphone($_POST["txtphone"]);
                        $customer->setemail($_POST["txtemail"]);            
                        $customer->setaddress($_POST["txtaddress"]);

                        $reg="/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
                        if(preg_match($reg,$_POST["txtpass"]))
                        {

                        $msg=$customer->Update();
                        
                        if($msg=="ok")
                        {
                            $dir="customer/";
                            $image=$_FILES['file']['name'];     
                            $temp_name=$_FILES['file']['tmp_name'];
                            
                            //$size = filesize($temp_name);
                            //echo($size);

                            $img=$_SESSION["id"];
                            if($image!="")
                            {
                                $fdir= $dir.$img.".jpg";
                                move_uploaded_file($temp_name, $fdir);
                            }
                            $_SESSION["name"]=$_POST["txtname"];
                        echo("<script> window.open('myprofile.php', '_self')</script>");	
                        }
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

        <?php
         if(isset($_SESSION["id"]))
         {
            include_once "customer.php";
            $customer=new customer();
            $rs=$customer->GetUser();
            if($rows=mysqli_fetch_assoc($rs))
            {
        ?>  

                <div class="row justify-content-center">
                        <div class="col-md-8">
                        Full Name
                            <input placeholder="Enter Full name" value="<?php echo($rows["name"]); ?>" required name="txtname">
                         
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                        Email 
                            <input placeholder="Enter Email" type="email" value="<?php echo($rows["email"]); ?>" required name="txtemail">
                         
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            Password
                            <input type="password" placeholder="Enter Password" value="<?php echo($rows["password"]); ?>" required name="txtpass">
                           
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            Phone
                            <input type="text" placeholder="Enter phone" value="<?php echo($rows["phone"]); ?>" required name="txtphone">
                           
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                           address
                            <input type="text" placeholder="Enter address" value="<?php echo($rows["address"]); ?>" required name="txtaddress">
                           
                        </div>
                    </div>
                    
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            User Image
                            <input type="file" name="file" class="form-control">
                           
                        </div>
                    </div>
                    <br/>
                    <div class="row justify-content-center">
                    <div class="col-md-8">
                            <input type="submit" value="Update" name="btn" class="btn black"/>
                        </div>
                    </div>
                   <br/>
                    </div>
                </form>
            </div>
            <?php
         }
         else{
             header("Location:index.php");
         }            
        }
    ?>
            </center>
        </div>
    </section>
<!--Scripts-->

<?php
        include_once "Footer.php";
?>