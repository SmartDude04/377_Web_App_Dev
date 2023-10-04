function emc() {
    // Pull values
    const m = document.getElementById("emc2-m").value;
    const c = document.getElementById("emc2-c").value;

    // Calculate energy
    let E = m * (c * c);
    let numDigits = getLength(E) - 1;
    const divisor = 1000;

    // Concert to exponential && round number
    let returnVal = E / (10 ** (getLength(E) - 1));
    returnVal *= divisor;
    returnVal = Math.round(returnVal);
    returnVal /= divisor;
    returnVal = returnVal * (10 ** numDigits);
    returnVal = returnVal.toExponential();
    // Change final value
    document.getElementById("emc2-answer").value = returnVal;

}

function getLength(number) {

    return number.toString().length;

}

function fNet() {
    const m = document.getElementById("fnet-m").value;
    const a = document.getElementById("fnet-a").value;

    let answer = m * a;


    document.getElementById("fnet-answer").value = answer;

}

function eHv() {
    // Pull values
    const h = 6.6260e-34
    const v = document.getElementById("ehv-v").value;

    // Calculate energy
    let E = h * v;
    let numDigits = getLength(E) - 1;
    const divisor = 1000;

    // Concert to exponential && round number
    document.getElementById("ehv-answer").value = E;
}

function aT2() {
    let x = document.getElementById("at2-x").value;
    x = parseFloat(x, 10);
    let v = document.getElementById("at2-v").value;
    v = parseFloat(v, 10);
    let a = document.getElementById("at2-a").value;
    a = parseFloat(a, 10);
    let t = document.getElementById("at2-t").value;
    t = parseFloat(t, 10);

    let answer = (0.5 * a * (t ** 2)) + (v * t) + (x);
    document.getElementById("at2-answer").value = answer;
}

function tester() {
    let ax = document.getElementById("vvat-ax").value;
    ax = parseFloat(ax, 10);
    let vx0 = document.getElementById("vvat-vx0").value;
    vx0 = parseFloat(vx0, 10);
    let t = document.getElementById("vvat-t").value;
    t = parseFloat(t, 10);

    let answer = vx0 + (ax * t);
    document.getElementById("vvat-answer").value = answer;
}

function standardDeviation() {
    let x1 = document.getElementById("x1").value;
    x1 = parseFloat(x1, 10);
    let x2 = document.getElementById("x2").value;
    x2 = parseFloat(x2, 10);
    let x3 = document.getElementById("x3").value;
    x3 = parseFloat(x3, 10);
    let x4 = document.getElementById("x4").value;
    x4 = parseFloat(x4, 10);
    let x5 = document.getElementById("x5").value;
    x5 = parseFloat(x5, 10);

    let avg = calcAverage(x1, x2, x3, x4, x5);

    x1 = (x1 - avg) ** 2;
    x2 = (x2 - avg) ** 2;
    x3 = (x3 - avg) ** 2;
    x4 = (x4 - avg) ** 2;
    x5 = (x5 - avg) ** 2;

    let sumX = x1 + x2 + x3 + x4 + x5;
    let answer = sumX / (5-1);
    answer = Math.sqrt(answer);


    document.getElementById("std-dev-answer").value = answer;
}

function calcAverage(num1, num2, num3, num4, num5) {
    let sum = num1 + num2 + num3 + num4 + num5;
    let avg = sum / 5;
    return avg;
}

function totalImpulse() {
    alert("This equation currently does not work!");
}


function specificImpulse() {
    let F = document.getElementById("isp-F").value;
    F = parseFloat(F, 10);
    let mDot = document.getElementById("isp-mdot").value;
    mDot = parseFloat(mDot, 10);
    let g0 = document.getElementById("isp-g0").value;
    g0 = parseFloat(g0, 10);

    let answer = F / (mDot * g0);
    
    document.getElementById("isp-answer").value = answer;
}