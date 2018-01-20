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
			$user = $_SESSION['username'];
    	if(check_overlay($courseid,$user)){

    	if($currentSeat<$maxSeat)
    	{

    		 $command_insertcourse =  "INSERT INTO `assign_course` (`course_id`, `student_id`, `comment_id`, `star`, `time_stamp`)VALUES ($courseid,$user, NULL, NULL,CURRENT_TIMESTAMP);";
    		 $sql = query($command_insertcourse);

    		 if($sql==1){
				 if($comment!='') {
			 		$find_commentid =  "SELECT comment_id
			 						 	FROM assign_course
			 						    WHERE course_id = $courseid and student_id = $user";
			 		$find_commentid = query($find_commentid);
			 		while($rs=mysqli_fetch_array($find_commentid,MYSQLI_ASSOC))
      				{
      					$comment_id = $rs['comment_id'];

     				}
     			 	$command_insertcomment =  "INSERT INTO `review` (`comment_id`,`type`,`review_txt`,`show_status`) VALUES ($comment_id,'beforeClass','$comment',1);";

     				$check_comment = query($command_insertcomment);

     				if($check_comment==1){
     					echo 'สถานะการจองสำเร็จแล้ว และพี่ TA ได้รับความคิดเห็นของคุณแล้ว';
     				}
     				else {
     					echo 'จองแล้ว comment ไม่เข้า';
     				}
				}
				else{
					echo'สถานะการจองสำเร็จแล้ว';
				}
			}
			else{
				 echo 'การจองล้มเหลวกรุณาเช็คว่าคุณได้จองไปแล้วหรือยัง';
			}
   	 	}
   	 	else
   		{
    		echo 'คลาสเรียนนี้เต็มแล้ว';
    	}
		}
		else echo "คลาสที่กำลังจะจองมีเวลาตรงกับคลาสเรียนที่ลงไปแล้ว";
	}
	else
	{
		echo 'คุณไม่ได้รับมีสิทธิ์การจอง';
	}

	function check_overlay($courseid,$studentid){
	  // $courseid = 5;
	  // $studentid = 58070501090;
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
	          // echo $date_book.'<br>';
	          // echo $start_time.'<br>';
	          // echo $end_time.'<br>';

	$command = "SELECT assign_course.student_id,date(start_time) date ,time(start_time) start_time , time(end_time) end_time
	              FROM assign_course JOIN course ON assign_course.course_id = course.course_id
	              WHERE assign_course.student_id=$studentid and date(course.start_time) = '$date_book'";

	              // echo $command.'<br>';
	$sql = query($command);
	//echo $sql;
	//$time_overlay=0;
	    while($rs=mysqli_fetch_array($sql,MYSQLI_ASSOC))
	        {
	            if(!((strtotime($rs['start_time'])>=strtotime($end_time) && strtotime($rs['end_time'])>strtotime($end_time))
	                  || (strtotime($rs['start_time'])<strtotime($start_time) && strtotime($rs['end_time'])<=strtotime($start_time)))){
								// echo $date_book.'<br>';
								//  echo strtotime($start_time).' '.strtotime($end_time).'<br>';
								//  echo strtotime($rs['start_time']).' '.strtotime($rs['end_time']).'<br>';

	              return 0;
	            }
	        }
	       // echo '1';
	return 1;

	}
