<?php
include_once "Operations.php";
include_once "Database.php";
class Food extends Database implements Operations{

 

    public function Add(){
        
    }
    public function Update(){
         
    }
     
    public function Delete(){
        
    }
    public function GetRecom(){
        return parent::GetData("Select * From food ");
    }
    public function GetAll(){
        return parent::GetData("Select * From food");
    }
    public function GetAllBychef(){
        return parent::GetData("Select * From food where chef_id='".$_GET["chef_id"]."' and CategoryNo='".$_GET["catno"]."'");
    }
     public function Getchefbyid(){
        return parent::GetData("Select chef_name From fooddetails  where chef_id='".$_GET["chef_id"]."'");
             
    }
    public function GetByname($foodname){
        return parent::GetData("Select * From food where foodname=$food_name");
    }
    
}
?>