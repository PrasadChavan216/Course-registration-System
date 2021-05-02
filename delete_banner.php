<?php
include "config/db_manager.php";
$banner_id=$_REQUEST['id'];
$connection=new Database(DB_HOST,DB_USER,DB_PASS,DATABASE);
$link=$connection->connect();
$sql="DELETE FROM banner WHERE banner_id=?";
$stmt=$link->prepare($sql);
$stmt->execute([$banner_id]);
header("location:banner.php");
?>