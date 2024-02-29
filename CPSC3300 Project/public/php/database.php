<?php
    //$servername = "css1.seattleu.edu";
    //$username = "bkim7@seattleu.edu";
    //$password = "";

    $servername = "localhost";
    $username = "root";
    $password = "a";
    $database_name = "QUARTERPROJECT";

    // Create connection
    $conn = new mysqli($servername, $username, null, $database_name);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    echo "Connected successfully";
?>