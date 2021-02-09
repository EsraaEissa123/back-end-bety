<?php
ob_start();
session_start();
    if(isset($_SESSION["id"]))
        include_once "HeaderAfter.php";
    else
        header("Location:login.php");
?>

<div class="container">
    <center>
    <h1>My Profile </h1>
    <br/>
    <table class="table table-striped" style="width: 75%;">
        <?php
         if(isset($_SESSION["id"]))
         {
            include_once "customer.php";
            $customer=new customer();
            $rs=$customer->GetUser();
            if($rows=mysqli_fetch_assoc($rs))
            {
        ?>
        <tr>
            <td colspan="2" style="text-align: center;">
             <img src="customer/<?php echo($_SESSION["id"]);?>.jpg" class="rounded-circle" width="150px" height="150px"/>
            </td>
        </tr>
        <tr>
            <td>Full Name </td>
            <td> <?php echo($rows["name"]); ?> </td>
        </tr>
        <tr>
            <td>Email </td>
            <td> <?php echo($rows["email"]); ?> </td>
        </tr>
        <tr>
            <td>Phone </td>
            <td> <?php echo($rows["phone"]); ?> </td>
        </tr>        
        <tr>
            <td>address </td>
            <td> <?php echo($rows["address"]); ?> </td>
        </tr>
        
        <tr>
            <td >
                <a href="editprofile.php"  class="btn btn-warning">Edit Account</a>
            </td>            
            <td >
                <a href="delete.php"  class="btn btn-danger">Delete My Account</a>
            </td> 
        </tr>
    <?php
         }
         else{
             header("Location:index.php");
         }            
        }
    ?>
    </table>
    </center>
</div>
<?php
    include_once "Footer.php";
?>