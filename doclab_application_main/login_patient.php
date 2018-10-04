<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <title>Patient Login</title>
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
include("connection.php");
?>

<?php
$count="";
if(isset($_POST['btn_login']))
{

//Username
$username=$_POST['txt_username'];
if($username=="")
{
?>
<style>
#c1
{
border:solid 1px red;
}
</style>
<?php
$count++;
}

//Password
$password=$_POST['txt_password'];
if($password=="")
{
?>
<style>
#c2
{
border:solid 1px red;
}
</style>
<?php
$count++;
}
}
?>

<!--Login-->
<?php
if(isset($_POST['btn_login']) && $count==0)
{
$select="select * from tbl_patient where pat_email_id='$username' and pat_password='$password'";
$query=mysql_query($select);
$row=mysql_fetch_array($query);
if($username==$row['pat_email_id'] && $password==$row['pat_password'])
{
$_SESSION['firstname']=$row['pat_first_name'];
$_SESSION['lastname']=$row['pat_last_name'];
$_SESSION['password']=$row['pat_password'];
$_SESSION['pat_id']=$row['pat_id'];
$_SESSION['pat_unique']=$row['unique_id'];
?>
<script>window.location.href="home_patient.php";</script>
<?php
}
else
{
$msg="* Invalid Username or Password";
}
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <title>Patient Login</title>

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
          <h1>Patient</h1>
          <h4>Log In</h4>
        </div>
        <div class="form-area">
			<div class="group" id="validation_alert">
			<?php echo $msg; ?>
           </div>
          <div class="group">
            <input type="text" name="txt_username" class="form-control" id="c1" placeholder="Email Address">
            <i class="fa fa-user"></i>
          </div>
          <div class="group">
            <input type="password" name="txt_password" class="form-control" id="c2" placeholder="Password">
            <i class="fa fa-key"></i>
			
          </div>
          <div class="checkbox checkbox-primary">
            <input id="checkbox101" type="checkbox" checked>
            <label for="checkbox101"> Remember Me</label>
          </div>
          <button type="submit" name="btn_login" class="btn btn-default btn-block">LOGIN</button>
        </div>
      </form>
      <div class="footer-links row">
        <div class="col-xs-6"><a href="add_patient.php"><i class="fa fa-external-link"></i> Register Now</a></div>
        <div class="col-xs-6 text-right"><a href="forgotpassword_p.php"><i class="fa fa-lock"></i> Forgot password</a></div>
      </div>
    </div>

</body>
</html>