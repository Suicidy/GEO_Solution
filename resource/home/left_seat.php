<?php
	require_once $_SERVER['DOCUMENT_ROOT'].'/geo_solution/config.php';

	$id = $_POST['course_id'];
	$result = "SELECT course.course_id , course.max_seat - count(assign_course.course_id) AS leftSeat , course.max_seat
	FROM assign_course RIGHT JOIN course ON assign_course.course_id = course.course_id
	WHERE course.course_id = $id
	GROUP BY course.course_id;";
  
    $sql=query($result);
    while($rs=mysqli_fetch_array($sql,MYSQLI_ASSOC))
        {   
           $final = $rs['leftSeat'].'/'.$rs['max_seat'];
        }
        echo $final;
        mysqli_free_result($sql);
?>
