<?php
        require $_SERVER['DOCUMENT_ROOT'].'/geo_solution/config.php';

        session_start();

        //student_id
        $_SESSIOM['username'];

        $_POST['course_id'];

        // $result = 'SELECT * FROM `assign_course` WHERE student_id='.$_SESSIOM['username'];
   //      $result = "SELECT c.subject, c.topic, t.title, t.firstname, t.lastname, date(c.start_time) as date, DATE_FORMAT(c.start_time,'%H:%i') start_time, DATE_FORMAT(c.end_time,'%H:%i') end_time
			// FROM course c, teacher t
			// WHERE c.teacher_id = t.teacher_id;";
		$result = "DELETE FROM assign_course WHERE course_id = ".$_POST['course_id']." AND student_id = ".$_SESSIOM['username'];
        $sql = query($result);
        $outp = array();
        $count=0;
		while($rs=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
			// if ($count==0) {
			// 	$outp .= '{';
			// }
			// else{
			// 	$outp .= ',{';
			// }
			// $count++;
			// $outp .= '"course_id" :"'.$rs['course_id'].'"}';
			$outp[] = $rs;
		}
		//$outp .= ']';

		mysqli_free_result($sql);

		echo json_encode($outp, JSON_UNESCAPED_UNICODE);
?>