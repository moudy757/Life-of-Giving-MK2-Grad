<?php

if (isset($_POST["chSignupSubmit"])) {
    $chName = $_POST["chName"];
    $chUserName = $_POST["chUserName"];
    $chEmail = $_POST["chEmail"];
    $chPwd = $_POST["chPwd"];
    $chPwdRepeat = $_POST["chPwdRepeat"];
    $chPhone1 = $_POST["chPhone1"];
    $chPhone2 = $_POST["chPhone2"];
    $chCountry = "Egypt";
    $chCity = $_POST["chCity"];
    $chDistrict = $_POST["chDistrict"];
    $chStreet = $_POST["chStreet"];
    $chBankName = $_POST["chBankName"];
    $IBAN = $_POST["IBAN"];


    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';


    if (chEmptyInputSignup($chName, $chUserName, $chEmail, $chPwd, $chPhone1, $chCountry, $chCity, $chDistrict, $chStreet, $chBankName, $IBAN) !== false) {
        header("location: ../Pages/signUp.php?error=emptyinput");
        exit();
    }
    if (chInvalidUserName($chUserName) !== false) {
        header("location: ../Pages/signUp.php?error=invalidusername");
        exit();
    }
    if (chInvalidEmail($chEmail) !== false) {
        header("location: ../Pages/signUp.php?error=invalidemail");
        exit();
    }
    if (chPwdMatch($chPwd, $chPwdRepeat) !== false) {
        header("location: ../Pages/signUp.php?error=passwordsdontmatch");
        exit();
    }
    if (chUserNameExists($conn, $chUserName) !== false) {
        header("location: ../Pages/signUp.php?error=usernametaken");
        exit();
    }
    if (chEmailExists($conn, $chEmail) !== false) {
        header("location: ../Pages/signUp.php?error=emailtaken");
        exit();
    }


    chCreateUser($conn, $chName, $chUserName, $chEmail, $chPwd, $chPhone1, $chPhone2, $chCountry, $chCity, $chDistrict, $chStreet, $chBankName, $IBAN);
} else {
    header("location: ../Pages/signUp.php");
    exit();
}