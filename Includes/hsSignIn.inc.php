<?php

session_start();

if (isset($_POST["hsSigninSubmit"])) {

    $hsSigninID = $_POST["hsSigninID"];
    $hsPwd = $_POST["hsPwd"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (hsEmptyInputSignin($hsSigninID, $hsPwd) !== false) {
        header("location: ../Pages/signIn.php?error=emptyinput");
        exit();
    }

    hsSigninUser($conn, $hsSigninID, $hsPwd);
} else {
    header("location: signIn.php?error=unknown");
    exit();
}