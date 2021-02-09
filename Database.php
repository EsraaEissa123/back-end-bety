<?php
class Database
{
    var $conn;
    function __construct()
    {
      $this->conn=mysqli_connect("mysql5044.site4now.net","a6d9b2_bety","@EEssrr81","db_a6d9b2_bety");
    }
  //To Insert- Update - delete 
    function RunDML($statment)
    {
        if(!mysqli_query($this->conn,$statment))
            {
                return  mysqli_error($this->conn);
            }
        else
            return "ok";
    }
    //to search
  function GetData($select)
  {
    $result= mysqli_query($this->conn,$select);
    return $result;
  }

}

?>