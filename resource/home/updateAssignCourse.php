<?php
        require $_SERVER['DOCUMENT_ROOT'].'/geo_solution/config.php';

        session_start();

        //student_id
        $_SESSIOM['username'];

        $_POST['course_id'];

        $result = 'SELECT * FROM `assign_course` WHERE student_id='.$_SESSIOM['username'];
        $sql = query($result);
        $outp = '[';
        $count=0;
		while($rs=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
			if ($count==0) {
				$outp .= '{';
			}
			else{
				$outp .= ',{';
			}
			$count++;
			$outp .= '"course_id" :"'.$rs['course_id'].'"}';
		}
		$outp .= ']';

		mysqli_free_result($sql);

		echo json_encode($outp);
?>