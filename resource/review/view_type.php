<?php
session_start();
$data = array();
if (!isset($_SESSION['username'])){
    $data['type'] = "guest";
}
else{
    $data['type'] = $_SESSION['userview'];
}
echo json_encode($data, JSON_UNESCAPED_UNICODE);

?>