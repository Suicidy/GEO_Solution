<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/geo_solution/config.php';
   session_start();
   $data = array();
    $sql = 'update student set tel="'.$_POST['tel'].'",email="'.$_POST['email'].'",facebook="'.$_POST['facebook'].'",line="'.$_POST['line'].'"where student_id="'.$_SESSION['username'].'";';
    $results = query($sql);
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
  
?>