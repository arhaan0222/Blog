<?php 
ob_start();
  include "C:/xampp/htdocs/Blog-master/admin/db_connection.php";
?>
<?php
      if (isset($_GET['postid'])) 
      {
        $edit_post_id_visit=$_GET['postid'];
        $sql_select_post_visit = "SELECT * FROM posts WHERE id={$edit_post_id_visit}";
                $result_sql_select_post_visit = mysqli_query($dbconnection, $sql_select_post_visit);
                while ($rowpost_visit = mysqli_fetch_assoc($result_sql_select_post_visit))
                {
                  $view_post_visit_counter_all_visits = $rowpost_visit['post_visit_counter'];
                }
      }
     ?>
      <?php 
      if (isset($_GET['postid'])) 
      {
        $selected_post_page= $_GET['postid'];

                $sql_select_post_page = "SELECT * FROM posts WHERE id={$selected_post_page}";
                $result_sql_select_post_page = mysqli_query($dbconnection, $sql_select_post_page);
                while ($rowpostpage = mysqli_fetch_assoc($result_sql_select_post_page))
                {
                  $view_post_id = $rowpostpage['id'];
                  $view_post_category = $rowpostpage['post_category'];
                  $view_post_title = $rowpostpage['post_title'];
                  $view_post_date = $rowpostpage['post_date'];
                  $view_post_edit_date = $rowpostpage['post_edit_date'];
                  $view_post_image = $rowpostpage['post_image'];
                  $view_post_text = $rowpostpage['post_text'];
                  $view_post_tag = $rowpostpage['post_tag'];
                  $view_post_visit_counter = $rowpostpage['post_visit_counter'];
                  $view_post_status = $rowpostpage['post_status'];
                  $view_post_priority = $rowpostpage['post_priority'];
                  $view_post_description = $rowpostpage['post_description'];
                  $view_post_url = $rowpostpage['url'];
                }
      }
      else
      {
        header("Location: index.php");
      }
    
      ?>
<!DOCTYPE html>
<html lang="en">
<?php include "layout/posthead.php"; ?>
<body>
   <?php include "layout/topnavigation.php"; ?>
     <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <h1 class="mt-4"><?php echo $view_post_title ?></h1>
        <div id="p11"></div>
        <hr>
        <p>Posted on <?php echo $view_post_date; ?></p>
        <hr>
        <img class="img-fluid rounded" src="http://localhost/Blog-master/admin/images/blog/<?php  echo $view_post_image; ?>" alt="">
        <hr>
        <p class="lead"><?php echo $view_post_text; ?></p>
          <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5eeb536dfb317f66"></script>
        <hr>
      </div>
      <?php include "layout/sidebar.php"; ?>
    </div>
  </div>
  <?php include "layout/footer.php"; ?>
  <script src="http://localhost/Blog-master/blog-template/vendor/jquery/jquery.min.js"></script>
  <script src="http://localhost/Blog-master/blog-template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
