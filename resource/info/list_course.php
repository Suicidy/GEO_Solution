<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/geo_solution/config.php';
$subject = check_input($_POST["subject"]);
$teacher_id = check_input($_POST["teacher_id"]);

$array_result = array();

//SQL Statement

$sql = "SELECT  * 
		FROM course
		WHERE teacher_id = $teacher_id AND subject = $subject";

$results = query($sql);

while($result = mysqli_fetch_assoc($results)) {
    $array_result[] = $result;
}
echo json_encode($array_result, JSON_UNESCAPED_UNICODE);

mysqli_free_result($results);
?>