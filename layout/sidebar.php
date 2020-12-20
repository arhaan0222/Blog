<?php 
  include "C:/xampp/htdocs/Blog-master/admin/db_connection.php";
?>
<link rel="stylesheet" type="text/css" href="http://localhost/Blog-master/blog-template/vendor/bootstrap/css/bootstrap.css">
<div class="col-md-4">
        <div class="card my-4">
          <h5 class="card-header">Search</h5>
          <div class="card-body">
            <form action="search.php" method="post">
            <div class="input-group">
              <input type="text" class="form-control" name="search_text" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-secondary" name="search" type="submit">Go!</button>
              </span>
            </div>
            </form>
          </div>
        </div>
        <div class="card my-4">
          <h5 class="card-header">Categories</h5>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  <?php 
                      $sql_select_category_wiget = "SELECT * FROM categories";
                      $result_sql_select_category_wiget = mysqli_query($dbconnection, $sql_select_category_wiget);

                       $category_counter= 0;
                        while ($rowcategory_wiget= mysqli_fetch_assoc( $result_sql_select_category_wiget)) 
                       {
                        $category_counter++;
                        $id_category_wiget = $rowcategory_wiget['id'];
                        $title_category_wiget = $rowcategory_wiget['cat_title'];
                  ?>
                  <li>
                    <a href="category.php?catid=<?=$id_category_wiget; ?>">
                      <?php 
                        if ($category_counter % 2 != 0) {
                          echo $title_category_wiget;
                        }
                      ?>
                      </a>
                    </li>
                    <?php 
                        }
                    ?>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  <?php 
                      $sql_select_category_wiget1 = "SELECT * FROM categories";
                      $result_sql_select_category_wiget1 = mysqli_query($dbconnection, $sql_select_category_wiget1);

                       $category_counter1= 0;
                        while ($rowcategory_wiget1= mysqli_fetch_assoc( $result_sql_select_category_wiget1)) 
                       {
                        $category_counter1++;
                        $id_category_wiget1 = $rowcategory_wiget1['id'];
                        $title_category_wiget1 = $rowcategory_wiget1['cat_title'];

                   ?>
                  <li>
                    <a href="category.php?catid=<?=$id_category_wiget1; ?>">
                      <?php 
                        if ($category_counter1 % 2 == 0) {
                          echo $title_category_wiget1;
                          }
                      ?>
                      </a>
                    </li>
                    <?php 
                        }
                    ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="card my-4">
          <h5 class="card-header">Popular posts</h5>
          <?php 
                $counter_popular= 0;
                $sql_select_post_popular = "SELECT * FROM posts WHERE post_status = 1 ORDER BY post_visit_counter DESC LIMIT 0,5";
                $result_sql_select_post_popular = mysqli_query($dbconnection, $sql_select_post_popular);
                while ($rowpost_popular = mysqli_fetch_assoc($result_sql_select_post_popular))
                {
                  $view_post_id_popular = $rowpost_popular['id'];
                  $view_post_category_popular = $rowpost_popular['post_category'];
                  $view_post_title_popular = $rowpost_popular['post_title'];
                  $view_post_date_popular = $rowpost_popular['post_date'];
                  $view_post_edit_date_popular = $rowpost_popular['post_edit_date'];
                  $view_post_image_popular = $rowpost_popular['post_image'];
                  $view_post_text_popular = $rowpost_popular['post_text'];
                  $view_post_tag_popular = $rowpost_popular['post_tag'];
                  $view_post_visit_counter_popular = $rowpost_popular['post_visit_counter'];
                  $view_post_status_popular = $rowpost_popular['post_status'];
                  $view_post_priority_popular = $rowpost_popular['post_priority'];
      
                  $counter_popular++;
             ?>
          <div class="card-body">
            <img class="card-img-top" src="http://localhost/Blog-master/admin/images/blog/<?php echo $view_post_image_popular;?>" alt="<?php echo $view_post_image_popular;?>">
            <b>
              <a href="http://localhost/Blog-master/post/<?=$view_post_id_popular ?>"style="color: #cc0000"><?php echo $view_post_title_popular; ?></a></b>
          </div>
          <?php } ?>
        </div>
   </div>