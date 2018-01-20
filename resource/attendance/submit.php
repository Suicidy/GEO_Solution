<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/geo_solution/config.php';
$redirect = '/geo_solution/home.php';
header( "Location: $redirect");
if (isset($_POST['student_id'])){
    foreach($_POST['student_id'] as $student_id){
        $course_id = $_POST['course_id'];
        $sql = "UPDATE assign_course
                SET attending_status = 1
                WHERE student_id = '$student_id' AND course_id = '$course_id';";
        query($sql);
    }
}
exit;
?>