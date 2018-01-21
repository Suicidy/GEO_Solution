<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/geo_solution/config.php';
$course_id = check_input($_POST["id"]);
// echo $subject;
 //echo $course_id;

$data = array();

//SQL Statement
$sql = "SELECT c.subject,t.title,t.firstname,t.lastname,c.topic,c.start_time,c.end_time,r.type,r.review_txt 
        FROM course c,assign_course a,review r,teacher t 
        WHERE a.comment_id=r.comment_id and a.course_id =c.course_id and c.teacher_id = t.teacher_id and c.course_id='$course_id'";
// $sql = "SELECT course.topic, course.start_time, course.course_id 
//         FROM course 
//         WHERE course.teacher_id = '$teacher_id' 
//         AND course.subject LIKE '$subject'";
// echo ($sql);

$results = query($sql);

while($result = mysqli_fetch_assoc($results)) {
    $data[] = $result;
}
echo json_encode($data, JSON_UNESCAPED_UNICODE);

mysqli_free_result($results);
?>