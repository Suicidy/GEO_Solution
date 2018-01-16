<?php

	require $_SERVER['DOCUMENT_ROOT'].'/geo_solution/config.php';

	$teacherid = $_POST['teacher_id'];

	$result = "SELECT * FROM assign_course";
        
     $sql=query($result);
 	 
 	 $outp = array();

      while($rs=mysqli_fetch_array($sql,MYSQLI_ASSOC))
      {
      	$outp[] = $rs;

      }
      echo json_encode($outp, JSON_UNESCAPED_UNICODE);

	 mysqli_free_result($sql);

?>