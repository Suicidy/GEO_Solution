<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/geo_solution/config.php';
//$subject = check_input($_POST["subject"]);
$id = check_input($_POST["id"]);
// echo $subject;
// echo $teacher_id;

$data = array();

//SQL Statement

$sql = "SELECT course.topic,course.subject, course.start_time, course.course_id 
        FROM course 
        WHERE course.course_id = '$id'"; 
 //echo ($sql);

$results = query($sql);

while($result = mysqli_fetch_assoc($results)) {
    $data[] = $result;
}
echo json_encode($data, JSON_UNESCAPED_UNICODE);

mysqli_free_result($results);
?>