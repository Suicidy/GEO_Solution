<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/geo_solution/config.php';
   session_start();
   $data = array();
    $sql = 'update student set tel="'.check_input($_POST['tel']).'",email="'.check_input($_POST['email']).'",facebook="'.check_input($_POST['facebook']).'",line="'.check_input($_POST['line']).'"where student_id="'.$_SESSION['username'].'";';
    $results = query($sql);
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
  
?>