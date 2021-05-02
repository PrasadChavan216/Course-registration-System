<?php
    include "config/db_manager.php";
    if (isset($_SESSION['email'])) {
        $response['login_status']="1";
        echo json_encode($response);
    }
    else {
        $response['login_status']="0";
        echo json_encode($response);
    }
    
?>