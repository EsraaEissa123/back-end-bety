<?php
    session_start();
    if(isset($_SESSION["id"]))
        include_once "HeaderAfter.php";
    else
        include_once "HeaderBefore.php";
?>


<div class="breadcrumb">
        <div class="container">
            <a class="breadcrumb-item" href="index.html">Home</a>
            <span class="breadcrumb-item active">Verfication Code</span>
        </div>
    </div>
    <section class="static about-sec" >
        <div class="container">
            <center>
            <h1>Forget Password / Check Verfication Code</h1>
           
            <div class="form py-4" style="border-style: groove;width: 65%;">
                <form method="post">
                <?php
            
                    if(isset($_POST["btncheck"]))
                    {      
                        if($_SESSION["code"]==$_POST["txtcode"])
                        {
                            $id=$_SESSION["id"];
                            echo("<script> window.open('NewPassword.php?id=$id', '_self')</script>");	
                        }
                        else{          
                            echo("<div class='alert alert-danger'>invaild Verfication Code , Try Again</div>");		 
                        }
                         
                    }
                ?>
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                       Verfication Code
                            <input placeholder="Enter Verfication Code" type="text" required name="txtcode">
                        </div>
                    </div>
                   
                    <div class="row justify-content-center">
                    <div class="col-md-8">
                            <input type="submit" name="btncheck" value="Check Verfication" class="btn black"/>      
                        </div>
                    </div>
                    
                   
                    </div>
                </form>
            </div>
            </center>
        </div>
    </section>


<?php
        include_once "Footer.php";
?>