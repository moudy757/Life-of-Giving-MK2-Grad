<?php

$page = "View Feedback";

include_once 'adminHeader.php';
include_once '../Includes/dbh.inc.php';
include_once '../Includes/functions.inc.php';

?>

<section class="adminVFb wrapper">
    <h1 class="textCenter">Feedback List</h1>

    <div class="textCenter errorHandlers">
        <?php
        if (isset($_GET["fbdeleted"])) {
            echo "<p>Feedback deleted successfully!</p>";
        }

        ?>
    </div>

    <div class="viewTable">
        <table class="card">
            <tr>
                <th>Feedback ID</th>
                <th>Comment</th>
                <th>Feedback Date</th>
                <th>Donor ID</th>
                <th>Charity ID</th>
            </tr>
            <?php
            
            $sql = "SELECT fbID, comment, fbDate, donorsID, chID FROM feedback;";

            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);

            if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>

            <tr>
                <td><?php echo $row["fbID"] ?></td>
                <td><?php echo $row["comment"] ?></td>
                <td><?php echo $row["fbDate"] ?></td>
                <td><?php echo $row["donorsID"] ?></td>
                <td><?php echo $row["chID"] ?></td>
                <td><a
                        href="../Includes/deleteUser.php?fbid=<?php $encID = encrypt($row["fbID"]); echo urlencode($encID); ?>">Delete
                        Feedback</a>
            </tr>

            <?php

                }
            }            

            ?>
        </table>
    </div>
</section>