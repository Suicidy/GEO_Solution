<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/geo_solution/config.php';
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
            $message['ERROR'] = "เกิดข้อผิดพลาด หรือเกินเวลาที่กำหนดแล้ว ข้อมูลเพิ่มเติมโปรดติดต่อ geo.kmutt@mail.com";
            $message['type'] = 'link_expired';
        }
    }else{
        $message['ERROR'] = "Redirecting to index page.";
        $message['type'] = 'link_fail';
    }
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty(trim($_POST['password']))){
        $message['ERROR'] = "โปรดกรอกรหัสผ่าน.";     
        $messgae['type'] = "missing_pass";
    } elseif(strlen(trim($_POST['password'])) < 6){
        $message['ERROR'] = "รหัสผ่านจำเป็นต้องมี 6-18 ตัวอักษร";
        $message['type'] = "shorten_pass";
    } elseif(strlen(trim($_POST['password'])) > 18){
        $message['ERROR'] = "รหัสผ่านจำเป็นต้องมี 6-18 ตัวอักษร";
        $message['type'] = "longer_pass";
    } else{
        $password = trim($_POST['password']);
    }
    if(empty(trim($_POST["confirmpassword"]))){
        $message['ERROR'] = 'โปรดยืนยันรหัสผ่าน';     
        $message['type'] = "missing_cpass";
    } else{
        $confirm_password = trim($_POST['confirmpassword']);
        if($password != $confirm_password){
            $message['ERROR'] = 'รหัสผ่านไม่ตรงกัน';
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
            $message['ERROR'] = "เกิดข้อผิดพลาด โปรดลองอีกครั้งในภายหลัง";
            $message['type'] = "err";
        }
    }
}
echo json_encode($message);
mysqli_close($link);
?>


