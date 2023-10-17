// Rolls die when the page loags
    // Defines an "anonymous function" that gets called when the page is ready
    // this could be just rollDie (without the ()) but usually you want more than one thing to happen. 
    // Called a callback function
$(document).ready(function () {
    rollDice();
})

function rollDice() {
    turnAllOff();

    let roll1 = rollDie(1);
    let roll2 = rollDie(2);

    let total = roll1 + roll2;
    console.log(total);
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