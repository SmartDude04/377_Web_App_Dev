<?php


function dbConnect()
{
    $servername = "localhost";
    $username = "root";
    $password = "NsW284i^n95raK@Y%N4#";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password);
    
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}