<?php
include "config/db_manager.php";
$cat_id=$_REQUEST['id'];
$connection=new Database(DB_HOST,DB_USER,DB_PASS,DATABASE);
$link=$connection->connect();
$sql="DELETE FROM courses WHERE course_id=?";
$stmt=$link->prepare($sql);
$stmt->execute([$cat_id]);
header("location:courses.php");
?>