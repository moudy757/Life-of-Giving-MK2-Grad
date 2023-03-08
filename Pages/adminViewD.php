<?php

$page = "View Donors";

include_once 'adminHeader.php';
include_once '../Includes/dbh.inc.php';
include_once '../Includes/functions.inc.php';

?>

<section class="adminVD wrapper">
    <h1 class="textCenter">Donor List</h1>

    <div class="textCenter errorHandlers">
        <?php
        if (isset($_GET["donordeleted"])) {
            echo "<p>Donor deleted successfully!</p>";
        }

        ?>
    </div>

    <div class="viewTable">
        <table class="card">
            <tr>
                <th>Donor ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>User Name</th>
                <th>Email</th>
                <th>Country</th>
            </tr>
            <?php
            
            $sql = "SELECT donorsID, donorsFName, donorsLName, donorsUserName, donorsEmail, donorsCountry FROM donors WHERE userLevel = 0;";

            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);

            if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>

            <tr>
                <td><?php echo $row["donorsID"] ?></td>
                <td><?php echo $row["donorsFName"] ?></td>
                <td><?php echo $row["donorsLName"] ?></td>
                <td><?php echo $row["donorsUserName"] ?></td>
                <td><?php echo $row["donorsEmail"] ?></td>
                <td><?php echo $row["donorsCountry"] ?></td>
                <td><a
                        href="../Includes/deleteUser.php?donorid=<?php $encID = encrypt($row["donorsID"]); echo urlencode($encID); ?>">Delete
                        Donor</a>
            </tr>

            <?php

                }
            }            

            ?>
        </table>
    </div>
</section>