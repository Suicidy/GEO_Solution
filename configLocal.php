<?php
    // GEO_Server

    // Server IP Address: 202.44.11.2
    // Linux user: geoweb
    // password: VtaDrvsGZdXEiK7PNdO5fU
    
    // Linux user: kanokphan
    // Password:26623men
    
    // Database name: geo_db
    // MySQL username: geo
    // MySQL password: 2e2SDQa8BdukcU0FviQPJ6thDcv1uAb
    
    
    // ====
    // วิธี login:
    // ssh -lgeoweb 202.44.11.2
    
    // วิธีเปิด MySQL console: 
    // mysql -ugeo -p
    
    /* Database credentials. Assuming you are running MySQL
    server with default setting (user 'root' with no password) */

    /*
        config for real server
    */

    // define('DB_SERVER', 'localhost');
    // define('DB_USERNAME', 'geo');
    // define('DB_PASSWORD', '2e2SDQa8BdukcU0FviQPJ6thDcv1uAb');
    // define('DB_NAME', 'geo_db');
    // define("DB_CHARSET","utf8");

    /*
        config for running from localhost
    */

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
        $result = mysqli_query($conn, $sql_statement);
        mysqli_close($conn);
        return $result;
    }

    ?>