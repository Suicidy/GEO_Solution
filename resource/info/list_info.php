<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/geo_solution/config.php';

$course_id = check_input($_POST["course_id"]);

$array_result = array();


$sql = "SELECT s.student_id,s.title,s.firstname,s.lastname,s.faculty,s.department,s.tel,s.facebook,s.line,s.email
		FROM student s INNER JOIN assign_course ac ON s.student_id = ac.student_id
		WHERE ac.course_id = $course_id;";

$results = query($sql);

while($result = mysqli_fetch_assoc($results)) {
		if($result['tel']==null or $result['tel']==' ')$result['tel']='-';
		if($result['facebook']==null or $result['facebook']==' ')$result['facebook']='-';
		if($result['line']==null or $result['line']==' ')$result['line']='-';
		$array_result[] = $result;
}
echo json_encode($array_result, JSON_UNESCAPED_UNICODE);

mysqli_free_result($results);
?>
