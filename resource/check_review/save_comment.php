<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/geo_solution/config.php';
    $course_id = check_input($_POST["id"]);
    $text = check_input($_POST["text"]);
    $data = array();

    $sql = "UPDATE course 
    SET comment = '$text'
    WHERE course_id='$course_id'";

    $results = query($sql);
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
  
?>