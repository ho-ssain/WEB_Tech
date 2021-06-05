<?php include "../navBar.php";
session_start();
include "/xampp/htdocs/ABC_news/controller/checkLogin.php";
$rc = check_login($con);
if($_SERVER['REQUEST_METHOD'] == "POST") {
    $t = $_POST['post_title'];
    $dec = $_POST['postdesc'];
    $cat = $_POST['category'];
    $date = date("d M, Y");
    $aut = $_SESSION['u_name'];
    $f = $_FILES['fileToUpload'];
    $f_name = $_FILES['fileToUpload']['name'];
    $f_tmp = $_FILES['fileToUpload']['tmp_name'];
    $f_size = $_FILES['fileToUpload']['size'];
    $f_error = $_FILES['fileToUpload']['error'];
    $f_type = $_FILES['fileToUpload']['type'];
    $f_ext = explode('.', $f_name);
    $f_Actual_ext = strtolower(end($f_ext));
    $allowed = array('jpg', 'jpeg', 'png', 'pdf');
    if(in_array($f_Actual_ext, $allowed)){
        if($f_error === 0) {
            if($f_size < 5000000000) {
                $new_f_name = uniqid('', true).".".$f_Actual_ext;
                $f_dest = 'img/'.$new_f_name;
                move_uploaded_file($f_tmp, $f_dest);
                $q = "insert into 
                    post(title, description, category, post_date, author, post-img  )  
                    values('$t', '$dec', '$cat', '$date', '$aut', '$new_f_name') ";
                if(mysqli_query($con, $q))
                    echo "succesfull!!!!!!!!!!!";
                else
                    echo "failed!";
            } else {
                echo "Error!";
            }
        } else {
            echo "Errors!";
        }
    } else {
        echo "Not Uploading";
    }
}
?>

<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Add New Post</h1>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <!-- Form -->
                <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="post_title">Title</label>
                        <input type="text" name="post_title" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1"> Description</label>
                        <textarea name="postdesc" class="form-control" rows="5"  required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Category</label>
                        <select name="category" class="form-control">
                            <option disabled  selected> Select Category</option>
                            <?php
                                $q = 'select * from category';
                                $r = mysqli_query($con, $q);
                                $c = mysqli_num_rows($r);
                                if($c > 0) {
                                    while($row = mysqli_fetch_assoc($r)) {
                                        echo " <option value = '{$row['c_id']}'> {$row['c_name']} </option> ";
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Post image</label>
                        <input type="file" name="fileToUpload" required>
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary" value="Save" required />
                </form>
                <!--/Form -->
            </div>
        </div>
    </div>
</div>
