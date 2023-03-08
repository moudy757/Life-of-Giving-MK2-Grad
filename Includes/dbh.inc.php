<?php

$serverName = "localhost";
$dbUserName = "root";
$dbPassword = "moudy";
$dbName = "lifeofgiving";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$conn = mysqli_connect($serverName, $dbUserName, $dbPassword, $dbName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}