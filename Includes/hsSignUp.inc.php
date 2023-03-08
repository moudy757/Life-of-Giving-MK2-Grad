<?php



if (isset($_POST["hsSignupSubmit"])) {
    $hsFName = $_POST["hsFirstName"];
    $hsLName = $_POST["hsLastName"];
    $hsUserName = $_POST["hsUserName"];
    $hsEmail = $_POST["hsEmail"];
    $hsPwd = $_POST["hsPwd"];
    $hsPwdRepeat = $_POST["hsPwdRepeat"];
    $hsCountry = "Egypt";
    $hsCity = $_POST["hsCity"];
    $hsDistrict = $_POST["hsDistrict"];
    $hsStreet = $_POST["hsStreet"];
    $hsAge = date('Y-m-d', strtotime($_POST["hsAge"]));
    $hsNationalID = $_POST["nationalID"];
    $hsPhone = $_POST["hsPhone"];
    $hsJob = $_POST["hsJob"];
    $hsIncome = $_POST["hsIncome"];
    $hsGender = $_POST["hsGender"];
    $hsChildren = $_POST["children"];
    $hsWives = $_POST["wives"];
    $hsCaseDescription = $_POST["caseDescription"];
    $hsHealthStatus = $_POST["hsHealthStatus"];
    $hsHealthUpload = $_POST["hsHealthUpload"];

    


    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';


    if (hsEmptyInputSignup($hsFName, $hsLName, $hsUserName, $hsPwd, $hsPwdRepeat, $hsCountry, $hsCity, $hsDistrict, $hsStreet, $hsAge, $hsNationalID, $hsPhone, $hsJob, $hsIncome, $hsChildren, $hsWives, $hsCaseDescription) !== false) {
        header("location: ../Pages/signUp.php?error=emptyinput");
        exit();
    }
    if (hsInvalidUserName($hsUserName) !== false) {
        header("location: ../Pages/signUp.php?error=invalidusername");
        exit();
    }
    if (hsInvalidEmail($hsEmail) !== false) {
        header("location: ../Pages/signUp.php?error=invalidemail");
        exit();
    }
    if (hsPwdMatch($hsPwd, $hsPwdRepeat) !== false) {
        header("location: ../Pages/signUp.php?error=passwordsdontmatch");
        exit();
    }
    if (hsUserNameExists($conn, $hsUserName) !== false) {
        header("location: ../Pages/signUp.php?error=usernametaken");
        exit();
    }
    if (hsEmailExists($conn, $hsEmail) !== false) {
        header("location: ../Pages/signUp.php?error=emailtaken");
        exit();
    }



    hsCreateUser($conn, $hsFName, $hsLName, $hsUserName, $hsEmail, $hsPwd, $hsCountry, $hsCity, $hsDistrict, $hsStreet, $hsAge, $hsNationalID, $hsPhone, $hsJob, $hsIncome, $hsGender, $hsChildren, $hsWives, $hsCaseDescription, $hsHealthStatus, $hsHealthUpload);


} else {
    header("location: ../Pages/signUp.php");
    exit();
}