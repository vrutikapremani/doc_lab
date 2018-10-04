<?php
error_reporting(0);
session_start();
include("footer1.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  

  <!-- ========== Css Files ========== -->
  <link href="css/root.css" rel="stylesheet">

  </head>
  <body>
  <!-- Start Page Loading -->
<!--  <div class="loading"><img src="img/loading.gif" alt="loading-img"></div>-->
  <!-- End Page Loading -->
 <!-- //////////////////////////////////////////////////////////////////////////// --> 
  <!-- START TOP -->
  <div id="top" class="clearfix">

    <!-- Start App Logo -->
    <div class="applogo">
      <a href="index.php" class="logo">Doc Lab</a>
    </div>
    <!-- End App Logo -->

    <!-- Start Sidebar Show Hide Button -->
    <a href="#" class="sidebar-open-button"><i class="fa fa-bars"></i></a>
    <a href="#" class="sidebar-open-button-mobile"><i class="fa fa-bars"></i></a>
    <!-- End Sidebar Show Hide Button -->

    <!-- Start Sidepanel Show-Hide Button -->

    <!-- End Sidepanel Show-Hide Button -->


    <!-- Start Top Right -->
    <ul class="top-right">
	<li class="link">
      <a href="#" class="notifications"><?php echo $_SESSION['pat_unique'];?></a>
    </li>
    <li class="link">
      <a href="#" class="notifications"><?php echo date(d)."/".date(m)."/".date(Y);?></a>
    </li>
    <li class="dropdown link">
      <a href="#" data-toggle="dropdown" class="dropdown-toggle profilebox"><img src="img/patient icon.png" alt="img"><b><?php echo ucfirst($_SESSION['firstname']);?></b><span class="caret"></span></a>
        <ul class="dropdown-menu dropdown-menu-list dropdown-menu-right">
          <li role="presentation" class="dropdown-header">My Account</li>
          <li><a href="edit_patient.php"><i class="fa falist fa-edit"></i>Edit Profile</a></li>
		  <li><a href="changepassword_patient.php"><i class="fa falist fa-key"></i>Change Password</a></li>
		  <li class="divider"></li>
		  <li><a href="lock_patient.php"><i class="fa falist fa-lock"></i> Lockscreen</a></li>
          <li><a href="logout.php"><i class="fa falist fa-power-off"></i>Logout</a></li>
        </ul>
    </li>

    </ul>
    <!-- End Top Right -->

  </div>
  <!-- END TOP -->
 <!-- //////////////////////////////////////////////////////////////////////////// --> 
 
 </body>
 </html>