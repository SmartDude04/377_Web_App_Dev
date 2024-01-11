<?php

$serverame = "localhost";
$username = "root";
$password = "NsW284i^n95raK@Y%N4#";
$dbname = "hmdb";

$connection = new mysqli($serverame, $username, $password, $dbname);
if ($connection->connect_error)
{
    die("Connection failed: " . $connection->connect_error);
}

extract($_REQUEST); // Turns the search parameters into variables
                    // Not needed if you want to to $_REQUEST["Variable_Name"] as the variable

$sql = "INSERT INTO movies (mov_title, mov_year, mov_genre) VALUES ('$title', '$year', '$genre')";
echo $sql;

$connection->query($sql);

echo "Created a movie!";
echo "<br/>";

?>