<?php

// Responsible for updating passwords in the database


// Step 1: Determine if they want to delete or update/add
require "dbc.inc.php";
$id = $_GET["id"];
$conn = dbConnect();

if ($_GET["action"] == "delete")
{

    $sql = "DELETE FROM passwords WHERE pwd_id = $id";

    $conn->query($sql);

    $sql = "DELETE FROM security_questions WHERE sec_pwd_id = $id";

    $conn->query($sql);

    // Redirect user
    header('Location: ../index.php?loc=panel');
    die();
}
elseif (isset($_GET["id"])) // Step 2: If we want to update/add, determine which one
{
    // If id is set, we want to update an existing record
    
    die();
    // Update password table
    $title = $_GET["title"];
    $password = $_GET["password"];

    $sql = "UPDATE passwords SET pwd_title = '$title', pwd_password = '$password' WHERE pwd_id = $id";
    $conn->query($sql);

    // Update optional pieces
    if (isset($_GET["username"]))
    {
        $username = $_GET["username"];
        $sql = "UPDATE passwords SET pwd_username = '$username' WHERE pwd_id=$id";
        $conn->query($sql);
    }
    if (isset($_GET["email"]))
    {
        $email = $_GET["email"];
        $sql = "UPDATE passwords SET pwd_email = '$email' WHERE pwd_id=$id";
        $conn->query($sql);
    }
    if (isset($_GET["url"]))
    {
        $url = $_GET["url"];
        $sql = "UPDATE passwords SET pwd_url = '$url' WHERE pwd_id=$id";
        $conn->query($sql);
    }

    header('Location: ../index.php?loc=panel');
    die();


    // Update security questions

    // First, delete any questions not in the new input
    $sql = "SELECT * FROM security_questions WHERE sec_pwd_id = $id";

    $result = $conn->query($sql);

    while($row = $result->fetch_assoc())
    {
        $found = false;
        for ($i = 1; $i <= 5; $i++)
        {
            if (isset($_GET["question-" . $i]))
            {
                // if ($_)
            }
        }
    }

    for ($i = 1; $i <= 5; $i++) // Still hate typing $i every time instead of i...
    {
        if (isset($_GET["question-" . $i]))
        {
            // Check if it exists on the database
            $title = $_GET["question-" . $i];
            $sql = "SELECT * FROM security_questions WHERE sec_pwd_id = $id AND sec_title = $title";

            $result = $conn->query($sql);

            if (mysqli_num_rows($result) == 0)
            {
                // Needs to be created
                $title = $_GET["question-" . $i];
                $answer = $_GET["answer-" . $i];
                $sql = "INSERT INTO security_questions (sec_pwd_id, sec_title, sec_answer) VALUES ('$id', '$title', '$answer')";

                $conn->query($sql);
            }
            else
            {
                $result = mysqli_fetch_row($result);
                // Needs to be updated
                $title = $_GET["question-" . $i];
                $answer = $_GET["answer-" . $i];
                $secId = $result[0];

                $sql = "UPDATE password_generator SET sec_title = '$title', sec_answer = '$answer' WHERE sec_pwd_id = $id AND sec_id = $secId"; // May be an issue here with id's

                $conn->query($sql);
            }

        }
    }
}