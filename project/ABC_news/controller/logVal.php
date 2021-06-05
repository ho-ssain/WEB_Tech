<?php
session_start();
include "/xampp/htdocs/ABC_News/controller/DBcon.php";
    $infoErr = "";
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $userMail = $_POST['email'];
        $password = $_POST['password'];
    
        $u_name_query = "select * from users where email='$userMail' ";
        $query1 = mysqli_query($con, $u_name_query);
        $unCount = mysqli_num_rows($query1);

        if($unCount > 0) {
            $user_data = mysqli_fetch_assoc($query1);
            if($user_data['password'] === $password ) {
                $_SESSION["u_name"] = $user_data["u_name"];
                if($user_data["u_id"] == 1) {
                    header("location: ../view/admin/user.php");
                }
                else
                    header("location: ../view/home.php");
            }
        }
        else
            $infoErr = "Wrong User Name Or Password";
    }




?>


