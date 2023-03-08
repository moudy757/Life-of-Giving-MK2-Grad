<?php

include_once 'aHeader.php';
include_once '../Includes/dbh.inc.php';
include_once '../Includes/functions.inc.php';


?>

<script>
$(document).ready(function() {
    $("#hsSearchQuery2").keyup(function() {
        $.ajax({
            url: '../Includes/search.inc.php',
            type: 'post',
            data: {
                hsSearchQuery2: $(this).val()
            },
            success: function(result3) {
                hsRemove2()
                $("#hsResult2").html(result3);
            }
        });
    });
});
</script>

<section class="wrapper">

    <div class="text-center error-handlers">
        <?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "feedbacksubmitted") {
                echo "<p>Feedback Submitted!</p>";
            }
            if ($_GET["error"] == "updated") {
                echo "<p>Info updated successfully!</p>";
            }
        }

        ?>
    </div>

    <div class="container">
        <div class=charity-menu card">
            <nav class="text-center">

                <h2 class="white m-1">Menu</h2>

                <ul class="grid">

                    <li><button type="button" class="button" id="hsListBtn2" onclick="hsList2()">Help Seeker
                            List</button>
                    </li>
                    <li><button type="button" class="button" id="doListBtn" onclick="doList()">Donation List</button>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <!-- <h1 class="text-center">Charity Home Page</h1> -->
    <!-- <p class="text-center">Still a work in progress! So bear with us.</p> -->
    <div class="chHome">
        <div class="flex">
            <div class="card table" id="doList">
                <table class="doTable">
                    <tr>
                        <th>Donation Type</th>
                        <th>Donation Quantity</th>
                        <th>Donation Value</th>
                        <th>Donation Description</th>
                        <th>Donation Date</th>
                        <th>Donor's First Name</th>
                        <th>Donor's Last Name</th>
                        <th>Donor's Email</th>
                        <th>Donor's Phone</th>
                    </tr>
                    <?php

                    $sql = "SELECT chDonation.dType, chDonation.dQuantity, chDonation.dValue, chDonation.dDescription, chDonation.dDate, donors.donorsFName, donors.donorsLName, donors.donorsEmail, donors.donorsPhone
                    FROM chDonation, donors
                    WHERE chDonation.chID =" .$_SESSION["chID"] . " && donors.donorsID = chDonation.donorsID
                    GROUP BY chDonation.chDonationID;";

                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);

                    if ($resultCheck > 0) {
                        
                        while ($row = mysqli_fetch_assoc($result)) {
                            $dType = $row["dType"];
                            $dQuantity = $row["dQuantity"];
                            $dValue = $row["dValue"];
                            $dDescription = $row["dDescription"];
                            $dDate = $row["dDate"];
                            $donorsFName = $row["donorsFName"];
                            $donorsLName = $row["donorsLName"];
                            $donorsEmail = $row["donorsEmail"];
                            $donorsPhone = $row["donorsPhone"];


                            // echo "<tr><td>" . $row["chName"] . "</td><td>" . $row["dType"] . "</td><td class='text-center'>" . $row["dQuantity"]. "</td><td class='text-center'>" . $row["dValue"] . "</td><td>" . wordwrap($row["dDescription"],20,"<br>\n",TRUE). "</td><td>" . $row["dDate"] . "</td></tr>";

                            echo "<tr>
                            <td>" . $dType . "</td>
                            <td class='text-center'>" . $dQuantity . "</td>
                            <td class='text-center'>" . $dValue . "</td>
                            <td>" . wordwrap($dDescription,20,'<br>',TRUE) . "</td>
                            <td>" . $dDate . "</td>
                            <td>" . $donorsFName . "</td>
                            <td>" . $donorsLName . "</td>
                            <td>" . $donorsEmail . "</td>
                            <td>" . $donorsPhone . "</td>
                            </tr>";
                            
                        }

                        

                    } else {
                        echo "<h3 class='text-center'>No Transactions available.</h3>";
                    }

                    ?>
                </table>
            </div>
        </div>

        <div class="flex">
            <div class="table card" id="hsList2">
                <table class="hsTable2">
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Age</th>
                        <th>City</th>
                        <th>District</th>
                        <th>Street</th>
                        <th>National ID</th>
                        <th>Phone</th>
                        <th>Job</th>
                        <th>Income</th>
                        <th>Children</th>
                        <th>Wives</th>
                        <th>Health Status</th>
                        <th>Case Description</th>
                    </tr>
                    <?php


                        $sql = "SELECT hsFName, hsLName, hsCity, hsDistrict, hsStreet, hsAge, hsNationalID, hsPhone, hsJob, hsIncome, hsChildren, hsWives, hsCaseDescription, hsHealthStatus, hsHealthUpload FROM helpseekers WHERE userLevel = 0;";

                        $result = mysqli_query($conn, $sql);
                        $resultCheck = mysqli_num_rows($result);

                        if ($resultCheck > 0) {

                            while ($row = mysqli_fetch_assoc($result)) {

                                $userDob = $row["hsAge"];
                                $dob = new DateTime($userDob);
                                $now = new DateTime();
                                $difference = $now->diff($dob);
                                $age = $difference->y;
                                // echo $age;

                                echo "<tr><td>" . $row["hsFName"] . "</td><td>" . $row["hsLName"] . "</td><td class= 'text-center'>" . $age . "</td><td>" . $row["hsCity"] . "</td><td>" . $row["hsDistrict"] . "</td><td>" . wordwrap($row["hsStreet"],10,"<br>\n",TRUE) . "</td><td>" . $row["hsNationalID"] . "</td><td>" . $row["hsPhone"] . "</td><td>" . $row["hsJob"] . "</td><td class='text-center'>" . $row["hsIncome"] . " EGP</td><td class= 'text-center'>" . $row["hsChildren"] . "</td><td class= 'text-center'>" .$row["hsWives"] . "</td><td class= 'text-center'>" .$row["hsHealthStatus"] . "</td><td>" . wordwrap($row["hsCaseDescription"],30,"<br>\n",TRUE) . "</td></tr>";
                            }
                        } else {
                            echo "<h3 class='text-center'>No Help Seekers available right now.</h3>";
                        }
                        


                        ?>
                </table>
            </div>

            <div class="searchCard" id="hsSearch2">
                    <input type="text" name="searchQuery" id="hsSearchQuery2" class="searchField"
                        placeholder="Search Query">
                </div>

            </div>
            <div id="hsResult2"></div>
        </div>
</section>



<?php
include_once 'aFooter.php'
?>