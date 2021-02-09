<?php
include_once "Operations.php";
include_once "Database.php";
 class Orders extends Database implements Operations{

 public function Add(){}
    public function Update(){}
   
    public function AddOrder($prono,$qty){
        return parent::RunDML("insert into ordertemp values('".$prono."','".$qty."','".$_SESSION['id']."')");
    }
    public function UpdatyOrder($prono,$qty){
        return parent::RunDML("update ordertemp set qty=qty+'".$qty."' where ProNO='".$prono."' and cus_id='".$_SESSION['id']."'");
    }    
    public function Delete(){       
        return parent::RunDML("delete from ordertemp  where ProNO='".$_GET["pron"]."' and cus_id='".$_SESSION['id']."'");
    }
    public function GetAll(){
        return parent::GetData("Select * from OrderTemp where cus_id='".$_SESSION['id']."'");
    }
    public function GetCount(){
        return parent::GetData("Select count(*) as count from OrderTemp where cus_id='".$_SESSION['id']."'");
    }
    public function GetOrders(){
        return parent::GetData("Select * from vieworders where cus_id='".$_SESSION['id']."'");
    }
    public function Getmeals(){
        return parent::GetData("Select * from viewconfirmation where cus_id='".$_SESSION['id']."' order by OrderDate , status");
    }
    public function GetSum(){
        return parent::GetData("Select sum(total) as final from vieworders where cus_id='".$_SESSION['id']."'");
    
    }
 } 
?>