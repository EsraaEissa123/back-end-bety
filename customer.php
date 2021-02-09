<?php
include_once "Operations.php";
include_once "Database.php";
    class customer extends Database implements Operations{
        var $cus_id;
        var $name;
        var $password;
        var $email;
        var $phone;
        var $address;

        public function getuserid(){
            return $this->cus_id;
        }
        public function setuserid($value){
            $this->cus_id=$value;
        }

        public function getname(){
            return $this->name;
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

        public function getaddress(){
            return $this->address;
        }
        public function setaddress($value){
            $this->address=$value;
        }

        
 
        public function Add(){
            $msg=parent::RunDML("insert into `customer` values(Default,'".$this->getname()."','".$this->getpassword()."','".$this->getphone()."','".$this->getemail()."','".$this->getaddress()."')");
            return $msg;
        }
        public function Update(){
            $msg=parent::RunDML("update `customer` set name='".$this->getname()."',password='".$this->getpassword()."',phone='".$this->getphone()."',email='".$this->getemail()."',address='".$this->getaddress()."' where cus_id='".$_SESSION["id"]."'");
            return $msg;
        }
        public function UpdatePW(){
            $msg=parent::RunDML("update `customer` set  password='".$this->getpassword()."' where cus_id='".$_GET["id"]."'");
            return $msg;
        }
        public function Delete(){
            $msg=parent::RunDML("delete from `customer` where cus_id='".$_SESSION["id"]."'");
            return $msg;
        }
        public function GetAll(){

        }

        public function GetUser(){
            return parent::GetData("select * from customer where cus_id='".$_SESSION["id"]."'");
        }
        public function GetByEmail(){
            return parent::GetData("select * from customer where Email='".$this->getemail()."'");
        }
        public function Login(){
            return parent::GetData("select * from customer where (phone='".$this->getphone()."' Or Email='".$this->getemail()."') and password ='".$this->getpassword()."'"); 
        }
    }
?>