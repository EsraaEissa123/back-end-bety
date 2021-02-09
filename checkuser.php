<?php
    session_start();
    if(isset($_SESSION["id"]))
        include_once "HeaderAfter.php";
    else
        include_once "HeaderBefore.php";
?>


<script>
var newDateObj = new Date();
var d=newDateObj.getTime() + (1 * 60 * 1000);

//document.writeln(d);
// Set the date we're counting down to
var countDownDate = new Date(d).getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
 
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML = minutes + "m " + seconds + "s ";
  // If the count down is finished, write some text
  if((minutes==0)&&(seconds==0))
  {
  /*  clearInterval(x); 
    document.getElementById("btnfin").click();
    document.getElementById("demo").innerHTML="Expired";
*/
  //window.open('Result.php', '_self');
  document.getElementById("b").innerHTML ="<p> <input type='submit' name='btnresend' class='btn btn-default' value='Resend again'/> </p>";
   	 
  }
  
}, 1000);
</script>

<div class="breadcrumb">
        <div class="container">
            <a class="breadcrumb-item" href="index.html">Home</a>
            <span class="breadcrumb-item active">Forget password</span>
        </div>
    </div>
    <section class="static about-sec" >
        <div class="container">
            <center>
            <h1>Forget Password / Check Username</h1>
           
            <div class="form py-4" style="border-style: groove;width: 65%;">
                <form method="post">
                <?php
            
                    if(isset($_POST["btncheck"]))
                    {
                        include_once "customer.php";
                        $customer=new customer();
                        $customer->setemail($_POST["txtuser"]);
                        $rs=$customer->GetByEmail();
                        if($row=mysqli_fetch_assoc($rs))
                        {
                            $code=rand(11111,99999);
                            $_SESSION["name"]=$row["name"];
                            $_SESSION["id"]=$row["cus_id"];
                            require_once "src/PHPMailer.php";
                            require_once "src/Exception.php";
                            require_once "src/SMTP.php";
                            require_once "vendor/autoload.php";
                                
                                $mail = new  PHPMailer\PHPMailer\PHPMailer();
        
                                $mail->IsSMTP();
                                //$mail->SMTPDebug = 1;
                                $mail->SMTPAuth = true;
                                $mail->SMTPSecure = 'ssl';
                                $mail->Host = "smtp.gmail.com";
                                $mail->Port = 465; // or 587
                                $mail->IsHTML(true);
    
                                $mail->Username = "yourmobileapp2017@gmail.com";
                                $mail->password = "ABC@123456a";
    
                                $mail->setFrom('yourmobileapp2017@gmail.com', 'bety');
                              
                                $mail->addAddress($_POST["txtuser"], "bety");
                                $mail->Subject = 'Forget Password';
                                $id=$_SESSION["id"];
                                $mail->Body = "Dear Mr/Mrs ".$row['name']."<br/>http://localhost/bety/CheckVerfication.php?id=$id <br/>";// Your Verfication Code Is $code";
                                
                                if(!$mail->send()) {
                                  //  echo "Opps! For some technical reasons we couldn't able to sent you an email. We will shortly get back to you with download details.";	
                                    echo "Mailer Error: " . $mail->ErrorInfo;
                                }
                                else{
                                    $_SESSION["code"]=$code;
                                    echo("<div class='alert alert-success'>Verfication Code has been sent , Check Your Email </div>");		 
                                }
                        }
                        else
                        {
                            echo("<div class='alert alert-warning'>Invaild Email / Phone and password</div> <br/> If Email not ent , plaese wait <p id='demo'></p>");
                        }
                    }
                ?>
                 <p id='b'></p>
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                        Email / Phone
                            <input placeholder="Enter Email / Phone" type="text" required name="txtuser">
                        </div>
                    </div>
                   
                    <div class="row justify-content-center">
                    <div class="col-md-8">
                            <input type="submit" name="btncheck" value="Check Email" class="btn black"/>      
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