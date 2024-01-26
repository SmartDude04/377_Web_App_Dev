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
    <a href="index.php">
        <img src="img/logo.png" alt="logo link" class="nav-logo">
    </a>
    <nav class="grid-container grid-fit" id="navbar">
        <a class="nav-item" href="index.php?loc=panel">My Vault</a>
        <a class="nav-item" href="index.php?loc=generator">Password Generator</a>
        <a class="nav-item" href="index.php?loc=creation" id="new-password-box">New Password</a>
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
        include "generator.php";
    }
    elseif($_GET["loc"] == "creation")
    {
        include "creation.php";
    }

    ?>
    </div>

    <!-- Bottom Bar -->
    <div class="bottom">
        <h1>Made by Aidan</h1>
        <h1 id="warning">Warning: Please do not store in-use passwords in here!</h1>
        <h1>Do not reproduce</h1>
    </div>

</body>
</html>