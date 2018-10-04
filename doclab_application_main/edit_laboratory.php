<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <title>Laboratory Registration</title>
</head>
</html>

<?php
error_reporting(0);
session_start();
include("header_laboratory.php");
include("sidebar_laboratory.php");
include("connection.php");
?>
<?php
if($_SESSION['firstname']=="")
{
?>
<script>window.location.href="login_laboratory.php";</script>
<?php
}
?>

<!--PHP VALIDATION -->

<?php
$count="";
if(isset($_POST['btn_submit']))
{

//Laboratory Name
$name=$_POST['txt_name'];
if($name=="")
{
?>
<style>
#nam
{
border:solid 1px red;
}
</style>
<?php
$n1="Enter Laboratory Name.";
$count++;
}
else if ( !preg_match ("/^[a-zA-Z\s]+$/",$name))
{
?>
<style>
#nam
{
border:solid 1px red;
}
</style>
<?php
$n1="Enter Characters Only.";
$count++;
}
else if(strlen($name)<3)
{
?>
<style>
#nam
{
border:solid 1px red;
}
</style>
<?php
$n1="Name Too Short.";
$count++;
}
	
//Address
$address=$_POST['txt_address'];
if($address=="")
{
?>
<style>
#add
{
border:solid 1px red;
}
</style>
<?php
$n2="Enter Your Address.";
$count++;
}
else if(strlen($address)<3)
{
?>
<style>
#add
{
border:solid 1px red;
}
</style>
<?php
$n2="Address Too Short.";
$count++;
}

//State
$state=$_POST['ddl_state'];
if($state=="---------------Select---------------")
{
?>
<style>
#sta
{
border:solid 1px red;
}
</style>
<?php
$n4="Select Your State.";
$count++;
}

//Pincode
$pincode=$_POST['txt_pincode'];
if($pincode=="")
{
?>
<style>
#pin
{
border:solid 1px red;
}
</style>
<?php
$n6="Enter Your Pincode.";
$count++;
}
else if(!preg_match('/^[0-9]*$/', $pincode))
{
?>
<style>
#pin
{
border:solid 1px red;
}
</style>
<?php
$n6="Enter Digits Only.";
$count++;
}
else if(strlen($pincode)!=6)
{
?>
<style>
#pin
{
border:solid 1px red;
}
</style>
<?php
$n6="Pincode Should Be Of 6 Digits Only.";
$count++;
}

//Contact Number
$contactnumber=$_POST['txt_contactnumber'];
if($contactnumber=="")
{
?>
<style>
#con
{
border:solid 1px red;
}
</style>
<?php
$n7="Enter Your Contact Number.";
$count++;
}
else if(!preg_match('/^[0-9]*$/', $contactnumber))
{
?>
<style>
#con
{
border:solid 1px red;
}
</style>
<?php
$n7="Enter Digits Only.";
$count++;
}

//Working Hours
$workinghours=$_POST['txt_workinghours'];
if($workinghours=="")
{
?>
<style>
#hrs
{
border:solid 1px red;
}
</style>
<?php
$n8="Enter Your Working Hours.";
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
$n9="Enter Your Email Address.";
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
$n9=" Enter A Valid Email Address.";
$count++;
}

}
?>
<!-- END OF VALIDATION-->

<script type="text/javascript">
function fun_state()
{
var s=document.edit_laboratory.ddl_state.value;
$.ajax({
type:"GET",
data:{s:s},
url:"action_registration.php",
success:function(response){
$("#cit").html(response);
}
});
}

</script>

<?php
if(isset($_POST['btn_submit']) && $count==0)
{
$update="update tbl_laboratory set lab_name='$_POST[txt_name]', lab_address='$_POST[txt_address]', lab_state='$_POST[ddl_state]', lab_city='$_POST[txt_city]', 
lab_pincode='$_POST[txt_pincode]',lab_contact_number='$_POST[txt_contactnumber]', lab_working_hours='$_POST[txt_workinghours]', lab_email_id='$_POST[txt_emailaddress]' where lab_id='$_SESSION[lab_id]'";
$query=mysql_query($update);
?>
<script>alert("Updated Successfully");</script>
<?php
}
?>

 <!-- START CONTENT -->
<div class="content">

  <!-- Start Page Header -->
  <div class="page-header">
    <h1 class="title">Edit Profile</h1>

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
$select="select * from tbl_laboratory where lab_id='$_SESSION[lab_id]'";
$query=mysql_query($select);
$row_laboratory=mysql_fetch_array($query);
$st=$row_laboratory['lab_state'];
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
              <form  method="post" class="form-horizontal" name="edit_laboratory" enctype="multipart/form-data">
			  
<div class="form-group has-success">
                  <label for="input8" class="col-sm-3 control-label form-label">Name :</label>
                  <div class="col-sm-5">
                      <input type="text" name="txt_name" class="form-control" id="nam" value="<?php echo $row_laboratory['lab_name'];?>">
                  </div>
				  	   <div class="col-sm-4" id="name" style="color:#FF0000">
					   <?php echo $n1; ?>
					   </div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input8" class="col-sm-3 control-label form-label">Address :</label>
                  <div class="col-sm-5">
                      <input type="text" name="txt_address" class="form-control" id="add" value="<?php echo $row_laboratory['lab_address'];?>">
                  </div>
				  	   <div class="col-sm-4" id="address" style="color:#FF0000">
					   <?php echo $n2; ?>
					   </div>
                </div>
				
				
                  <div class="form-group has-success">
                  <label for="input6" class="col-sm-3 control-label form-label">State :</label>
                  <div class="col-sm-5">
                      <select name="ddl_state" class="form-control" id="sta" onchange="fun_state()">
					  <option><?php echo $row_laboratory['lab_state'];?></option>
					 <?php
					 $sel="select * from tbl_state";
					 $qu=mysql_query($sel);
					 while($r=mysql_fetch_array($qu))
					 {
					 ?>
					 <option value="<?php echo $r['state_name'];?>"
					 <?php
					  if(isset($_POST['ddl_state']) && $_POST['ddl_state']==$r['state_name'] )
					  {
					  echo "selected='selected'";
					  }
					  ?>><?php echo $r['state_name'];?>
					 </option>
					 <?php
					 }
					 ?>
					 </select>
                  </div>
				  	   <div class="col-sm-4" id="state" style="color:#FF0000">
					   <?php echo $n4; ?>
					   </div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input7" class="col-sm-3 control-label form-label">City :</label>
                  <div class="col-sm-5">
                      <select name="txt_city" class="form-control" id="cit"/>
					  <option><?php echo $row_laboratory['lab_city'];?></option>
					  </select>
                  </div>
				  <div class="col-sm-4" id="city" style="color:#FF0000">
					<?php echo $n5; ?>
					</div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input8" class="col-sm-3 control-label form-label">Pincode :</label>
                  <div class="col-sm-5">
                      <input type="text" name="txt_pincode" class="form-control" id="pin" value="<?php echo $row_laboratory['lab_pincode']; ?>">
                  </div>
				  	   <div class="col-sm-4" id="pincode" style="color:#FF0000">
					   <?php echo $n6; ?>
					   </div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input8" class="col-sm-3 control-label form-label">Contact Number :</label>
                  <div class="col-sm-5">
                      <input type="text" name="txt_contactnumber" class="form-control" id="con" value="<?php echo $row_laboratory['lab_contact_number'];?>">
                  </div>
				  	   <div class="col-sm-4" id="contact" style="color:#FF0000">
					   <?php echo $n7; ?>
					   </div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input8" class="col-sm-3 control-label form-label">Working Hours :</label>
                  <div class="col-sm-5">
                      <input type="text" name="txt_workinghours" class="form-control" id="wor" value="<?php echo $row_laboratory['lab_working_hours'];?>">
                  </div>
				  	   <div class="col-sm-4" id="work" style="color:#FF0000">
					   <?php echo $n8; ?>
					   </div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input8" class="col-sm-3 control-label form-label">Email Address :</label>
                  <div class="col-sm-5">
                      <input type="text" name="txt_emailaddress" class="form-control" id="mail"  value="<?php echo $row_laboratory['lab_email_id'];?>">
                  </div>
				  	   <div class="col-sm-4" id="email" style="color:#FF0000">
					   <?php echo $n9; ?>
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
  </div> 
</div>
<!-- End Footer -->


</div>
<!-- End Content -->
 <!-- //////////////////////////////////////////////////////////////////////////// --> 

<?php
include("footer.php");
?>