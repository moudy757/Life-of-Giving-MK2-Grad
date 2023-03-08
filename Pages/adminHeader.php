<?php

include_once '../Includes/dbh.inc.php';
include_once '../Includes/functions.inc.php';

session_start();

if (!isAdmin()) {
    echo "<h1 class='textCenter'>You are not authorized to view this page!</h1>";
    session_unset();
    session_destroy();
    exit();
    // header("location: ../Pages/uaHome.php");
}

$activePage = basename($_SERVER['PHP_SELF'], ".php");

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- <link rel="stylesheet" href="../Css/utilities.css"> -->
    <link rel="stylesheet" href="../Css/admin.css">

    <title>Life of Giving | Admin</title>

</head>

<body>

    <!-- Navbar -->

    <div class="navbar">

        <div class="home">
            <a href="admin.php">Home
            </a>
        </div>

        <div class="container">
            <div>
                <ul>
                    <li><a href="adminViewD.php" <?php if ($page == 'View Donors') {
                        echo "style='color: var(--extra-color)'";
                    } ?>>View Donors</a></li>
                    <li><a href="adminViewHs.php" <?php if ($page == 'View Help Seekers') {
                        echo "style='color: var(--extra-color)'";
                    }?>>View Help Seekers</a></li>
                    <li><a href="adminViewCh.php" <?php if ($page == 'View Charities') {
                        echo "style='color: var(--extra-color)'";
                    }?>>View Charities</a></li>
                    <li><a href="adminViewDo.php" <?php if ($page == 'View Donations') {
                        echo "style='color: var(--extra-color)'";
                    }?>>View Donations</a></li>
                    <li><a href="adminViewFb.php" <?php if ($page == 'View Feedback') {
                        echo "style='color: var(--extra-color)'";
                    }?>>View Feedback</a></li>
                    <li class="signOut"><a href="../Includes/signOut.inc.php">Sign Out</a></li>
                </ul>
            </div>
        </div>

    </div>
    
    <!-- End Navbar -->