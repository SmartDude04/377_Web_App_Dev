<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1080, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/styles.css?v=<?php echo rand()?>"/>
<?php

// Get proper css for each page
if (!isset($_GET["loc"]))
{
    echo '<link rel="stylesheet" type="text/css" href="css/panel.css?v=' . rand() . '"/>';
}
elseif($_GET["loc"] == "generator")
{
    echo '<link rel="stylesheet" type="text/css" href="css/generator.css?v=' . rand() . '"/>';}
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
        <a class="element nav-item" href="index.php">My Vault</a>
        <a class="element nav-item" href="index.php?loc=generator">Password Generator</a>
        <a class="element nav-item" href="index.php?loc=creation" id="new-password-box">New Password</a>
    </nav>

    <div class="content">
<?php

require "includes/dbc.inc.php";

if (!isset($_GET["loc"]))
{
    require "panel.php";
}
elseif($_GET["loc"] == "generator")
{
    require "generator.php";
}
elseif($_GET["loc"] == "creation")
{
    require "creation.php";
}

?>
    </div>

</body>
</html>