<?php 
  include "admin/db_connection.php";
?>
<?php 
        if (isset($_GET['catid'])) 
        {
          $no_posts_per_page = 5;
          if (isset($_GET['page']))
          {
            $page = $_GET['page'];
          }
          else
          {
            $page = 1;
          }
          $start = $no_posts_per_page * $page - $no_posts_per_page;

          $selected_category_page= $_GET['catid'];
          $sql_select_category_page = "SELECT * FROM categories WHERE id = {$selected_category_page}";
          $result_sql_select_category_page = mysqli_query($dbconnection, $sql_select_category_page);
                while ($rowcategorypage = mysqli_fetch_assoc($result_sql_select_category_page))
                {
                  $view_category_id = $rowcategorypage['id'];
                  $view_cat_title = $rowcategorypage['cat_title'];
                  $view_cat_desc = $rowcategorypage['cat_desc'];
                  $view_cat_keywords = $rowcategorypage['cat_keywords'];
                }
        }
         ?>
<!DOCTYPE html>
<html lang="en">
<?php include "layout/categoryhead.php"; ?>
<body>
 <?php include "layout/topnavigation.php"; ?>
<div class="container">
    <div class="row">
      <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5eeb536dfb317f66"></script>
      <div class="col-md-8">
        <?php 
        if (isset($_GET['catid'])) 
        {
          $no_posts_per_page = 5;
          if (isset($_GET['page']))
          {
            $page = $_GET['page'];
          }
          else
          {
            $page = 1;
          }
          $start = $no_posts_per_page * $page - $no_posts_per_page;

          $selected_category_page= $_GET['catid'];
          $sql_select_category_page = "SELECT * FROM categories WHERE id = {$selected_category_page}";
          $result_sql_select_category_page = mysqli_query($dbconnection, $sql_select_category_page);
                while ($rowcategorypage = mysqli_fetch_assoc($result_sql_select_category_page))
                {
                  $view_category_id = $rowcategorypage['id'];
                  $view_cat_title = $rowcategorypage['cat_title'];
                }
        }
         ?>
        <h1 class="my-4"><?php echo $view_cat_title; ?>
        </h1>
        <?php 
                $sql_select_post = "SELECT * FROM posts WHERE post_status = 1 AND post_category = {$selected_category_page} ORDER BY id desc LIMIT {$start} ,{$no_posts_per_page}";
                $result_sql_select_post = mysqli_query($dbconnection, $sql_select_post);
                $post_counter_for_category = 0;
                while ($rowpost = mysqli_fetch_assoc($result_sql_select_post))
                {
                  $post_counter_for_category++;
                  $view_post_id = $rowpost['id'];
                  $view_post_category = $rowpost['post_category'];
                  $view_post_title = $rowpost['post_title'];
                  $view_post_date = $rowpost['post_date'];
                  $view_post_edit_date = $rowpost['post_edit_date'];
                  $view_post_image = $rowpost['post_image'];
                  $view_post_text = $rowpost['post_text'];
                  $view_post_tag = $rowpost['post_tag'];
                  $view_post_visit_counter = $rowpost['post_visit_counter'];
                  $view_post_status = $rowpost['post_status'];
                  $view_post_priority = $rowpost['post_priority'];
                  $view_post_url = $rowpost['url'];
             ?>
        <div class="card mb-4">
          <img class="card-img-top" src="http://localhost/Blog-master/admin/images/blog/<?php  echo $view_post_image; ?>" alt="Card image cap">
          <div class="card-body">
            <h2 class="card-title"><?php echo $view_post_title; ?></h2>
            <p class="card-text">
              <?php
              echo substr($view_post_text, 0, 400) . "...";?>
            </p>
            <a href="http://localhost/Blog-master/post/<?= $view_post_id; ?>" class="btn btn-primary" name="read_btn">Read More &rarr;</a>
          </div>
        </div>
      <?php
       }
       if ($post_counter_for_category==0) {
         echo "<h2>Sorry. No posts in this category!</h2>";
       }
       ?>
        <ul class="pagination justify-content-center mb-4">
          <li class="page-item">
            <?php 
                  $select_post_query = "SELECT * FROM posts WHERE post_status = 1 AND post_category = {$selected_category_page}";
                  $result_select_post_query = mysqli_query ($dbconnection, $select_post_query);
                  $sum_posts = mysqli_num_rows($result_select_post_query) ;
                  
                  $allpages = ceil($sum_posts / $no_posts_per_page);
                  
                if($page > 1)
                {
                  $previous= $page - 1;
                ?>
            <a class="page-link" href="http://localhost/Blog-master/category/<?= $view_category_id; ?>/<?php echo $previous ?>">&larr; Previous</a>
             <?php } ?>
          </li>
          <li class="page-item">
            <?php 
                if ($page < $allpages)
                  {
                    $next= $page + 1;
              ?>
            <a class="page-link" href="http://localhost/Blog-master/category/<?= $view_category_id; ?>/<?php echo $next ?>">Next &rarr;</a>
            <?php } ?>
          </li>
        </ul>
      </div>
      <?php include "layout/sidebar.php"; ?>
    </div>
  </div>
  <?php include "layout/footer.php"; ?>
  <script src="blog-template/vendor/jquery/jquery.min.js"></script>
  <script src="blog-template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>