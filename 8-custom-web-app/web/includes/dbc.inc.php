<?php


function dbConnect()
{
    $servername = "localhost";
    $username = "root";
    $password = "NsW284i^n95raK@Y%N4#"; 
    $dbName = "tpm";
    // Even though storing the password here is insecure, the database is only run locally
    // To make things worse, this password is uploaded to GitHub...
    // Again since it's only local, it's not a big deal
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbName);
    
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}