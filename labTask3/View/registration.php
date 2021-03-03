<?php 
    include "Control/regValidation.php"; 
    include "DbConnect.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Registration Form</title>
    </head>
    <body>
        <h1>Registration</h1>
        <form value="Registration" action="<?php echo $_SERVER["PHP_SELF"]?>" method="POST" style='color:blue';> 
            <table>
                <tr>
                    <td><label>Name:</label></td>
                    <td><input type="text" id="name" name="name"> <?php echo $validateName; ?></td>
                </tr>
                <tr>
                    <td><label>Email:</label></td>
                    <td><input type="email" id="email" name="email"><?php echo $validateEmail; ?></td>
                </tr>
                <tr>
                    <td><label>User Name:</label></td>
                    <td><input type="text" id="username" name="username"> <?php echo $validateUserName; ?> </td>
                </tr>
                <tr>
                    <td><label>Password:</label></td>
                    <td><input type="password" id="password" name="password"> <?php echo $validatePassword; ?></td>
                </tr>
                <tr>
                    <td><label>Cofirm Password:</label></td>
                    <td><input type="password" id="cpassword" name="cpassword"><?php echo $validateCPassword; ?></td>
                </tr>
                <tr>
                    <td>Favourite Vehicle:</td>
                    <td>
                        <input type="checkbox" id="vehicle1" name="vehicle1" value="bike">
                        Bike
                        <input type="checkbox" id="vehicle2" name="vehicle2" value="car">
                        Car
                        <input type="checkbox" id="vehicle3" name="vehicle3" value="boat">
                        Boat
                        <?php echo $validateCheckBox; ?>
                    </td>
                </tr>
                <tr>
                    <td><label>Gender:</label</td>
                    <td>
                        <input type="radio" id="gender" name="gender" value="male">
                        <label for="male">Male</lable>
                        <input type="radio" id="gender" name="gender" value="female">
                        <label for="female">Female</lable>
                        <input type="radio" id="gender" name="gender" value="other">
                        <label for="other">Other</lable>
                        <?php echo $validateGender; ?>
                    </td>
                </tr>
                <tr>
                    <td><label>Date of Birth:</label></td>
                    <td>
                        <input type="date" id="dob" name="dob">
                        <?php echo $validateDob; ?>
                    </td>
                </tr>
               
                <tr>
                    <td> 
                    </td>
                    <td> 
                        <input type="reset" value="Reset">
                        <input type="submit" value="Submit">
                        <?php echo $ValidateAllField; 
                        echo $dbmsg;?>
                    </td>
                </tr>
            </table>
            <a href="login.php">Already Registered?</a>
        </form>
    </body>
</html>