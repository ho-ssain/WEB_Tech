<?php
include "/xampp/htdocs/ABC_news/controller/DBcon.php";
#....................................for loging check in some particular page 
    function check_login($con) {
        if(isset($_SESSION['u_name'])) {
            $u = $_SESSION['u_name'];
            $name_query = "select * from users where u_name='$u' ";
            $query = mysqli_query($con, $name_query);
            $nameCount = mysqli_num_rows($query);
            if($nameCount > 0) {
                $user_data = mysqli_fetch_assoc($query);
                return $user_data;
            }
        }
        header("location: ../home.php"); #back to login page.
    }

?>