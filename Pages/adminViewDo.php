<?php

$page = "View Donations";

include_once 'adminHeader.php';
include_once '../Includes/dbh.inc.php';
include_once '../Includes/functions.inc.php';

?>

<section class="adminVDo wrapper">
    <h1 class="textCenter">Donation List</h1>

    <div class="textCenter errorHandlers">
        <?php
        if (isset($_GET["dodeleted"])) {
            echo "<p>Donation deleted successfully!</p>";
        }

        ?>
    </div>

    <div class="viewTable">
        <table class="card">
            <tr>
                <th>Donation ID</th>
                <th>Charity Name</th>
                <th>Donation Type</th>
                <th>Donation Value</th>
                <th>Donation Quantity</th>
            </tr>
            <?php
            
            $sql = "SELECT chDonationID, chName, dType, dValue, dQuantity FROM chDonation;";

            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);

            if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>

            <tr>
                <td><?php echo $row["chDonationID"] ?></td>
                <td><?php echo $row["chName"] ?></td>
                <td><?php echo $row["dType"] ?></td>
                <td><?php echo $row["dValue"] ?></td>
                <td><?php echo $row["dQuantity"] ?></td>
                <td><a
                        href="../Includes/deleteUser.php?doid=<?php $encID = encrypt($row["chDonationID"]); echo urlencode($encID); ?>">Delete
                        Donation</a>
            </tr>

            <?php

                }
            }            

            ?>
        </table>
    </div>
</section>