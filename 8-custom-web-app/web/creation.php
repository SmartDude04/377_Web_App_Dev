<h1 id="create-title">
    <?php

    $pw;
    $questions;
    
    if (isset($_GET["id"]))
    {
        echo "Edit Login";

        // Run the select statement to gather data here
        $conn = dbConnect();

        $id = $_GET["id"];

        $sql = "SELECT pwd_title, pwd_username, pwd_email, pwd_url, pwd_password, pwd_notes
                FROM passwords
                WHERE pwd_id = $id";

        $pw = $conn->query($sql);

        $sql = "SELECT sec_title, sec_answer
                FROM security_questions
                WHERE sec_pwd_id = $id ";

        $questions = $conn->query($sql);

        $pw = mysqli_fetch_row($pw);
    
    }
    else
    {
        echo "Create Login";
        $password = passwordGenerator(20, 3, 3, true)[1];
    }
    
    ?>
</h1>

<script>

    function deletePassword() {
        document.getElementById("create-password").action = "/377WAD?loc=generator";
    }

    function savePassword(update) {
        if (update) {
            document.getElementById("id-input").value = <?php echo isset($id) ? $id : "''" ?>;
        } else {
            document.getElementById("id-input").remove();
        }
    }

</script>

<div>
    <form id="create-password" action="/377WAD/includes/pwc.inc.php"class="pw-container">

        <div class="left-side">

            <label for="title" class="password-label">Title:</label>
            <input type="text" class="password-input" id="pw-title" name="title" value="<?php echo isset($pw[0]) ? $pw[0] : "";  ?>">

            <label for="username" class="password-label">Username:</label>
            <input type="text" class="password-input" id="pw-username" name="username" value="<?php echo isset($pw[1]) ? $pw[1] : "";  ?>">

            <label for="email" class="password-label">Email:</label>
            <input type="text" class="password-input" id="pw-email" name="email" value="<?php echo isset($pw[2]) ? $pw[2] : "";  ?>">

            <label for="url" class="password-label">Website:</label>
            <input type="text" class="password-input" id="pw-url" name="url" value="<?php echo isset($pw[3]) ? $pw[3] : "";  ?>">
        </div>

        <div class="right-side">

            <label for="password" class="password-label" id="pw-password-title">Password</label><br>
            <input type="text" class="password-input" id="pw-password" name="password" value="<?php echo isset($pw[4]) ? $pw[4] : $password;  ?>">
            
            <input type="hidden" value="panel" name="action" id="action-input">
            <input type="hidden" value="0" name="id" id="id-input">
            
            <div id="buttons">
                <input type="submit" id="pw-button-save" value="Save" onclick="savePassword(<?php echo isset($_GET['id']) ? true : false; ?>)">
                <input type="submit" id="pw-button-delete" value="Delete" onclick="deletePassword()">
            </div>
        </div>

        <div id="security-questions">
            
            <button type="button" id="sec-button" onclick="newSecurityQuestion()">+</button>
            <label>New Security Question</label>

        </div>

    </form>
</div>