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