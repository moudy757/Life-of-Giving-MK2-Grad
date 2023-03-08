<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<script>
    $(document).ready(function(){
        $("#searchQuery").keyup(function(){
            $.ajax({
                url: '../Includes/search.inc.php',
                type: 'post',
                data: {searchQuery: $(this).val()},
                success:function(result){
                    $("#result").html(result);
                }
            });
        });
    });
</script>

<input type="text" id="searchQuery" class="searchField" placeholder="Search Query">

<span id="result"></span>




 -->
<?php

include_once '../Includes/functions.inc.php';
 session_start();
// $xyz = "25";
// $encMsg = encrypt($xyz);
// echo $encMsg;
// echo $_GET["id"];
// $encAdminsID = "dBJyK+c37dhsXAbS91bzIQ==";
// echo $encAdminsID;
// $adminsID = decrypt($encAdminsID);
// // echo $adminsID;
// $decMsg = decrypt($encAdminsID);
// echo "<br>" . $decMsg;

echo $_SESSION["chID"];











?>