<?php
include_once "Operations.php";
include_once "Database.php";
class Chefs extends Database implements Operations
{

    var $chef_id;
    var $chef_name;
    var $password;
    var $email;
    var $phone;
    var $address;
    var $categories;
    var $details;


    public function getchefid(){
        return $this->chef_id;
    }
    public function setchefid($value){
        $this->cus_id=$value;
    }

    public function getchef(){
        return $this->chef_name;
    }
    public function setname($value){
        $this->name=$value;
    }

    public function getpassword(){
        return $this->password;
    }
    public function setpassword($value){
        $this->password=$value;
    }

    public function getphone(){
        return $this->phone;
    }
    public function setphone($value){
        $this->phone=$value;
    }
    public function getemail(){
        return $this->email;
    }
    public function setemail($value){
        $this->email=$value;
    }
    public function getcategory(){
        return $this->categories;
    }
    public function setcategory($value){
        $this->categories=$value;
    }
    public function getdetails(){
        return $this->details;
    }
    public function setaddress($value){
        $this->address=$value;
    }
    public function Add(){

    }
        
    public function Update(){
        
    }
   
    public function Delete(){
        
    }
    public function GetAll(){
        return parent::GetData("Select * From chefs");

    }
}
?>