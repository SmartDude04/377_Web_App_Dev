<h1 id="generator-title">Password Generator</h1>

<div id="password-box">
    <h1 id="password">
    <?php
    
    $length = $_GET["length"] ?? 20;
    $nums = $_GET["nums"] ?? 3;
    $special = $_GET["special"] ?? 3;

    $password = $nums + $special <= $length ? passwordGenerator($length, $nums, $special, true) : "";

    if($nums + $special > $length)
    {
        echo "Make length bigger...";
    }
    else
    {
        echo $password[0];
    }
    
    ?>
    </h1>
</div>

<form id="password-settings" action='/377WAD'>
    <input type="submit" class="password-generate" value="Generate!">

    <script>
        function lenStepUp() {
            document.getElementById("length").stepUp(1);
        }

        function lenStepDown() {
            document.getElementById("length").stepDown(1);
        }

        function numsStepUp() {
            document.getElementById("nums").stepUp(1);
        }

        function numsStepDown() {
            document.getElementById("nums").stepDown(1);
        }

        function specialStepUp() {
            document.getElementById("special").stepUp(1);
        }

        function specialStepDown() {
            document.getElementById("special").stepDown(1);
        }

        function copyPass(password) {

            // Copy the text inside the text field
            navigator.clipboard.writeText(password);

            // Alert the copied text
            alert("Copied your password to the clipboard!");
        }
    </script>

    <div class="input-container">
        <div class="input-holder">
            <label class="password-label" for="length">Length:</label>
            <input class="password-input" id="length" type="number" name="length" max="20" min="0" value="<?php echo $_GET["length"] ?? 20 ?>">
            
            <button class="pw-button button-up" type="button" onclick="lenStepUp()">⇧</button>
            <button class="pw-button button-down" type="button" onclick="lenStepDown()">⇩</button>
        </div>
    
        <div class="input-holder">
            <label class="password-label" for="nums">Numbers:</label>
            <input class="password-input" id="nums" type="number" name="nums" max="20" min="0" value="<?php echo $_GET["nums"] ?? 3 ?>">
            
            <button class="pw-button button-up" type="button" onclick="numsStepUp()">⇧</button>
            <button class="pw-button button-down" type="button" onclick="numsStepDown()">⇩</button>
        </div>
    
        <div class="input-holder">
            <label class="password-label" for="special">Special:</label>
            <input class="password-input" id="special" type="number" name="special" max="20" min="0" value="<?php echo $_GET["special"] ?? 3 ?>">

            <button class="pw-button button-up" type="button" onclick="specialStepUp()">⇧</button>
            <button class="pw-button button-down" type="button" onclick="specialStepDown()">⇩</button>
        </div>
    
        <!-- Hidden - only to redirect to the correct page -->
        <input type="text" id="hidden-param" name="loc" value="generator">
    </div>

    <input type="button" id="clipboard" value="Copy to Clipboard" onclick="copyPass('<?php echo $password[1] ?>')">
</form>