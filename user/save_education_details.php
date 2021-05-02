<?php
   try {
    include "config/db_manager.php";

    $email=$_SESSION['email'];
    $connection=new Database(DB_HOST,DB_USER,DB_PASS,DATABASE);
    $link=$connection->connect();
    $response=array();
    $school_name=$_POST['school_name'];
    $college_name=$_POST['college_name'];
    $degree_name=$_POST['degree_name'];


    $school_percentage=$_POST['school_percentage'];
    $college_percentage=$_POST['college_percentage'];
    $degree_percentage=$_POST['degree_percentage'];


    $school_pass_year=$_POST['school_pass_year'];
    $college_pass_year=$_POST['college_pass_year'];
    $degree_pass_year=$_POST['degree_pass_year'];


    $sql="UPDATE student SET school_name_10=?,college_name_12=?,college_degree=?,school_pass_year_10=?,college_pass_year_12=?,college_degree_pass_year=?,school_percentage_10=?,college_percentage_12=?,college_degree_percentage=? WHERE student_email=?";
    $stmt=$link->prepare($sql);
    $stmt->execute([$school_name,$college_name,$degree_name,$school_pass_year,$college_pass_year,$degree_pass_year,$school_percentage,$college_percentage,$degree_percentage,$email]);
   if ($stmt==TRUE) {
       $response['saved_successfully']="Data Saved Successfully";
       echo json_encode($response);
   }
   } catch (Exception $e) {
       echo"ERROR".$e->getMessage();
   }
   
   
?>