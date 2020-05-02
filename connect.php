<?php
    $server_name = "localhost";
    $user_name = "bca17symb30";
    $user_psw = "bca17symb30";
    $db_name = "bca17symb30_lb";

    // create a new connection
    $conn = new mysqli($server_name, $user_name, $user_psw, $db_name);

    // check connection
    if($conn->connect_error) {
        die("Connection failed: ".$conn->connect_error);
    }

    echo "<script>alert('Connected to database')</script>"
?>