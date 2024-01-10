<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1080, initial-scale=1.0">
    <title>PHP Hello File</title>
</head>
<body>

    <?php

    echo "Hello!";

    $name = "Aidan";

    echo "Hello, $name!";

    $x = 5;
    $y = 3;

    echo "$x * $y = " . ($x * $y);

    function square($number)
    {
        return $number * $number;
    }

    echo "<br><br>";

    echo "4 squared is ". square(4);

    ?>

</body>
</html>