<?php
include "config.php";

class Database
{
    var $servername="localhost";
    var $username="root";
    var $password="";
    var $database="education";
    public $link;

    public function Database($servername,$username,$password,$database)
    {
        
        $this->servername=$servername;
        $this->username=$username;
        $this->password=$password;
        $this->database=$database;
        
    }
    public function connect()
    {
        try{
            $this->link=new PDO("mysql:host=".$this->servername.";dbname=".$this->database.";charset=UTF8",$this->username,$this->password);
            $this->link->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
         
            
        } catch (PDOException $e) {
            "ERROR".$e->getMessage();
        }
        
        return $this->link;
    }
}

  
 
?>