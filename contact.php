<?php 
  include "admin/db_connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="author" content="Ansari Mohd Huzaifa">
   <meta name="description" content="This is a contact Page">
   <meta name="keywords" content="Keywords">
   <title>Technoria</title>
  <link rel="icon" href="admin/images/icon.png">    
   <link rel="canonical" href="">
   <link rel="stylesheet" href="blog-template/vendor/bootstrap/css/bootstrap.css">
   <link rel="stylesheet" href="blog-template/css/blog-home.css">
</head>
<body>
<?php include "layout/topnavigation.php"; ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto"><br>
                <div class="card mt-5">
                    <div class="card-title">
                        <h1 class="text-center py-2"> Contact Us </h1>
                        <hr>
                        <?php 
                            $Msg = "";
                            if(isset($_GET['error']))
                            {
                                $Msg = " Please Fill in the Blanks ";
                                echo '<div class="alert alert-danger">'.$Msg.'</div>';
                            }

                            if(isset($_GET['success']))
                            {
                                $Msg = " Your Message Has Been Sent ";
                                echo '<div class="alert alert-success">'.$Msg.'</div>';
                            }
                        
                        ?>
                    </div>
                    <div class="card-body">
                        <form action="process.php" method="post">
                            <input type="text" name="UName" placeholder="User Name" class="form-control mb-2">
                            <input type="email" name="Email" placeholder="Email" class="form-control mb-2">
                            <input type="text" name="Subject" placeholder="Subject" class="form-control mb-2">
                            <textarea name="msg" class="form-control mb-2" placeholder="Write The Message"></textarea>
                            <button class="btn btn-primary" name="btn-send"> Send </button>
                        </form>
                    </div>
                </div><br><br>
            </div>
        </div>
    </div>
     <?php include "layout/footer.php"; ?>
     <script src="blog-template/vendor/jquery/jquery.min.js"></script>
  <script src="blog-template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>