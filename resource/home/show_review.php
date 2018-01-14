<?php

	require $_SERVER['DOCUMENT_ROOT'].'/geo/geo_solution/config.php';

	$teacherid = $_POST['teacher_id'];

	$result = "SELECT t.teacher_id,r.review_txt, ac.star, ac.time_stamp
			   FROM teacher t, course c, assign_course ac,review r
		    	WHERE t.teacher_id = '$teacherid'
					AND c.course_id = ac.course_id
					AND ac.comment_id = r.comment_id 
       			 AND r.show_status =1
       			 AND r.type = 'teacher'";
        
     $sql=query($result);

?>