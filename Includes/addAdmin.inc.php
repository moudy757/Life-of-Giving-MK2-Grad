<?php

if (isset($_POST["addAdminSubmit"])) {
    $adminUserName = "Admin * " . $_POST["adminUserName"] . " *";
    $adminPwd = $_POST["adminPwd"];
    $adminPwdRepeat = $_POST["adminPwdRepeat"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (checkAdmin($conn, $adminUserName) !== false) {
        header("location: ../Pages/admin.php?error=usernametaken");
        exit();
    }
    if (adminPwdMatch($adminPwd, $adminPwdRepeat) !== false) {
        header("location: ../Pages/admin.php?error=passwordsdontmatch");
        exit();
    }
    // if (adminInvalidUserName($adminUserName) !== false) {
    //     header("location: ../Pages/admin.php?error=invalidusername");
    //     exit();
    // }
    if (addAdminEmptyInput($adminUserName, $adminPwd, $adminPwdRepeat) !== false) {
        header("location: ../Pages/admin.php?error=emptyinput");
        exit();
    }

    addAdmin($conn, $adminUserName, $adminPwd);
} else {
    header("location: ../Pages/signIn.php");
    exit();
}