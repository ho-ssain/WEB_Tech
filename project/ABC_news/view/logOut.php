<?php
session_start();
    if(isset($_SESSION["u_name"])) {
        unset($_SESSION["u_name"]);
    }
    header("location: home.php");
?>