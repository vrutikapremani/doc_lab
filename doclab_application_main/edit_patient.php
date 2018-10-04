<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <title>Edit Profile</title>
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

<!--PHP VALIDATION -->

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
$n6="Enter Your Address.";
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
$n6="Address Too Short.";
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
$n8="Select Your State.";
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
$n10="Enter Your Pincode.";
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
$n10="Enter Digits Only.";
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
$n10="Pincode Should Be Of 6 Digits Only.";
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
$n11="Enter Your Mobile Number.";
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
$n11="Enter Digits Only.";
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
$n11="Mobile Number Should Be Of 10 Digits Only.";
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
$n12="Enter Your Email Address.";
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
$n12=" Enter A Valid Email Address.";
$count++;
}

//Occupation
$occupation=$_POST['txt_occupation'];
if($occupation=="")
{
?>
<style>
#occ
{
border:solid 1px red;
}
</style>
<?php
$n13="Enter Your Occupation.";
$count++;
}
else if ( !preg_match ("/^[a-zA-Z\s]+$/",$occupation))
{
?>
<style>
#occ
{
border:solid 1px red;
}
</style>
<?php
$n13="Enter Characters Only.";
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
$n14="Select Your Blood Group.";
$count++;
}

//Details
$details=$_POST['txt_details'];
if($details=="")
{
?>
<style>
#det
{
border:solid 1px red;
}
</style>
<?php
$n15="Enter your details";
$count++;
}

}
?>

<!-- INSERT -->
<?php
if(isset($_POST['btn_submit']) && $count==0)
{
$update="update tbl_patient set pat_salutation='$_POST[ddl_salutation]', pat_first_name='$_POST[txt_firstname]', pat_middle_name='$_POST[txt_middlename]', pat_last_name='$_POST[txt_lastname]', pat_age='$_POST[txt_age]', pat_gender='$_POST[rbt_gender]', pat_address='$_POST[txt_address]',
pat_state='$_POST[ddl_state]', pat_city='$_POST[txt_city]', pat_pincode='$_POST[txt_pincode]', pat_mobile_number='$_POST[txt_mobilenumber]', pat_email_id='$_POST[txt_emailaddress]', pat_occupation='$_POST[txt_occupation]', pat_blood_group='$_POST[ddl_bloodgroup]', pat_details='$_POST[txt_details]' where pat_id='$_SESSION[pat_id]'";
$query=mysql_query($update);
?>
<script>alert("Updated Successfully");</script>
<?php
}
?>

<script type="text/javascript">
function fun_state()
{
var s=document.edit_patient.ddl_state.value;
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

 <!-- //////////////////////////////////////////////////////////////////////////// --> 
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
$select="select * from tbl_patient where pat_id='$_SESSION[pat_id]'";
$query=mysql_query($select);
$row_patient=mysql_fetch_array($query);
$st=$row_patient['pat_state'];
$salutation=$row_patient['pat_salutation'];
$bloodgroup=$row_patient['pat_blood_group'];
$gen=$row_patient['pat_gender'];
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
              <form  method="post" class="form-horizontal" name="edit_patient" enctype="multipart/form-data">
			  
						  
			  <div class="form-group has-success">
                  <label for="input7" class="col-sm-3 control-label form-label">Salutation :</label>
                  <div class="col-sm-5">
                      <select name="ddl_salutation" class="form-control" id="salu">
					  <option>---------------Select---------------</option>
					  <option value="Miss."
					  <?php
					  if(isset($_POST['ddl_salutation']) && $_POST['ddl_salutation']=='Miss.' || $salutation=='Miss.')
					  {
					  echo "selected='selected'";
					  }
					  ?>
					  >Miss.</option>
					  <option value="Mrs."
					  <?php
					  if(isset($_POST['ddl_salutation']) && $_POST['ddl_salutation']=='Mrs.' || $salutation=='Mrs.')
					  {
					  echo "selected='selected'";
					  }
					  ?>
					  >Mrs.</option>
					  <option value="Mr."
					  <?php
					  if(isset($_POST['ddl_salutation']) && $_POST['ddl_salutation']=='Mr.' || $salutation=='Mr.')
					  {
					  echo "selected='selected'";
					  }
					  ?>
					  >Mr.</option>
					  </select>
                  </div>
				  	<div class="col-sm-4" id="salutation" style="color:#FF0000">
					<?php echo $n1; ?>
					</div>
                </div>
				
				
				<div class="form-group has-success">
                  <label for="input7" class="col-sm-3 control-label form-label">First Name :</label>
                  <div class="col-sm-5">
                      <input type="text" name="txt_firstname" class="form-control" id="fn" value="<?php echo $row_patient['pat_first_name'];?>" autofocus>
                  </div>
				  	<div class="col-sm-4" id="firstname" style="color:#FF0000;">
					<?php echo $n2; ?>
					</div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input7" class="col-sm-3 control-label form-label">Middle Name :</label>
                  <div class="col-sm-5">
                      <input type="text" name="txt_middlename" class="form-control" id="mn" value="<?php echo $row_patient['pat_middle_name'];?>" />
                  </div>
				  <div class="col-sm-4" id="middlename" style="color:#FF0000;">
					<?php echo $n3; ?>
					</div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input7" class="col-sm-3 control-label form-label">Last Name :</label>
                  <div class="col-sm-5">
                      <input type="text" name="txt_lastname" class="form-control" id="ln" value="<?php echo $row_patient['pat_last_name'];?>" />
                  </div>
				  <div class="col-sm-4" id="lastname" style="color:#FF0000;">
					<?php echo $n4; ?>
					</div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input7" class="col-sm-3 control-label form-label">Age :</label>
                  <div class="col-sm-5">
                      <input type="text" name="txt_age" class="form-control" id="ag" value="<?php echo $row_patient['pat_age'];?>" />
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
				  <div class="col-sm-4" id="gender" style="color:#FF0000;">
					</div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input7" class="col-sm-3 control-label form-label">Address :</label>
                  <div class="col-sm-5">
                      <textarea type="text" name="txt_address" class="form-control" id="add"><?php echo $row_patient['pat_address'];?></textarea>
                  </div>
				  <div class="col-sm-4" id="address" style="color:#FF0000;">
					<?php echo $n6; ?>
					</div>
                </div>
				
				
				<div class="form-group has-success">
                  <label for="input6" class="col-sm-3 control-label form-label">State :</label>
                  <div class="col-sm-5">
                      <select name="ddl_state" class="form-control" id="sta" onchange="fun_state()">
					  <option><?php echo $row_patient['pat_state'];?></option>
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
					   <?php echo $n8; ?>
					   </div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input7" class="col-sm-3 control-label form-label">City :</label>
                  <div class="col-sm-5">
                      <select name="txt_city" class="form-control" id="cit"/>
					  <option><?php echo $row_patient['pat_city'];?></option>
					  </select>
                  </div>
				  <div class="col-sm-4" id="city" style="color:#FF0000">
					<?php echo $n9; ?>
					</div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input7" class="col-sm-3 control-label form-label">Pincode :</label>
                  <div class="col-sm-5">
                      <input type="text" name="txt_pincode" class="form-control" id="pin" maxlength="6" value="<?php echo $row_patient['pat_pincode'];;?>" maxlength="6"/>
                  </div>
				  <div class="col-sm-4" id="pincode" style="color:#FF0000;">
					<?php echo $n10; ?>
					</div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input7" class="col-sm-3 control-label form-label">Mobile Number :</label>
                  <div class="col-sm-5">
                      <input type="text" name="txt_mobilenumber" class="form-control" id="mob" maxlength="10" value="<?php echo $row_patient['pat_mobile_number'];;?>" maxlength="10"/>
                  </div>
				  <div class="col-sm-4" id="mobile" style="color:#FF0000;">
					<?php echo $n11; ?>
					</div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input7" class="col-sm-3 control-label form-label">Email Address :</label>
                  <div class="col-sm-5">
                      <input type="text" name="txt_emailaddress" class="form-control" id="mail" value="<?php echo $row_patient['pat_email_id'];;?>" />
                  </div>
				  <div class="col-sm-4" id="email" style="color:#FF0000;">
					<?php echo $n12; ?>
					</div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input7" class="col-sm-3 control-label form-label">Occupation :</label>
                  <div class="col-sm-5">
                      <input type="text" name="txt_occupation" class="form-control" id="occ" value="<?php echo $row_patient['pat_occupation'];;?>" />
                  </div>
				  <div class="col-sm-4" id="occupation" style="color:#FF0000;">
					<?php echo $n13; ?>
					</div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input7" class="col-sm-3 control-label form-label">Blood Group :</label>
                  <div class="col-sm-5">
                      <select name="ddl_bloodgroup" class="form-control" id="boo">
					  <option>---------------Select---------------</option>
					  <option  
					  <?php
					  if(isset($_POST['ddl_bloodgroup']) && $_POST['ddl_bloodgroup']=='A+ve'  || $bloodgroup=='A+ve')
					  {
					  echo "selected='selected'";
					  }
					  ?>
					  >A+ve</option>
					  <option
					   <?php
					  if(isset($_POST['ddl_bloodgroup']) && $_POST['ddl_bloodgroup']=='A-ve'  || $bloodgroup=='A-ve')
					  {
					  echo "selected='selected'";
					  }
					  ?>
					  >A-ve</option>
					  <option 
					   <?php
					  if(isset($_POST['ddl_bloodgroup']) && $_POST['ddl_bloodgroup']=='B+ve'  || $bloodgroup=='B+ve')
					  {
					  echo "selected='selected'";
					  }
					  ?>
					  >B+ve</option>
					  <option 
					    <?php
					  if(isset($_POST['ddl_bloodgroup']) && $_POST['ddl_bloodgroup']=='B-ve'  || $bloodgroup=='B-ve')
					  {
					  echo "selected='selected'";
					  }
					  ?>
					  >B-ve</option>
					  <option 
					    <?php
					  if(isset($_POST['ddl_bloodgroup']) && $_POST['ddl_bloodgroup']=='O+ve'  || $bloodgroup=='O+ve')
					  {
					  echo "selected='selected'";
					  }
					  ?>
					  >O+ve</option>
					  <option 
					    <?php
					  if(isset($_POST['ddl_bloodgroup']) && $_POST['ddl_bloodgroup']=='O-ve'  || $bloodgroup=='O-ve')
					  {
					  echo "selected='selected'";
					  }
					  ?>
					  >O-ve</option>
					  <option 
					    <?php
					  if(isset($_POST['ddl_bloodgroup']) && $_POST['ddl_bloodgroup']=='AB+ve'  || $bloodgroup=='AB+ve')
					  {
					  echo "selected='selected'";
					  }
					  ?>
					  >AB+ve</option>
					  <option 
					    <?php
					  if(isset($_POST['ddl_bloodgroup']) && $_POST['ddl_bloodgroup']=='AB-ve'  || $bloodgroup=='AB-ve')
					  {
					  echo "selected='selected'";
					  }
					  ?>
					  >AB-ve</option>
					  </select>
                  </div>
				  <div class="col-sm-4" id="blood" style="color:#FF0000;">
					<?php echo $n14; ?>
					</div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input7" class="col-sm-3 control-label form-label">Allergies (if any) :</label>
                  <div class="col-sm-5">
                      <input type="text" name="txt_details" class="form-control" id="det" value="<?php echo $row_patient['pat_details'];;?>" />
                  </div>
				  <div class="col-sm-4" id="details" style="color:#FF0000;">
					<?php echo $n15; ?>
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
  </div> 
</div>
<!-- End Footer -->


</div>
<!-- End Content -->
 <!-- //////////////////////////////////////////////////////////////////////////// --> 

<?php
include("footer.php");
?>