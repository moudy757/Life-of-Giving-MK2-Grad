<?php

include_once 'aHeader.php';
include_once '../Includes/dbh.inc.php';

$chID = $_SESSION["chID"];

$result = mysqli_query($conn, "SELECT * FROM charities WHERE chID = " . $chID);
$row = mysqli_fetch_array($result);

?>



<section class="wrapper donorProfilePage">
    <div class="grid grid-3">
        <div class="dUpdateForm card">
            <form action="../Includes/chUpdate.inc.php" method="post">
                <label class="autoM" for="">Email</label>
                <input name="chEmail" class="input-field" type="email" value="<?php echo $row['chEmail']; ?>">
                <label class="autoM" for="">Password</label>
                <input name="chPwd" class="input-field" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}"
                    title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters"
                    required>
                <label class="autoM" for="">1st Phone</label>
                <input name="chPhone1" class="input-field" type="text" value="<?php echo $row['chPhone1']; ?>" onkeypress='validate(event)'>
                <label class="autoM" for="">2nd Phone</label>
                <input name="chPhone2" class="input-field" type="text" value="<?php echo $row['chPhone2']; ?>" onkeypress='validate(event)'>
                <label class="autoM" for="">City</label>
                <input name="chCity" class="input-field" type="text" value="<?php echo $row['chCity']; ?>">
                <label class="autoM" for="">District</label>
                <input name="chDistrict" class="input-field" type="text" value="<?php echo $row['chDistrict']; ?>">
                <label class="autoM" for="">Street</label>
                <input name="chStreet" class="input-field" type="text" value="<?php echo $row['chStreet']; ?>">
                <label class="autoM" for="">Bank Name</label>
                <input name="chBankName" class="input-field" type="text" value="<?php echo $row['chBankName']; ?>">
                <label class="autoM" for="">IBAN</label>
                <input name="IBAN" class="input-field" type="text" value="<?php echo $row['IBAN']; ?>">

                <button type="submit" class="submit-btn md" name="chUpdateSubmit"
                    style="margin-top: 15px; width: 65%;">Update</button>
            </form>
        </div>
        <div class="donorProfile flexStart">
            <h1 class="xl my-2">Update Profile</h1>
            <img src="../Images/update3.jpg" class="updateImg dUImg" alt="">


            <div class="updateTable card">
                <table>
                    <tr>
                        <th>Email</th>
                        <th>1st Phone</th>
                        <th>2nd Phone</th>
                        <th>City</th>
                        <th>District</th>
                        <th>Street</th>
                        <th>Bank Name</th>
                        <th>IBAN</th>
                    </tr>
                    <?php

                    $resultCheck = mysqli_num_rows($result);

                    if ($resultCheck > 0) {
                    
                    echo "<tr>
                        <td>" . $row["chEmail"] . "</td>
                        <td>" . $row["chPhone1"] . "</td>
                        <td>" . $row["chPhone2"] . "</td>
                        <td>" . $row["chCity"] . "</td>
                        <td>" . $row["chDistrict"] . "</td>
                        <td>" . wordwrap($row["chStreet"],10,"<br>\n",TRUE) . "</td>
                        <td>" . $row["chBankName"] . "</td>
                        <td>" . $row["IBAN"] . "</td>
                        </tr>";
                    }
                    
                    ?>
                </table>
            </div>
        </div>
    </div>
</section>





<?php
include_once 'aFooter.php'
?>