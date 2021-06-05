<?php 
    session_start();
    include "./h.php";
    include "/xampp/htdocs/ABC_news/controller/checkLogin.php";
    $userdata = check_login($con); 
    $cNameError = "";
    if(isset($_POST["save"])) {
        $name = $_POST['cat'];
        $query = "select * from category where c_name='$name' ";
        
        $r = mysqli_query($con, $query);

        $Count = mysqli_num_rows($r);
        
        if($Count > 0)
            $cNameError = "Sorry! This Category already exists!";
        else {
            $insertquery = "insert into category(c_name)  values('$name') ";
            $r1 = mysqli_query($con, $insertquery);
            if($r1) {
                        ?>
                            <script>
                                alert("inserted Successfull");
                            </script>
                        <?php
                        header("location: category.php");
            }   
            else {
                        ?>
                            <script>
                                alert("No Connection");
                            </script>
                        <?php
            }   
                
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category</title>
</head>
<body>
    <div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="col-1">
                    <h1 class="admin-heading">Add New Category</h1>
                </div>
                <div class="col-2">
                    <!-- Form Start -->
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" autocomplete="off">
                        <div class="form-group">
                            <label>Category Name</label>
                            <input type="text" name="cat" class="form-control" placeholder="Category Name" required>
                            <?php echo $cNameError; ?>
                        </div>
                        <input type="submit" name="save" class="btn" value="Save" required />
                    </form>
                    <!-- /Form End -->
                </div>
            </div>
        </div>
    </div>
</body>
</html>

