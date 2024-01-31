<h1 id="generator-title">Password Generator</h1>

<div id="password-box">
    <h1 id="password">
    <?php
    
    $length = isset($_GET["length"]) ? $_GET["length"] : 20;
    $nums = isset($_GET["nums"]) ? $_GET["nums"] : 3;
    $special = isset($_GET["special"]) ? $_GET["special"] : 3;

    if($nums + $special > $length)
    {
        echo "Make length bigger...";
    }
    elseif ($length > 22)
    {
        echo "Make length smaller...";
    }
    else
    {
        echo passwordGenerator($length, $nums, $special);
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
    </script>

    <div class="input-container">
        <div class="input-holder">
            <label class="password-label" for="length">Length:</label>
            <input class="password-input" id="length" type="number" name="length" value="<?php echo isset($_GET["length"]) ? $_GET["length"] : 20 ?>">
            
            <button class="pw-button button-up" type="button" onclick="lenStepUp()">⇧</button>
            <button class="pw-button button-down" type="button" onclick="lenStepDown()">⇩</button>
        </div>
    
        <div class="input-holder">
            <label class="password-label" for="nums">Numbers:</label>
            <input class="password-input" id="nums" type="number" name="nums" value="<?php echo isset($_GET["nums"]) ? $_GET["nums"] : 3 ?>">
            
            <button class="pw-button button-up" type="button" onclick="numsStepUp()">⇧</button>
            <button class="pw-button button-down" type="button" onclick="numsStepDown()">⇩</button>
        </div>
    
        <div class="input-holder">
            <label class="password-label" for="special">Special:</label>
            <input class="password-input" id="special" type="number" name="special" value="<?php echo isset($_GET["special"]) ? $_GET["special"] : 3 ?>">

            <button class="pw-button button-up" type="button" onclick="specialStepUp()">⇧</button>
            <button class="pw-button button-down" type="button" onclick="specialStepDown()">⇩</button>
        </div>
    
        <input type="text" id="hidden-param" name="loc" value="generator">
    </div>
</form>