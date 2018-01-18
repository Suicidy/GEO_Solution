<?php

//SQL Statement
require_once $_SERVER['DOCUMENT_ROOT'].'/geo_solution/config.php';
$sql = "SELECT DISTINCT teacher.teacher_id
FROM teacher;";

$results = query($sql);

while($result = mysqli_fetch_assoc($results)) {
   echo "<option value=".$result['teacher_id'].">".$result['teacher_id']."</option>";
}
mysqli_free_result($results);
?>