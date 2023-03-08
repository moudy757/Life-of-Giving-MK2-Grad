<?php

if (isset($_POST["dSignupSubmit"])) {

    $dFirstName = $_POST["dFirstName"];
    $dLastName = $_POST["dLastName"];
    $dEmail = $_POST["dEmail"];
    $dPhone = $_POST["dPhone"];
    $dUserName = $_POST["dUserName"];
    $dPwd = $_POST["dPwd"];
    $dPwdRepeat = $_POST["dPwdRepeat"];
    $dAge = date('Y-m-d', strtotime($_POST["dAge"]));
    $dGender = $_POST["dGender"];
    $dCountry = $_POST["dCountry"];
    $dCity = $_POST["dCity"];
    $dDistrict = $_POST["dDistrict"];
    $dStreet = $_POST["dStreet"];


    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';


    if (dEmptyInputSignup($dFirstName, $dLastName, $dEmail, $dPhone, $dUserName, $dPwd, $dGender, $dCountry, $dCity, $dDistrict, $dStreet) !== false) {
        header("location: ../Pages/signUp.php?error=emptyinput");
        exit();
    }
    if (dInvalidUserName($dUserName) !== false) {
        header("location: ../Pages/signUp.php?error=invalidusername");
        exit();
    }
    if (dInvalidEmail($dEmail) !== false) {
        header("location: ../Pages/signUp.php?error=invalidemail");
        exit();
    }
    if (dPwdMatch($dPwd, $dPwdRepeat) !== false) {
        header("location: ../Pages/signUp.php?error=passwordsdontmatch");
        exit();
    }
    if (dUserNameExists($conn, $dUserName) !== false) {
        header("location: ../Pages/signUp.php?error=usernametaken");
        exit();
    }
    if (dEmailExists($conn, $dEmail) !== false) {
        header("location: ../Pages/signUp.php?error=emailtaken");
        exit();
    }


    dCreateUser($conn, $dFirstName, $dLastName, $dEmail, $dPhone, $dUserName, $dPwd, $dAge, $dGender, $dCountry, $dCity, $dDistrict, $dStreet);
} else {
    header("location: ../Pages/signUp.php");
    exit();
}
