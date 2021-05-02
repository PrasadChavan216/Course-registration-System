<?php
  
    include "config/db_manager.php";

    // $email=$_SESSION['email'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $connection=new Database(DB_HOST,DB_USER,DB_PASS,DATABASE);
    $link=$connection->connect();
    $sql="SELECT * FROM student WHERE student_email=? AND student_password=?";
    $stmt=$link->prepare($sql);
    $stmt->execute([$email,$password]);
    $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
    if (!empty($result) && is_array($result)) {
        $_SESSION['email']=$email;
        $response['logged_in']="Logged In Successfully";
       echo json_encode($response);
    }
    else {
        $response['failed']="Log In Failed";
        echo json_encode($response);
    }
 
       


   
?>