<?php
session_start();
$username = $_SESSION['username'];
$userview = $_SESSION['userview'];

echo json_encode($type, JSON_UNESCAPED_UNICODE);
?>