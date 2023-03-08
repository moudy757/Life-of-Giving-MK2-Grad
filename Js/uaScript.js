/* Sign Up*/

var dSU = document.getElementById("signupDonor");
var hsSU = document.getElementById("signupHs");
var chSU = document.getElementById("signupCharity");
var suBTN = document.getElementById("btn");

var suTBTN1 = document.getElementById("toggleBtn1");
var suTBTN2 = document.getElementById("toggleBtn2");
var suTBTN3 = document.getElementById("toggleBtn3");



function signupDonor() {
    dSU.style.left = "50px"
    hsSU.style.left = "550px"
    chSU.style.left = "950px"
    suBTN.style.left = "0"
    suBTN.style.width = "85px"

    suTBTN1.style.color = "white"
    suTBTN2.style.color = "black"
    suTBTN3.style.color = "black"
}
function signupHs() {
    dSU.style.left = "-450px"
    hsSU.style.left = "50px"
    chSU.style.left = "550px"
    suBTN.style.left = "85px"
    suBTN.style.width = "120px"

    suTBTN1.style.color = "black"
    suTBTN2.style.color = "white"
    suTBTN3.style.color = "black"
}
function signupCharity() {
    dSU.style.left = "-850px"
    hsSU.style.left = "-450px"
    chSU.style.left = "50px"
    suBTN.style.left = "207px"
    suBTN.style.width = "93px"

    suTBTN1.style.color = "black"
    suTBTN2.style.color = "black"
    suTBTN3.style.color = "white"
}

/* Sign In */

var dSI = document.getElementById("signinDonor");
var hsSI = document.getElementById("signinHs");
var chSI = document.getElementById("signinCharity");
var siBTN = document.getElementById("btn");

var siTBTN1 = document.getElementById("toggleBtn1");
var siTBTN2 = document.getElementById("toggleBtn2");
var siTBTN3 = document.getElementById("toggleBtn3");



function signinDonor() {
    dSI.style.left = "50px"
    hsSI.style.left = "550px"
    chSI.style.left = "950px"
    siBTN.style.left = "0"
    siBTN.style.width = "85px"

    siTBTN1.style.color = "white"
    siTBTN2.style.color = "black"
    siTBTN3.style.color = "black"
}

function signinHs() {
    dSI.style.left = "-450px"
    hsSI.style.left = "50px"
    chSI.style.left = "550px"
    siBTN.style.left = "85px"
    siBTN.style.width = "120px"

    siTBTN1.style.color = "black"
    siTBTN2.style.color = "white"
    siTBTN3.style.color = "black"
}

function signinCharity() {
    dSI.style.left = "-850px"
    hsSI.style.left = "-450px"
    chSI.style.left = "50px"
    siBTN.style.left = "207px"
    siBTN.style.width = "93px"

    siTBTN1.style.color = "black"
    siTBTN2.style.color = "black"
    siTBTN3.style.color = "white"
}

/* Age */

// function getAge(dAge) {
//     var today = new Date();
//     var birthDate = new Date(dAge);
//     var age = today.getFullYear() - birthDate.getFullYear();
//     var m = today.getMonth() - birthDate.getMonth();
//     if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
//         age--;
//     }
//     return age;
// }


const mq = window.matchMedia( "(max-width: 500px)" );

if (mq.matches) {

    function signupDonor() {
        dSU.style.left = "0px"
        hsSU.style.left = "550px"
        chSU.style.left = "950px"
        suBTN.style.left = "0"
        suBTN.style.width = "85px"
    
        suTBTN1.style.color = "white"
        suTBTN2.style.color = "black"
        suTBTN3.style.color = "black"
    }
    function signupHs() {
        dSU.style.left = "-450px"
        hsSU.style.left = "0px"
        chSU.style.left = "550px"
        suBTN.style.left = "85px"
        suBTN.style.width = "120px"
    
        suTBTN1.style.color = "black"
        suTBTN2.style.color = "white"
        suTBTN3.style.color = "black"
    }
    function signupCharity() {
        dSU.style.left = "-850px"
        hsSU.style.left = "-450px"
        chSU.style.left = "0px"
        suBTN.style.left = "207px"
        suBTN.style.width = "93px"
    
        suTBTN1.style.color = "black"
        suTBTN2.style.color = "black"
        suTBTN3.style.color = "white"
    }

    function signinDonor() {
        dSI.style.left = "0"
        hsSI.style.left = "550px"
        chSI.style.left = "950px"
        siBTN.style.left = "0"
        siBTN.style.width = "85px"
    
        siTBTN1.style.color = "white"
        siTBTN2.style.color = "black"
        siTBTN3.style.color = "black"
    }
    
    function signinHs() {
        dSI.style.left = "-450px"
        hsSI.style.left = "0px"
        chSI.style.left = "550px"
        siBTN.style.left = "85px"
        siBTN.style.width = "120px"
    
        siTBTN1.style.color = "black"
        siTBTN2.style.color = "white"
        siTBTN3.style.color = "black"
    }
    
    function signinCharity() {
        dSI.style.left = "-850px"
        hsSI.style.left = "-450px"
        chSI.style.left = "0px"
        siBTN.style.left = "207px"
        siBTN.style.width = "93px"
    
        siTBTN1.style.color = "black"
        siTBTN2.style.color = "black"
        siTBTN3.style.color = "white"
    }    

}