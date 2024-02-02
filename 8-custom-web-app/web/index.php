<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1080, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="img/favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/styles.css?v=<?php echo rand()?>"/>
    <?php

    // Get proper css for each page
    if (!isset($_GET["loc"]))
    {
        echo '<link rel="stylesheet" type="text/css" href="css/homepage.css?v=' . rand() . '"/>';
    }
    elseif($_GET["loc"] == "panel")
    {
        echo '<link rel="stylesheet" type="text/css" href="css/panel.css?v=' . rand() . '"/>';
    }
    elseif($_GET["loc"] == "generator")
    {
        echo '<link rel="stylesheet" type="text/css" href="css/generator.css?v=' . rand() . '"/>';
    }
    elseif($_GET["loc"] == "creation")
    {
        echo '<link rel="stylesheet" type="text/css" href="css/creation.css?v=' . rand() . '"/>';
    }

    ?>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
    <title>TPM • Terrible Password Manager</title>
</head>
<body>
    <a href="/377WAD"> <!-- Change href if this link doesn't properly link -->
        <img src="img/logo.png" alt="logo link" class="nav-logo">
    </a>
    <nav class="grid-container grid-fit" id="navbar">
        <a class="nav-item" href="/377WAD?loc=panel">My Vault</a> <!-- Change href if this link doesn't properly link -->
        <a class="nav-item" href="/377WAD?loc=generator">Password Generator</a> <!-- Change href if this link doesn't properly link -->
        <a class="nav-item" href="/377WAD?loc=creation" id="new-password-box">New Password</a> <!-- Change href if this link doesn't properly link -->
    </nav>

    <div class="content">
    <?php

    require "includes/dbc.inc.php";

    if (!isset($_GET["loc"]))
    {

        include "homepage.php";
    }
    elseif($_GET["loc"] == "panel")
    {
        include "panel.php";
    }
    elseif($_GET["loc"] == "generator")
    {
        require "includes/pwg.inc.php";
        include "generator.php";
    }
    elseif($_GET["loc"] == "creation")
    {
        require "includes/pwg.inc.php";
        include "creation.php";
    }

    ?>
    </div>

    <!-- Bottom Bar -->
    <!-- <div class="bottom" id="footer">
        <h1>Made by Aidan</h1>
        <h1 id="warning">Warning: Please do not store in-use passwords in here!</h1>
        <h1>377: Web Appplication Development</h1>
    </div> -->

</body>
</html>