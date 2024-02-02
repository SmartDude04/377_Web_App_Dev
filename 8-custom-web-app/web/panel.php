
<?php

// Check if there are currently no passwords
$conn = dbConnect();

$sql = "SELECT pwd_id, pwd_title, pwd_username, pwd_email, pwd_password FROM passwords";

$result = $conn->query($sql);

if (mysqli_num_rows($result) == 0)
{
    echo "<h1 id='no-passwords'>You currently have no passwords stored. <a id='no-passwords-link' href='/377WAD?loc=creation'>Create one here</a>.</h1>";
    die();
}


?>

<h1 id="panel-title">My Vault</h1>

<script>

    function visibility(pwNum) {
        let html = document.getElementById("pw-visibility-" + pwNum).innerHTML;

        let returnPass;

        if (html.charAt(0) == "•") {
            returnPass = document.getElementById("pw-visibility-" + pwNum + "-hidden").innerHTML;

            // Change color of visibility icon
            document.getElementById("pw-eye-" + pwNum).style.color = "black";
        } else { // Needs to change to dots
            for (let i = 0; i < html.length; i++) {
                returnPass += "•";
            }
            returnPass = returnPass.substring(9);
            document.getElementById("pw-eye-" + pwNum).style.color = "white";
        }

        // Remove weird undefimed in front

        document.getElementById("pw-visibility-" + pwNum).innerHTML = returnPass;
        console.log(returnPass);
        console.log("Password should be: " + document.getElementById("pw-visibility-" + pwNum + "-hidden").innerHTML);
    }

</script>


<table id="passwords"> <!-- cellpadding="0" cellspacing="0" -->
    <tr id="pw-heading">
        <th>Title</th>
        <th>Username</th>
        <th>Password</th>
        <th>👁</th>
    </tr>
    <tbody>
        <?php
        
        $conn = dbConnect();

        $sql = "SELECT pwd_id, pwd_title, pwd_username, pwd_email, pwd_password FROM passwords";

        $result = $conn->query($sql);
        
        
        $increment = 1;

        
        while($row = $result->fetch_assoc())
        {
            $id = $row["pwd_id"];

            $start = "<td><a href='/377WAD?loc=creation&id=$id'>";
            $end = "</a></td>";
            $startLink = "<a href='/377WAD? loc=creation&id=$id'>";

            // Password needs to be different because inner html of innermost element is needed for password visibility
            $startLinkPassword = "<a href='/377WAD?loc=creation&id=$id' id='pw-visibility-$increment'>";
            
            
            echo "<tr>";

            // Title
            echo $start;
            echo $row["pwd_title"];
            echo $end;

            if (isset($row["pwd_username"]) && $row["pwd_username"] != "")
            {
                // Username
                echo $start;
                echo $row["pwd_username"];
                echo $end;
            }
            else
            {
                // Email
                echo $start;
                echo $row["pwd_email"];
                echo $end;
            }

            
            
            // Password
            echo "<td>$startLinkPassword";
            $pwLen = strlen($row["pwd_password"]);
            for ($i = 0; $i < $pwLen; $i++)
            {
                echo "•";
            }
            echo $end;

            // Hidden password - used for returning the password with visibility
            echo "<td id='pw-visibility-$increment-hidden' class='pw-hidden'>";
            echo $row["pwd_password"];
            echo "</td>";

            // Visibility icon
            echo "<td><button type='button' class='pw-visibility' id='pw-eye-$increment' onclick='visibility($increment)'>";
            echo "👁";
            echo "</button></td>";

            $increment++;
            echo "</tr>";
        }

        
        ?>
    </tbody>
</table>