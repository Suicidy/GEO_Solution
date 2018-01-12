<?php
define("servername", "localhost");
define("username", "root");
define("password", "");
define("database","geo_db");
define("charset","utf8");

function query($sql_statement){
    $conn = mysqli_connect(servername, username, password, database);
    mysqli_set_charset( $conn, charset);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error()) . "<br>";
    }
    echo "Connected successfully" . "<br>";
    $result = mysqli_query($conn, $sql_statement);
    mysqli_close($conn);
    return $result;
}
?>