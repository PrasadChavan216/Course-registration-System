<?php
    include "config/db_manager.php";
    if (isset($_SESSION['email'])) {
        unset($_SESSION['email']);
        $response['login_status']="Logged out Successfully";
        echo json_encode($response);
    }
    // else {
    //     $response['login_status']="";
    //     echo json_encode($array);
    // }
    
?>