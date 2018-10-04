<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <title>Payment Successful</title>
    <style>
  	#validation_alert
  	{
  	color:#FF0000;
  	}
  	</style>
</head>
</html>

<?php
error_reporting(0);
session_start();
include("header_registration.php");
include("connection.php");
?>
<?php
 $update="update tbl_laboratory_invoice set l_invoice_status=1 where appointment_id='$_SESSION[appointment_id]'";
$query=mysql_query($update);

?>
 <!-- START CONTENT -->
<div class="content">

  <!-- Start Page Header -->
  <div class="page-header">
    <div class="top">
         <center><img src="img/green1.png" alt="icon" class="doclab_icon" width="120px" height="80px"></center>
		 <center><h1>Thank You For Your Payment!</h1></center>
		 <center><p>You have sent a secured payment through Paypal. To return to your homepage, please click the button below.</p></center>
		  <center><a href="home_patient.php" class="btn btn-rounded btn-option2">Back to Home</a></center>
        </div>

    <!-- Start Page Header Right Div -->
    <div class="right">
      
    </div>
    <!-- End Page Header Right Div -->

  </div>
  <!-- End Page Header -->


 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTAINER -->




<div class="content" style="margin-left:0px;">
 
<!-- START CONTAINER -->
<div class="container-padding">

<!-- END CONTAINER -->
<!-- //////////////////////////////////////////////////////////////////////////// -->
<!-- Start Footer -->
<div class="row footer">
  <div class="col-md-6 text-left">
   Copyright &copy; 2016 <a href="index.php" target="_blank">Doc Lab Application</a> All rights reserved.
  </div>
 
</div>
<!-- End Footer -->


</div>
<!-- End Content -->
 <!-- //////////////////////////////////////////////////////////////////////////// --> 

<?php
include("footer.php");
?>