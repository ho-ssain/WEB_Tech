<?php
session_start();
include "/xampp/htdocs/ABC_news/controller/dataVal.php";
include "/xampp/htdocs/ABC_news/controller/checkLogin.php";
$rc = check_login($con);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>add users</title>
</head>
<body>
    <div class="signUp">
        <h2>Add User </h2>
        <form value="reg" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
            <table>
                <tr>
                    <td><label for="n">Name:</label></td>
                    <td><input type="text" name="name" id="n" required></td> 
                </tr>
                <!----------------------------------------------------------------->
                <tr>
                    <td><label for="un">User Name:</label></td>
                    <td><input type="text" name="u_name" id="un" required>  <?php echo $userNameError; ?></td> 
                </tr>
                <!----------------------------------------------------------------->
                <tr>   
                    <td><label for="em">Email:</label></td>
                    <td><input type="email" name="email" id="em" required>  <?php echo $emailErr; ?> </td>
                </tr>
                <!----------------------------------------------------------------->
                <tr>
                    <td>Gender:</td>
                    <td>
                        <input type="radio" name="gender" value="male" id="male" required> <label for="male">Male</label>
                        <input type="radio" name="gender" value="female" id="female">    <label for="female">Female</label>
                    </td> 
                </tr>
                <!----------------------------------------------------------------->
                <tr>
                    <td><label for="pass">Password:</label></td>
                    <td><input type="password" name="password" id="pass" required></td> 
                </tr>
                <!----------------------------------------------------------------->
                <tr>
                    <td><label for="cpass">Confirm Password:</label></td>
                    <td><input type="password" name="cpassword" id="cpass" required> <?php echo $passErr; ?> </td>
                </tr>
                <!----------------------------------------------------------------->
                <tr>
                    <td>
                        <label for="r">user Role:</label> 
                    </td>
                    <td>
                        <select name="role" id="r">
                            <option value="1">Admin</option>
                            <option value="2">Reporter</option>
                        </select>
                    </td>
                </tr>
            </table>
            <button type="submit" name="submit">Add</button>
        </form>
    </div>
</body>
</html>
