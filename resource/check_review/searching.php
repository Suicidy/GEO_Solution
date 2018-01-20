<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/geo_solution/config.php';
$subject = check_input($_POST["subject"]);
$teacher_id = check_input($_POST["id"]);
// echo $subject;
// echo $teacher_id;

$data = array();

//SQL Statement

$sql = "SELECT course.topic, course.start_time, course.course_id 
        FROM course 
        WHERE course.teacher_id = '$teacher_id' 
        AND course.subject LIKE '$subject'";
// echo ($sql);

$results = query($sql);

while($result = mysqli_fetch_assoc($results)) {
    $data[] = $result;
}
echo json_encode($data, JSON_UNESCAPED_UNICODE);

mysqli_free_result($results);
?>