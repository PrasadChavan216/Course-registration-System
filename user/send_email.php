<?php
include "config/db_manager.php";
switch ($_POST['action']) {
    case 'send_otp':
$email=$_POST['email'];
// $response=array();
$otp=rand(1000,9999);
function snd_mail_otp($email,$otp){
    try{
        $url = 'https://api.elasticemail.com/v2/email/send';
        $post = array('from' => 'rahuladityakabaap@gmail.com',
		'fromName' => 'University',
		'apikey' => '0C707C85F729C59480242C62659C6CB3CBA1901EB78CE530C34AB9F578D61478B27BBA1AFB184F1E6506BACBA8C75854',
		'subject' => 'OTP for Verification',
		'to' => ''.$email,
		'bodyHtml' => '<h1>OTP is'.$otp.'</h1>',
		'bodyText' => 'Thank you',
		'isTransactional' => false);
		$ch = curl_init();
		curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
			CURLOPT_POST => true,
			CURLOPT_POSTFIELDS => $post,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => false,
			CURLOPT_SSL_VERIFYPEER => false
        ));
        $result=curl_exec ($ch);
        curl_close ($ch);
        $_SESSION['session_otp']=$otp;
        return $result;
    }
    catch(Exception $e){
        return $e->getMessage();
    }
}
snd_mail_otp($email,$otp);
    $response['otp_sent']="OTP SEND SUCCESSFULLY";
    $response['email']=$email;
    echo json_encode($response);
        break;
    
    case 'verify_otp':
      try {
        $otp=$_POST['otp'];
        $email=$_POST['email'];
        if ($otp==$_SESSION['session_otp']) {
            
            $connection=new Database(DB_HOST,DB_USER,DB_PASS,DATABASE);
            $link=$connection->connect();
            $sql="UPDATE student SET login_status=1 WHERE student_email=?";
            $stmt=$link->prepare($sql);
            $stmt->execute([$email]);
            if ($stmt==TRUE) {
                
                $response['verified']="User Verification Successfull";
                echo json_encode($response);
                $_SESSION['email']=$email;
            }
            else {
                echo"error";
            }
        }
        else {
            $response['failed']="User Verification Failed";
                echo json_encode($response);
        }
      } catch (Exception $e) {
          //throw $th;
          echo "ERROR".$e->getMesssage();
      }
        break;
}
?>