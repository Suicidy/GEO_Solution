<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/geo_solution/config.php';
session_start();
$id= $_SESSION['username'];
$course_id = check_input($_POST['course_id']);
$array_result = array();


//SQL Statement
$sql = "DELETE
        FROM review
        WHERE comment_id = (SELECT comment_id FROM assign_course WHERE course_id = '$course_id' AND student_id = '$id' );";
$sql .= "DELETE 
        FROM assign_course
        WHERE course_id = '$course_id'
        AND student_id = '$id';";

$results = multi_query($sql);

if ($results == 0){
    query("Nothing can query");

}
else{
    echo json_encode(array('message' => 'Success'),JSON_UNESCAPED_UNICODE);
}


?>