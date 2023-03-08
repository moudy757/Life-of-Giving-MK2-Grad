<?php

include_once '../Includes/dbh.inc.php';

if (isset($_POST["chSearchQuery"])) {
    $chQ = $_POST["chSearchQuery"];
    $chQ = "%$chQ%";

    if (strlen($chQ) > 4) {
        $sql = "SELECT chName, chEmail, chPhone1, chPhone2, chCity, chDistrict, chStreet, chBankName, IBAN FROM charities WHERE chName LIKE ?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "GTH";
            exit();
        }
        mysqli_stmt_bind_param($stmt, "s", $chQ);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        while ($row = mysqli_fetch_assoc($resultData)) {
            $chName = $row['chName'];
            $chEmail = $row['chEmail'];
            $chPhone1 = $row['chPhone1'];
            $chPhone2 = $row['chPhone2'];
            $chCity = $row['chCity'];
            $chDistrict = $row['chDistrict'];
            $chStreet = $row['chStreet'];
            $chBankName = $row['chBankName'];
            $IBAN = $row['IBAN'];

            // echo "Hello";
            //echo "<tr><td>" . $row["chName"] . "</td><td>" . $row["chEmail"] . "</td><td>" . $row["chPhone1"] . "</td><td>" .$row["chPhone2"] . "</td><td>" . $row["chCity"] . "</td><td>" . $row["chDistrict"] . "</td><td>" . $row["chStreet"] . "</td><td>" . $row["chBankName"] . "</td><td>" . $row["IBAN"] . "</td></tr>";

            echo "<div class='result'><h1 class='text-center'>$chName</h1>Email: <a href='mailto:$chEmail'>$chEmail</a><br>Phone1: $chPhone1 Phone2: $chPhone2<br>City: $chCity District: $chDistrict<br>Street: $chStreet<br>Bank Name: $chBankName<br>IBAN: $IBAN</div>";
        }
    } else {
        echo "No data matches your search parameters!"; 
    }
    
}

if (isset($_POST["hsSearchQuery"])) {
    $hsQ = $_POST["hsSearchQuery"];
    $hsQ = "%$hsQ%";

    if (strlen($hsQ) > 4) {
        $sql = "SELECT hsFName, hsLName, hsCity, hsDistrict, hsStreet, hsAge, hsNationalID, hsPhone, hsJob, hsIncome, hsCaseDescription FROM helpseekers WHERE (hsFName LIKE ?) OR (hsLName LIKE ?) OR (hsCity LIKE ?) OR (hsDistrict LIKE ?) OR (hsStreet LIKE ?) OR (hsAge LIKE ?) OR (hsPhone LIKE ?) OR (hsJob LIKE ?) OR (hsIncome LIKE ?) OR (hsCaseDescription LIKE ?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "GTH";
            exit();
        }
        mysqli_stmt_bind_param($stmt, "ssssssssss", $hsQ, $hsQ, $hsQ, $hsQ, $hsQ, $hsQ, $hsQ, $hsQ, $hsQ, $hsQ);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        while ($row = mysqli_fetch_assoc($resultData)) {

            $userDob = $row["hsAge"];
            $dob = new DateTime($userDob);
            $now = new DateTime();
            $difference = $now->diff($dob);
            $age = $difference->y;
            // echo $age;

            $hsFName = $row['hsFName'];
            $hsLName = $row['hsLName'];
            $hsCity = $row['hsCity'];
            $hsDistrict = $row['hsDistrict'];
            $hsStreet = $row['hsStreet'];
            $hsAge = $age;
            $hsNationalID = $row['hsNationalID'];
            $hsPhone = $row['hsPhone'];
            $hsJob = $row['hsJob'];
            $hsIncome = $row['hsIncome'];
            $hsCaseDescription = $row['hsCaseDescription'];

            // echo "Hello";
            //echo "<tr><td>" . $row["chName"] . "</td><td>" . $row["chEmail"] . "</td><td>" . $row["chPhone1"] . "</td><td>" .$row["chPhone2"] . "</td><td>" . $row["chCity"] . "</td><td>" . $row["chDistrict"] . "</td><td>" . $row["chStreet"] . "</td><td>" . $row["chBankName"] . "</td><td>" . $row["IBAN"] . "</td></tr>";

            echo "<div class='result'><h1 class='text-center'>$hsFName $hsLName</h1><br>Phone: $hsPhone<br>City: $hsCity District: $hsDistrict<br>Street: $hsStreet<br>Age: $hsAge<br>National ID: $hsNationalID<br>Job: $hsJob Income: $hsIncome<br>Case: " . wordwrap($hsCaseDescription,30,'<br>',TRUE) . "</div>";
        }
    } else {
        echo "No data matches your search parameters!"; 
    }
    
}

if (isset($_POST["hsSearchQuery2"])) {
    $hsQ = $_POST["hsSearchQuery2"];
    $hsQ = "%$hsQ%";

    if (strlen($hsQ) > 4) {
        $sql = "SELECT hsFName, hsLName, hsCity, hsDistrict, hsStreet, hsAge, hsNationalID, hsPhone, hsJob, hsIncome, hsCaseDescription FROM helpseekers WHERE (hsFName LIKE ?) OR (hsLName LIKE ?) OR (hsCity LIKE ?) OR (hsDistrict LIKE ?) OR (hsStreet LIKE ?) OR (hsAge LIKE ?) OR (hsPhone LIKE ?) OR (hsJob LIKE ?) OR (hsIncome LIKE ?) OR (hsCaseDescription LIKE ?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "GTH";
            exit();
        }
        mysqli_stmt_bind_param($stmt, "ssssssssss", $hsQ, $hsQ, $hsQ, $hsQ, $hsQ, $hsQ, $hsQ, $hsQ, $hsQ, $hsQ);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        while ($row = mysqli_fetch_assoc($resultData)) {

            $userDob = $row["hsAge"];
            $dob = new DateTime($userDob);
            $now = new DateTime();
            $difference = $now->diff($dob);
            $age = $difference->y;
            // echo $age;

            $hsFName = $row['hsFName'];
            $hsLName = $row['hsLName'];
            $hsCity = $row['hsCity'];
            $hsDistrict = $row['hsDistrict'];
            $hsStreet = $row['hsStreet'];
            $hsAge = $age;
            $hsNationalID = $row['hsNationalID'];
            $hsPhone = $row['hsPhone'];
            $hsJob = $row['hsJob'];
            $hsIncome = $row['hsIncome'];
            $hsCaseDescription = $row['hsCaseDescription'];

            // echo "Hello";
            //echo "<tr><td>" . $row["chName"] . "</td><td>" . $row["chEmail"] . "</td><td>" . $row["chPhone1"] . "</td><td>" .$row["chPhone2"] . "</td><td>" . $row["chCity"] . "</td><td>" . $row["chDistrict"] . "</td><td>" . $row["chStreet"] . "</td><td>" . $row["chBankName"] . "</td><td>" . $row["IBAN"] . "</td></tr>";

            echo "<div class='result'><h1 class='text-center'>$hsFName $hsLName</h1><br>Phone: $hsPhone<br>City: $hsCity District: $hsDistrict<br>Street: $hsStreet<br>Age: $hsAge<br>National ID: $hsNationalID<br>Job: $hsJob Income: $hsIncome<br>Case: " . wordwrap($hsCaseDescription,30,'<br>',TRUE) . "</div>";
        }
    } else {
        echo "No data matches your search parameters!"; 
    }
    
}

