<?php 
session_start();
include "./h.php";
include "/xampp/htdocs/ABC_news/controller/checkLogin.php";
$userdata = check_login($con);
if(isset($_POST["update"])) {
        $c_id = $_POST['c_id'];
        $name = $_POST['cat'];

        $query = "update category set c_name = '{$name}' where c_id = '{$c_id}' ";
        $result = mysqli_query($con, $query) or die("failed");
        if($result)
            header('location: category.php'); 
} 
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Update Category</title>
</head>
<body>
    <div class="upCat">
        <h2>Update Category</h2>
        <?php
            $rec_id = $_GET['id'];

            $q = "select * from category where c_id = '{$rec_id}'";
            $r = mysqli_query($con, $q) or die("Failed");
            $c = mysqli_num_rows($r);
            if($c > 0) {
                while($row = mysqli_fetch_assoc($r)) {
        ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" autocomplete="off">
                        <div class="form-group">
                            <input type="hidden" name="c_id" value="<?php echo $row['c_id'];?>" id="i" >
                            <label>Category Name</label>
                            <input type="text" name="cat" class="form-control" value="<?php echo $row['c_name'];?>" required>
                            
                        </div>
                        <input type="submit" name="update" class="btn" value="update" required />
                    </form>
    <?php
            }
        }
    ?>
    </div>
</body>
</html>

