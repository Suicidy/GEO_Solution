<?php
define("servername", "localhost");
define("username", "root");
define("password", "");

$subject = $_POST["subject"];
$ta_name = $_POST["name"];

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


$now = date("Y-m-d H:i:s");

$sql = "SELECT  student.student_id, student.title, student.firstname, student.lastname 
FROM student, course, assign_course 
WHERE student.student_id = assign_course.student_id 
AND assign_course.course_id = course.course_id 
AND assign_course.attending_status = 0 
AND now() BETWEEN course.start_time AND DATE_ADD(course.end_time, INTERVAL 1 HOUR);";

$result = query($sql);

?>