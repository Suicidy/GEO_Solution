<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/geo_solution/config.php';
    session_start();
    $data = array();
    $sql = 'select student_id,title,firstname,lastname,faculty,department,tel,email,facebook,line from student where student_id='.$_SESSION['username'].';';
    $results = query($sql);
    while($result = mysqli_fetch_assoc($results)) {
        $data = $result;
    }
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
    mysqli_free_result($results);
?>