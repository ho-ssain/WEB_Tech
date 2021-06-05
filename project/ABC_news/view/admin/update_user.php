<?php 
session_start();
include "./h.php";
include "/xampp/htdocs/ABC_news/controller/checkLogin.php";
$userdata = check_login($con);
if(isset($_POST["submit"])) {
        $u_id = $_POST['u_id'];
        $userName = $_POST['u_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];

        //UPDATE `users` SET `u_name` = 'jafir3' WHERE `users`.`u_id` = 12;
        $query = "update users set u_name = '{$userName}', email = '{$email}', 
        password = '{$password}', cpassword = '{$cpassword}' where u_id = '{$u_id}' ";
        $result = mysqli_query($con, $query) or die("failed");
        if($result)
            header('location: user.php'); 
} 
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Modify User information</title>
</head>
<body>
    <div class="signUp">
        <h2>Modify User information </h2>
        <?php
            $rec_id = $_GET['id'];

            $q = "select * from users where u_id = '{$rec_id}'";
            $r = mysqli_query($con, $q) or die("Failed");
            $c = mysqli_num_rows($r);
            if($c > 0) {
                while($row = mysqli_fetch_assoc($r)) {
        ?>
        <form value="reg" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
            <table>
                <tr>
                    <td><input type="hidden" name="u_id" value="<?php echo $row['u_id'];?>" id="i" ></td> 
                </tr>
                <!----------------------------------------------------------------->
                <tr>
                    <td><label for="un">User Name:</label></td>
                    <td><input type="text" name="u_name" value="<?php echo  $row['u_name'];?>" id="un" required>   </td> 
                </tr>
                <!----------------------------------------------------------------->
                <tr>   
                    <td><label for="em">Email:</label></td>
                    <td><input type="email" name="email" value="<?php echo  $row['email'];?>" id="em" required>   </td>
                </tr>
                <!-----------------------------------------------------------------> 
                <!----------------------------------------------------------------->
                <tr>
                    <td><label for="pass">Password:</label></td>
                    <td><input type="password" name="password" id="pass" required></td> 
                </tr>
                <!----------------------------------------------------------------->
                <tr>
                    <td><label for="cpass">Confirm Password:</label></td>
                    <td><input type="password" name="cpassword" id="cpass" required>  </td>
                </tr>
                <!---------------------------------------------------------------

                <tr>
                    <td>
                        <label for="r">user Role:</label> 
                    </td>
                    <td>
                        <select name="role" id="r" value = '<?php echo  $row['role'];?>'>
                            <?php
                                if ($row['role'] == 1) {
                                    echo  "<option value='1' selected >Admin</option>";
                                    echo  "<option value='2'>Reporter</option>";
                                }
                                elseif ($row['role'] == 2) {
                                    echo "<option value='1'>Admin</option>";
                                    echo  "<option value='2' selected>Reporter</option>";
                                }
                                else
                                    echo "Reader";
                            ?>
                        </select>
                    </td>
                </tr>-->
            </table>
            <button type="submit" name="submit">Update</button>
        </form>
    <?php
            }
        }
    ?>
    </div>
</body>
</html>

