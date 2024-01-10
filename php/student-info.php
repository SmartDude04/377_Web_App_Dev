<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1080, initial-scale=1.0">
<?php
if (!(isset($stu_name) && isset($stu_first_name) && isset($stu_last_name)))
{
    die("Must input a student name into URL");
}
echo "<title>" . $_REQUEST['stu_name'] . " - Student Info</title>";

?>
</head>
<body>
<?php

echo "<h1>Student info for " . $_REQUEST['stu_name'] . "</h1><br/><br/><br/>";

$servername = "localhost";
$username = "root";
$password = "NsW284i^n95raK@Y%N4#";
$dbname = "sis";

$connection = new mysqli($servername, $username, $password, $dbname);
if ($connection->connect_error)
{
    die("Connection failed: " . $connection->connect_error);
}

$result = mysqli_query($connection, "SELECT * FROM students WHERE stu_first_name = " . $stu_first_name . " AND stu_last_name = " . $stu_last_name);
$row = mysqli_fetch_row($result);

echo count($row);



?>

</body>
</html>