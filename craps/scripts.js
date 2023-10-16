function rollDie() {        
    let randNum = Math.floor(Math.random() * 6 + 1);
    console.log(randNum);
    turnAllOff();
    if (randNum == 1) {
        $("#d1p4").css("visibility", "visible");
    } else if (randNum ==  2) {
        $("#d1p1, #d1p7").css("visibility", "visible");
    } else if (randNum == 3) {
        $("#d1p1, #d1p4, #d1p7").css("visibility", "visible");
    } else if (randNum == 4) {
        $("#d1p1, #d1p3, #d1p5, #d1p7").css("visibility", "visible");
    } else if (randNum == 5) {
        $("#d1p1, #d1p3, #d1p4, #d1p5, #d1p7").css("visibility", "visible");
    } else if (randNum == 6) {
        $("#d1p1, #d1p2, #d1p3, #d1p5, #d1p6, #d1p7").css("visibility", "visible");
    }
}

function turnAllOff() {
    $(".pip").css("visibility", "hidden");
}