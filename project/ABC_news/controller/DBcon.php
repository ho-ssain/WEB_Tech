<?php
    $server = "localhost";
    $user = "root";
    $password = "";
    $db = "news_portal";

    $con = mysqli_connect($server, $user, $password, $db);

    if(!$con) {
        ?>
            <script>
                alert("No Connection");
            </script>
        <?php
    }
?>