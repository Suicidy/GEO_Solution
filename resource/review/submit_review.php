<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/geo_solution/config.php';
session_start();
$id= $_SESSION['username'];
$content_txt = check_input($_POST['content']);
$teacher_txt = check_input($_POST['teacher']);
$other_txt = check_input($_POST['other']);
$course_id = check_input($_POST['course_id']);
$star_default = 1;
$array_result = array();


//SQL Statement

$sql = "SELECT comment_id, star
        FROM assign_course
        WHERE assign_course.course_id = '$course_id' 
        AND assign_course.student_id = '$id';";

$results = query($sql);
$result = mysqli_fetch_assoc($results);
$comment_id = $result['comment_id'];
$star = $result['star'];
if ($star == NULL){
    $sql = "UPDATE assign_course SET star = '$star_default' WHERE student_id = '$id' AND course_id = '$course_id'; ";
}
else{
    $sql = "Nothing can query rn";
}


if ($content_txt != ""){
    $sql .= "INSERT INTO review (comment_id, type, review_txt)
        VALUES ('$comment_id', 'content', '$content_txt'); ";
}
if ($teacher_txt != ""){
    $sql .= "INSERT INTO review (comment_id, type, review_txt)
        VALUES ('$comment_id', 'teacher', '$teacher_txt'); ";
}
        
if ($other_txt != ""){
    $sql .= "INSERT INTO review (comment_id, type, review_txt)
        VALUES ('$comment_id', 'etc', '$other_txt'); ";
}

$results = multi_query($sql);

if ($results == 0){
    query("Nothing can query");

}
else{
    echo json_encode(array('message' => 'Success'),JSON_UNESCAPED_UNICODE);
}
?>