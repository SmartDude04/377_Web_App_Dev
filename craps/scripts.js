// Rolls die when the page loags
    // Defines an "anonymous function" that gets called when the page is ready
    // this could be just rollDie (without the ()) but usually you want more than one thing to happen. 
    // Called a callback function
$(document).ready(function () {
    // rollDice();
    turnAllOff();
})

// If point is 0, we are on the first (come out) role
// Else we are in the repeat rolls
let point = 0;

function rollDice() {
    turnAllOff();

    let roll1 = rollDie(1);
    let roll2 = rollDie(2);

    let total = roll1 + roll2;
    console.log(total);

    checkRoll(total);
    
}

function checkRoll(roll) {
    if (point == 0) { // First roll
        if (roll == 7 || roll == 11) {
            $("#message").text("You win!");

        } else if (roll == 2 || roll == 3 || roll == 12) {
            $("#message").text("You lose!");

        } else {
            $("#point").text(roll);
            $("#message").text("");
            point = roll;
        }
    } else { // Re-roll
        if (roll == 7) {
            $("#message").text("You lose!");
            $("#point").text("X");
            point = 0;
        } else if (roll == point) {
            $("#message").text("You win!");
            $("#point").text("X");
            point = 0;
        }
    }
}

function rollDie(dieNumber) { 
    let randNum = Math.floor(Math.random() * 6 + 1);

    if (randNum == 1) {
        $("#d" + dieNumber + "p4").css("visibility", "visible");
    } else if (randNum ==  2) {
        $("#d" + dieNumber + "p1, #d" + dieNumber + "p7").css("visibility", "visible");
    } else if (randNum == 3) {
        $("#d" + dieNumber + "p1, #d" + dieNumber + "p4, #d" + dieNumber + "p7").css("visibility", "visible");
    } else if (randNum == 4) {
        $("#d" + dieNumber + "p1, #d" + dieNumber + "p3, #d" + dieNumber + "p5, #d" + dieNumber + "p7").css("visibility", "visible");
    } else if (randNum == 5) {
        $("#d" + dieNumber + "p1, #d" + dieNumber + "p3, #d" + dieNumber + "p4, #d" + dieNumber + "p5, #d" + dieNumber + "p7").css("visibility", "visible");
    } else if (randNum == 6) {
        $("#d" + dieNumber + "p1, #d" + dieNumber + "p2, #d" + dieNumber + "p3, #d" + dieNumber + "p5, #d" + dieNumber + "p6, #d" + dieNumber + "p7").css("visibility", "visible");
    }

    return randNum;
}

function turnAllOff() {
    $(".pip").css("visibility", "hidden");
}