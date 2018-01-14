<?php
	
	require $_SERVER['DOCUMENT_ROOT'].'/geo/geo_solution/config.php';
	$courseid=8;
	session_start();
	$_SESSION["username"] = "58070501090";

	$sql=query(" SELECT course.course_id , count(assign_course.course_id) AS countSeat, course.max_seat
                 FROM assign_course RIGHT JOIN course ON assign_course.course_id = course.course_id
                 GROUP BY course.course_id
                 HAVING course.course_id = '$courseid';
	");
 	 $outp = array();
 	  while($rs=mysqli_fetch_array($sql,MYSQLI_ASSOC))
      {
      	$currentSeat = $rs['countSeat'];
      	$maxSeat = $rs['max_seat'];
      }
    echo $currentSeat.','.$maxSeat;
     // mysqli_free_result($sql);

      $sql = query(" INSERT INTO `assign_course` (`course_id`, `student_id`, `comment_id`, `attending_status`, `star`, `time_stamp`) 
      				 VALUES ('$courseid', '$_SESSION[username]', NULL, '', NULL, CURRENT_TIMESTAMP);
				  ");

      echo $sql




?>