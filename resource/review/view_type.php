<?php
session_start();
if (!isset($_SESSION['username'])){
    $type = "guest";
}
else{
    $type = $_SESSION['userview'];
}
echo json_encode($type, JSON_UNESCAPED_UNICODE);

?>