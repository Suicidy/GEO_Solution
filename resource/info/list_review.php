<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/geo_solution/config.php';

$course_id = check_input($_POST["course_id"]);

$array_result = array();

$sql = "SELECT review_txt
		FROM review LEFT JOIN assign_course ON review.comment_id = assign_course.comment_id
		WHERE review.type = 'beforeClass' and assign_course.course_id = $course_id";

$results = query($sql);

while($result = mysqli_fetch_assoc($results)) {
    $array_result[] = $result;
}
echo json_encode($array_result, JSON_UNESCAPED_UNICODE);

mysqli_free_result($results);
?>