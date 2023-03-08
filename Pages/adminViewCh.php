<?php

$page = "View Charities";

include_once 'adminHeader.php';
include_once '../Includes/dbh.inc.php';
include_once '../Includes/functions.inc.php';

?>

<section class="adminVCh wrapper">
    <h1 class="textCenter">Charity List</h1>

    <div class="textCenter errorHandlers">
        <?php
        if (isset($_GET["chdeleted"])) {
            echo "<p>Charity deleted successfully!</p>";
        }

        ?>
    </div>

    <div class="viewTable">
        <table class="card">
            <tr>
                <th>Charity ID</th>
                <th>Charity Name</th>
                <th>User Name</th>
                <th>Email</th>
                <th>IBAN</th>
            </tr>
            <?php
            
            $sql = "SELECT chID, chName, chUserName, chEmail, IBAN FROM charities WHERE userLevel = 0;";

            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);

            if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>

            <tr>
                <td><?php echo $row["chID"] ?></td>
                <td><?php echo $row["chName"] ?></td>
                <td><?php echo $row["chUserName"] ?></td>
                <td><?php echo $row["chEmail"] ?></td>
                <td><?php echo $row["IBAN"] ?></td>
                <td><a
                        href="../Includes/deleteUser.php?chid=<?php $encID = encrypt($row["chID"]); echo urlencode($encID); ?>">Delete
                        Charity</a>
            </tr>

            <?php

                }
            }            

            ?>
        </table>
    </div>
</section>