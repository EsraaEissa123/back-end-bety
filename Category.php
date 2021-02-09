<?php
include_once "Operations.php";
include_once "Database.php";
class Category extends Database implements Operations{

    var $ctid;
    var $ctname;
    var $ctdetails;
    var $chef_id;

    public function getctid(){
        return $this->ctid;
    }
    public function getcname(){
        return $this->ctname;
    }
    public function getcdetails(){
        return $this->ctdetails;
    }
    public function getchefid(){
        return $this->chef_id;
    }
    public function setctid($value){
        $this->ctid=$value;
    }
    public function setctname($value){
        $this->ctname=$value;
    }
    public function setctdetails($value){
        $this->ctdetails=$value;
    }
    public function setchefid($value){
        $this->chef_id=$value;
    }
    public function Add(){
        
    }
    public function Update(){
         
    }
     
    public function Delete(){
        
    }
    public function GetAll(){
        return parent::GetData("Select * From fooddetails");
    }
    public function GetAllBychef(){
        return parent::GetData("Select * From fooddetails where chef_id='".$_GET["chef_id"]."'");
    }

}
?>