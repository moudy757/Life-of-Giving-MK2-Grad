<?php 

session_start();

if (isset($_POST["dFeedbackSubmit"])) {
    $dFeedback = $_POST["dFeedback"];
    $donorsID = $_SESSION["donorsID"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';


    dFeedbackSubmit($conn, $dFeedback, $donorsID);

}
if (isset($_POST["chFeedbackSubmit"])) {
    $chFeedback = $_POST["chFeedback"];
    $chID = $_SESSION["chID"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';


    chFeedbackSubmit($conn, $chFeedback, $chID);

}else {
    header("location: ../Pages/signIn.php?error=signinfirst");
    exit();
}




