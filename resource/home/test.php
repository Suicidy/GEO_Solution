<?php
  require $_SERVER['DOCUMENT_ROOT'].'/geo_solution/config.php';
  $courseid = 5;
  $studentid = 58070501090;
  //$comment = check_input($_POST['comment']);

  $sql = query("SELECT date(start_time) date ,time(start_time) start_time , time(end_time) end_time
          FROM course
          WHERE course_id = $courseid;");
    // $x= array();
  while($rs=mysqli_fetch_array($sql,MYSQLI_ASSOC))
        {
          $date_book = $rs['date'];
          $start_time = $rs['start_time'];
          $end_time = $rs['end_time'];
        }
          echo $date_book.'<br>';
          echo $start_time.'<br>';
          echo $end_time.'<br>';

$command = "SELECT assign_course.student_id,date(start_time) date ,time(start_time) start_time , time(end_time) end_time
              FROM assign_course JOIN course ON assign_course.course_id = course.course_id
              WHERE assign_course.student_id=$studentid and date(course.start_time) = '$date_book'";

              echo $command.'<br>';
$sql = query($command);
//echo $sql;
$time_overlay=0;
    while($rs=mysqli_fetch_array($sql,MYSQLI_ASSOC))
        {
            echo strtotime($rs['start_time']).'<br>';
            echo strtotime($rs['end_time']).'<br>';
            if(!((strtotime($rs['start_time'])>strtotime($end_time) and strtotime($rs['end_time'])>strtotime($end_time))
                  or (strtotime($rs['start_time'])<strtotime($start_time) and strtotime($rs['end_time']<strtotime($start_time))))){
              echo '0';
              return 0;
            }
        }
        echo '1';
return 1;
