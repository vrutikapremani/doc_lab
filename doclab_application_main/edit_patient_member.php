<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <title>Add Member</title>
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
include("sidebar_patient.php");
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

<!-- VALIDATION -->
<?php
$count="";
if(isset($_POST['btn_submit']))
{

//Salutaion
$salutation=$_POST['ddl_salutation'];
if($salutation=="---------------Select---------------")
{
?>
<style>
#salu
{
border:solid 1px red;
}
</style>
<?php
$n1="Select The Salutation.";
$count++;
}

//Firstname
$firstname=$_POST['txt_firstname'];
if($firstname=="")
{
?>
<style>
#fn
{
border:solid 1px red;
}
</style>
<?php
$n2="Enter Your First Name.";
$count++;
}
else if ( !preg_match ("/^[a-zA-Z\s]+$/",$firstname))
{
?>
<style>
#fn
{
border:solid 1px red;
}
</style>
<?php
$n2="Enter Characters Only.";
$count++;
}
else if(strlen($firstname)<3)
{
?>
<style>
#fn
{
border:solid 1px red;
}
</style>
<?php
$n2="Name Too Short.";
$count++;
}
	
//Middle Name
$middlename=$_POST['txt_middlename'];
if($middlename=="")
{
?>
<style>
#mn
{
border:solid 1px red;
}
</style>
<?php
$n3="Enter Your Middle Name.";
$count++;
}
else if ( !preg_match ("/^[a-zA-Z\s]+$/",$middlename))
{
?>
<style>
#mn
{
border:solid 1px red;
}
</style>
<?php
$n3="Enter Characters Only.";
$count++;
}
else if(strlen($middlename)<3)
{
?>
<style>
#mn
{
border:solid 1px red;
}
</style>
<?php
$n3="Name Too Short.";
$count++;
}

//Last Name
$lastname=$_POST['txt_lastname'];
if($lastname=="")
{
?>
<style>
#ln
{
border:solid 1px red;
}
</style>
<?php
$n4="Enter Your Last Name.";
$count++;
}
else if ( !preg_match ("/^[a-zA-Z\s]+$/",$lastname))
{
?>
<style>
#ln
{
border:solid 1px red;
}
</style>
<?php
$n4="Enter Characters Only";
$count++;
}
else if(strlen($lastname)<3)
{
?>
<style>
#ln
{
border:solid 1px red;
}
</style>
<?php
$n4="Name Too Short.";
$count++;
}

//Age
$age=$_POST['txt_age'];
if($age=="")
{
?>
<style>
#ag
{
border:solid 1px red;
}
</style>
<?php
$n5="Enter Your Age.";
$count++;
}
else if($age<17)
{
?>
<style>
#ag
{
border:solid 1px red;
}
</style>
<?php
$n5="Age Should Be More Than 17.";
$count++;
}

//Blood Group
$bloodgroup=$_POST['ddl_bloodgroup'];
if($bloodgroup=="---------------Select---------------")
{
?>
<style>
#boo
{
border:solid 1px red;
}
</style>
<?php
$n6="Select Your Blood Group.";
$count++;
}

//Mobile Number
$mobilenumber=$_POST['txt_mobilenumber'];
if($mobilenumber=="")
{
?>
<style>
#mob
{
border:solid 1px red;
}
</style>
<?php
$n7="Enter Your Mobile Number.";
$count++;
}
else if(!preg_match('/^[0-9]*$/', $mobilenumber))
{
?>
<style>
#mob
{
border:solid 1px red;
}
</style>
<?php
$n7="Enter Digits Only.";
$count++;
}
else if(strlen($mobilenumber)!=10)
{
?>
<style>
#mob
{
border:solid 1px red;
}
</style>
<?php
$n7="Mobile Number Should Be Of 10 Digits Only.";
$count++;
}

//Email Address
$emailaddress=$_POST['txt_emailaddress'];
if($emailaddress=="")
{
?>
<style>
#mail
{
border:solid 1px red;
}
</style>
<?php
$n8="Enter Your Email Address.";
$count++;
}
else if(!filter_var($emailaddress, FILTER_VALIDATE_EMAIL))
{
?>
<style>
#mail
{
border:solid 1px red;
}
</style>
<?php
$n8=" Enter A Valid Email Address.";
$count++;
}

}
?>


<?php
if(isset($_POST['btn_submit']) && $count==0)
{
$update="update tbl_patient_member set member_salutation='$_POST[ddl_salutation]' , member_first_name='$_POST[txt_firstname]' ,  member_middle_name='$_POST[txt_middlename]' ,  member_last_name='$_POST[txt_lastname]' ,  member_age='$_POST[txt_age]' ,  member_gender='$_POST[rbt_gender]' , member_blood_group='$_POST[ddl_bloodgroup]' , member_mobile_number='$_POST[txt_mobilenumber]' , member_email_id='$_POST[txt_emailaddress]' where member_id='$_GET[edit_id]'";
$query=mysql_query($update);
?>
<script>alert("Updated Successfully");</script>
<?php
}
?>


 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTENT -->
<div class="content">


  <!-- Start Page Header -->
  <div class="page-header">
    <h1 class="title">Add A New Member</h1>

    <!-- Start Page Header Right Div -->
    <div class="right">
      <div class="btn-group" role="group" aria-label="...">
      </div>
    </div>
    <!-- End Page Header Right Div -->

  </div>
  <!-- End Page Header -->
  
<?php
$select="select * from tbl_patient_member where member_id='$_GET[edit_id]'";
$query=mysql_query($select);
$row=mysql_fetch_array($query);
$sal=$row['member_salutation'];
$gen=$row['member_gender'];
$blg=$row['member_blood_group'];
?>

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
              <form  method="post" class="form-horizontal" name="mem_edit_registration" enctype="multipart/form-data">
			  
			  <div class="form-group has-success">
                  <label for="input7" class="col-sm-3 control-label form-label">Salutation :</label>
                  <div class="col-sm-5">
                      <select name="ddl_salutation" class="form-control" id="salu" onblur="return c1()" autofocus>
					  <option>---------------Select---------------</option>
					  <option value="Miss."
					  <?php
					  if(isset($_POST['ddl_salutation']) && $_POST['ddl_salutation']=='Miss.' || $sal=="Miss.")
					  {
					  echo "selected='selected'";
					  }
					  ?>
					  >Miss.</option>
					  <option value="Mrs."
					  <?php
					  if(isset($_POST['ddl_salutation']) && $_POST['ddl_salutation']=='Mrs.' || $sal=="Mrs.")
					  {
					  echo "selected='selected'";
					  }
					  ?>
					  >Mrs.</option>
					  <option value="Mr."
					  <?php
					  if(isset($_POST['ddl_salutation']) && $_POST['ddl_salutation']=='Mr.' || $sal=="Mr.")
					  {
					  echo "selected='selected'";
					  }
					  ?>
					  >Mr.</option>
					  </select>
                  </div>
				  	<div class="col-sm-4" id="salutation" style="color:#FF0000;">
					<?php echo $n1; ?>
					</div>
                </div>
			  
			 <div class="form-group has-success">
                  <label for="input7" class="col-sm-3 control-label form-label">First Name :</label>
                  <div class="col-sm-5">
                      <input type="text" name="txt_firstname" class="form-control" id="fn" onblur="return c2()" value="<?php echo ucfirst($row['member_first_name']); ?>" autofocus>
                  </div>
				  	<div class="col-sm-4" id="firstname" style="color:#FF0000;">
					<?php echo $n2; ?>
					</div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input7" class="col-sm-3 control-label form-label">Middle Name :</label>
                  <div class="col-sm-5">
                      <input type="text" name="txt_middlename" class="form-control" id="mn" value="<?php echo ucfirst($row['member_middle_name']); ?>" />
                  </div>
				  <div class="col-sm-4" id="middlename" style="color:#FF0000;">
					<?php echo $n3; ?>
					</div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input7" class="col-sm-3 control-label form-label">Last Name :</label>
                  <div class="col-sm-5">
                      <input type="text" name="txt_lastname" class="form-control" id="ln" value="<?php echo ucfirst($row['member_last_name']); ?>" />
                  </div>
				  <div class="col-sm-4" id="lastname" style="color:#FF0000;">
					<?php echo $n4; ?>
					</div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input7" class="col-sm-3 control-label form-label">Age :</label>
                  <div class="col-sm-5">
                      <input type="text" name="txt_age" class="form-control" id="ag" value="<?php echo $row['member_age']; ?>" />
                  </div>
				  <div class="col-sm-4" id="age" style="color:#FF0000;">
					<?php echo $n5; ?>
					</div>
                </div>
		
				<div class="form-group has-success">
                  <label for="input7" class="col-sm-3 control-label form-label"> Gender :</label>
                  <div class="col-sm-5">
                  
				  	  <div class="radio radio-danger">
                        <input type="radio" name="rbt_gender" id="radio3" value="Male"
						
						<?php
						if(isset($_POST['rbt_gender']) && $_POST['rbt_gender']=="Male"  || $gen=="Male")
						{
						echo "checked='checked'";
						}
						?>
						>
                        <label for="radio3">
                            Male
                        </label>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="rbt_gender" id="radio4" value="Female"
						
						
						<?php
						if(isset($_POST['rbt_gender']) && $_POST['rbt_gender']=="Female"  || $gen=="Female")
						{
						echo "checked='checked'";
						}
						?>
						 >
                        <label for="radio4">
                            Female
                        </label>
                    </div>
					
					
                  </div>
				  <div class="col-sm-4">
					</div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input7" class="col-sm-3 control-label form-label">Blood Group :</label>
                  <div class="col-sm-5">
                      <select name="ddl_bloodgroup" class="form-control" id="boo" onblur="return c6()">
					  <option>---------------Select---------------</option>
					  <option value="A+ve"
					  <?php
					  if(isset($_POST['ddl_bloodgroup']) && $_POST['ddl_bloodgroup']=='A+ve' || $blg=="A+ve")
					  {
					  echo "selected='selected'";
					  }
					  ?>
					  >A+ve</option>
					  <option value="A-ve"
					   <?php
					  if(isset($_POST['ddl_bloodgroup']) && $_POST['ddl_bloodgroup']=='A-ve' || $blg=="A-ve")
					  {
					  echo "selected='selected'";
					  }
					  ?>
					  >A-ve</option>
					  <option value="B+ve"
					   <?php
					  if(isset($_POST['ddl_bloodgroup']) && $_POST['ddl_bloodgroup']=='B+ve' || $blg=="B+ve")
					  {
					  echo "selected='selected'";
					  }
					  ?>
					  >B+ve</option>
					  <option value="B-ve"
					   <?php
					  if(isset($_POST['ddl_bloodgroup']) && $_POST['ddl_bloodgroup']=='B-ve'|| $blg=="B-ve")
					  {
					  echo "selected='selected'";
					  }
					  ?>
					  >B-ve</option>
					  <option value="O+ve"
					   <?php
					  if(isset($_POST['ddl_bloodgroup']) && $_POST['ddl_bloodgroup']=='O+ve' || $blg=="O+ve")
					  {
					  echo "selected='selected'";
					  }
					  ?>
					  >O+ve</option>
					  <option value="O-ve"
					   <?php
					  if(isset($_POST['ddl_bloodgroup']) && $_POST['ddl_bloodgroup']=='O-ve' || $blg=="O-ve")
					  {
					  echo "selected='selected'";
					  }
					  ?>
					  >O-ve</option>
					  <option value="AB+ve"
					   <?php
					  if(isset($_POST['ddl_bloodgroup']) && $_POST['ddl_bloodgroup']=='AB+ve' || $blg=="AB+ve")
					  {
					  echo "selected='selected'";
					  }
					  ?>
					  >AB+ve</option>
					  <option value="AB-ve"
					   <?php
					  if(isset($_POST['ddl_bloodgroup']) && $_POST['ddl_bloodgroup']=='AB-ve' || $blg=="AB-ve")
					  {
					  echo "selected='selected'";
					  }
					  ?>
					  >AB-ve</option>
					  </select>
                  </div>
				  <div class="col-sm-4" id="blood" style="color:#FF0000;">
					<?php echo $n6; ?>
					</div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input7" class="col-sm-3 control-label form-label">Mobile Number :</label>
                  <div class="col-sm-5">
                      <input type="text" name="txt_mobilenumber" class="form-control" id="mob" value="<?php echo $row['member_mobile_number'];?>" maxlength="10"/>
                  </div>
				  <div class="col-sm-4" id="mobile" style="color:#FF0000;">
					<?php echo $n7; ?>
					</div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input7" class="col-sm-3 control-label form-label">Email Address :</label>
                  <div class="col-sm-5">
                      <input type="text" name="txt_emailaddress" class="form-control" id="mail" value="<?php echo $row['member_email_id'];?>" />
                  </div>
				  <div class="col-sm-4" id="email" style="color:#FF0000;">
					<?php echo $n8; ?>
					</div>
                </div>
				
					<div class="form-group has-success">
                  <label for="input6" class="col-sm-3 control-label form-label"></label>
                  <div class="col-sm-5">
                     <center> <input type="submit" name="btn_submit" value="Submit" class="btn-default" >
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

	<script src="assets/vendor/modernizr/modernizr.js"></script>

		<!-- Vendor -->
		<script src="assets/vendor/jquery/jquery.js"></script>
		<script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="assets/vendor/nanoscroller/nanoscroller.js"></script>
		
		
		<!-- Specific Page Vendor -->
	
		<script src="assets/vendor/select2/select2.js"></script>
		<script src="assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		
		<!-- Theme Initialization Files -->
		<script src="assets/javascripts/theme.init.js"></script>
		

<?php 
include("footer1.php");
?>
