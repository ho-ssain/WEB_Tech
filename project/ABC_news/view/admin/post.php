<?php 
session_start();
include "./h.php";
include "/xampp/htdocs/ABC_news/controller/checkLogin.php";
$userdata = check_login($con);

?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Posts</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="addPost.php">add post</a>
              </div>
              <div class="col-md-12">
                            <?php
                    $limit = 3;
                    if(isset($_GET['page']))
                        $page_num = $_GET['page'];
                    else
                        $page_num = 1;

                    $offset = ($page_num - 1) * $limit;
                    $q = "select * from post";
                    $r = mysqli_query($con, $q) or die("Failed");
                    $c = mysqli_num_rows($r);
                    if($c > 0) {
                    ?>
                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Title</th>
                          <th>Category</th>
                          <th>Date</th>
                          <th>Author</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>
                        <?php 
                                $serial_no = 1;
                                while($row = mysqli_fetch_assoc($r)){
                            ?>
                          <tr>
                              <td class='id'>1</td>
                              <td>JavaScript — Dynamic client-side scripting</td>
                              <td>JavaScript</td>
                              <td>19 July, 2020</td>
                              <td>Admin</td>
                              <td class='edit'><a href='update-post.php'><i class='fa fa-edit'></i></a></td>
                              <td class='delete'><a href='delete-post.php'><i class='fa fa-trash-o'></i></a></td>
                          </tr>
                          <?php } ?>
                      </tbody>
                    <?php } ?>
                  </table>
                  <ul class='pagination admin-pagination'>
                      <li class="active"><a>1</a></li>
                      <li><a>2</a></li>
                      <li><a>3</a></li>
                  </ul>
              </div>
          </div>
      </div>
  </div>

