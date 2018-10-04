<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <title>Add Member</title>
</head>
</html>

<?php
error_reporting(0);
session_start();
include("header_patient.php");
include("sidebar_patient.php");
include("connection.php");
?>

<!------------------------------ VALIDATION ---------------------------->
<script type="text/javascript">

<!------------------------------------- SALUTATION ----------------------------------->
function c1()
{
var sa=document.mem_registration.ddl_salutation.value;
if(sa=="---------------Select---------------")
{
document.getElementById("salutation").innerHTML="Select Appropiate Salutation.";
document.getElementById("salutation").style.color="red";
document.getElementById("salu").style.border="solid 1px red";
return false;
}
else
{
document.getElementById("salutation").innerHTML="";
}
}

<!------------------------------------- FIRST NAME ----------------------------------->
function c2()
{
var fname=document.mem_registration.txt_firstname.value;
if(fname=="")
{
document.getElementById("firstname").innerHTML="Enter Your First Name.";
document.getElementById("firstname").style.color="red";
document.getElementById("fn").style.border="solid 1px red";
return false;
}
else if(!fname.match(/^[a-zA-Z][a-zA-Z\\s]+$/)) 
{
document.getElementById("firstname").innerHTML="Enter Characters Only.";
document.getElementById("firstname").style.color="red";
document.getElementById("fn").style.border="solid 1px red";
return false;
}
else if(fname.length<3)
{
document.getElementById("firstname").innerHTML="Name Too Short";
document.getElementById("firstname").style.color="red";
document.getElementById("fn").style.border="solid 1px red";
return false;
}
else
{
document.getElementById("firstname").innerHTML="";
}
}

<!------------------------------------- MIDDLE NAME ----------------------------------->
function c3()
{
var mname=document.mem_registration.txt_middlename.value;
if(mname=="")
{
document.getElementById("middlename").innerHTML="Enter Your Middle Name.";
document.getElementById("middlename").style.color="red";
document.getElementById("mn").style.border="solid 1px red";
return false;
}
else if(!mname.match(/^[a-zA-Z][a-zA-Z\\s]+$/)) 
{
document.getElementById("middlename").innerHTML="Enter Characters Only.";
document.getElementById("middlename").style.color="red";
document.getElementById("mn").style.border="solid 1px red";
return false;
}
else if(mname.length<3)
{
document.getElementById("middlename").innerHTML="Name Too Short";
document.getElementById("middlename").style.color="red";
document.getElementById("mn").style.border="solid 1px red";
return false;
}
else
{
document.getElementById("middlename").innerHTML="";
}
}

<!------------------------------------- LAST NAME ----------------------------------->
function c4()
{
var lname=document.mem_registration.txt_lastname.value;
if(lname=="")
{
document.getElementById("lastname").innerHTML="Enter Your Last Name.";
document.getElementById("lastname").style.color="red";
document.getElementById("ln").style.border="solid 1px red";
return false;
}
else if(!lname.match(/^[a-zA-Z][a-zA-Z\\s]+$/)) 
{
document.getElementById("lastname").innerHTML="Enter Characters Only.";
document.getElementById("lastname").style.color="red";
document.getElementById("ln").style.border="solid 1px red";
return false;
}
else if(lname.length<3)
{
document.getElementById("lastname").innerHTML="Name Too Short";
document.getElementById("lastname").style.color="red";
document.getElementById("ln").style.border="solid 1px red";
return false;
}
else
{
document.getElementById("lastname").innerHTML="";
}
}

<!------------------------------------- AGE ----------------------------------->
function c5()
{
var ae=document.mem_registration.txt_age.value;
if(ae=="")
{
document.getElementById("age").innerHTML="Enter Your Address.";
document.getElementById("age").style.color="red";
document.getElementById("ag").style.border="solid 1px red";
return false;
}
else if(isNaN(ae)|| ae.indexOf(" ")!=-1)
{ 
document.getElementById("fees1").innerHTML="Enter Digits Only.";
document.getElementById("fees1").style.color="red";
document.getElementById("fee1").style.border="solid 1px red";
ae.focus(); 
return false;
} 
else if(ae>100)
{
document.getElementById("age").innerHTML="Age Should Be More Than 17";
document.getElementById("age").style.color="red";
document.getElementById("ag").style.border="solid 1px red";
return false;
}
else
{
document.getElementById("age").innerHTML="";
}
}

<!------------------------------------- BLOOD GROUP ----------------------------------->
function c6()
{
var bg=document.mem_registration.ddl_bloodgroup.value;
if(bg=="---------------Select---------------")
{
document.getElementById("blood").innerHTML="Select Your State.";
document.getElementById("blood").style.color="red";
document.getElementById("boo").style.border="solid 1px red";
return false;
}
else
{
document.getElementById("blood").innerHTML="";
}
}

<!------------------------------------- MOBILE NUMBER ----------------------------------->
function c7()
{
var mo=document.mem_registration.txt_mobilenumber.value;
if(mo=="")
{
document.getElementById("mobile").innerHTML="Enter Your Mobile Number.";
document.getElementById("mobile").style.color="red";
document.getElementById("mob").style.border="solid 1px red";
return false;
}
else if(isNaN(mo)|| mo.indexOf(" ")!=-1)
{ 
document.getElementById("mobile").innerHTML="Enter Digits Only.";
document.getElementById("mobile").style.color="red";
document.getElementById("mob").style.border="solid 1px red";
mo.focus(); 
return false;
} 
else if(mo.length<10)
{
document.getElementById("mobile").innerHTML="Should Be Of 10 Digits Only.";
document.getElementById("mobile").style.color="red";
document.getElementById("mob").style.border="solid 1px red";
return false;
}
else
{
document.getElementById("mobile").innerHTML="";
}
}

<!------------------------------------- EMAIL ADDRESS ----------------------------------->
function c8()
{
var em=document.mem_registration.txt_emailaddress.value;
var atpos=em.indexOf("@");
var dotpos=em.lastIndexOf(".");
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
if(em=="")
{
document.getElementById("email").innerHTML="Enter Your Email Address";
document.getElementById("email").style.color="red";
document.getElementById("mail").style.border="solid 1px red";
return false;
}
else if (atpos<1 || dotpos<atpos+2 || dotpos+2>=em.length)
{
document.getElementById("email").innerHTML="Enter A Valid Email Address";
em.focus(); 
return false
}
else
{
document.getElementById("email").innerHTML="";
}
}

</script>

<!------------------------------------- END OF VALIDATION ----------------------------------->


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
else if($age<2)
{
?>
<style>
#ag
{
border:solid 1px red;
}
</style>
<?php
$n5="Age Should Be More Than 2.";
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


<!-- INSERT -->
<?php
if(isset($_POST['btn_submit']) && $count==0)
{
$unique=date('Ymdhis');
$insert="insert into tbl_patient_member values
(
'',
'$_SESSION[pat_id]',
'$unique',
'$_POST[ddl_salutation]',
'$_POST[txt_firstname]',
'$_POST[txt_middlename]',
'$_POST[txt_lastname]',
'$_POST[txt_age]',
'$_POST[rbt_gender]',
'$_POST[ddl_bloodgroup]',
'$_POST[txt_mobilenumber]',
'$_POST[txt_emailaddress]',
'0'
)";
$query=mysql_query($insert);
?>
<script>alert("Member Added Successfully!");</script>
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
              <form  method="post" class="form-horizontal" name="mem_registration" enctype="multipart/form-data">
			  
			  <div class="form-group has-success">
                  <label for="input7" class="col-sm-3 control-label form-label">Salutation :</label>
                  <div class="col-sm-5">
                      <select name="ddl_salutation" class="form-control" id="salu" onblur="return c1()" autofocus>
					  <option>---------------Select---------------</option>
					  <option value="Miss."
					  <?php
					  if(isset($_POST['ddl_salutation']) && $_POST['ddl_salutation']=='Miss.')
					  {
					  echo "selected='selected'";
					  }
					  ?>
					  >Miss.</option>
					  <option value="Mrs."
					  <?php
					  if(isset($_POST['ddl_salutation']) && $_POST['ddl_salutation']=='Mrs.')
					  {
					  echo "selected='selected'";
					  }
					  ?>
					  >Mrs.</option>
					  <option value="Mr."
					  <?php
					  if(isset($_POST['ddl_salutation']) && $_POST['ddl_salutation']=='Mr.')
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
                      <input type="text" name="txt_firstname" class="form-control" id="fn" onblur="return c2()" value="<?php echo $_POST['txt_firstname'];?>">
                  </div>
				  	<div class="col-sm-4" id="firstname"style="color:#FF0000;">
					<?php echo $n2; ?>
					</div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input7" class="col-sm-3 control-label form-label">Middle Name :</label>
                  <div class="col-sm-5">
                      <input type="text" name="txt_middlename" class="form-control" id="mn" onblur="return c3()" value="<?php echo $_POST['txt_middlename'];?>"  />
                  </div>
				  <div class="col-sm-4" id="middlename" style="color:#FF0000;">
					<?php echo $n3; ?>
					</div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input7" class="col-sm-3 control-label form-label">Last Name :</label>
                  <div class="col-sm-5">
                      <input type="text" name="txt_lastname" class="form-control" id="ln" onblur="return c4()" value="<?php echo $_POST['txt_lastname'];?>"  />
                  </div>
				  <div class="col-sm-4" id="lastname" style="color:#FF0000;">
					<?php echo $n4; ?>
					</div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input7" class="col-sm-3 control-label form-label">Age :</label>
                  <div class="col-sm-5">
                      <input type="text" name="txt_age" class="form-control" id="ag" onblur="return c5()" value="<?php echo $_POST['txt_age'];?>" />
                  </div>
				  <div class="col-sm-4" id="age" style="color:#FF0000;">
					<?php echo $n5; ?>
					</div>
                </div>
		
				<div class="form-group has-success">
                  <label for="input7" class="col-sm-3 control-label form-label"> Gender :</label>
                  <div class="col-sm-5">
                  
				  	  <div class="radio radio-danger">
                        <input type="radio" name="rbt_gender" id="radio3" value="Male">
                        <label for="radio3">
                            Male
                        </label>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="rbt_gender" id="radio4" value="Female" checked>
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
					  if(isset($_POST['ddl_bloodgroup']) && $_POST['ddl_bloodgroup']=='A+ve')
					  {
					  echo "selected='selected'";
					  }
					  ?>
					  >A+ve</option>
					  <option value="A-ve"
					   <?php
					  if(isset($_POST['ddl_bloodgroup']) && $_POST['ddl_bloodgroup']=='A-ve')
					  {
					  echo "selected='selected'";
					  }
					  ?>
					  >A-ve</option>
					  <option value="B+ve"
					   <?php
					  if(isset($_POST['ddl_bloodgroup']) && $_POST['ddl_bloodgroup']=='B+ve')
					  {
					  echo "selected='selected'";
					  }
					  ?>
					  >B+ve</option>
					  <option value="B-ve"
					   <?php
					  if(isset($_POST['ddl_bloodgroup']) && $_POST['ddl_bloodgroup']=='B-ve')
					  {
					  echo "selected='selected'";
					  }
					  ?>
					  >B-ve</option>
					  <option value="O+ve"
					   <?php
					  if(isset($_POST['ddl_bloodgroup']) && $_POST['ddl_bloodgroup']=='O+ve')
					  {
					  echo "selected='selected'";
					  }
					  ?>
					  >O+ve</option>
					  <option value="O-ve"
					   <?php
					  if(isset($_POST['ddl_bloodgroup']) && $_POST['ddl_bloodgroup']=='O-ve')
					  {
					  echo "selected='selected'";
					  }
					  ?>
					  >O-ve</option>
					  <option value="AB+ve"
					   <?php
					  if(isset($_POST['ddl_bloodgroup']) && $_POST['ddl_bloodgroup']=='AB+ve')
					  {
					  echo "selected='selected'";
					  }
					  ?>
					  >AB+ve</option>
					  <option value="AB-ve"
					   <?php
					  if(isset($_POST['ddl_bloodgroup']) && $_POST['ddl_bloodgroup']=='AB-ve')
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
                      <input type="text" name="txt_mobilenumber" class="form-control" id="mob" onblur="return c7()" value="<?php echo $_POST['txt_mobilenumber'];?>" maxlength="10"/>
                  </div>
				  <div class="col-sm-4" id="mobile" style="color:#FF0000;">
					<?php echo $n7; ?>
					</div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input7" class="col-sm-3 control-label form-label">Email Address :</label>
                  <div class="col-sm-5">
                      <input type="text" name="txt_emailaddress" class="form-control" id="mail" onblur="return c8()" value="<?php echo $_POST['txt_emailaddress'];?>" />
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
</div>
<!-- End Footer -->

		

<?php include("footer.php");?>
