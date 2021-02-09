<?php
    session_start();
    session_destroy();
    setcookie("usercookie",$_SESSION["id"],time()-1);
    header("Location:index.php");
?>