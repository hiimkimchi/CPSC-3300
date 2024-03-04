<?php
$servername = "cssql.seattleu.edu";
$username = "mj-bkim7";
$password = "mj-bkim71548";
$database_name = "mj-bkim7";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database_name);

// Check connection
if (!$conn){
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "Connected successfully";
}

//mysqli_close($conn);
?>