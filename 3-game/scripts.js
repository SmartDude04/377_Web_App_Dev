// Rungame functions
$("#fullscreen-svg").mousemove(runGame);
$("#background").click(runClick);
$("#enemy-ship-1").click(runHit1);
$("#enemy-ship-2").click(runHit2);
$("#enemy-ship-3").click(runHit3);
// Moves the ships a litle bit
let t = setInterval(() => {
    moveShip(1);
    moveShip(2);
    moveShip(3);
}, 10);


// Hover functions
$("#start").click(
    function() {
        $(".starting-screen").remove();
        setShipLocation(0, 680, 350);
        setRandShip(1);
        setRandShip(2);
        setRandShip(3);
        
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
        // console.log(symbol);
        let translate = "translate(" + x + "," + y + ")";
        // console.log(symbol + translate);
        document.getElementById(symbol).setAttribute("transform", "translate(" + x + ", " + y + ")");
        document.getElementById(symbol).setAttribute("visibility", "visible");
}

function setRandShip(num) {
    let randX;
    let randY;
    let decisionX = Math.floor(Math.random() * 2);
    if (decisionX == 0) {
        randX = Math.floor(Math.random() * 200 + 100);
    } else {
        randX = Math.floor(Math.random() * 200 + 1100);
    }

    let decisionY = Math.floor(Math.random() * 2);
    if (decisionY == 0) {
        randY = Math.floor(Math.random() * 100 + 100);
    } else {
        randY = Math.floor(Math.random() * 100 + 600);
    }
    setShipLocation(num, randX, randY);
}

function runGame(e) {

    // Rotate ship to be following mouse
    let x = e.pageX - 740;
    let y = e.pageY - 380;
    let rotateAmount
    if (x < 0) {
        rotateAmount = Math.atan(y / x) * 180 / Math.PI - 90;
    } else {
        rotateAmount = Math.atan(y / x) * 180 / Math.PI + 90;
    }
    document.getElementById("main-ship").setAttribute("transform", "translate(680, 350) rotate(" + rotateAmount + ", 60, 50)");

    
}

function moveShip(num) {
    let offsetX = Math.floor(Math.random() * 11) - 5;
    let offsetY = Math.floor(Math.random() * 11) - 5;
    let transform = document.getElementById("enemy-ship-" + num).getAttribute("transform");
    transform = transform.match(/\d+/gm);
    let originalX = Number(transform[0]);
    let originalY = Number(transform[1]);
    let newX = originalX + offsetX;
    let newY = originalY + offsetY; 
    if (newX < 150) {
        newX += 10;
    } else if (newX > 1350) {
        newX -= 10;
    }
    if (newY < 150) {
        newY += 10;
    } else if (newY > 650) {
        newY -= 10;
    }
    // console.log(newX + " " + newY);
    document.getElementById("enemy-ship-" + num).setAttribute("transform", "translate(" + newX + ", " + newY + ")");
}

function runClick(e) {
    alert("Hello" + e.pageX);
}

function hit(num) {
    alert("Hit!");
}

function runHit1() { hit(1); }
function runHit2() { hit(2); }
function runHit3() { hit(3); }