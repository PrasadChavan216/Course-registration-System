<?php
   try {
    include "config/db_manager.php";

    $email=$_SESSION['email'];
    $connection=new Database(DB_HOST,DB_USER,DB_PASS,DATABASE);
    $link=$connection->connect();
    $response=array();
    $courses=$_POST['courses'];
    $student_name=$_POST['student_name'];
    $student_email=$_POST['student_email'];
    $student_email_2=$_POST['student_email_2'];
    $student_mobile=$_POST['student_mobile'];
    $date_of_birth=$_POST['date_of_birth'];
    $gender=$_POST['gender'];
    $marital_status=$_POST['marital_status'];
    $blood_group=$_POST['blood_group'];
    $country=$_POST['country'];
    $state=$_POST['state'];
    $address=$_POST['address'];
    $pincode=$_POST['pincode'];
    $guardian_name=$_POST['guardian_name'];
    $guardian_relationship=$_POST['guardian_relationship'];


    $sql="UPDATE student SET student_name=?,student_email=?,student_alternate_email=?,gender=?,marital_status=?,blood_group=?,student_address=?,course_selected=?,country=?,state=?,pincode=?,guardian_name=?,guardian_relationship=?,date_of_birth=? WHERE student_email=?";
    $stmt=$link->prepare($sql);
    $stmt->execute([$student_name,$student_email,$student_email_2,$gender,$marital_status,$blood_group,$address,$courses,$country,$state,$pincode,$guardian_name,$guardian_relationship,$date_of_birth,$email]);
   if ($stmt==TRUE) {
       $response['saved_successfully']="Data Saved Successfully";
       echo json_encode($response);
   }
   } catch (Exception $e) {
       echo"ERROR".$e->getMessage();
   }
   
   
?>