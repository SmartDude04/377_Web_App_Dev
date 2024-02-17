<h1 id="create-title">
    <?php


    
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
        document.getElementById("action-input").value = "delete";
        document.getElementById("id-input").value = <?php echo isset($id) ? $id : "''" ?>;
    }

    function savePassword(update) {
        if (update) {
            document.getElementById("id-input").value = <?php echo isset($id) ? $id : "''" ?>;
        } else {
            document.getElementById("id-input").remove();
        }
        return false;
    }

    let questionNum = 1;

    function newSecurityQuestion() { // Need to get existing questions here too

        // Max security questions just because it would be unrealistic to have more than 5

        if (questionNum <= 5) {
            let fullDiv = "<div class='full-question' id='delete-" + questionNum + "'>";
            let topDiv = "<div class='question' id='question-box-" + questionNum + "'>";
            let questionLabel = "<label for='question-" + questionNum + "' class='question-label'>Question:</label>";
            let questionInput = "<input type='text' class='question-input' name='question-" + questionNum + "' id='question-" + questionNum + "'>";
            let answerLabel = "<label for='answer-" + questionNum + "' class='answer-label'>Answer:</label>";
            let answerInput = "<input type='text' class='answer-input' name='answer-" + questionNum + "' id='answer-" + questionNum + "'>";
            let bottomDiv = "</div>";
            let deleteButton = "<button type='button' class='question-delete-button' onclick='deleteQuestion(" + questionNum + ")'>Delete</button>";
            let end = "</div>";
    
            document.getElementById("security-questions").innerHTML += fullDiv + topDiv + questionLabel + questionInput + answerLabel + answerInput + bottomDiv + deleteButton + end;
    
            questionNum++;
        } else {
            alert("Cannot create more than 5 security questions!");
        }
    }

    function setSecurityQuestion(title, answer) {
        let fullDiv = "<div class='full-question' id='delete-" + questionNum + "'>";
        let topDiv = "<div class='question' id='question-box-" + questionNum + "'>";
        let questionLabel = "<label for='question-" + questionNum + "' class='question-label'>Question:</label>";
        let questionInput = "<input type='text' class='question-input' name='question-" + questionNum + "' id='question-" + questionNum + "' value='" + title + "'>";
        let answerLabel = "<label for='answer-" + questionNum + "' class='answer-label'>Answer:</label>";
        let answerInput = "<input type='text' class='answer-input' name='answer-" + questionNum + "' id='answer-" + questionNum + "' value='" + answer + "'>";
        let bottomDiv = "</div>";
        let deleteButton = "<button type='button' class='question-delete-button' onclick='deleteQuestion(" + questionNum + ")'>Delete</button>";
        let end = "</div>";

        document.getElementById("security-questions").innerHTML += fullDiv + topDiv + questionLabel + questionInput + answerLabel + answerInput + bottomDiv + deleteButton + end;

        questionNum++;
    }

    function deleteQuestion(deleteNum) {
        document.getElementById("delete-" + deleteNum).remove();
        // Yes, I know you wont be able to add another question without refreshing because I didn't decrement the 
        // question num variable.. this was so two divs didn't have the same id, or fields that needed to be deleted
        // didn't get filled over

        // Probably a way to do it so it works all the time, but this was the easiest... and quickest
    }

</script>

<form id="create-password" action="includes/pwc.inc.php" class="pw-container">

    <div class="left-side">

        <label for="pw-title" class="password-label">Title:</label>
        <input type="text" class="password-input" id="pw-title" name="title" value="<?php echo $pw[0] ?? "";  ?>">

        <label for="pw-username" class="password-label">Username:</label>
        <input type="text" class="password-input" id="pw-username" name="username" value="<?php echo $pw[1] ?? "";  ?>">

        <label for="pw-email" class="password-label">Email:</label>
        <input type="text" class="password-input" id="pw-email" name="email" value="<?php echo $pw[2] ?? "";  ?>">

        <label for="pw-url" class="password-label">Website:</label>
        <input type="text" class="password-input" id="pw-url" name="url" value="<?php echo $pw[3] ?? "";  ?>">
    </div>

    <!-- These are hidden and make the creation statements in pwc.inc.php work correctly -->
    <input type="hidden" value="create-update" name="action" id="action-input">
    <input type="hidden" value="0" name="id" id="id-input">

    <div class="right-side">

        <label for="password" class="password-label" id="pw-password-title">Password</label><br>
        <input type="text" class="password-input" id="pw-password" name="password" value="<?php echo $pw[4] ?? $password;  ?>">
        
        <div id="buttons">
            <input type="submit" id="pw-button-save" value="Save" onclick="savePassword(<?php echo isset($_GET['id'])?>)">
            <input type="<?php echo isset($_GET['id']) ? 'submit' : 'hidden'?>" id="pw-button-delete" value="Delete" onclick="deletePassword()">
        </div>
    </div>

    <div id="security-questions">
        
        <button type="button" id="sec-button" onclick="newSecurityQuestion()">+</button>
        <label id="sec-button-label">New Security Question</label>

        <?php
        
        if (isset($pw[0]) && mysqli_num_rows($questions) != 0)
        {
            while($row = $questions->fetch_assoc())
            {
                $title = $row["sec_title"];
                $answer = $row["sec_answer"];
                echo "<script>setSecurityQuestion('$title', '$answer');</script>";
            }
        }
        
        ?>

    </div>

</form>