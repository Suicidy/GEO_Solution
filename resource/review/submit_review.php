<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/geo_solution/config.php';
session_start();
$id= $_SESSION['username'];
$content_txt = check_input($_POST['content']);
$teacher_txt = check_input($_POST['teacher']);
$other_txt = check_input($_POST['other']);
$course_id = check_input($_POST['course_id']);
$star = check_input($_POST['star']);
$array_result = array();


//SQL Statement

$sql = "SELECT assign_course.comment_id, assign_course.star, course.teacher_id
        FROM assign_course, course
        WHERE assign_course.course_id = '$course_id' 
        AND assign_course.student_id = '$id'
        AND assign_course.course_id = course.course_id;";

$results = query($sql);
$result = mysqli_fetch_assoc($results);
$comment_id = $result['comment_id'];
$star_old = $result['star'];
$teacher_id =  $result['teacher_id'];

if ($star_old == NULL){
    $sql = "UPDATE assign_course SET star = '$star' WHERE student_id = '$id' AND course_id = '$course_id'; ";
    $sql .= "UPDATE teacher SET star = (SELECT AVG(assign_course.star) 
    FROM assign_course, course 
    WHERE assign_course.star IS NOT NULL 
    AND assign_course.course_id = course.course_id 
    AND course.teacher_id = '$teacher_id'
    GROUP BY course.teacher_id) WHERE teacher_id = '$teacher_id';"; 
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