<?php

if (isset($_POST["dUpdateSubmit"])) {
    $dEmail = $_POST["dEmail"];
    $dPhone = $_POST["dPhone"];
    $dPwd = $_POST["dPwd"];
    $dCountry = $_POST["dCountry"];
    $dCity = $_POST["dCity"];
    $dDistrict = $_POST["dDistrict"];
    $dStreet = $_POST["dStreet"];


    session_start();

    $donorsID = $_SESSION["donorsID"];


    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';


    dUpdateUser($conn, $dEmail, $dPhone, $dPwd, $dCountry, $dCity, $dDistrict, $dStreet, $donorsID);
} else {
    header("location: ../Pages/aDonorHome.php");
    exit();
}
