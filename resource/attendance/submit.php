<?php
require "../../config.php";

foreach($_POST['student_id'] as $student_id){
    $course_id = $_POST['course_id'];
    $sql = "UPDATE assign_course
            SET attending_status = 1
            WHERE student_id = '$student_id' AND course_id = '$course_id';";
    query($sql);
}

?>