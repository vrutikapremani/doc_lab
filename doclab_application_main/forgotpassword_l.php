<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <title>Patient Password Reset</title>
</head>
</html>

<?php
error_reporting(0);
include("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
  <!-- ========== Css Files ========== -->
  <link href="css/root.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/custom.css">
  <style type="text/css">
    body{background: #CDE7EB;}
  </style>
  </head>
  <body>

    <div class="login-form">
      <form method="post">
        <div class="top">
          <img src="img/images.png" alt="icon" class="doclab_icon">
          <h1>Forgot Password</h1>
          <h4>You can reset your password</h4>
        </div>
        <div class="form-area">
          <div class="group">
            <input type="text" class="form-control" placeholder="Username">
            <i class="fa fa-user"></i>
          </div>
          <div class="group">
            <input type="text" class="form-control" placeholder="E-mail">
            <i class="fa fa-envelope-o"></i>
          </div>
          <button type="submit" class="btn btn-default btn-block">RESET PASSWORD</button>
        </div>
      </form>
      <div class="footer-links row">
        <div class="col-xs-6"><a href="login_laboratory.php"><i class="fa fa-sign-in"></i> Login</a></div>
        <div class="col-xs-6 text-right"><a href="add_laboratory.php"><i class="fa fa-external-link"></i> Register Now</a></div>
      </div>
    </div>

</body>
</html>