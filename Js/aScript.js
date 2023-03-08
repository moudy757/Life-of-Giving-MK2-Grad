
var chListV = document.getElementById("chList");
var hsListV = document.getElementById("hsList");
var doFormV = document.getElementById("donationForm");
var moFormV = document.getElementById("moDonation");
var asFormV = document.getElementById("asDonation");
var trListV = document.getElementById("trList");
var doTypeV = document.getElementById("doTypeBtns");
// var hsDetailsV = document.getElementById("hsDetails");
var chSearchV = document.getElementById("chSearch");
var chResultV = document.getElementById("chResult");
var hsSearchV = document.getElementById("hsSearch");
var hsResultV = document.getElementById("hsResult");

var chListBtnV = document.getElementById("chListBtn");
var hsListBtnV = document.getElementById("hsListBtn");
var doFormBtnV = document.getElementById("doFormBtn");
var trListBtnV = document.getElementById("trListBtn");
var moDoBtnV = document.getElementById("moneyDoBtn");
var asDoBtnV = document.getElementById("assetsDoBtn");
var boDoBtnV = document.getElementById("bothDoBtn");

var flexXV = document.getElementById("flex-x");





function chList() {
    chListV.style.top = "70px"
    hsListV.style.top = "1500px"
    // hsDetailsV.style.right = "-1500px"
    doTypeV.style.left = "-1000px"
    doFormV.style.right = "-1000px"
    moFormV.style.right = "-1000px"
    asFormV.style.right = "-1000px"
    trListV.style.top = "1500px"
    chSearchV.style.top = "0px"
    // chSearchV.style.right = "540px"
    chResultV.style.top = "-1000px"
    hsSearchV.style.top = "-1000px"
    hsResultV.style.top ="-1000px"

    chSearchV.style.position = "absolute"
    chListV.style.position = "static"
    hsListV.style.position = "absolute"
    doTypeV.style.position = "absolute"
    doFormV.style.position = "absolute"
    moFormV.style.position = "absolute"
    asFormV.style.position = "absolute"
    trListV.style.position = "absolute"
    chResultV.style.position = "absolute"
    hsResultV.style.position = "absolute"
    hsSearchV.style.position = "absolute"

    chListBtnV.style.color = "var(--extra-color)"
    hsListBtnV.style.color = ""
    doFormBtnV.style.color = ""
    trListBtnV.style.color = ""

    moDoBtnV.style.color = ""
    asDoBtnV.style.color = ""
    boDoBtnV.style.color = ""

    flexXV.style.height = "max-content"
}

function hsList() {
    chListV.style.top = "-1500px"
    hsListV.style.top = "30px"
    hsListV.style.left = "0"
    // hsDetailsV.style.right = "-1500px"
    doTypeV.style.left = "-1000px"
    doFormV.style.right = "-1000px"
    moFormV.style.right = "-1000px"
    asFormV.style.right = "-1000px"
    trListV.style.top = "1500px"
    chSearchV.style.top = "-1000px"
    chResultV.style.top = "-1000px"
    hsSearchV.style.top = "0"
    hsResultV.style.top ="-1000px"

    chListV.style.position = "absolute"
    hsListV.style.position = "relative"
    // hsDetailsV.style.position = "absolute"
    doTypeV.style.position = "absolute"
    doFormV.style.position = "absolute"
    moFormV.style.position = "absolute"
    asFormV.style.position = "absolute"
    trListV.style.position = "absolute"
    chSearchV.style.position = "absolute"
    chResultV.style.position = "absolute"
    hsResultV.style.position = "absolute"
    hsSearchV.style.position = "absolute"

    chListBtnV.style.color = ""
    hsListBtnV.style.color = "var(--extra-color)"
    doFormBtnV.style.color = ""
    trListBtnV.style.color = ""

    moDoBtnV.style.color = ""
    asDoBtnV.style.color = ""
    boDoBtnV.style.color = ""

    flexXV.style.height = "max-content"
}

function moneyDo() {
    doFormV.style.right = "-1000px"
    moFormV.style.right = "450px"
    moFormV.style.top = "70px"
    asFormV.style.right = "-1000px"
    doTypeV.style.left = "485px"

    doFormV.style.position = "absolute"
    moFormV.style.position = "relative"
    asFormV.style.position = "absolute"

    moDoBtnV.style.color = "var(--extra-color)"
    asDoBtnV.style.color = ""
    boDoBtnV.style.color = ""
}

function assetDo() {
    doFormV.style.right = "-1000px"
    moFormV.style.right = "-1000px"
    asFormV.style.right = "450px"
    asFormV.style.top = "70px"
    doTypeV.style.left = "485px"

    doFormV.style.position = "absolute"
    moFormV.style.position = "absolute"
    asFormV.style.position = "relative"

    moDoBtnV.style.color = ""
    asDoBtnV.style.color = "var(--extra-color)"
    boDoBtnV.style.color = ""
}

function bothDo() {
    doFormV.style.right = "450px"
    doFormV.style.top = "70px"
    moFormV.style.right = "-1000px"
    asFormV.style.right = "-1000px"
    doTypeV.style.left = "485px"

    doFormV.style.position = "relative"
    moFormV.style.position = "absolute"
    asFormV.style.position = "absolute"

    moDoBtnV.style.color = ""
    asDoBtnV.style.color = ""
    boDoBtnV.style.color = "var(--extra-color)"
}

function trList() {
    chListV.style.top = "-1500px"
    hsListV.style.top = "-1500px"
    // hsDetailsV.style.right = "-1500px"
    doTypeV.style.left = "-1000px"
    doFormV.style.right = "-1000px"
    moFormV.style.right = "-1000px"
    asFormV.style.right = "-1000px"
    trListV.style.top = "0"
    chSearchV.style.top = "-1000px"
    chResultV.style.top = "-1000px"
    hsSearchV.style.top = "-1000px"
    hsResultV.style.top ="-1000px"

    chListV.style.position = "absolute"
    hsListV.style.position = "absolute"
    doTypeV.style.position = "absolute"
    doFormV.style.position = "absolute"
    moFormV.style.position = "absolute"
    asFormV.style.position = "absolute"
    trListV.style.position = "relative"
    chSearchV.style.position = "absolute"
    chResultV.style.position = "absolute"
    hsSearchV.style.position = "absolute"
    hsResultV.style.position = "absolute"
    

    chListBtnV.style.color = ""
    hsListBtnV.style.color = ""
    doFormBtnV.style.color = ""
    trListBtnV.style.color = "var(--extra-color)"

    moDoBtnV.style.color = ""
    asDoBtnV.style.color = ""
    boDoBtnV.style.color = ""

    flexXV.style.height = "max-content"
}

function doType() {
    chListV.style.top = "-1500px"
    hsListV.style.top = "-1500px"
    // hsDetailsV.style.right = "-1500px"
    doTypeV.style.left = "0"
    doFormV.style.right = "-1000px"
    doFormV.style.top = "50px"
    moFormV.style.right = "-1000px"
    asFormV.style.right = "-1000px"
    trListV.style.top = "2500px"
    chSearchV.style.top = "-1000px"
    chResultV.style.top = "-1000px"
    hsSearchV.style.top = "-1000px"
    hsResultV.style.top ="-1000px"

    chListV.style.position = "absolute"
    hsListV.style.position = "absolute"
    doFormV.style.position = "absolute"
    doTypeV.style.position = "relative"
    moFormV.style.position = "absolute"
    asFormV.style.position = "absolute"
    trListV.style.position = "absolute"
    chSearchV.style.position = "absolute"
    chResultV.style.position = "absolute"
    hsResultV.style.position = "absolute"


    chListBtnV.style.color = ""
    hsListBtnV.style.color = ""
    doFormBtnV.style.color = "var(--extra-color)"
    trListBtnV.style.color = ""

    moDoBtnV.style.color = ""
    asDoBtnV.style.color = ""
    boDoBtnV.style.color = ""

    flexXV.style.height = "100vh"
}

function chRemove() {
    chListV.style.top = "-1500px"
    chSearchV.style.top = "0px"
    chSearchV.style.right = "800px"
    chResultV.style.top = "80px"

    chListV.style.position = "absolute"
    chSearchV.style.position = "absolute"
    
    flexXV.style.height = "100vh"
}

function hsRemove() {
    hsListV.style.top ="-1500px"
    hsSearchV.style.top = "0px"
    hsSearchV.style.right = "800px"
    hsResultV.style.top = "80px"

    hsListV.style.position = "absolute"
    hsSearchV.style.position = "static"
    hsResultV.style.position = "static"

    flexXV.style.height = "100%"
}





/** chHome */

var hsListBtnV2 = document.getElementById("hsListBtn2");
var doListBtnV = document.getElementById("doListBtn");

var doListV = document.getElementById("doList");
var hsListV2 = document.getElementById("hsList2");

var hsSearchV2 = document.getElementById("hsSearch2");
var hsResultV2 = document.getElementById("hsResult2");



function hsList2() {
    hsListBtnV2.style.color = "var(--extra-color)"
    doListBtnV.style.color = ""

    hsListV2.style.position = "relative"
    doListV.style.position = "absolute"
    hsSearchV2.style.position = "absolute"
    hsResultV2.style.position = "absolute"

    hsListV2.style.top = "20px"
    doListV.style.top = "-1000px"
    hsSearchV2.style.top = "215px"
    hsResultV2.style.top = "-1000px"
}

function doList() {
    doListBtnV.style.color = "var(--extra-color)"
    hsListBtnV2.style.color = ""

    doListV.style.position = "relative"
    hsListV2.style.position = "absolute"
    hsSearchV2.style.position = "absolute"
    hsResultV2.style.position = "absolute"

    doListV.style.top = "0"
    hsListV2.style.top = "-1000px"
    hsSearchV2.style.top = "-1000px"
    hsResultV2.style.top = "-1000px"
}

function hsRemove2() {
    hsListV2.style.position = "absolute"
    hsResultV2.style.position = "static"
    hsSearchV2.style.position = "static"

    hsListV2.style.top = "-1000px"
}


// function hsDetails() {
//     hsListV.style.left = "-1200px"
//     hsDetailsV.style.right = "30px"

//     backBtnV.style.position = ""
// }


// window.onload = function() {
//     trList();
// }

window.addEventListener("load", function() {
    trList();
})

window.addEventListener("load", function() {
    doList();
})

// window.onload = function() {
//     doList();
// }

// window.onload = function() {
//     chList();
// }

