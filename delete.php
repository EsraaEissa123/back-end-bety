<?php
    session_start();
    include_once "customer.php";
    $customer=new customer();
    $customer->Delete();
    $dir="customer/";
    $img=$_SESSION['id'];
    $fdir= $dir.$img.".jpg";
    unlink($fdir);
    session_destroy();
    setcookie("usercookie",$_SESSION["id"],time()-1);
    header("Location:index.php");
?>