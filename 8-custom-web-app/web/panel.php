<h1 id="panel-title">My Vault</h1>

<script>

    function visibility(pwNum) {
        let html = document.getElementById("pw-visibility-" + pwNum).innerHTML;

        let returnPass;

        if (html.charAt(0) == "•") {
            returnPass = document.getElementById("pw-visibility-" + pwNum + "-hidden").innerHTML;
        } else {
            for (let i = 0; i < html.length; i++) {
                returnPass += "•";
            }
        }

        // Remove weird undefimed in front
        returnPass = returnPass.substring(9);

        document.getElementById("pw-visibility-" + pwNum).innerHTML = returnPass;
        console.log(returnPass);
    }

</script>

<table id="passwords"> <!-- cellpadding="0" cellspacing="0" -->
    <tr id="pw-heading">
        <th>Title</th>
        <th>Username/Email</th>
        <th>Password</th>
        <th>👁</th>
    </tr>
    <tbody>
        <?php
        
        $conn = dbConnect();

        $sql = "SELECT pwd_title, pwd_username, pwd_email, pwd_password FROM passwords";

        $result = $conn->query($sql);
        
        
        $increment = 1;
        
        while($row = $result->fetch_assoc())
        {
            echo "<tr>";
            // Title
            echo "<td>";
            echo $row["pwd_title"];
            echo "</td>";

            if (isset($row["pwd_username"]))
            {
                // Username
                echo "<td>";
                echo $row["pwd_username"];
                echo "</td>";
            }
            else
            {
                // Email
                echo "<td>";
                echo $row["pwd_email"];
                echo "</td>";
            }

            // Password
            echo "<td id='pw-visibility-$increment'>";
            echo $row["pwd_password"];
            echo "</td>";

            // Hidden password - used for returning the password with visibility
            echo "<td id='pw-visibility-$increment-hidden' class='pw-hidden'>";
            echo $row["pwd_password"];
            echo "</td>";

            // Visibility icon
            echo "<td><button type='button' class='pw-visibility' onclick='visibility($increment)'>";
            echo "👁";
            echo "</button></td>";

            $increment++;
            echo "</tr>";
        }

        
        ?>
    </tbody>
</table>