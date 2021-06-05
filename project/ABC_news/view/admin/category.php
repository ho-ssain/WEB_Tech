<?php
session_start();
include "./h.php";
include "/xampp/htdocs/ABC_news/controller/checkLogin.php";
$userdata = check_login($con);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
</head>
<body>
    <div class="admin-content">
        <div class="cont">
            <div class="row">

                <div class="col-1">
                    <h1>All Categories</h1>
                </div>
                <div class="col-2">
                    <a href="./addCat.php">Add Category</a>
                </div>
                <div class="col-3">
                
                    <?php
                    $limit = 3;
                    if(isset($_GET['page']))
                        $page_num = $_GET['page'];
                    else
                        $page_num = 1;

                    $offset = ($page_num - 1) * $limit;
                    $q = "select * from category order by c_id desc limit {$offset}, {$limit}";
                    $r = mysqli_query($con, $q) or die("Failed");
                    $c = mysqli_num_rows($r);
                    if($c > 0) {
                    ?>
                        <table class="tab-cont">
                            <thead>
                                <th>S.no</th>
                                <th>Category Name</th>
                                <th>No. Of Posts</th>
                                <th>Edit</th>
                                <th>Delete</th>
                                <th></th>
                            </thead>
                            <tbody>
                            <?php 
                                $serial_no = 1;
                                while($row = mysqli_fetch_assoc($r)){
                            ?>
                                <tr>
                                    <td> <?php echo $serial_no++;?> </td>
                                    <td> <?php echo  $row['c_name'];?> </td>
                                    <td> <?php echo  $row['post_count'];?> </td>
                                    <td><a href="update_cat.php?id=<?php echo $row['c_id'];?>">edit</a></td>
                                    <td><a onclick="return confirm('Are you Sure?')"  href="delete_cat.php?id=<?php echo $row['c_id'];?>">delete</a></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                    <?php } ?>
                        </table>
<?php
    $q2 = "select * from category";
    $r2 = mysqli_query($con, $q2) or die("Failed");
    $c2 = mysqli_num_rows($r2);
    if($c2) {
        $total_page = ceil($c2 / $limit);
        echo "<ul>";
        if($page_num > 1)
            echo'<li> <a href="category.php?page='.($page_num-1).'">prev</a> </li>';
        for($i = 1; $i <= $total_page; $i++) {
            if($i == $page_num)
                $active = "active";
            else
                $active = "";
            echo " <li class='.$active.'><a href='category.php?page=".$i."'> ".$i."</a></li>";
    
        }
        if($total_page > $page_num)
            echo '<li> <a <a href="category.php?page='.($page_num+1).'">next</a> </li>';
        echo "</ul>";
    }
?>







                </div>

            </div>
        </div>
    </div>
</body>
</html>