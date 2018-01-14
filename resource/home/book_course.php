<?php
	
	require $_SERVER['DOCUMENT_ROOT'].'/geo/geo_solution/config.php';
	
	$courseid = check_input($_POST['course_id']);
	session_start();
	// $_SESSION["username"] = "58070501023";
	// $_SESSION["userview"] = "stu";
	if(isset( $_SESSION['username']) && ($_SESSION['userview'] == 'student'))
	{

			$sql=query(" SELECT course.course_id , count(assign_course.course_id) AS countSeat, course.max_seat
                 FROM assign_course RIGHT JOIN course ON assign_course.course_id = course.course_id
                 GROUP BY course.course_id
                 HAVING course.course_id = '$courseid';");
 			 $outp = array();
 	  	while($rs=mysqli_fetch_array($sql,MYSQLI_ASSOC))
      	{
      		$currentSeat = $rs['countSeat'];
      		$maxSeat = $rs['max_seat'];
     	 }
    
     // mysqli_free_result($sql);
    	if($currentSeat<$maxSeat)
    	{
    		$sql = query(" INSERT INTO `assign_course` (`course_id`, `student_id`, `comment_id`, `attending_status`, `star`, `time_stamp`) 
      				 VALUES ('$courseid', '$_SESSION['username']', NULL, '', NULL, CURRENT_TIMESTAMP);
					  ");


			if($sql==1) echo 'Successfull';
			else echo 'Booking Error';
			
   	 	}
   	 	else
   		{
    		echo 'This course is full already.';
    	}



	}
	else
	{
		echo 'No Permission';

	}
	
	//$_SESSION["username"] = "58070501023";


?>