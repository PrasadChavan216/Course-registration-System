<?php
   try {
    include "config/db_manager.php";
    $response=array();
    $student_full_name=$_POST['student_full_name'];
    $student_user_name=$_POST['student_user_name'];
    $mobile_number=$_POST['mobile_number'];
    $course=$_POST['course'];
    $email=$_POST['email'];
    $connection=new Database(DB_HOST,DB_USER,DB_PASS,DATABASE);
    $link=$connection->connect();
    $array=array();
    $sql="INSERT INTO student(student_password,student_name,user_id,student_email,student_mobile,course_selected) VALUES(?,?,?,?,?,?)";
    $stmt=$link->prepare($sql);
    $stmt->execute([md5($student_user_name),$student_full_name,$student_user_name,$email,$mobile_number,$course]);
    if ($stmt==TRUE) {
        $response['successfull']="Student Registered Successfully";
        echo json_encode($response);
    }
    else {
        $response['failed']="Student Registeration Failed";
        echo json_encode($response);
    }
   } catch (Exception $e) {
       $response['error']="Error Occoured".$e->getMessage();
       echo json_encode($response);
   }
   
?>