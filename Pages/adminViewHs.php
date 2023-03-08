<?php

$page = "View Help Seekers";

include_once 'adminHeader.php';
include_once '../Includes/dbh.inc.php';
include_once '../Includes/functions.inc.php';

?>

<section class="adminVHs wrapper">
    <h1 class="textCenter">Help Seeker List</h1>

    <div class="textCenter errorHandlers">
        <?php
        if (isset($_GET["hsdeleted"])) {
            echo "<p>Help Seeker deleted successfully!</p>";
        }

        ?>
    </div>

    <div class="viewTable">
        <table class="card">
            <tr>
                <th>Help Seeker ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>User Name</th>
                <th>Email</th>
                <th>National ID</th>
            </tr>
            <?php
            
            $sql = "SELECT hsID, hsFName, hsLName, hsUserName, hsEmail, hsNationalID FROM helpseekers WHERE userLevel = 0;";

            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);

            if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>

            <tr>
                <td><?php echo $row["hsID"] ?></td>
                <td><?php echo $row["hsFName"] ?></td>
                <td><?php echo $row["hsLName"] ?></td>
                <td><?php echo $row["hsUserName"] ?></td>
                <td><?php echo $row["hsEmail"] ?></td>
                <td><?php echo $row["hsNationalID"] ?></td>
                <td><a
                        href="../Includes/deleteUser.php?hsid=<?php $encID = encrypt($row["hsID"]); echo urlencode($encID); ?>">Delete
                        Help Seeker</a>
            </tr>

            <?php

                }
            }            

            ?>
        </table>
    </div>
</section>