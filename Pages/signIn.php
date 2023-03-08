<?php
include_once 'uaHeader.php'
?>



<div class="wrapper signIn">
    <section class="container">
        <div class="shortForm-box">
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" id="toggleBtn1" onclick="signinDonor()">Donor</button>
                <button type="button" id="toggleBtn2" onclick="signinHs()">Help Seeker</button>
                <button type="button" id="toggleBtn3" onclick="signinCharity()">Charity</button>
            </div>

            <div class="text-center error-handlers">
                <?php
                if (isset($_GET["error"])) {
                    if ($_GET["error"] == "emptyinput") {
                    echo "<p>Fill in the required fields!</p>";
                    } else if ($_GET["error"] == "usernotfound") {
                    echo "<p>User does not exist!</p>";
                    } else if ($_GET["error"] == "wrongpassword") {
                    echo "<p>Check your password!</p>";
                    } else if ($_GET["error"] == "none") {
                    echo "<p>You have successfully signed up! Now sign in!</p>";
                    }
                }
                ?>
            </div>

            <form action="../Includes/dSignIn.inc.php" method="post" id="signinDonor" class="input-group card">
                <!-- <p class="m-2">Donor</p> -->
                <div class="darkBorder">
                    <div class="input-div">
                        <input type="text" class="input-field" name="dSigninID" placeholder="UserName">
                        <input type="password" class="input-field" name="dPwd" placeholder="Password">
                    </div>
                    <p class="text-center"><a href="forgotPwd.php">Forgot Password</a></p>
                    <button type="submit" name="dSigninSubmit" class="submit-btn md">Sign In</button>
                </div>
            </form>


            <form action="../Includes/hsSignIn.inc.php" method="post" id="signinHs" class="input-group card">
                <div class="darkBorder">
                    <div class="input-div">
                        <!-- <p class="m-2">Help Seeker</p> -->
                        <input type="text" class="input-field" name="hsSigninID" placeholder="UserName">
                        <input type="password" class="input-field" name="hsPwd" placeholder="Password">
                    </div>
                    <p class="text-center"><a href="forgotPwd.php">Forgot Password</a></p>
                    <button type="submit" name="hsSigninSubmit" class="submit-btn md">Sign In</button>
                </div>
            </form>


            <form action="../Includes/chSignIn.inc.php" method="post" id="signinCharity" class="input-group card">
                <div class="darkBorder">
                    <div class="input-div">
                        <!-- <p class="m-2">Charity</p> -->
                        <input type="text" class="input-field" name="chSigninID" placeholder="UserName">
                        <input type="password" class="input-field" name="chPwd" placeholder="Password">
                    </div>
                    <p class="text-center"><a href="forgotPwd.php">Forgot Password</a></p>
                    <button type="submit" name="chSigninSubmit" class="submit-btn md">Sign In</button>
                </div>
            </form>
        </div>
    </section>
</div>



<?php
include_once 'uaFooter.php'
?>