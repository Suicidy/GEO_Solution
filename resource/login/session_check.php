<?php   
    session_start();
    header('Content-type: application/json');
    $message = array();
    if(isset($_SESSION['email'])){
        $message['SUCCESS'] = "success";
        $message['email'] = $_SESSION['email'];
    }else{
        $message['ERROR'] = "permission denied";
        $message['type'] = "denied";
    }
    echo json_encode($message);
?>