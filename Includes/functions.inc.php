<?php

include_once '../Includes/sendMail.inc.php';


/* Donor Sign Up Functions */

function dEmptyInputSignup($dFirstName, $dLastName, $dEmail, $dPhone, $dUserName, $dPwd, $dGender, $dCountry, $dCity)
{
    $result;
    if (empty($dFirstName) || empty($dLastName) || empty($dEmail) || empty($dPhone) || empty($dUserName) || empty($dPwd) || empty($dGender) || empty($dCountry) || empty($dCity)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function dInvalidUserName($dUserName)
{
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $dUserName)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function dInvalidEmail($dEmail)
{
    $result;
    if (!filter_var(($dEmail), FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function dPwdMatch($dPwd, $dPwdRepeat)
{
    $result;
    if ($dPwd !== $dPwdRepeat) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function dUserNameExists($conn, $dUserName)
{
    $sql = "SELECT * FROM donors WHERE donorsUserName = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../Pages/signUp.php?error=usernamestmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $dUserName);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function dEmailExists($conn, $dEmail)
{
    $sql = "SELECT * FROM donors WHERE donorsEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../Pages/signUp.php?error=emailstmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $dEmail);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

// function under18($dAge)
// {
//     $result;
//     if ($dAge >= 18) {
//         $result = false;
//     } else {
//         $result = true;
//     }
//     return $result;
// }

function dCreateUser($conn, $dFirstName, $dLastName, $dEmail, $dPhone, $dUserName, $dPwd, $dAge, $dGender, $dCountry, $dCity, $dDistrict, $dStreet)
{
    $sql = "INSERT INTO donors (donorsFName, donorsLName, donorsEmail, donorsPhone, donorsUserName, donorsPwd, donorsAge, donorsGender, donorsCountry, donorsCity, donorsDistrict, donorsStreet) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../Pages/signUp.php?error=createuserfailed");
        exit();
    }

    $dHashedPwd = password_hash($dPwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssssssssssss", $dFirstName, $dLastName, $dEmail, $dPhone, $dUserName, $dHashedPwd, $dAge, $dGender, $dCountry, $dCity, $dDistrict, $dStreet);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    Mail::sendMail('Welcome to Life of Giving!', 'Your account <strong>' . $dUserName . '</strong> has been created successfully!', $dEmail);
    header("location: ../Pages/signIn.php?error=none");
    exit();
}


/* Donor Sign In Functions */

function dEmptyInputSignin($dSigninID, $dPwd)
{
    $result;
    if (empty($dSigninID) || empty($dPwd)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function dSigninUser($conn, $dSigninID, $dPwd)
{
    $dUserNameExists = dUserNameExists($conn, $dSigninID);

    if ($dUserNameExists === false) {
        header("location: ../Pages/signIn.php?error=usernotfound");
        exit();
    }

    $dHashedPwd = $dUserNameExists["donorsPwd"];
    $checkPwd = password_verify($dPwd, $dHashedPwd);

    if ($checkPwd === false) {
        header("location: ../Pages/signIn.php?error=wrongpassword");
        exit();
    } elseif ($checkPwd === true) {

        $sql = "SELECT * FROM donors WHERE donorsUserName = '$dSigninID';";
        $results = mysqli_query($conn, $sql);

        if (mysqli_num_rows($results) == 1) {

            $signedInUser = mysqli_fetch_assoc($results);

            session_start();

            $_SESSION['user'] = $signedInUser;

            $_SESSION["donorsID"] = $dUserNameExists["donorsID"];
            $_SESSION["donorsUserName"] = $dUserNameExists["donorsUserName"];
            // $_SESSION["userLevel"] = $dUserNameExists["userLevel"];
            header("location: ../Pages/aDonorHome.php");
            exit();
        }
    }
}

/* Donor Profile */

function dUpdateUser($conn, $dEmail, $dPhone, $dPwd, $dCountry, $dCity, $dDistrict, $dStreet, $donorsID)
{
    $sql = "UPDATE donors
    SET donorsEmail=?, donorsPhone=?, donorsPwd=?, donorsCountry=?, donorsCity=?, donorsDistrict=?, donorsStreet=?
    WHERE donorsID=" . $donorsID . ";";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../Pages/aDonorHome.php?error=infoupdatefailed");
        exit();
    }

    $dHashedPwd = password_hash($dPwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sssssss", $dEmail, $dPhone, $dHashedPwd, $dCountry, $dCity, $dDistrict, $dStreet);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../Pages/aDonorHome.php?error=updated");
    exit();
}

/* Donation Form */

function emptySelect($select1)
{
    $result;
    if ($select1 == $charity) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function formSubmit($conn, $select1, $select2, $dQuantity, $dValue, $dDescription, $donorsID, $chID, $dEmail, $chEmail, $dUserName)
{
    $sql = "INSERT INTO chDonation (chName, dType, dQuantity, dValue, dDescription, donorsID, chID) VALUES (?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../Pages/aDonorHome.php?error=submitstmtfailedf");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssiisii", $select1, $select2, $dQuantity, $dValue, $dDescription, $donorsID, $chID);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    Mail::sendMail('Donation successful!', 'Your donation to <strong>' . $select1 . '</strong> has been sent successfully!', $dEmail);
    Mail::sendMail('Donation received!', 'Your charity received a donation from <strong>' . $dUserName . '</strong>!', $chEmail);
    header("location: ../Pages/aDonorHome.php?error=none");
    exit();
}





/* Charity Sign Up Functions */

function chEmptyInputSignup($chName, $chUserName, $chEmail, $chPwd, $chPhone1, $chCountry, $chCity, $chDistrict, $chStreet, $chBankName, $IBAN)
{
    $result;
    if (empty($chName) || empty($chUserName) || empty($chEmail) || empty($chPwd) || empty($chPhone1) || empty($chCountry) || empty($chCity) || empty($chDistrict) || empty($chStreet) || empty($chBankName) || empty($IBAN)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function chInvalidUserName($chUserName)
{
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $chUserName)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function chInvalidEmail($chEmail)
{
    $result;
    if (!filter_var(($chEmail), FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function chPwdMatch($chPwd, $chPwdRepeat)
{
    $result;
    if ($chPwd !== $chPwdRepeat) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function chUserNameExists($conn, $chUserName)
{
    $sql = "SELECT * FROM charities WHERE chUserName = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../Pages/signUp.php?error=usernamestmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $chUserName);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function chEmailExists($conn, $chEmail)
{
    $sql = "SELECT * FROM charities WHERE chEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../Pages/signUp.php?error=emailstmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $chEmail);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}


function chCreateUser($conn, $chName, $chUserName, $chEmail, $chPwd, $chPhone1, $chPhone2, $chCountry, $chCity, $chDistrict, $chStreet, $chBankName, $IBAN)
{
    $sql = "INSERT INTO charities (chName, chUserName, chEmail, chPwd, chPhone1, chPhone2, chCountry, chCity, chDistrict, chStreet, chBankName, IBAN) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../Pages/signUp.php?error=createuserfailed");
        exit();
    }

    $chHashedPwd = password_hash($chPwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sssssssssssi", $chName, $chUserName, $chEmail, $chHashedPwd, $chPhone1, $chPhone2, $chCountry, $chCity, $chDistrict, $chStreet, $chBankName, $IBAN);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    Mail::sendMail('Welcome to Life of Giving!', 'Your account <strong>' . $chUserName . '</strong> has been created successfully!', $chEmail);
    header("location: ../Pages/signIn.php?error=none");
    exit();
}


/* Charity Sign In Functions */

function chEmptyInputSignin($chSigninID, $chPwd)
{
    $result;
    if (empty($chSigninID) || empty($chPwd)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function chSigninUser($conn, $chSigninID, $chPwd)
{
    $chUserNameExists = chUserNameExists($conn, $chSigninID);

    if ($chUserNameExists === false) {
        header("location: ../Pages/signIn.php?error=usernotfound");
        exit();
    }

    $chHashedPwd = $chUserNameExists["chPwd"];
    $checkPwd = password_verify($chPwd, $chHashedPwd);

    if ($checkPwd === false) {
        header("location: ../Pages/signIn.php?error=wrongpassword");
        exit();
    } elseif ($checkPwd === true) {

        $sql = "SELECT * FROM charities WHERE chUserName = '$chSigninID';";
        $results = mysqli_query($conn, $sql);

        if (mysqli_num_rows($results) == 1) {

            $signedInUser = mysqli_fetch_assoc($results);

            session_start();

            $_SESSION['user'] = $signedInUser;

            $_SESSION["chID"] = $chUserNameExists["chID"];
            $_SESSION["chUserName"] = $chUserNameExists["chUserName"];
            // $_SESSION["userLevel"] = $chUserNameExists["userLevel"];
            header("location: ../Pages/chHome.php");
            exit();
        }
    }
}


/* Charity Profile */

function chUpdateUser($conn, $chEmail, $chPhone1, $chPhone2, $chPwd, $chCity, $chDistrict, $chStreet, $chBankName, $IBAN, $chID)
{
    $sql = "UPDATE charities
    SET chEmail=?, chPhone1=?, chPhone2=?, chPwd=?, chCity=?, chDistrict=?, chStreet=?, chBankName=?, IBAN=?
    WHERE chID=" . $chID . ";";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../Pages/chHome.php?error=infoupdatefailed");
        exit();
    }

    $chHashedPwd = password_hash($chPwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sssssssss", $chEmail, $chPhone1, $chPhone2, $chHashedPwd, $chCity, $chDistrict, $chStreet, $chBankName, $IBAN);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../Pages/chHome.php?error=updated");
    exit();
}


/* Help Seeker Sign Up Functions */

function hsEmptyInputSignup($hsFName, $hsLName, $hsUserName, $hsPwd, $hsPwdRepeat, $hsCountry, $hsCity, $hsDistrict, $hsStreet, $hsAge, $hsNationalID, $hsPhone, $hsJob, $hsIncome, $hsChildren, $hsWives, $hsCaseDescription)
{
    $result;
    if (empty($hsFName) || empty($hsLName) || empty($hsUserName) || empty($hsPwd) || empty($hsPwdRepeat) || empty($hsCountry) || empty($hsCity) || empty($hsDistrict) || empty($hsStreet) || empty($hsAge) || empty($hsNationalID) || empty($hsPhone) || empty($hsJob) || empty($hsIncome) || empty($hsChildren) || empty($hsWives) || empty($hsCaseDescription)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function hsInvalidUserName($hsUserName)
{
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $hsUserName)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function hsInvalidEmail($hsEmail)
{
    $result;
    if (empty($hsEmail)) {
        $result = false;
    } elseif (!filter_var(($hsEmail), FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function hsPwdMatch($hsPwd, $hsPwdRepeat)
{
    $result;
    if ($hsPwd !== $hsPwdRepeat) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function hsUserNameExists($conn, $hsUserName)
{
    $sql = "SELECT * FROM helpseekers WHERE hsUserName = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../Pages/signUp.php?error=usernamestmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $hsUserName);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function hsEmailExists($conn, $hsEmail)
{
    $sql = "SELECT * FROM helpseekers WHERE hsEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../Pages/signUp.php?error=emailstmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $hsEmail);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}



function hsCreateUser($conn, $hsFName, $hsLName, $hsUserName, $hsEmail, $hsPwd, $hsCountry, $hsCity, $hsDistrict, $hsStreet, $hsAge, $hsNationalID, $hsPhone, $hsJob, $hsIncome, $hsGender, $hsChildren, $hsWives, $hsCaseDescription, $hsHealthStatus, $hsHealthUpload)
{
    $sql = "INSERT INTO helpseekers (hsFName, hsLName, hsUserName, hsEmail, hsPwd, hsCountry, hsCity, hsDistrict, hsStreet, hsAge, hsNationalID, hsPhone, hsJob, hsIncome, hsGender, hsChildren, hsWives, hsCaseDescription, hsHealthStatus, hsHealthUpload) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../Pages/signUp.php?error=createuserfailed");
        exit();
    }

    $hsHashedPwd = password_hash($hsPwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssssssssssissssiisss", $hsFName, $hsLName, $hsUserName, $hsEmail, $hsHashedPwd, $hsCountry, $hsCity, $hsDistrict, $hsStreet, $hsAge, $hsNationalID, $hsPhone, $hsJob, $hsIncome, $hsGender, $hsChildren, $hsWives, $hsCaseDescription, $hsHealthStatus, $hsHealthUpload);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    Mail::sendMail('Welcome to Life of Giving!', 'Your account <strong>' . $hsUserName . '</strong> has been created successfully!', $hsEmail);
    header("location: ../Pages/signIn.php?error=none");
    exit();
}


/* Help Seeker Sign In Functions */

function hsEmptyInputSignin($hsSigninID, $hsPwd)
{
    $result;
    if (empty($hsSigninID) || empty($hsPwd)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function hsSigninUser($conn, $hsSigninID, $hsPwd)
{
    $hsUserNameExists = hsUserNameExists($conn, $hsSigninID);

    if ($hsUserNameExists === false) {
        header("location: ../Pages/signIn.php?error=usernotfound");
        exit();
    }

    $hsHashedPwd = $hsUserNameExists["hsPwd"];
    $checkPwd = password_verify($hsPwd, $hsHashedPwd);

    if ($checkPwd === false) {
        header("location: ../Pages/signIn.php?error=wrongpassword");
        exit();
    } elseif ($checkPwd === true) {
        
        $sql = "SELECT * FROM helpseekers WHERE hsUserName = '$hsSigninID';";
        $results = mysqli_query($conn, $sql);
        
        // mysqli_stmt_bind_param($stmt, "s", $hsSigninID);
        // mysqli_stmt_execute($stmt);
        
        // $resultData = mysqli_stmt_get_result($stmt);
        // $signedInUser = mysqli_fetch_assoc($resultData);

        if (mysqli_num_rows($results) == 1) {

			$signedInUser = mysqli_fetch_assoc($results);
        
            session_start();

            $_SESSION['user'] = $signedInUser;

            $_SESSION["hsID"] = $hsUserNameExists["hsID"];
            $_SESSION["hsUserName"] = $hsUserNameExists["hsUserName"];
            // $_SESSION["userLevel"] = $hsUserNameExists["userLevel"];
            header("location: ../Pages/hsHome.php");
            exit();
        }
    }

    
}

/* Help Seeker Profile */

function hsUpdateUser($conn, $hsEmail, $hsPwd, $hsCity, $hsDistrict, $hsStreet, $hsPhone, $hsJob, $hsIncome, $hsChildren, $hsWives, $hsCaseDescription, $hsHealthStatus, $hsHealthUpload, $hsID)
{
    $sql = "UPDATE helpseekers
    SET hsEmail=?, hsPwd=?, hsCity=?, hsDistrict=?, hsStreet=?, hsPhone=?, hsJob=?, hsIncome=?, hsChildren=?, hsWives=?, hsCaseDescription=?, hsHealthStatus=?, hsHealthUpload=?
    WHERE hsID=" . $hsID . ";";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../Pages/hsHome.php?error=infoupdatefailed");
        exit();
    }

    $hsHashedPwd = password_hash($hsPwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssssssssiisss",  $hsEmail, $hsHashedPwd, $hsCity, $hsDistrict, $hsStreet, $hsPhone, $hsJob, $hsIncome, $hsChildren, $hsWives, $hsCaseDescription, $hsHealthStatus, $hsHealthUpload);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../Pages/hsHome.php?error=none");
    exit();
}


/* Feedback Submit */

function dFeedbackSubmit($conn, $dFeedback, $donorsID)
{
    $sql = "INSERT INTO feedback (comment, donorsID) VALUES (?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../Pages/signUp.php?error=feedbackinsertionfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $dFeedback, $donorsID);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../Pages/dFeedback.php?feedbacksubmitted");
    exit();
}

function chFeedbackSubmit($conn, $chFeedback, $chID)
{
    $sql = "INSERT INTO feedback (comment, chID) VALUES (?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../Pages/chHome.php?error=feedbackinsertionfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $chFeedback, $chID);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../Pages/chFeedback.php?feedbacksubmitted");
    exit();
}

/* Encryption */

// $textToEncrypt = "My super secret information.";


function encrypt($txt) {

    $encryptionMethod = "AES-256-CBC";
    $encryptionKey = "L1feofG1v1ng";
    $encryptionIV = '1234567891011121';
    $options = 0;

    $textToEncrypt = $txt;
    $encryptedMsg = openssl_encrypt($textToEncrypt, $encryptionMethod, $encryptionKey, $options, $encryptionIV);
    return $encryptedMsg;
}

function decrypt($enctxt) {

    $encryptionMethod = "AES-256-CBC";
    $decryptionKey = "L1feofG1v1ng";
    $decryptionIV = '1234567891011121';
    $options = 0;
    
    $encryptedMsg = $enctxt;
    $decryptedMsg= openssl_decrypt($encryptedMsg, $encryptionMethod, $decryptionKey, $options, $decryptionIV);
    return $decryptedMsg;
}

//Result
//echo "Encrypted: $encryptedMessage <br>Decrypted: $decryptedMessage";

/* Admin Functions */

define('userAdmin', '1');

function isAdmin() {

    if (isset($_SESSION['user']) && $_SESSION['user']['userLevel'] == userAdmin) {
        return true;
    } else {
        return false;
    }
}

function addAdmin($conn, $adminUserName, $adminPwd)
{
    $adminHashedPwd = password_hash($adminPwd, PASSWORD_DEFAULT);

    $sql1 = "INSERT INTO admins (adminsUserName, adminsPwd) VALUES ('$adminUserName', '$adminHashedPwd');";
    mysqli_query($conn, $sql1);

    $adminsID = mysqli_insert_id($conn);
        
    $sql2 = "INSERT INTO donors (donorsUserName, donorsPwd, userLevel, adminsID) VALUES ('$adminUserName', '$adminHashedPwd', '1', $adminsID);";
    
    $sql3 = "INSERT INTO charities (chUserName, chPwd, userLevel, adminsID) VALUES ('$adminUserName', '$adminHashedPwd', '1', $adminsID);";
    
    $sql4 = "INSERT INTO helpseekers (hsUserName, hsPwd, userLevel, adminsID) VALUES ('$adminUserName', '$adminHashedPwd', '1', $adminsID);";
    
    mysqli_query($conn, $sql2);
    mysqli_query($conn, $sql3);
    mysqli_query($conn, $sql4);
    // $stmt = mysqli_stmt_init($conn);

    // if (!mysqli_stmt_prepare($stmt, $sql)) {
    //     header("location: ../Pages/signUp.php?error=createuserfailed");
    //     exit();
    // }


    // mysqli_stmt_bind_param($stmt, "ss", $adminUserName, $adminHashedPwd);
    // mysqli_stmt_execute($stmt);
    // mysqli_stmt_close($stmt);
    header("location: ../Pages/admin.php?error=none");
    exit();
}

function checkAdmin($conn, $adminUserName)
{
    $sql = "SELECT * FROM admins WHERE adminsUserName = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $adminUserName);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function adminPwdMatch($adminPwd, $adminPwdRepeat) {
    $result;
    if ($adminPwd !== $adminPwdRepeat) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

// function adminInvalidUserName($adminUserName)
// {
//     $result;
//     if (!preg_match("/^[a-zA-Z0-9]*$/", $adminUserName)) {
//         $result = true;
//     } else {
//         $result = false;
//     }
//     return $result;
// }

function addAdminEmptyInput($adminUserName, $adminPwd, $adminPwdRepeat)
{
    $result;
    if (empty($adminUserName) || empty($adminPwd) || empty($adminPwdRepeat)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}