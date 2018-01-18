<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/geo_solution/config.php';
$teacher_id = check_input($_POST['teacher_id']);
//$choice = check_input($_POST['choice']);
$subject = check_input($_POST['subjbect']);

//SQL Statement

$sql = "SELECT *
FROM course 
WHERE teacher_id = $teacher_id
AND  current_time";

$results = query($sql);

$result = mysqli_fetch_assoc($results);
echo json_encode($result, JSON_UNESCAPED_UNICODE);

mysqli_free_result($results);
