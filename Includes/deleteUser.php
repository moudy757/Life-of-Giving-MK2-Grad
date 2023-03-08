<?php

include_once 'dbh.inc.php';
include_once 'functions.inc.php';

if (isset($_GET["adminid"])) {

    $encAdminsID = $_GET["adminid"];
    
    $adminsID = decrypt($encAdminsID);
    mysqli_query($conn, "DELETE FROM admins WHERE adminsID = $adminsID");
    
    header("location: ../Pages/admin.php?admindeleted");
}

if (isset($_GET["donorid"])) {
    $encDonorsID = $_GET["donorid"];
    
    $donorsID = decrypt($encDonorsID);
    mysqli_query($conn, "DELETE FROM donors WHERE donorsID = $donorsID");
    
    header("location: ../Pages/adminViewD.php?donordeleted");
}

if (isset($_GET["hsid"])) {
    $enchsID = $_GET["hsid"];
    
    $hsID = decrypt($enchsID);
    mysqli_query($conn, "DELETE FROM helpseekers WHERE hsID = $hsID");
    
    header("location: ../Pages/adminViewHs.php?hsdeleted");
}

if (isset($_GET["chid"])) {
    $encchID = $_GET["chid"];
    
    $chID = decrypt($encchID);
    mysqli_query($conn, "DELETE FROM charities WHERE chID = $chID");
    
    header("location: ../Pages/adminViewCh.php?chdeleted");
}
if (isset($_GET["doid"])) {
    $encdoID = $_GET["doid"];
    
    $doID = decrypt($encdoID);
    mysqli_query($conn, "DELETE FROM chDonation WHERE chDonationID = $doID");
    
    header("location: ../Pages/adminViewDo.php?dodeleted");
}
if (isset($_GET["fbid"])) {
    $encfbID = $_GET["fbid"];
    
    $fbID = decrypt($encfbID);
    mysqli_query($conn, "DELETE FROM feedback WHERE fbID = $fbID");
    
    header("location: ../Pages/adminViewFb.php?fbdeleted");
}