<?php

session_start();

if (isset($_POST["chSigninSubmit"])) {

    $chSigninID = $_POST["chSigninID"];
    $chPwd = $_POST["chPwd"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (chEmptyInputSignin($chSigninID, $chPwd) !== false) {
        header("location: ../Pages/signIn.php?error=emptyinput");
        exit();
    }

    chSigninUser($conn, $chSigninID, $chPwd);
} else {
    header("location: signIn.php");
    exit();
}