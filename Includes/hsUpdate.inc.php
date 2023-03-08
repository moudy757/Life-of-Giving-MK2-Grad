<?php

if (isset($_POST["hsUpdateSubmit"])) {
    $hsEmail = $_POST["hsEmail"];
    $hsPwd = $_POST["hsPwd"];
    $hsCity = $_POST["hsCity"];
    $hsDistrict = $_POST["hsDistrict"];
    $hsStreet = $_POST["hsStreet"];
    $hsPhone = $_POST["hsPhone"];
    $hsJob = $_POST["hsJob"];
    $hsIncome = $_POST["hsIncome"];
    $hsChildren = $_POST["children"];
    $hsWives = $_POST["wives"];
    $hsCaseDescription = $_POST["caseDescription"];
    $hsHealthStatus = $_POST["hsHealthStatus"];
    $hsHealthUpload = $_POST["hsHealthUpload"];

    session_start();

    $hsID = $_SESSION["hsID"];


    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';


    hsUpdateUser($conn, $hsEmail, $hsPwd, $hsCity, $hsDistrict, $hsStreet, $hsPhone, $hsJob, $hsIncome, $hsChildren, $hsWives, $hsCaseDescription, $hsHealthStatus, $hsHealthUpload, $hsID);
} else {
    header("location: ../Pages/hsHome.php");
    exit();
}
