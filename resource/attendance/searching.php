<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/geo_solution/config.php';
$subject = check_input($_POST["subject"]);
$teacher_id = check_input($_POST["id"]);

$array_result = array();

//SQL Statement

$sql = "SELECT  student.student_id, student.title, student.firstname, student.lastname, course.course_id, assign_course.attending_status
FROM student, course, assign_course
WHERE student.student_id = assign_course.student_id 
AND assign_course.course_id = course.course_id
AND now() BETWEEN DATE_ADD(course.start_time , INTERVAL 1 HOUR) AND DATE_ADD(course.end_time, INTERVAL 1 HOUR)
AND  '$teacher_id'  = course.teacher_id 
AND course.subject LIKE '$subject%';";

$results = query($sql);

while($result = mysqli_fetch_assoc($results)) {
    $array_result[] = $result;
}
echo json_encode($array_result, JSON_UNESCAPED_UNICODE);

mysqli_free_result($results);
?>