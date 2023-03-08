<?php

session_start();

if (isset($_POST["dSigninSubmit"])) {
    $dSigninID = $_POST["dSigninID"];
    $dPwd = $_POST["dPwd"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (dEmptyInputSignin($dSigninID, $dPwd) !== false) {
        header("location: ../Pages/signIn.php?error=emptyinput");
        exit();
    }

    dSigninUser($conn, $dSigninID, $dPwd);
} else {
    header("location: signIn.php");
    exit();
}
