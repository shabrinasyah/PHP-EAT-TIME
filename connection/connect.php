<?php

//main connection file for both admin & front end
$servername = "localhost"; //server
$username = "online_rest"; //username
$password = "tFDafEoS!3"; //password
$dbname = "online_rest";  //database

// Create connection
$db = mysqli_connect($servername, $username, $password, $dbname); // connecting 
// Check connection
if (!$db) {       //checking connection to DB	
    die("Connection failed: " . mysqli_connect_error());
}

?>