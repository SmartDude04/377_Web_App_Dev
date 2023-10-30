// Hover functions
$("#start").click(
    function() {
        $(".starting-screen").remove();
    }
);

const game = document.getElementById("fullscreen-svg");

function setShipLocation(num, x, y) {
    let symbol;
    if(num == 0) {
        symbol = "main-ship";
    } else {
        symbol = "enemy-ship-" + num;
    }
    console.log(symbol);
    let translate = "translate(" + x + "," + y + ")";
    console.log(symbol + translate);
    document.getElementById(symbol).setAttribute("transform", "translate(" + x + ", " + y + ")");
}

setShipLocation(1, 300, 100);