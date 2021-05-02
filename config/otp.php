<?php
include "config3.php";
class Otp
{
    var $username="";
    var $password="";
    var $id="";
    var $route="";
    public $link;

    public function Otp($username,$password,$id,$route)
    {
        $this->username=$username;
        $this->password=$password;
        $this->id=$id;
        $this->route=$route;
        
    }
    public function send_otp($mobile_number,$message)
    {
        if (empty($mobile_number))
			throw new Exception('Invalid $numbers format. Must be an array');
		if (empty($message))
			throw new Exception('Empty message');
        echo $mobile_number;
        $this->link=file_get_contents("http://mysmsshop.in/http-api.php?username=".$this->username."&password=".$this->password."&senderid=".$this->id."&route=".$this->route."&number=".$mobile_number."&message=".$message); 
        // echo urlencode("http://mysmsshop.in/http-api.php?username=".$this->username."&password=".$this->password."&senderid=".$this->id."&route=".$this->route."&number=".$mobile_number."&message=".$message);
        // echo "http://mysmsshop.in/http-api.php?username='.$this->username."&password=".$this->password."&senderid=".$this->id."&route=".$this->route."&number=".$numbers."&message=".$message;
        return $this->link;
    }
}
?>