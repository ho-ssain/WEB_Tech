<?php 
include "h.php"; 
session_start();
include "/xampp/htdocs/ABC_news/controller/checkLogin.php";
$rc = check_login($con);
$t=$dec=$date=$cat=$date=$aut=$new_namae='';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $t = $_POST['post_title'];
    $dec = $_POST['postdesc'];
    $cat = $_POST['category'];
    $date = date("d M, Y");
    $aut = $rc['u_id'];
}

if(isset($_FILES['fileToUpload'])) {
    $errors = array();
    $f_name = $_FILES['fileToUpload']['name'];
    $f_tmp = $_FILES['fileToUpload']['tmp_name'];
    $f_size = $_FILES['fileToUpload']['size'];
    $f_type = $_FILES['fileToUpload']['type'];
    $tmp = explode('.', $f_name);
    $f_ext = end($tmp);
    $ext = array('jpg', 'jpeg', 'png', 'pdf');

    if(in_array($f_ext, $ext) === false)
        $errors[] = "This is not valid. Plz choose jpg or png file";
    if($f_size > 8097152)
        $errors[] = "File size must be 8mb or lower.";
    
    $new_namae = time()."-".basename($f_name);
    $target = "img/".$new_namae;

    if(empty($errors) == true)
        move_uploaded_file($f_tmp, $target);
    else {
        print_r($errors);
        die;
    }
    $sql = "insert into post(title, description, category, post_date, author, post-img) 
        values('$t', '$dec', '$cat', '$date', '$aut', '$new_namae')";

if(mysqli_query($con, $sql))
    header("location: post.php");

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
