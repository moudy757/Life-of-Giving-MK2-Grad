<?php

if (isset($_POST["chUpdateSubmit"])) {
    $chEmail = $_POST["chEmail"];
    $chPhone1 = $_POST["chPhone1"];
    $chPhone2 = $_POST["chPhone2"];
    $chPwd = $_POST["chPwd"];
    $chCity = $_POST["chCity"];
    $chDistrict = $_POST["chDistrict"];
    $chStreet = $_POST["chStreet"];
    $chBankName = $_POST["chBankName"];
    $IBAN = $_POST["IBAN"];


    session_start();

    $chID = $_SESSION["chID"];


    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';


    chUpdateUser($conn, $chEmail, $chPhone1, $chPhone2, $chPwd, $chCity, $chDistrict, $chStreet, $chBankName, $IBAN, $chID);
} else {
    header("location: ../Pages/chHome.php");
    exit();
}
