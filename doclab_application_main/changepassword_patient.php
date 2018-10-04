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
include("header_patient.php");
include("connection.php");
include("sidebar_patient.php");
?>
<?php
if($_SESSION['firstname']=="")
{
?>
<script>window.location.href="login_patient.php";</script>
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

<?php
if(isset($_POST['btn_submit']) && $count==0)
{
$old=$_POST['txt_oldpassword'];
$select="select * from tbl_patient where pat_password='$_POST[txt_oldpassword]'";
$query=mysql_query($select);
$row=mysql_fetch_array($query);
if($row['pat_password']==$old)
{
$update="update tbl_patient set pat_password='$_POST[txt_newpassword]', pat_confirm_password='$_POST[txt_confirmnewpassword]' where pat_id='$_SESSION[pat_id]'";
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


<!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START SIDEPANEL -->
<div role="tabpanel" class="sidepanel">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#today" aria-controls="today" role="tab" data-toggle="tab">TODAY</a></li>
    <li role="presentation"><a href="#tasks" aria-controls="tasks" role="tab" data-toggle="tab">TASKS</a></li>
    <li role="presentation"><a href="#chat" aria-controls="chat" role="tab" data-toggle="tab">CHAT</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">

    <!-- Start Today -->
    <div role="tabpanel" class="tab-pane active" id="today">

      <div class="sidepanel-m-title">
        Today
        <span class="left-icon"><a href="#"><i class="fa fa-refresh"></i></a></span>
        <span class="right-icon"><a href="#"><i class="fa fa-file-o"></i></a></span>
      </div>

      <div class="gn-title">NEW</div>

      <ul class="list-w-title">
        <li>
          <a href="#">
            <span class="label label-danger">ORDER</span>
            <span class="date">9 hours ago</span>
            <h4>New Jacket 2.0</h4>
            Etiam auctor porta augue sit amet facilisis. Sed libero nisi, scelerisque.
          </a>
        </li>
        <li>
          <a href="#">
            <span class="label label-success">COMMENT</span>
            <span class="date">14 hours ago</span>
            <h4>Bill Jackson</h4>
            Etiam auctor porta augue sit amet facilisis. Sed libero nisi, scelerisque.
          </a>
        </li>
        <li>
          <a href="#">
            <span class="label label-info">MEETING</span>
            <span class="date">at 2:30 PM</span>
            <h4>Developer Team</h4>
            Etiam auctor porta augue sit amet facilisis. Sed libero nisi, scelerisque.
          </a>
        </li>
        <li>
          <a href="#">
            <span class="label label-warning">EVENT</span>
            <span class="date">3 days left</span>
            <h4>Birthday Party</h4>
            Etiam auctor porta augue sit amet facilisis. Sed libero nisi, scelerisque.
          </a>
        </li>
      </ul>

    </div>
    <!-- End Today -->

    <!-- Start Tasks -->
    <div role="tabpanel" class="tab-pane" id="tasks">

      <div class="sidepanel-m-title">
        To-do List
        <span class="left-icon"><a href="#"><i class="fa fa-pencil"></i></a></span>
        <span class="right-icon"><a href="#"><i class="fa fa-trash"></i></a></span>
      </div>

      <div class="gn-title">TODAY</div>

      <ul class="todo-list">
        <li class="checkbox checkbox-primary">
          <input id="checkboxside1" type="checkbox"><label for="checkboxside1">Add new products</label>
        </li>
        
        <li class="checkbox checkbox-primary">
          <input id="checkboxside2" type="checkbox"><label for="checkboxside2"><b>May 12, 6:30 pm</b> Meeting with Team</label>
        </li>
        
        <li class="checkbox checkbox-warning">
          <input id="checkboxside3" type="checkbox"><label for="checkboxside3">Design Facebook page</label>
        </li>
        
        <li class="checkbox checkbox-info">
          <input id="checkboxside4" type="checkbox"><label for="checkboxside4">Send Invoice to customers</label>
        </li>
        
        <li class="checkbox checkbox-danger">
          <input id="checkboxside5" type="checkbox"><label for="checkboxside5">Meeting with developer team</label>
        </li>
      </ul>

      <div class="gn-title">TOMORROW</div>
      <ul class="todo-list">
        <li class="checkbox checkbox-warning">
          <input id="checkboxside6" type="checkbox"><label for="checkboxside6">Redesign our company blog</label>
        </li>
        
        <li class="checkbox checkbox-success">
          <input id="checkboxside7" type="checkbox"><label for="checkboxside7">Finish client work</label>
        </li>
        
        <li class="checkbox checkbox-info">
          <input id="checkboxside8" type="checkbox"><label for="checkboxside8">Call Johnny from Developer Team</label>
        </li>

      </ul>
    </div>    
    <!-- End Tasks -->

    <!-- Start Chat -->
    <div role="tabpanel" class="tab-pane" id="chat">

      <div class="sidepanel-m-title">
        Friend List
        <span class="left-icon"><a href="#"><i class="fa fa-pencil"></i></a></span>

        <span class="right-icon"><a href="#"><i class="fa fa-trash"></i></a></span>
      </div>

      <div class="gn-title">ONLINE MEMBERS (3)</div>
      <ul class="group">
        <li class="member"><a href="#"><img src="img/profileimg.png" alt="img"><b>Allice Mingham</b>Los Angeles</a><span class="status online"></span></li>
        <li class="member"><a href="#"><img src="img/profileimg2.png" alt="img"><b>James Throwing</b>Las Vegas</a><span class="status busy"></span></li>
        <li class="member"><a href="#"><img src="img/profileimg3.png" alt="img"><b>Fred Stonefield</b>New York</a><span class="status away"></span></li>
        <li class="member"><a href="#"><img src="img/profileimg4.png" alt="img"><b>Chris M. Johnson</b>California</a><span class="status online"></span></li>
      </ul>

      <div class="gn-title">OFFLINE MEMBERS (8)</div>
     <ul class="group">
        <li class="member"><a href="#"><img src="img/profileimg5.png" alt="img"><b>Allice Mingham</b>Los Angeles</a><span class="status offline"></span></li>
        <li class="member"><a href="#"><img src="img/profileimg6.png" alt="img"><b>James Throwing</b>Las Vegas</a><span class="status offline"></span></li>
      </ul>

      <form class="search">
        <input type="text" class="form-control" placeholder="Search a Friend...">
      </form>
    </div>
    <!-- End Chat -->

  </div>

</div>
<!-- END SIDEPANEL -->
<!-- //////////////////////////////////////////////////////////////////////////// --> 

<?php
include("footer.php");
?>