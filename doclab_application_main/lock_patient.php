<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <title>Patient Lockscreen</title>
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
if($_SESSION['firstname']=="")
{
?>
<script>window.location.href="login_patient.php";</script>
<?php
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  
  <!-- ========== Css Files ========== -->
  <link href="css/root.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/custom.css">
  <style type="text/css">
    body{
      background: #CDE7EB;
    }
  </style>
  </head>
  <body>
  
<?php
if(isset($_POST['btn_login']))
{
$username=$_SESSION['firstname'];
$password=$_POST['txt_password'];
$select="select * from tbl_patient where pat_first_name='$username' and pat_password='$password'";
$query=mysql_query($select);
$row=mysql_fetch_array($query);
if($username==$row['pat_first_name'] && $password==$row['pat_password'])
{
$_SESSION['firstname']=$row['pat_first_name'];
$_SESSION['password']=$row['pat_password'];
$_SESSION['pat_id']=$row['pat_id'];
$_SESSION['pat_unique']=$row['unique_id'];

?>
<script>window.location.href="home_patient.php";</script>
<?php
}
else
{
$msg="* Invalid Password";
}
}
?>

    <div class="login-form">
      <form  method="post">
        <div class="top">
          <img src="img/images.png" alt="icon" class="doclab_icon">
          <h1><?php echo ucfirst($_SESSION['firstname']);?></h1>
          <h4>Unlock Screen</h4>
        </div>
        <div class="form-area">
		<div class="group" id="validation_alert">
			<?php echo $msg; ?>
           </div>
          <div class="group">
            <input type="password" class="form-control" name="txt_password" placeholder="Password" required>
            <i class="fa fa-key"></i>
          </div>
          <button type="submit" name="btn_login" class="btn btn-default btn-block">LOGIN</button>
        </div>
      </form>
      <div class="footer-links row">
     <div class="col-xs-6"><a href="forgotpassword_p.php"><i class="fa fa-lock"></i>  Forgot Password</a></div>
      </div>
    </div>

</body>
</html>