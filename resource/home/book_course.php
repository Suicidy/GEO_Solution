<?php
	
	require $_SERVER['DOCUMENT_ROOT'].'/geo_solution/config.php';
	
	$courseid = check_input($_POST['course_id']);
	$comment = check_input($_POST['comment']);
	session_start();

	if(isset( $_SESSION['username']) && ($_SESSION['userview'] == 'student'))
	{
		$sql=query(" SELECT course.course_id , count(assign_course.course_id) AS countSeat, course.max_seat
                 FROM assign_course RIGHT JOIN course ON assign_course.course_id = course.course_id
                 GROUP BY course.course_id
                 HAVING course.course_id = '$courseid';");
 		//$outp = array();


 	  	while($rs=mysqli_fetch_array($sql,MYSQLI_ASSOC))
      	{
      		$currentSeat = $rs['countSeat'];
      		$maxSeat = $rs['max_seat'];
     	 }
    
    	if($currentSeat<$maxSeat)
    	{   
    		 $user = $_SESSION['username'];
    		 $command_insertcourse =  "INSERT INTO `assign_course` (`course_id`, `student_id`, `comment_id`, `star`, `time_stamp`)VALUES ($courseid,$user, NULL, NULL,CURRENT_TIMESTAMP);";
    		 $sql = query($command_insertcourse);
    		 
    		 if($comment!=''){
				 if($sql==1) {
			 		$find_commentid =   "SELECT comment_id
			 						 	FROM assign_course
			 						    WHERE course_id = $courseid and student_id = $user";
			 		while($rs=mysqli_fetch_array($find_commentid,MYSQLI_ASSOC))
      					{
      						$comment_id = $rs['comment_id'];
     					}
     			 	$command_insertcomment =  "INSERT INTO `review` (`comment_id`,`type`,`review_txt`,`show_status`) VALUES ($comment_id,'beforeClass','$comment',1);";
     				$check_comment = query($command_insertcomment);	

     				if($check_comment)echo 'สถานะการจองสำเร็จแล้ว และพี่ TA ได้รับความคิดเห็นของคุณแล้ว';
     				else echo 'จองแล้ว comment ไม่เข้า';
				}
				 else echo 'การจองล้มเหลวกรุณาเช็คว่าคุณได้จองไปแล้วหรือยัง';
			}
			echo'สถานะการจองสำเร็จแล้ว';
   	 	}
   	 	else
   		{
    		echo 'คลาสเรียนนี้เต็มแล้ว';
    	}
	}
	else
	{
		echo 'คุณไม่มีสิทธิ์การจอง';
	}
	
	//$_SESSION["username"] = "58070501023";
?>