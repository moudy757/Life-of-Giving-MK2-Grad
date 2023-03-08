<?php

$page = '';

include_once 'adminHeader.php';

?>
<section class="container">

    <div class="card textCenter welMsg">
        <h1>Welcome <?php
        if (isset($_SESSION["donorsID"])) {
            echo $_SESSION["donorsUserName"];
        }
        if (isset($_SESSION["chID"])) {
            echo $_SESSION["chUserName"];
        }
        if (isset($_SESSION["hsID"])) {
            echo $_SESSION["hsUserName"];
        }
        ?></h1>
    </div>

    <div class="adminBody">
        <div class="grid textCenter">
            <div>
                <h2 class="">Add Admin</h2>

                <div class="textCenter errorHandlers">
                    <?php
                    if (isset($_GET["error"])) {
                        if ($_GET["error"] == "none") {
                            echo "<p>Admin added successfully!</p>";
                        }
                        if ($_GET["error"] == "usernametaken") {
                            echo "<p>User Name already taken!</p>";
                        }
                        if ($_GET["error"] == "passwordsdontmatch") {
                            echo "<p>Passwords don't match!</p>";
                        }
                        if ($_GET["error"] == "invalidusername") {
                            echo "<p>Invalid User Name!</p>";
                        }
                        if ($_GET["error"] == "emptyinput") {
                            echo "<p>Fill all the fields!</p>";
                        }
                    }

                    ?>
                </div>

                <form action="../Includes/addAdmin.inc.php" method="post" class="card">
                    <input name="adminUserName" type="text" placeholder="Admin User Name" pattern="[A-Za-z0-9]{5,}" title="Only letters and numbers are allowed">
                    <input name="adminPwd" type="password" placeholder="Password"
                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}"
                        title="Must contain at least one  number and one uppercase and lowercase letter, and at least 6 or more characters">
                    <input name="adminPwdRepeat" type="password" placeholder="Repeat Password"
                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}"
                        title="Must contain at least one  number and one uppercase and lowercase letter, and at least 6 or more characters">

                    <div>
                        <button type="submit" name="addAdminSubmit">Add Admin</button>
                    </div>
                </form>
            </div>
            <div>
                <h2 class="">Remove Admin</h2>

                <div class="textCenter errorHandlers">
                    <?php
                    if (isset($_GET["admindeleted"])) {
                        echo "<p>Admin deleted successfully!</p>";
                    }

                    ?>
                </div>

                <div class="selectedAdmins">

                    <table class="card">
                        <tr>
                            <th>ID</th>
                            <th>User Name</th>
                            <th>Delete</th>
                        </tr>

                        <?php

                        $sql = "SELECT adminsID, adminsUserName FROM admins;";

                        $result = mysqli_query($conn, $sql);
                        $resultCheck = mysqli_num_rows($result);

                        if ($resultCheck > 0) {

                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>

                        <tr>
                            <td><?php echo $row["adminsID"] ?></td>
                            <td><?php echo $row["adminsUserName"] ?></td>
                            <td><a
                                    href="../Includes/deleteUser.php?adminid=<?php $encID = encrypt($row["adminsID"]); echo urlencode($encID); ?>">Delete
                                    Admin</a>
                            </td>
                        </tr>

                        <?php
                            }
                        }

                        ?>
                    </table>

                </div>
            </div>
        </div>
    </div>
</section>

</body>

</html>