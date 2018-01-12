 <?php

    /* Database credentials. Assuming you are running MySQL
    server with default setting (user 'root' with no password) */

    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'geo_db');
    define("DB_CHARSET","utf8");

    /* Attempt to connect to MySQL database */

    $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    // Check connection

    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    function query($sql_statement){
        $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        mysqli_set_charset( $conn, DB_CHARSET);
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