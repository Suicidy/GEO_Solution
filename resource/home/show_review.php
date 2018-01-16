<?php

	require $_SERVER['DOCUMENT_ROOT'].'/geo_solution/config.php';

	$teacherid = $_POST['teacher_id'];

	$result = "SELECT t.teacher_id,r.review_txt, ac.star, ac.time_stamp
		FROM teacher t, course c, assign_course ac,review r
		WHERE c.teacher_id = t.teacher_id 
		AND c.course_id = ac.course_id
		AND ac.comment_id = r.comment_id 
        AND r.show_status =1
        AND r.type = 'teacher'
        AND t.teacher_id = '$teacherid' ";
        
     $sql=query($result);
 	 
 	 $outp = array();

      while($rs=mysqli_fetch_array($sql,MYSQLI_ASSOC))
      {
      	$outp[] = $rs;

      }
      echo json_encode($outp, JSON_UNESCAPED_UNICODE);

	 mysqli_free_result($sql);

?>