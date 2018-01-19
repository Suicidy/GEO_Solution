<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/geo_solution/config.php';
$subject =  check_input($_POST["subject"]);
$teacher_id = check_input($_POST["id"]);

$array_result = array();

//SQL Statement

$sql = "SELECT  course.course_id,teacher_id,subject,topic,date(start_time) as date, DATE_FORMAT(start_time,'%H:%i') start_time,DATE_FORMAT(end_time,'%H:%i') end_time,room,count_seat,max_seat
		FROM course,(SELECT course.course_id , count(assign_course.course_id) AS count_seat
                                                            FROM assign_course RIGHT JOIN course ON assign_course.course_id = course.course_id
                                                            GROUP BY course_id) seat
		WHERE course.course_id = seat.course_id AND teacher_id = $teacher_id AND subject ='$subject'";

$results = query($sql);

while($result = mysqli_fetch_assoc($results)) {
    $array_result[] = $result;
}
echo json_encode($array_result, JSON_UNESCAPED_UNICODE);

mysqli_free_result($results);
?>