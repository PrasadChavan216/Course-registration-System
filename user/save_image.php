<?php
  
    include "config/db_manager.php";

    $email=$_SESSION['email'];
    $filename_1 = $_FILES['file_1']['name'];
    $tmp_name=$_FILES['file_1']['tmp_name'];
    move_uploaded_file($tmp_name,"../Assets/images/student/$filename_1");
    // echo $filename;
    $filename_2 = $_FILES['file_2']['name'];
    $tmp_name=$_FILES['file_2']['tmp_name'];
    move_uploaded_file($tmp_name,"../Assets/images/student/$filename_2");
    // echo $filename;
    $connection=new Database(DB_HOST,DB_USER,DB_PASS,DATABASE);
    $link=$connection->connect();
    $sql="UPDATE student SET student_photo=?,student_signature=? WHERE student_email=?";
    $stmt=$link->prepare($sql);
    $stmt->execute([$filename_1,$filename_2,$email]);
   if ($stmt==TRUE) {
       $response['saved_successfully']="Data Saved Successfully";
       echo json_encode($response);
   }


   
?>