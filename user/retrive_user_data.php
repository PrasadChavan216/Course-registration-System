<?php
    include "config/db_manager.php";

    $email=$_SESSION['email'];
    $connection=new Database(DB_HOST,DB_USER,DB_PASS,DATABASE);
    $link=$connection->connect();
    $array=array();
    $sql="SELECT * FROM student WHERE student_email=?";
    $stmt=$link->prepare($sql);
    $stmt->execute([$email]);
    $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row) {
        $array[]=$row;
    }
   
    echo json_encode($array);
?>