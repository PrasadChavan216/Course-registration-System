<?php
include "config/db_manager.php";
$banner_id=$_REQUEST['id'];
$connection=new Database(DB_HOST,DB_USER,DB_PASS,DATABASE);
$link=$connection->connect();
$sql="DELETE FROM student WHERE u_id=?";
$stmt=$link->prepare($sql);
$stmt->execute([$banner_id]);
header("location:student.php");
?>