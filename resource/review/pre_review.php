<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/geo_solution/config.php';
$id = check_input($_POST['course']);

//SQL Statement

$sql = "SELECT teacher.title, teacher.firstname, teacher.lastname, teacher.nickname, teacher.image, course.subject ,course.topic 
FROM teacher, course 
WHERE course.teacher_id = teacher.teacher_id
AND course.course_id = '$id';";

$results = query($sql);

$result = mysqli_fetch_assoc($results);
echo json_encode($result, JSON_UNESCAPED_UNICODE);

mysqli_free_result($results);
?>