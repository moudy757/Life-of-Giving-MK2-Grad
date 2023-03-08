<!-- Footer -->
<footer class="footer bg-dark py-5">
    <div class="container flex">
        <div class="dd">
            <h1><a href="<?php
            if (isset($_SESSION["donorsID"])) {
                echo "aDonorHome.php";
            } elseif (isset($_SESSION["chID"])) {
                echo "chHome.php";
            } elseif (isset($_SESSION["hsID"])) {
                echo "hsHome.php";
            } else {
                echo "uaHome.php";
            }
            ?>">Life of Giving</a></h1>
            <p>Copyright &copy; 2021</p>
        </div>
        <nav class="dd">
            <ul>
            <li><a href="mailto:supp.lifeofgiving@gmail.com"><strong>Contact Us</strong></a><br>"We would love to hear from you."</li>
                <?php
                
                if (isset($_SESSION["donorsID"])) {
                    echo "<li class='faq'><a href='dFaq.php'>FAQ</a></li>";
                }
                elseif (isset($_SESSION["chID"])) {
                    echo "<li class='faq'><a href='chFaq.php'>FAQ</a></li>";
                }
                elseif (isset($_SESSION["hsID"])) {
                    echo "<li class='faq'><a href='hsFaq.php'>FAQ</a></li>";
                }
                if (isAdmin()) {
                    echo "<li class='faq'><a href='admin.php'>Admin Panel</a></li>";
                }
                ?>
            </ul>
        </nav>
    </div>
</footer>

<script src="../Js/aScript.js"></script>
<script src="../Js/script.js"></script>

</body>

</html>

