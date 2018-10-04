<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <title>Edit Profile</title>
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
include("header_doctor.php");
include("connection.php");
include("sidebar_doctor.php");
?>
<?php
if($_SESSION['firstname']=="")
{
?>
<script>window.location.href="login_doctor.php";</script>
<?php
}
?>

<!-- VALIDATION -->
<?php
$count="";
if(isset($_POST['btn_submit']))
{

//Old Password
$oldpassword=$_POST['txt_oldpassword'];
if($oldpassword=="")
{
?>
<style>
#c1
{
border:solid 1px red;
}
</style>
<?php
$n1="Enter Your Old Password.";
$count++;
}

//New Password
$newpassword=$_POST['txt_newpassword'];
if($newpassword=="")
{
?>
<style>
#c2
{
border:solid 1px red;
}
</style>
<?php
$n2="Enter Your New Password.";
$count++;
}

//Confirm New Password
$confirmnewpassword=$_POST['txt_confirmnewpassword'];
if($confirmnewpassword=="")
{
?>
<style>
#c3
{
border:solid 1px red;
}
</style>
<?php
$n3="Re-enter Your New Password.";
$count++;
}
else if($confirmnewpassword!=$newpassword)
{
?>
<style>
#c2,#c3
{
border:solid 1px red;
}
</style>
<?php
$n2="Passwords Do Not Match.";
$n3="Passwords Do Not Match.";
$count++;
}

}
?>

 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTENT -->
<div class="content">

  <!-- Start Page Header -->
  <div class="page-header">
    <h1 class="title">Change Password</h1>
      

    <!-- Start Page Header Right Div -->
    <div class="right">
      <div class="btn-group" role="group" aria-label="...">
      </div>
    </div>
    <!-- End Page Header Right Div -->

  </div>
  <!-- End Page Header -->


 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTAINER -->

<?php
if(isset($_POST['btn_submit']) && $count==0)
{
$old=$_POST['txt_oldpassword'];
$select="select * from tbl_doctor where doc_password='$_POST[txt_oldpassword]'";
$query=mysql_query($select);
$row=mysql_fetch_array($query);
if($row['doc_password']==$old)
{
$update="update tbl_doctor set doc_password='$_POST[txt_newpassword]', doc_confirm_password='$_POST[txt_confirmnewpassword]' where doc_id='$_SESSION[doc_id]'";
$query=mysql_query($update);
}
else
{
?>
<style>
#c1
{
border:solid 1px red;
}
</style>
<?php
$n1="Old Password Incorrect!";
}
}
?>


<div class="panel panel-default">

        <div class="panel-title">
          <ul class="panel-tools">
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
            <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
          </ul>
        </div>

            <div class="panel-body">
              <form  method="post" class="form-horizontal">
				
				<div class="form-group has-success">
                  <label for="input6" class="col-sm-3 control-label form-label">Old Password :</label>
                  <div class="col-sm-5">

				  	
                      <input type="text" name="txt_oldpassword" class="form-control" id="c1" />
                  </div>
				  	   <div class="col-sm-4" id="validation_alert">
					   
					   <?php echo $n1; ?>
					   </div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input6" class="col-sm-3 control-label form-label">New Password :</label>
                  <div class="col-sm-5">
                      <input type="text" name="txt_newpassword" class="form-control" id="c2" />
                  </div>
				  	   <div class="col-sm-4" id="validation_alert">
					   <?php echo $n2; ?>
					   </div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input6" class="col-sm-3 control-label form-label">Confirm New Password :</label>
                  <div class="col-sm-5">
                      <input type="text" name="txt_confirmnewpassword" class="form-control" id="c3" />
                  </div>
				  	   <div class="col-sm-4" id="validation_alert">
					   <?php echo $n3; ?>
					   </div>
                </div>
				
				

				<div class="form-group has-success">
                  <label for="input6" class="col-sm-3 control-label form-label"></label>
                  <div class="col-sm-5">
                     <center> <input type="submit" name="btn_submit" value="Submit" class="btn-default">
					  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					  <input type="reset" name="btn_reset" value="Clear" class="btn-default">
					  </center>
                  </div>
                </div>
			 </form> 

            </div>

      </div>

<!-- END CONTAINER -->
<!-- //////////////////////////////////////////////////////////////////////////// -->
<!-- Start Footer -->
<div class="row footer">
  <div class="col-md-6 text-left">
  Copyright &copy; 2016 <a href="index.php" target="_blank">Doc Lab Application</a> All rights reserved.
  </div>
  <div class="col-md-6 text-right">
    Design and Developed by <a href="http://themeforest.net/user/egemem/portfolio" target="_blank">Egemem</a>
  </div> 
</div>
<!-- End Footer -->


</div>
<!-- End Content -->
 <!-- //////////////////////////////////////////////////////////////////////////// --> 


<?php
include("footer.php");
?>