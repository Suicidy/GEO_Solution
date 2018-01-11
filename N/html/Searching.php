<?php
define("servername", "localhost");
define("username", "root");
define("password", "");
define("database","geo_db");
define("charset","utf8");

//$subject = $_POST["subject"];
//$teacher_id = $_POST["id"];
$subject = "MTH";
$teacher_id = "58070501020";

$array_result = array();

function query($sql_statement){
    $conn = mysqli_connect(servername, username, password, database);
    mysqli_set_charset( $conn, charset);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error()) . "<br>";
    }
    echo "Connected successfully" . "<br>";
    $result = mysqli_query($conn, $sql_statement);
    mysqli_close($conn);
    return $result;
}

// Create SQL Statement

$sql = "SELECT  student.student_id, student.title, student.firstname, student.lastname 
FROM student, course, assign_course
WHERE student.student_id = assign_course.student_id 
AND assign_course.course_id = course.course_id
AND assign_course.attending_status = 0 
AND now() BETWEEN DATE_ADD(course.start_time , INTERVAL 1 HOUR) AND DATE_ADD(course.end_time, INTERVAL 1 HOUR)
AND  '$teacher_id'  = course.teacher_id 
AND course.subject LIKE '$subject%' ;";

$results = query($sql);

while($result = mysqli_fetch_assoc($results)) {
    $array_result[] = $result;
}
echo json_encode($array_result, JSON_UNESCAPED_UNICODE);

mysqli_free_result($results);
?>