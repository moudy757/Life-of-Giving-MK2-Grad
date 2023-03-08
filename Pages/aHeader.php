<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" /> -->
    <link rel="stylesheet" href="../Css/utilities.css">
    <link rel="stylesheet" href="../Css/aStyle.css">
    <link rel="icon" href="../Images/Icon.png" type="image/icon type">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>



    <title>Life of Giving</title>
</head>

<body>
    <!-- Navbar -->
    <div class="navbar">
        <div class="grid grid-7">

            <div class="flex nav-grid">
                <!-- <img src="Images/Logo.png" alt="" class="logo"> -->
                <h1><a href="<?php
                        if (isset($_SESSION["donorsID"])) {
                            echo "aDonorHome.php";
                        }
                        if (isset($_SESSION["chID"])) {
                            echo "chHome.php";
                        }
                        if (isset($_SESSION["hsID"])) {
                            echo "hsHome.php";
                        }
                        ?>"><img src="../Images/3rdLogo.png" alt="" class="logo"></a></h1>
                <nav>
                    <ul>
                        <!-- <li class="faq"><a href="chList.php">Charities</a></li>
                        <li class="faq"><a href="../hsList.php">Help Seekers</a></li> -->
                        <?php
                        if (isset($_SESSION["donorsID"])) {
                            echo "<li class='card'><a href='dProfile.php' id='sc'>Profile</a></li>";
                            echo "<li class='card'><a href='dFeedback.php' id='sc'>Feedback</a></li>";
                        }
                        if (isset($_SESSION["chID"])) {
                            echo "<li class='card'><a href='chProfile.php' id='sc'>Profile</a></li>";
                            echo "<li class='card'><a href='chFeedback.php' id='sc'>Feedback</a></li>";
                        }
                        if (isset($_SESSION["hsID"])) {
                        }
                        ?>
                        
                        <li class="card"><a href="../Includes/signOut.inc.php" id="sc">Sign Out</a></li>
                        <!-- <li class="faq"><a href="faq.php">FAQ</a></li> -->
                    </ul>
                </nav>
            </div>
            <div class="align-r">
                <?php

                    if (isset($_SESSION["donorsID"])) {
                        echo "<h1 class='white text-center sm p-1'>". $_SESSION["donorsUserName"] . "</h1>";
                    } elseif (isset($_SESSION["chID"])) {
                        echo "<h1 class='white text-center sm p-1'>". $_SESSION["chUserName"] . "</h1>";
                    } elseif (isset($_SESSION["hsID"])) {
                        echo "<h1 class='white text-center sm p-1'>". $_SESSION["hsUserName"] . "</h1>";
                    } else {
                        header("location: ../Pages/signIn.php");
                        exit();
                    }

                ?>
            </div>
        </div>
    </div>
    </div>