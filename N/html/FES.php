<?php
define("servername", "localhost");
define("username", "root");
define("password", "");

$subject = $_POST["subject"];
$teacher_id = $_POST["id"];
$array_result = array();

function query($sql_statement){
    $conn = mysqli_connect(servername, username, password);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully";
    mysqli_close($conn);
    return mysqli_query($conn, $sql_statement);
}

// Create connection

$sql = "SELECT  student.student_id, student.title, student.firstname, student.lastname 
FROM student, course, assign_course, teacher 
WHERE student.student_id = assign_course.student_id 
AND assign_course.course_id = course.course_id 
AND assign_course.attending_status = 0 
AND now() BETWEEN DATE_ADD(course.start_time , INTERVAL 1 HOUR) AND DATE_ADD(course.end_time, INTERVAL 1 HOUR)
AND" . $teacher_id . "= teacher.teacher_id" .
"AND `" . $subject . "%`" ."LIKE course.subject;";

$results = query($sql);

while($result = mysqli_fetch_assoc($results)) {
    $array_result[] = $result;
}

mysqli_free_result($resuls);
?>