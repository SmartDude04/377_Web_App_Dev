// Rolls die when the page loags
    // Defines an "anonymous function" that gets called when the page is ready
    // this could be just rollDie (without the ()) but usually you want more than one thing to happen. 
    // Called a callback function
$(document).ready(function () {
    // rollDice();
})

// Constants
const MINIMUM_BET = 5;
const STARTING_FUNDS = 50;

// If point is 0, we are on the first (come out) role
// Else we are in the repeat rolls
let point = 0;
let bet = 0;
let winnings = STARTING_FUNDS;

function rollDice() {

    if (point > 0 || validateBet()) {
        turnAllOff();
    
        let roll1 = rollDie(1);
        let roll2 = rollDie(2);
    
        let total = roll1 + roll2;
        console.log(total);
    
        checkRoll(total);
    } else {
        if (winnings < bet) {
            $("#message").text("You ran out of money...");
        } else {
            $("#message").text("Enter a bet between $" + MINIMUM_BET + " and $" + winnings);
        }
    }
    
}

function validateBet() {
    bet = parseInt($("#bet").val());

    if (isNaN(bet) || bet < MINIMUM_BET || bet > winnings) {
        return false
    }

    $("#bet").prop("disabled", true);
    return true;
}

function checkRoll(roll) {
    let win = false;
    let lost = false;

    if (point == 0) { // First roll
        if (roll == 7 || roll == 11) {
            $("#message").text("You win!");
            win = true;
        } else if (roll == 2 || roll == 3 || roll == 12) {
            $("#message").text("You lose!");
            lost = true;

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
            lost = true;
        } else if (roll == point) {
            $("#message").text("You win!");
            $("#point").text("X");
            point = 0;
            win = true;
        }
    }

    if (win) {
        winnings += bet;
        console.log("won");
        $("#winnings").text("$" + winnings);
        bet = 0;
        $("#bet").val(0);
        $("#bet").prop("disabled", false);
    } else if (lost) {
        winnings -= bet;
        console.log("lost");
        $("#winnings").text("$" + winnings);
        bet = 0;
        $("#bet").val(0);
        $("#bet").prop("disabled", false);
    }
}

function rollDie(dieNumber, setNum) { 
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

