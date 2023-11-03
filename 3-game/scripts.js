// Open the file storing the highscore and get the highscore from it
let highscore = 0;
let time = 30;
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
        let timer = setInterval(() => {
            if (time > 0) { // If the game should still run
                time --;
                // Update the timer
                $("#timer").text(time);
                console.log(time);
            } else {
                $("#enemy-ship-1").remove();
                $("#enemy-ship-2").remove();
                $("#enemy-ship-3").remove();
                $("#main-ship").remove();
            }
        }, 1000);
    }
);
    
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
    let offsetX = Math.floor(Math.random() * 5) - 2;
    let offsetY = Math.floor(Math.random() * 5) - 2;
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

    // Keep moving the bullet
    /// UNDO THE ANGLE TANGENT AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAWHYWHYWHYWHY
    let angle = document.getElementById("bullet").getAttribute("transform");
    let bulletX;
    let bulletY;

    angle = Number(angle.substring(angle.indexOf(" ") + 8, angle.length - 2));
    if (angle < 0) {
        angle = ((angle) * Math.PI / 180);
        bulletX = 5 * Math.sin(angle);
        bulletY = -5 * Math.cos(angle);
    } else {
        angle = ((angle) * Math.PI / 180);
        bulletX = 5 * Math.sin(angle);
        bulletY = -5 * Math.cos(angle);
    }
    

    // Move the bullet the set amount
    let oldTransform = document.getElementById("bullet").getAttribute("transform");
    let oldX = oldTransform.substring(oldTransform.indexOf("(") + 1, oldTransform.indexOf(","));
    let oldY = oldTransform.substring(oldTransform.indexOf(",") + 1, oldTransform.indexOf(")"));
    // Re-define angle to put back into the bullet attriute
    angle = document.getElementById("bullet").getAttribute("transform");
    angle = Number(angle.substring(angle.indexOf(" ") + 8, angle.length - 2));
    
    bulletX += Number(oldX);
    bulletY += Number(oldY);
    
    // Round numbers
    bulletX = bulletX.toFixed(3);
    bulletY = bulletY.toFixed(3);
    angle = angle.toFixed(3);

    //console.log(bulletX + " " + bulletY + " " + angle);

    // actually change the parameters inside the bullet group
    if (!isNaN(bulletX) && !isNaN(bulletY) != NaN && !isNaN(angle)) {
        document.getElementById("bullet").setAttribute("transform", "translate(" + bulletX + "," + bulletY + ") rotate(" + angle + ")");
    }
}

function runClick(e) {
    // Fire a bullet
    /// Calculate the degrees of the bullet
    let x = e.pageX - 740;
    let y = e.pageY - 380;
    let rotateAmount
    if (x < 0) {
        rotateAmount = Math.atan(y / x) * 180 / Math.PI - 90;
    } else {
        rotateAmount = Math.atan(y / x) * 180 / Math.PI + 90;
    }
    document.getElementById("bullet").setAttribute("visibility", "visible");
    document.getElementById("bullet").setAttribute("transform", "translate(720,380) rotate(" + rotateAmount + ")");
}

function hit(num) {
    setRandShip(num);
    highscore++;
    $("#highscore").text(highscore);
}

function runHit1(e) {
    // Fire a bullet
    /// Calculate the degrees of the bullet
    let x = e.pageX - 740;
    let y = e.pageY - 380;
    let rotateAmount
    if (x < 0) {
        rotateAmount = Math.atan(y / x) * 180 / Math.PI - 90;
    } else {
        rotateAmount = Math.atan(y / x) * 180 / Math.PI + 90;
    }
    document.getElementById("bullet").setAttribute("visibility", "visible");
    document.getElementById("bullet").setAttribute("transform", "translate(720,380) rotate(" + rotateAmount + ")");

    hit(1);
}
function runHit2(e) {// Fire a bullet
    /// Calculate the degrees of the bullet
    let x = e.pageX - 740;
    let y = e.pageY - 380;
    let rotateAmount
    if (x < 0) {
        rotateAmount = Math.atan(y / x) * 180 / Math.PI - 90;
    } else {
        rotateAmount = Math.atan(y / x) * 180 / Math.PI + 90;
    }
    document.getElementById("bullet").setAttribute("visibility", "visible");
    document.getElementById("bullet").setAttribute("transform", "translate(720,380) rotate(" + rotateAmount + ")");

    hit(2);
}
function runHit3(e) {
    // Fire a bullet
    /// Calculate the degrees of the bullet
    let x = e.pageX - 740;
    let y = e.pageY - 380;
    let rotateAmount
    if (x < 0) {
        rotateAmount = Math.atan(y / x) * 180 / Math.PI - 90;
    } else {
        rotateAmount = Math.atan(y / x) * 180 / Math.PI + 90;
    }
    document.getElementById("bullet").setAttribute("visibility", "visible");
    document.getElementById("bullet").setAttribute("transform", "translate(720,380) rotate(" + rotateAmount + ")");

    hit(3);
}