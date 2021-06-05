<?php

include '/xampp/htdocs/ABC_News/controller/DBcon.php';

    $passErr = "";
    $emailErr = "";
    $userNameError = "";
    if(isset($_POST["submit"])) {
        $userName = $_POST['u_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];

        $u_name_query = "select * from users where u_name='$userName' ";
        $email_query = "select * from users where email='$email' ";

        $query1 = mysqli_query($con, $u_name_query);
        $query2 = mysqli_query($con, $email_query);

        $unCount = mysqli_num_rows($query1);
        $emailCount = mysqli_num_rows($query2);

        if($unCount > 0)
            $userNameError = "Sorry! User name already exists!";
        else {
            if($emailCount > 0)
                $emailErr = "Sorry! Email already exists!";
            else {
                if($password === $cpassword) {
                    $insertquery = "insert into 
                        users(u_name, email, password, cpassword) 
                        values('$userName', '$email', '$password', '$cpassword') ";
                    $iquery = mysqli_query($con, $insertquery);
                    if($iquery) {
                        ?>
                            <script>
                                alert("inserted Successfull");
                            </script>
                        <?php
                        header("location: ../view/Form/form.php");
                    }   
                    else {
                        ?>
                            <script>
                                alert("No Connection");
                            </script>
                        <?php
                    }   
                }
                else
                    $passErr = "Password are not match!";
            }
        }
    }


?>