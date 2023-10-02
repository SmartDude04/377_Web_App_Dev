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
    x = parseInt(x, 10);
    let v = document.getElementById("at2-v").value;
    v = parseInt(v, 10);
    let a = document.getElementById("at2-a").value;
    a = parseInt(a, 10);
    let t = document.getElementById("at2-t").value;
    t = parseInt(t, 10);

    let answer = (0.5 * a * (t ** 2)) + (v * t) + (x);
    document.getElementById("at2-answer").value = answer;
}

Math.integral