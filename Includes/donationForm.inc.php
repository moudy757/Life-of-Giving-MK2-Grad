<?php

include_once 'dbh.inc.php';

session_start();

$charity = "Charities";

$sql = "SELECT donorsEmail, donorsUserName FROM donors WHERE donorsID = " . $_SESSION["donorsID"] . ";";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);

if ($resultCheck > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $dEmail = $row['donorsEmail'];
        $dUserName = $row['donorsUserName'];
    }
}





if (isset($_POST["boFormSubmit"])) {
    // $select1 = $_POST["select1"];
    $select2 = "Both: Item & Asset";
    $dQuantity = $_POST["dQuantity"];
    $dValue = $_POST["dValue"];
    $dDescription = $_POST["dDescription"];
    $donorsID = $_SESSION["donorsID"];

    $result = $_POST["select1"];
    $result_explode = explode('|', $result);
    $chID = $result_explode[0];
    $select1 = $result_explode[1];


    $sql = "SELECT chEmail FROM charities WHERE chName = '" . $select1 . "';";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $chEmail = $row['chEmail'];
        }
    }
    

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptySelect($select1) !== false) {
        header("location: ../Pages/aDonorHome.php?error=selectcharity");
        exit();
    }

    formSubmit($conn, $select1, $select2, $dQuantity, $dValue, $dDescription, $donorsID, $chID, $dEmail, $chEmail, $dUserName);
} elseif (isset($_POST["moFormSubmit"])) {
    // $select1 = $_POST["select1"];
    $select2 = "Money Donation";
    $dQuantity = "";
    $dValue = $_POST["dValue"];
    $dDescription = $_POST["dDescription"];
    $donorsID = $_SESSION["donorsID"];

    $result = $_POST["select1"];
    $result_explode = explode('|', $result);
    $chID = $result_explode[0];
    $select1 = $result_explode[1];



    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptySelect($select1) !== false) {
        header("location: ../Pages/aDonorHome.php?error=selectcharity");
        exit();
    }

    formSubmit($conn, $select1, $select2, $dQuantity, $dValue, $dDescription, $donorsID, $chID, $dEmail);
} elseif (isset($_POST["asFormSubmit"])) {
    // $select1 = $_POST["select1"];
    $select2 = "Item Donation";
    $dQuantity = $_POST["dQuantity"];
    $dValue = "";
    $dDescription = $_POST["dDescription"];
    $donorsID = $_SESSION["donorsID"];

    $result = $_POST["select1"];
    $result_explode = explode('|', $result);
    $chID = $result_explode[0];
    $select1 = $result_explode[1];



    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptySelect($select1) !== false) {
        header("location: ../Pages/aDonorHome.php?error=selectcharity");
        exit();
    }

    formSubmit($conn, $select1, $select2, $dQuantity, $dValue, $dDescription, $donorsID, $chID, $dEmail);
} else {
    header("location: ../Pages/aDonorHome.php?error=formsubmitfailed");
    exit();
}
