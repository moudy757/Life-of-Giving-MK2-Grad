<?php

include_once 'aHeader.php';
include_once '../Includes/dbh.inc.php';
include_once '../Includes/functions.inc.php';

?>

<script>
$(document).ready(function() {
    $("#chSearchQuery").keyup(function() {
        $.ajax({
            url: '../Includes/search.inc.php',
            type: 'post',
            data: {
                chSearchQuery: $(this).val()
            },
            success: function(result1) {
                chRemove()
                $("#chResult").html(result1);
            }
        });
    });

    $("#hsSearchQuery").keyup(function() {
        $.ajax({
            url: '../Includes/search.inc.php',
            type: 'post',
            data: {
                hsSearchQuery: $(this).val()
            },
            success: function(result2) {
                hsRemove()
                $("#hsResult").html(result2);
            }
        });
    });
});
</script>



<section class="wrapper">
    <div class="text-center error-handlers">
        <?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "none") {
                echo "<p>Donation Successful!</p>";
            }
            if ($_GET["error"] == "selectcharity") {
                echo "<p>Please Select a Charity!</p>";
            }
            if ($_GET["error"] == "formsubmitfailed") {
                echo "<p>Donation failed please try again!</p>";
            }
            if ($_GET["error"] == "feedbacksubmitted") {
                echo "<p>Feedback Submitted!</p>";
            }
            if ($_GET["error"] == "updated") {
                echo "<p>Info updated successfully!</p>";
            }
        }

        ?>
    </div>

    <div class="donor-content">
        <div class="container">
            <div class="donor-menu card">
                <nav class="text-center">

                    <h2 class="white m-1">Menu</h2>

                    <ul class="grid grid-4">
                        <li><button type="button" class="button" id="chListBtn" onclick="chList()">Charity List</button>
                        </li>
                        <li><button type="button" class="button" id="hsListBtn" onclick="hsList()">Help Seeker
                                List</button>
                        </li>
                        <li><button type="button" class="button" id="doFormBtn" onclick="doType()">Donate
                                Now</button>
                        </li>
                        <li><button type="button" class="button" id="trListBtn" onclick="trList()">Transaction
                                List</button>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="flex">

            <div class="donor-dashboard" id="flex-x">
                <div class="card table" id="chList">
                    <table class="chTable" id="result2">
                        <tr>
                            <th>Charity Name</th>
                            <th>Charity Email</th>
                            <th>Charity 1st Phone</th>
                            <th>Charity 2nd Phone</th>
                            <th>Charity City</th>
                            <th>Charity District</th>
                            <th>Charity Street</th>
                            <th>Charity Bank Name</th>
                            <th>Charity IBAN</th>
                        </tr>
                        <?php

                        $sql = "SELECT chName, chEmail, chPhone1, chPhone2, chCity, chDistrict, chStreet, chBankName, IBAN FROM charities WHERE userLevel = 0;";

                        $result = mysqli_query($conn, $sql);
                        $resultCheck = mysqli_num_rows($result);

                        if ($resultCheck > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr><td>" . $row["chName"] . "</td><td>" . $row["chEmail"] . "</td><td>" . $row["chPhone1"] . "</td><td>" .$row["chPhone2"] . "</td><td>" . $row["chCity"] . "</td><td>" . $row["chDistrict"] . "</td><td>" . $row["chStreet"] . "</td><td>" . $row["chBankName"] . "</td><td>" . $row["IBAN"] . "</td></tr>";
                            }
                        } else {
                            echo "<h3 class='text-center'>No Charities available right now.</h3>";
                        }

                        ?>
                    </table>
                </div>
                <div class="searchCard" id="chSearch">
                    <input type="text" name="searchQuery" id="chSearchQuery" class="searchField"
                        placeholder="Search Query">
                </div>

                <div id="chResult"></div>

                <div class="table card" id="hsList">
                    <table class="hsTable">
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
                            <th>Gender</th>
                            <th>Children</th>
                            <th>Wives</th>
                            <th>Health Status</th>
                            <th>Case Description</th>
                        </tr>
                        <?php

                        


                        $sql = "SELECT hsFName, hsLName, hsCity, hsDistrict, hsStreet, hsAge, hsNationalID, hsPhone, hsJob, hsIncome, hsGender, hsChildren, hsWives, hsCaseDescription, hsHealthStatus, hsHealthUpload FROM helpseekers WHERE userLevel = 0;";

                        $result = mysqli_query($conn, $sql);
                        $resultCheck = mysqli_num_rows($result);

                        if ($resultCheck > 0) {

                            // $hsClick = "SELECT * FROM helpseekers WHERE hsFName = " . $row["hsFName"] . ";";
                            while ($row = mysqli_fetch_assoc($result)) {

                                $userDob = $row["hsAge"];
                                $dob = new DateTime($userDob);
                                $now = new DateTime();
                                $difference = $now->diff($dob);
                                $age = $difference->y;
                                // echo $age;

                                echo "<tr><td>" . $row["hsFName"] . "</td><td>" . $row["hsLName"] . "</td><td>" . $age . "</td><td>" . $row["hsCity"] . "</td><td>" . $row["hsDistrict"] . "</td><td>" . wordwrap($row["hsStreet"], 10, "<br>\n", true) . "</td><td>" . $row["hsNationalID"] . "</td><td>" . $row["hsPhone"] . "</td><td>" . $row["hsJob"] . "</td><td class='text-center'>" . $row["hsIncome"] . " EGP</td><td class= 'text-center'>" . $row["hsGender"] . "</td><td class='text-center'>" . $row["hsChildren"] . "</td><td class= 'text-center'>" .$row["hsWives"] . "</td><td class= 'text-center'>" .$row["hsHealthStatus"] . "</td><td>" . wordwrap($row["hsCaseDescription"], 30, "<br>\n", true) . "</td></tr>";
                            }
                        } else {
                            echo "<h3 class='text-center'>No Help Seekers available right now.</h3>";
                        }


                        ?>
                    </table>
                </div>
                <div class="searchCard" id="hsSearch">
                    <input type="text" name="searchQuery" id="hsSearchQuery" class="searchField"
                        placeholder="Search Query">
                </div>

                <div class="donor-menu card flex" id="doTypeBtns">
                    <ul class="grid grid-3">
                        <li><button type="button" class="button" id="moneyDoBtn" onclick="moneyDo()">Money
                                Donation</button>
                        </li>
                        <li><button type="button" class="button" id="assetsDoBtn" onclick="assetDo()">Item
                                Donation</button>
                        </li>
                        <li><button type="button" class="button" id="bothDoBtn" onclick="bothDo()">Money & Item
                                Donation</button>
                        </li>
                    </ul>
                </div>
                <div class="table" id="donationForm">
                    <div class="flex">
                        <form action="../Includes/donationForm.inc.php" method="post"
                            class="doInputGroup card text-center">
                            <h3 class="text-center py-2">Money & Item Donation</h3>

                            <div class="input-div">
                                <select class="select" name="select1" required>
                                    <option disabled selected>Charities</option>
                                    <?php

                                $sql = "SELECT chID, chName FROM charities WHERE userLevel = 0;";

                                $result = mysqli_query($conn, $sql);
                                $resultCheck = mysqli_num_rows($result);

                                if ($resultCheck > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<option value='". $row["chID"] . "|" . $row["chName"] ."'>" . $row["chName"] . "</option>";
                                    }
                                } else {
                                    echo "<option value=''>No Charities available right now.</option>";
                                }
                                ?>
                                </select>
                            </div>

                            <div class="input-div">
                                <input type="number" class="input-field text-center" onkeypress='validate(event)'
                                    name="dValue" min="1" placeholder="Donation Value $" required>
                            </div>

                            <div class="input-div">
                                <input type="number" class="input-field text-center" onkeypress='validate(event)'
                                    name="dQuantity" min="1" max="10" placeholder="Item Quantity" required>
                            </div>

                            <div class="input-div">
                                <p class="text-center">Item Description</p>
                                <textarea name="dDescription" cols="25" rows="10"
                                    placeholder="Describe your donated items here!" required></textarea>
                            </div>

                            <button type="submit" name="boFormSubmit" class="submit-btn md" style="margin-top: 15px;">Donate</button>
                        </form>
                    </div>
                </div>
                <div class="table" id="moDonation">
                    <div class="flex">
                        <form action="../Includes/donationForm.inc.php" method="post"
                            class="doInputGroup card text-center">
                            <h3 class="text-center py-2">Money Donation</h3>

                            <div class="input-div custom-select">
                                <select class="select" name="select1" required>
                                    <option disabled selected>Charities</option>
                                    <?php

                                $sql = "SELECT chID, chName FROM charities WHERE userLevel = 0;";

                                $result = mysqli_query($conn, $sql);
                                $resultCheck = mysqli_num_rows($result);

                                if ($resultCheck > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<option value='". $row["chID"] . "|" . $row["chName"] ."'>" . $row["chName"] . "</option>";
                                    }
                                } else {
                                    echo "<option value=''>No Charities available right now.</option>";
                                }
                                ?>
                                </select>
                            </div>
                            <div class="input-div">
                                <input type="number" class="input-field text-center" onkeypress='validate(event)'
                                    name="dValue" placeholder="Donation Value" required>
                            </div>



                            <div class="input-div">
                                <p class="text-center">Donation Description <span class="side-text">(optional)</span>
                                </p>
                                <textarea class="text-center" name="dDescription" cols="25" rows="10"
                                    placeholder="Describe your donation here!"></textarea>
                            </div>
                            <button type="submit" name="moFormSubmit" class="submit-btn md" style="margin-top: 15px;">Donate</button>
                        </form>
                    </div>
                </div>
                <div class="table" id="asDonation">
                    <div class="flex">
                        <form action="../Includes/donationForm.inc.php" method="post"
                            class="doInputGroup card text-center">
                            <h3 class="text-center py-2">Item Donation</h3>

                            <div class="input-div custom-select">
                                <select class="select" name="select1" required>
                                    <option disabled selected>Charities</option>
                                    <?php

                                $sql = "SELECT chID, chName FROM charities WHERE userLevel = 0;";

                                $result = mysqli_query($conn, $sql);
                                $resultCheck = mysqli_num_rows($result);

                                if ($resultCheck > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<option value='". $row["chID"] . "|" . $row["chName"] ."'>" . $row["chName"] . "</option>";
                                    }
                                } else {
                                    echo "<option value=''>No Charities available right now.</option>";
                                }
                                ?>
                                </select>
                            </div>
                            <div class="input-div">
                                <input type="number" class="input-field text-center" onkeypress='validate(event)'
                                    name="dQuantity" min="1" max="10" placeholder="Item Quantity" required>
                            </div>
                            <div class="input-div">
                                <p class="text-center">Item Description</p>
                                <textarea name="dDescription" cols="25" rows="10"
                                    placeholder="Describe your donated items here!" required></textarea>
                            </div>
                            <button type="submit" name="asFormSubmit" class="submit-btn md" style="margin-top: 15px;">Donate</button>
                        </form>
                    </div>
                </div>
                <div class="card table" id="trList">
                    <table class="trTable">
                        <tr>
                            <th>Charity Name</th>
                            <th>Donation Type</th>
                            <th>Donation Quantity</th>
                            <th>Donation Value</th>
                            <th>Donation Description</th>
                            <th>Donation Date</th>
                        </tr>
                        <?php

                    $sql = "SELECT chName, dType, dQuantity, dValue, dDescription, dDate FROM chDonation WHERE donorsID =" . $_SESSION["donorsID"] . ";";

                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);

                    if ($resultCheck > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr><td>" . $row["chName"] . "</td><td>" . $row["dType"] . "</td><td class='text-center'>" . $row["dQuantity"]. "</td><td class='text-center'>" . $row["dValue"] . "</td><td>" . wordwrap($row["dDescription"], 30, "<br>\n", true). "</td><td>" . $row["dDate"] . "</td></tr>";
                        }
                    } else {
                        echo "<h3 class='text-center'>No Transactions available.</h3>";
                    }

                    ?>
                    </table>
                </div>
            </div>

        </div>
        <div id="hsResult"></div>
    </div>
</section>



<?php
include_once 'aFooter.php'
?>