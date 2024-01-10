<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1080, initial-scale=1.0">
    <title>School District List
    </title>
</head>
<body>
    <h2>Welcome to the school district!</h2>

    <h2>Student Enrolment</h2>

    <p>
        Filter by last name starting width
        <a href="school-list.php">All</a>
        
<?php

for ($i = 0; $i < 26; $i++)
{
    $letter = chr($i + ord("A"));
    echo '<a href="school-list.php?last_name=' . $letter . 'A">' . $letter . '</a> ';
}

?>

        <br><br>
        <form action="school-list.php">
            Filter by first name:
            <input type="text" name='first_name'>
            <input type='submit' value='Filter'>
        </form>

        <br>
        <form action="school-list.php">
            Filter by year of graduation: 
            <input type="number" name='yog'>
            <input type='submit' value='Filter'>
        </form>

        <br>
        <form action="school-list.php">
            Filter by homeroom:
            <input type="text" name='homeroom'>
            <input type='submit' value='Filter'>
        </form>

        <br>
        <form action="school-list.php">
            Filter by school:
            <input type="text" name='school'>
            <input type='submit' value='Filter'>
        </form>

    </p>


    <table border = 1>
        <tr>
            <th>First Name</th>
            <th>Last name</th>
            <th>YOG</th>
            <th>Homeroom</th>
            <th>Guidance Counselor</th>
            <th>School Name</th>
        </tr>

        <!--PHP goes here-->
<?php

$servername = "localhost";
$username = "root";
$password = "NsW284i^n95raK@Y%N4#";
$dbname = "sis";

$connection = new mysqli($servername, $username, $password, $dbname);
if ($connection->connect_error)
{
    die("Connection failed: " . $connection->connect_error);
}

extract($_REQUEST); // Turns the search parameters into variables
                    // Not needed if you want to to $_REQUEST["Variable_Name"] as the variable

$sql = "SELECT stu_first_name, stu_last_name, stu_yog, stu_homeroom, stu_counselor, skl_name FROM students
        JOIN schools on skl_id = stu_skl_id";

if (isset($first_name))
{
    $sql .= " WHERE stu_first_name LIKE '%$first_name%'";
}

if (isset($last_name))
{
    $sql .= " WHERE stu_last_name LIKE '$last_name%'";
}

if (isset($yog))
{
    $sql .= " WHERE stu_yog = '$yog'";
}

if (isset($homeroom))
{
    $sql .= " WHERE stu_homeroom = '$homeroom'";
}

if (isset($school))
{
    $sql .= " WHERE skl_name LIKE '%$school%'";
}

$sql .= " ORDER BY stu_last_name, stu_first_name";



$result = $connection->query($sql);
while ($row = $result->fetch_assoc())
{
    echo "<tr>";
    echo "<td>" . $row["stu_first_name"] . "</td>";
    echo "<td>" . $row["stu_last_name"] . "</td>";
    echo "<td>" . $row["stu_yog"] . "</td>";
    echo "<td>" . $row["stu_homeroom"] . "</td>";
    echo "<td>" . $row["stu_counselor"] . "</td>";
    echo "<td>" . $row["skl_name"] . "</td>";
    echo "</tr>";
}

?>

    </table>
</body>
</html>