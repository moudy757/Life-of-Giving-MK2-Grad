<?php

include_once 'aHeader.php';
include_once '../Includes/dbh.inc.php';
include_once '../Includes/functions.inc.php';



$hsID = $_SESSION["hsID"];

// $sql = "SELECT * FROM helpseekers WHERE hsID=" . $hsID . ";";

// $result = mysqli_query($conn, $sql);
// $resultCheck = mysqli_num_rows($result);




$result = mysqli_query($conn, "SELECT * FROM helpseekers WHERE hsID='" . $hsID . "'");
$row= mysqli_fetch_array($result);

if (!isset($_SESSION["hsID"])) {
    header("location: signIn.php");
}
?>



<section class="wrapper">

    <div class="text-center error-handlers">
        <?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "none") {
                echo "<p>Info Successfully Updated!</p>";
            }
        }

        ?>
    </div>

    <div class="grid">

        <div class="hsUpdateDiv text-center">
            <h1 class="xxl">Profile Update</h1>
            <h2 class="lg">Is your info up-to-date?</h2>
            <img class="updateImg" src="../Images/update3.jpg" alt="">
            <p>Here is your info</p>

            <div class="hsUpdated">
                <table>
                    <tr>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Job</th>
                        <th>Income</th>
                        <th>City</th>
                        <th>District</th>
                        <th>Street</th>
                        <th>No. of Children</th>
                        <th>No. of Wives</th>
                        <th>Health Status</th>
                        <th>Case Description</th>
                    </tr>
                    <?php

                    $resultCheck = mysqli_num_rows($result);

                    if ($resultCheck > 0) {
                    
                    echo "<tr>
                        <td>" . $row["hsEmail"] . "</td>
                        <td>" . $row["hsPhone"] . "</td>
                        <td>" . $row["hsJob"] . "</td>
                        <td class='text-center'>" . $row["hsIncome"] . " EGP</td>
                        <td>" . $row["hsCity"] . "</td>
                        <td>" . $row["hsDistrict"] . "</td>
                        <td>" . wordwrap($row["hsStreet"],10,"<br>\n",TRUE) . "</td>
                        <td class='text-center'>" . $row["hsChildren"] . "</td>
                        <td class='text-center'>" . $row["hsWives"] . "</td>
                        <td>" . $row["hsHealthStatus"] . "</td>
                        <td>" . wordwrap($row["hsCaseDescription"],30,"<br>\n",TRUE) . "</td>
                    </tr>";
                    }
                    
                    ?>
                </table>
            </div>
        </div>

        <form action="../Includes/hsUpdate.inc.php" method="post" id="updateHs" class="input-group card updateForm">
            <!-- <p class="text-center">Help Seeker</p> -->
            <div class="darkBorder">

                <div class="input-div">

                    <label for="" class="autoM">Email</label>
                    <input type="email" class="input-field text-center" name="hsEmail" placeholder="Email"
                        value="<?php echo $row['hsEmail']; ?>">

                    <label for="" class="autoM">Password</label>
                    <input type="password" class="input-field text-center" name="hsPwd" placeholder="Password"
                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}"
                        title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters" required>

                    <label for="" class="autoM">Phone</label>
                    <input type="text" onkeypress='validate(event)' class="input-field text-center" name="hsPhone"
                        placeholder="Phone Number" maxlength="11" value="<?php echo $row['hsPhone']; ?>">

                    <label for="" style="margin-left: 120px;">Income</label>
                    <label for="" style="margin-left: 270px;">City</label>
                    <div class="custom-select">
                        <select name="hsIncome" id="" class="select">
                            <option selected><?php echo $row['hsIncome']; ?></option>
                            <option value="0-500">From 0 to 500</option>
                            <option value="500-1000">From 500 to 1000</option>
                            <option value="1000-1500">From 1000 to 1500</option>
                            <option value="1500-2000">From 1500 to 2000</option>
                            <option value="2000-2500">From 2000 to 2500</option>
                            <option value="2500-3000">From 2500 to 3000</option>
                            <option value="3000-3500">From 3000 to 3500</option>
                            <option value="3500-4000">From 3500 to 4000</option>
                            <option value="4000-4500">From 4000 to 4500</option>
                            <option value="4500-5000">From 4500 to 5000</option>
                        </select>

                        <select class="select" id="hsCity" name="hsCity">
                            <option selected><?php echo $row['hsCity']; ?></option>
                            <option value="Alexandria">Alexandria</option>
                            <option value="Aswan">Aswan</option>
                            <option value="Asyut ">Asyut </option>
                            <option value=" Beheira "> Beheira </option>
                            <option value="Beni Suef">Beni Suef</option>
                            <option value="Cairo ">Cairo</option>
                            <option value=" Dakahlia "> Dakahlia </option>
                            <option value=" Damietta"> Damietta</option>
                            <option value="Faiyum ">Faiyum </option>
                            <option value="Gharbia">Gharbia</option>
                            <option value="Giza ">Giza </option>
                            <option value=" Ismailia "> Ismailia </option>
                            <option value=" Kafr El Sheikh "> Kafr El Sheikh </option>
                            <option value="Luxor ">Luxor </option>
                            <option value=" Matruh "> Matruh </option>
                            <option value=" Minya "> Minya </option>
                            <option value="Monufia ">Monufia </option>
                            <option value="New Valley ">New Valley </option>
                            <option value=" North Sinai"> North Sinai</option>
                            <option value="Port Said">Port Said</option>
                            <option value="Qalyubia ">Qalyubia </option>
                            <option value=" Qena "> Qena </option>
                            <option value=" Red Sea"> Red Sea</option>
                            <option value="Sharqia ">Sharqia </option>
                            <option value="Sohag">Sohag</option>
                            <option value="South Sinai ">South Sinai </option>
                            <option value="Suez">Suez</option>
                        </select>
                    </div>

                    <label for="" class="autoM">District</label>
                    <input type="text" class="input-field text-center" name="hsDistrict" placeholder="District"
                        value="<?php echo $row['hsDistrict']; ?>">
                    <label for="" class="autoM">Street</label>
                    <input type="text" class="input-field text-center" name="hsStreet" placeholder="Street"
                        value="<?php echo $row['hsStreet']; ?>">

                    <label for="" class="autoM">Job</label>
                    <input type="text" class="input-field text-center" name="hsJob" placeholder="Job"
                        value="<?php echo $row['hsJob']; ?>">

                    <label for="" style="margin-left: 100px;">No. of Children</label>
                    <label for="" style="margin-left: 180px;">No. of Partners</label>
                    <div class="custom-select">
                        <select name="children" id="" class="select">
                            <option selected><?php echo $row['hsChildren']; ?></option>
                            <option value="none">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>

                        <select name="wives" id="" class="select">
                            <option selected><?php echo $row['hsWives']; ?></option>
                            <option value="none">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>

                    <label for="" class="autoM">Health Status</label>
                    <div class="text-center">
                        <input type="text" class="input-field text-center" name="hsHealthStatus"
                            placeholder="Health Status (Optional)" value="<?php echo $row['hsHealthStatus']; ?>">
                        <br>
                        <label for="hsHealthUpload">Upload any relative documents here.</label>
                        <input type="file" accept="image/jpeg,image/gif,image/png,application/pdf,image/x=eps"
                            class="file" name="hsHealthUpload">

                        <p class="autoM">Case Description</p>
                        <textarea name="caseDescription" id="" cols="40"
                            rows="10"><?php echo $row['hsCaseDescription']; ?></textarea>
                    </div>
                </div>

                <button type="submit" name="hsUpdateSubmit" class="submit-btn md">Update</button>
            </div>
        </form>
    </div>

</section>



<?php
include_once 'aFooter.php'
?>