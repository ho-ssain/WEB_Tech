<?php
session_start();
include "./h.php";
include "/xampp/htdocs/ABC_news/controller/checkLogin.php";
$userdata = check_login($con);
    $rec_id = $_GET['id'];
    $q = " DELETE FROM users WHERE u_id = '{$rec_id}' ";
    $r = mysqli_query($con, $q);
    if($r)
        header('location: user.php'); 
?>




