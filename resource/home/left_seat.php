<?php
	require "../../config.php";

	$result = "SELECT course.course_id , count(assign_course.course_id) AS countSeat
	FROM assign_course RIGHT JOIN course ON assign_course.course_id = course.course_id
	WHERE course.course_id = 1
	GROUP BY course.course_id;";
        
        
        $sql=query($result);



    while($rs=mysqli_fetch_array($sql,MYSQLI_ASSOC))
        {   

           $final = $rs['countSeat'];

            //========================
        }
     

        echo $final;


        mysqli_free_result($sql);
        
        // $MTH112 .= "]";
        // $PHY102 .= "]";
        // $CHM103 .= "]";

        // echo json_encode($outp,JSON_UNESCAPED_UNICODE);
        // mysqli_close($con);

?>
