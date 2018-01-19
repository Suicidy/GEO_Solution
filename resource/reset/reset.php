<?php
require_once '../../config.php';
session_start();

$email = $user = $password = $confirm_password = "";
$message = array();
header('Content-type: application/json');
if($_SERVER["REQUEST_METHOD"] == "GET"){
    if(!empty($_GET["key"])&&!empty($_GET["reset"])){
        $email = mysqli_real_escape_string($link,trim($_GET["key"]));
        $reset = mysqli_real_escape_string($link,trim($_GET["reset"]));
        $select= mysqli_query($link,"SELECT student_id FROM student WHERE md5(email)='$email' and password='$reset'");
        if(mysqli_num_rows($select) == 1){
            $row = mysqli_fetch_array($select);
            $_SESSION['stid'] = $row['student_id'];  
            $message['SUCCESS'] = 'success'; 
        }else{
            $message['ERROR'] = "Error your link may expired or something might occur please contact geo.kmutt@mail.com for more information";
            $message['type'] = 'link_expired';
        }
    }else{
        $message['ERROR'] = "Redirecting to index page.";
        $message['type'] = 'link_fail';
    }
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty(trim($_POST['password']))){
        $message['ERROR'] = "Please enter a password.";     
        $messgae['type'] = "missing_pass";
    } elseif(strlen(trim($_POST['password'])) < 6){
        $message['ERROR'] = "Password must have at least 6-18 characters.";
        $message['type'] = "shorten_pass";
    } elseif(strlen(trim($_POST['password'])) > 18){
        $message['ERROR'] = "Password must have at least 6-18 characters.";
        $message['type'] = "longer_pass";
    } else{
        $password = trim($_POST['password']);
    }
    if(empty(trim($_POST["confirmpassword"]))){
        $message['ERROR'] = 'Please confirm password.';     
        $message['type'] = "missing_cpass";
    } else{
        $confirm_password = trim($_POST['confirmpassword']);
        if($password != $confirm_password){
            $message['ERROR'] = 'Password did not match.';
            $message['type'] = 'match_missing';
        }
    }
    if(empty($message['ERROR'])){
        $param_username = $_SESSION['stid'];
        $param_password = md5(trim($password)); // Creates a password hash
        $sql = "UPDATE student SET password= '$param_password' WHERE student_id = '$param_username' ";
        if(mysqli_query($link,$sql)){
            $message['SUCCESS'] = "success";
            session_unset();
            session_destroy();
        } else{
            $message['ERROR'] = "Something went wrong. Please try again later.";
            $message['type'] = "err";
        }
    }
}
echo json_encode($message);
mysqli_close($link);
?>


