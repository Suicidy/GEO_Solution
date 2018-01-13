<?php
require "../config.php";


//SQL Statement

$sql = "SELECT DISTINCT teacher.teacher_id
FROM teacher, course 
WHERE /*now() BETWEEN DATE_ADD(course.start_time , INTERVAL 1 HOUR) AND DATE_ADD(course.end_time, INTERVAL 1 HOUR) 
AND*/ course.teacher_id = teacher.teacher_id;";

$results = query($sql);

while($result = mysqli_fetch_assoc($results)) {
   echo "<option value=".$result['teacher_id'].">".$result['teacher_id']."</option>";
}
mysqli_free_result($results);
?>