<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/geo_solution/config.php';
$subject = check_input($_POST["subject"]);
$teacher_id = check_input(trim($_POST["id"]));

$array_result = array();

//SQL Statement

$sql = "SELECT course.topic, course.start_time, course.course_id 
        FROM course 
        WHERE course.teacher_id = '$teacher_id' 
        AND course.subject LIKE '$subject'";

$results = query($sql);

while($result = mysqli_fetch_assoc($results)) {
    $array_result[] = $result;
}
echo json_encode($array_result, JSON_UNESCAPED_UNICODE);

mysqli_free_result($results);
?>