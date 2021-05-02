<?php
    include "config/db_manager.php";

 
    $connection=new Database(DB_HOST,DB_USER,DB_PASS,DATABASE);
    $link=$connection->connect();
    $array=array();
    $sql="SELECT * FROM student";
    $stmt=$link->prepare($sql);
    $stmt->execute();
    $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row) {
        $array[]=$row;
    }
   
    echo json_encode($array);
?>