<?php

include_once 'aHeader.php';
include_once '../Includes/dbh.inc.php';

?>



<section class="wrapper">

    <div class="text-center error-handlers">
        <?php
        if (isset($_GET["feedbacksubmitted"])) {
            echo "<p>Feedback submitted successfully!</p>";
        }

        ?>
    </div>

    <div class="grid feedback">
        <div class="">
            <form id="dFeedback" class="input-group card" action="../Includes/feedback.inc.php" method="post">
                <div class="darkBorder">
                    <div class="text-center">
                        <h2>Your feedback is important to us.</h2>
                        <h3>Thank you!</h3>
                        <h3>We read every feedback we get and we take it very seriously.</h3>
                    </div>
                    <div>
                        <img src="../Images/feedback.png"
                            style="width:100%; height:300px; border-radius: 10px; margin: 30px auto;" alt="">
                    </div>
                    <div class="text-center">
                        <p>Would you like to share something with us? </p>
                    </div>
                    <div class="input-div text-center">
                        <textarea name="dFeedback" id="" cols="50" rows="5" maxlength='255' required></textarea>
                    </div>
                    <button type="submit" name="dFeedbackSubmit" class="submit-btn md">Submit</button>
                </div>
            </form>
        </div>

        <div class="">
            <table class="feedbackTable">
                <tr>
                    <th>Comment</th>
                    <th>Date</th>
                </tr>

                <?php

                $sql = "SELECT comment, fbDate FROM feedback;";

                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);

                if ($resultCheck > 0) {

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr><td>" . $row["comment"] . "</td><td>" . $row["fbDate"] . "</td><tr>";
                    }
                } else {
                    echo "<h3 class='text-center'>No Feedback available right now.</h3>";
                }

                ?>

            </table>
        </div>
    </div>
</section>






<?php
include_once 'aFooter.php'
?>