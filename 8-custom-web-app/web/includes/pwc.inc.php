<?php

// Responsible for updating passwords in the database

// Data validation
if (!isset($_GET["title"]) || !isset($_GET["password"]) || !(isset($_GET["username"]) || isset($_GET["email"])) || $_GET["title"] == "" || $_GET["password"] == "" || ($_GET["username"] == "" && $_GET["email"] == ""))
{
    echo "<script>alert('Unable to add. You must have title, username/email, and password.');</script>";
    echo "<a href='../index.php'>Click here to go back</a>";
//    echo "\nTitle: " . $_GET["title"];
//    echo "\nPassword: " . $_GET["password"];
//    echo "\nUsername: " . $_GET["username"];
//    echo "\nEmail: " . $_GET["email"];
    die();
}

// Step 1: Determine if they want to delete or update/add
require "dbc.inc.php";
$id = isset($_GET["id"]) ? $_GET["id"] : "";
$conn = dbConnect();

if ($_GET["action"] == "delete")
{

    
    $sql = "DELETE FROM passwords WHERE pwd_id = $id";
    
    $conn->query($sql);
    
    $sql = "DELETE FROM security_questions WHERE sec_pwd_id = $id";
    
    $conn->query($sql);
    
    echo "Delete id: " . $id;
    // Redirect user
    header('Location: ../index.php?loc=panel');
    die();
}
elseif (isset($_GET["id"])) // Step 2: If we want to update/add, determine which one
{
    // If id is set, we want to update an existing record
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


    // Update security questions

    // First, delete any questions not in the new input
    $sql = "SELECT * FROM security_questions WHERE sec_pwd_id = $id";

    $result = $conn->query($sql);

    while($row = $result->fetch_assoc())
    {
        // Just realized that question in the query params is sec_title in the sql database... too late to change now!
        $question = $row["sec_title"]; 
        $found = false;

        for ($i = 1; $i <= 5; $i++)
        {
            // If there is a qurey param of this name and it equals the result from the query params, it has been found
            if (isset($_GET["question-" . $i]) && $_GET["question-" . $i] == $question)
            {
                $found = true;
            }
        }

        if (!$found)
        {
            // We need to delete the element from the sql database
            $delId = $row["sec_id"];

            $sql = "DELETE FROM security_questions WHERE sec_id = $delId";

            $conn->query($sql);
        }
    }

    // Insert new questions / check if they already exist
    for ($i = 1; $i <= 5; $i++) // Still hate typing $i every time instead of i...
    {
        if (isset($_GET["question-" . $i]))
        {
            // Check if it exists on the database
            $title = $_GET["question-" . $i];
            $sql = "SELECT * FROM security_questions WHERE sec_pwd_id = $id AND sec_title = '$title'";

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

                $sql = "UPDATE security_questions SET sec_title = '$title', sec_answer = '$answer' WHERE sec_id = $secId"; // May be an issue here with id's

                $conn->query($sql);
            }

        }
    }

    // Redirect
    header('Location: ../index.php?loc=panel');
    die();
}
else // Step 3: Password and questions need to be added as this is the first time.
{
    // First, create a new row in the database with the required fields
    $title = $_GET["title"];
    $password = $_GET["password"];

    $sql = "INSERT INTO  passwords (pwd_title, pwd_password)
            VALUES ('$title', '$password')";
    
    $conn->query($sql);


    // Get the id of the newly added password
    // Assuming no row will have the same title and password
    $sql = "SELECT * FROM passwords
            WHERE pwd_title = '$title' AND pwd_password = '$password'";

    $result = $conn->query($sql);
    $row = mysqli_fetch_assoc($result);

    $id = $row["pwd_id"];

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

    // Insert security questions
    for ($i = 1; $i <= 5; $i++)
    {
        if (isset($_GET["question-" . $i]))
        {
            // If it exists, insert it here
            $secTitle = $_GET["question-" . $i];
            $secAnswer = $_GET["answer-" . $i];
            $sql = "INSERT INTO security_questions (sec_pwd_id, sec_title, sec_answer)
                    VALUES ('$id', '$secTitle', '$secAnswer')";

            $conn->query($sql);
        }
    }

    header('Location: ../index.php?loc=panel');
    die();
}