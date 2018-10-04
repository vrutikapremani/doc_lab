<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <title>Patient Registration</title>
</head>
</html>

<?php
error_reporting(0);
include("header_registration.php");
include("connection.php");
?>

<!------------------------------ VALIDATION ---------------------------->
<script type="text/javascript">

<!------------------------------------- SALUTATION ----------------------------------->
function c1()
{
var sa=document.pat_registration.ddl_salutation.value;
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
var fname=document.pat_registration.txt_firstname.value;
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
var mname=document.pat_registration.txt_middlename.value;
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
var lname=document.pat_registration.txt_lastname.value;
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
var ae=document.pat_registration.txt_age.value;
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
else if(ae<17 || ae>100)
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

<!------------------------------------- ADDRESS ----------------------------------->
function c6()
{
var ad=document.pat_registration.txt_address.value;
if(ad=="")
{
document.getElementById("address").innerHTML="Enter Your Address.";
document.getElementById("address").style.color="red";
document.getElementById("add").style.border="solid 1px red";
return false;
}
else if(ad.length<3)
{
document.getElementById("address").innerHTML="Address Too Short";
document.getElementById("address").style.color="red";
document.getElementById("add").style.border="solid 1px red";
return false;
}
else
{
document.getElementById("address").innerHTML="";
}
}

<!------------------------------------- STATE ----------------------------------->
function c8()
{
var st=document.pat_registration.ddl_state.value;
if(st=="---------------Select---------------")
{
document.getElementById("state").innerHTML="Select Your State.";
document.getElementById("state").style.color="red";
document.getElementById("sta").style.border="solid 1px red";
return false;
}
else
{
document.getElementById("state").innerHTML="";
}
}

<!------------------------------------- PINCODE ----------------------------------->
function c10()
{
var pi=document.pat_registration.txt_pincode.value;
if(pi=="")
{
document.getElementById("pincode").innerHTML="Enter Your Pincode.";
document.getElementById("pincode").style.color="red";
document.getElementById("pin").style.border="solid 1px red";
return false;
}
else if(isNaN(pi)|| pi.indexOf(" ")!=-1)
{ 
document.getElementById("pincode").innerHTML="Enter Digits Only.";
document.getElementById("pincode").style.color="red";
document.getElementById("pin").style.border="solid 1px red";
pi.focus(); 
return false;
} 
else if(pi.length<6)
{
document.getElementById("pincode").innerHTML="Should Be Of 6 Digits Only.";
document.getElementById("pincode").style.color="red";
document.getElementById("pin").style.border="solid 1px red";
return false;
}
else
{
document.getElementById("pincode").innerHTML="";
}
}

<!------------------------------------- MOBILE NUMBER ----------------------------------->
function c11()
{
var mo=document.pat_registration.txt_mobilenumber.value;
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
function c12()
{
var em=document.pat_registration.txt_emailaddress.value;
var atpos=em.indexOf("@");
var dotpos=em.lastIndexOf(".");
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
if(em=="")
{
document.getElementById("email").innerHTML="Enter Your Email Id";
document.getElementById("email").style.color="red";
document.getElementById("mail").style.border="solid 1px red";
return false;
}
else if (atpos<1 || dotpos<atpos+2 || dotpos+2>=em.length)
{
document.getElementById("email").innerHTML="Enter A Valid Email Id";
em.focus(); 
return false
}
else
{
document.getElementById("email").innerHTML="";
}
}

<!------------------------------------- OCCUPATION ----------------------------------->
function c13()
{
var oc=document.pat_registration.txt_occupation.value;
if(oc=="")
{
document.getElementById("occupation").innerHTML="Enter Your Occupation.";
document.getElementById("occupation").style.color="red";
document.getElementById("occ").style.border="solid 1px red";
return false;
}
else if(!oc.match(/^[a-zA-Z][a-zA-Z\\s]+$/)) 
{
document.getElementById("occupation").innerHTML="Enter Characters Only.";
document.getElementById("occupation").style.color="red";
document.getElementById("occ").style.border="solid 1px red";
return false;
}
else if(oc.length<4)
{
document.getElementById("occupation").innerHTML="Occupation Name Too Short";
document.getElementById("occupation").style.color="red";
document.getElementById("occ").style.border="solid 1px red";
return false;
}
else
{
document.getElementById("occupation").innerHTML="";
}
}

<!------------------------------------- BLOOD GROUP ----------------------------------->
function c14()
{
var bg=document.pat_registration.ddl_bloodgroup.value;
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

<!------------------------------------- ALLERGIES ----------------------------------->
function c15()
{
var al=document.pat_registration.txt_details.value;
if(al=="")
{
document.getElementById("details").innerHTML="Enter Your Allergies.";
document.getElementById("details").style.color="red";
document.getElementById("det").style.border="solid 1px red";
return false;
}
else if(!al.match(/^[a-zA-Z][a-zA-Z\\s]+$/)) 
{
document.getElementById("details").innerHTML="Enter Characters Only.";
document.getElementById("details").style.color="red";
document.getElementById("det").style.border="solid 1px red";
return false;
}
else
{
document.getElementById("details").innerHTML="";
}
}

<!------------------------------------- PASSWORD ----------------------------------->
function c16()
{
var pa=document.pat_registration.txt_password.value;
if(pa=="")
{
document.getElementById("password").innerHTML="Enter Your Password.";
document.getElementById("password").style.color="red";
document.getElementById("pass").style.border="solid 1px red";
return false;
}
else
{
document.getElementById("password").innerHTML="";
}
//check for length
if(pa.length < 6  || pa.length > 16)
{
document.getElementById("password").innerHTML="Minimum Lenght Should Be 6 And Maximum Could Be Till 16.";
document.getElementById("password").style.color="red";
document.getElementById("pass").style.border="solid 1px red";
return false;
}
// check for spaces
if(pa.indexOf(" ") > -1) {
document.getElementById("password").innerHTML="Sorry, Spaces Are Not Allowed.";
document.getElementById("password").style.color="red";
document.getElementById("pass").style.border="solid 1px red";
return false;
}
}

<!------------------------------------- CONFIRM PASSWORD ----------------------------------->
function c17()
{
var cp=document.pat_registration.txt_confirmpassword.value;
if(cp=="")
{
document.getElementById("conpassword").innerHTML="Re-enter Your Password.";
document.getElementById("conpassword").style.color="red";
document.getElementById("conpass").style.border="solid 1px red";
return false;
}
else if(document.doc_registration.txt_confirmpassword.value != document.doc_registration.txt_password.value)
{
document.getElementById("conpassword").innerHTML="Password And Confirm Password Doesn't Match;";
document.getElementById("password").innerHTML="Password And Confirm Password Doesn't Match;";
document.getElementById("conpassword").style.color="red";
document.getElementById("conpass").style.border="solid 1px red";
repass.focus();
return false;
}
else
{
document.getElementById("conpassword").innerHTML="";
}
}
</script>
	

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

//Password
$password=$_POST['txt_password'];
if($password=="")
{
?>
<style>
#pass
{
border:solid 1px red;
}
</style>
<?php
$n16="Enter your password";
$count++;
}
else if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,16}$/', $password)) 
{
?>
<style>
#pass
{
border:solid 1px red;
}
</style>
<?php
$n16="The Password Does Not Meet The Requirements.";
$count++;
}

//Confirm Password
$confirmpassword=$_POST['txt_confirmpassword'];
if($confirmpassword=="")
{
?>
<style>
#conpass
{
border:solid 1px red;
}
</style>
<?php
$n17="Re-enter your password";
$count++;
}
else if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,16}$/', $confirmpassword)) 
{
?>
<style>
#conpass
{
border:solid 1px red;
}
</style>
<?php
$n17="The Password Does Not Meet The Requirements.";
$count++;
}
else if($confirmpassword!=$password)
{
?>
<style>
#conpass
{
border:solid 1px red;
}
</style>
<?php
$n17="Passwords Do Not Match.";
$count++;
}

}
?>
<!---------------------------- END OF VALIDATION -------------------------------->

<!-- INSERT -->
<?php
if(isset($_POST['btn_submit']) && $count==0)
{
$unique=date('Ymdhis');
$insert="insert into tbl_patient values
(
'',
'$unique',
'$_POST[ddl_salutation]',
'$_POST[txt_firstname]',
'$_POST[txt_middlename]',
'$_POST[txt_lastname]',
'$_POST[txt_age]',
'$_POST[rbt_gender]',
'$_POST[txt_address]',
'$_POST[ddl_state]',
'$_POST[txt_city]',
'$_POST[txt_pincode]',
'$_POST[txt_mobilenumber]',
'$_POST[txt_emailaddress]',
'$_POST[txt_occupation]',
'$_POST[ddl_bloodgroup]',
'$_POST[txt_details]',
'$_POST[txt_password]',
'$_POST[txt_confirmpassword]',
now(),
'0'
)";
$query=mysql_query($insert);
?>
<script>window.location.href="login_patient.php";</script>
<?php
$to=$_POST['txt_emailaddress'];
$subject="Registration Confirmation Mail";
$txt="Welcome To DocLab";
$headers="From:doclabapplication@gmail.com";
mail($to,$subject,$txt,$headers);
}
?>

<script type="text/javascript">
function fun_state()
{
var s=document.pat_registration.ddl_state.value;
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
    <div class="top">
         <img src="img/images.png" alt="icon" class="doclab_icon" style="margin-left:530px" width="150px" height="80px"><h1 style="margin-left:430px">PATIENT REGISTRATION</h1>
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


  
  <!-- Start Row -->
  <div class="row">

    <div class="col-md-12">

<div class="panel">

        <div class="panel-title">
          
        </div>

            <div class="panel-body" style="width:100%;">
              <form  method="post" class="form-horizontal" name="pat_registration" enctype="multipart/form-data">
				
				
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
                      <input type="text" name="txt_firstname" class="form-control" id="fn" onblur="return c2()" value="<?php echo $_POST['txt_firstname'];?>" autofocus>
                  </div>
				  	<div class="col-sm-4" id="firstname" style="color:#FF0000;">
					<?php echo $n2; ?>
					</div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input7" class="col-sm-3 control-label form-label">Middle Name :</label>
                  <div class="col-sm-5">
                      <input type="text" name="txt_middlename" class="form-control" id="mn" onblur="return c3()" value="<?php echo $_POST['txt_middlename'];?>" />
                  </div>
				  <div class="col-sm-4" id="middlename" style="color:#FF0000;">
					<?php echo $n3; ?>
					</div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input7" class="col-sm-3 control-label form-label">Last Name :</label>
                  <div class="col-sm-5">
                      <input type="text" name="txt_lastname" class="form-control" id="ln" onblur="return c4()" value="<?php echo $_POST['txt_lastname'];?>" />
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
				  <div>
				  </div>
                </div>
					
				
				<div class="form-group has-success">
                  <label for="input7" class="col-sm-3 control-label form-label">Address :</label>
                  <div class="col-sm-5">
                      <textarea type="text" name="txt_address" class="form-control" id="add" onblur="return c6()"><?php echo $_POST['txt_address'];?></textarea>
                  </div>
				  <div class="col-sm-4" id="address" style="color:#FF0000;">
					<?php echo $n6; ?>
					</div>
                </div>
				
				
				<div class="form-group has-success">
                  <label for="input6" class="col-sm-3 control-label form-label">State :</label>
                  <div class="col-sm-5">
                      <select name="ddl_state" class="form-control" id="sta" onblur="return c8()" onchange="fun_state()">
					  <option>---------------Select---------------</option>
					 <?php
					 $sel="select * from tbl_state";
					 $qu=mysql_query($sel);
					 while($r=mysql_fetch_array($qu))
					 {
					 ?>
					 <option value="<?php echo $r['state_name'];?>"
					 <?php
					  if(isset($_POST['ddl_state']) && $_POST['ddl_state']==$r['state_name'])
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
				  	   <div class="col-sm-4" id="state"style="color:#FF0000;" >
					   <?php echo $n8; ?>
					   </div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input7" class="col-sm-3 control-label form-label">City :</label>
                  <div class="col-sm-5">
                      <select name="txt_city" class="form-control" id="cit" onblur="return c9()"/>
					  <option>---------------Select---------------</option>
					  </select>
                  </div>
				  <div class="col-sm-4" id="city" style="color:#FF0000;">
					<?php echo $n9; ?>
					</div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input7" class="col-sm-3 control-label form-label">Pincode :</label>
                  <div class="col-sm-5">
                      <input type="text" name="txt_pincode" class="form-control" id="pin" maxlength="6" onblur="return c10()" value="<?php echo $_POST['txt_pincode'];?>" maxlength="6"/>
                  </div>
				  <div class="col-sm-4" id="pincode" style="color:#FF0000;">
					<?php echo $n10; ?>
					</div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input7" class="col-sm-3 control-label form-label">Mobile Number :</label>
                  <div class="col-sm-5">
                      <input type="text" name="txt_mobilenumber" class="form-control" id="mob" maxlength="10" onblur="return c11()" value="<?php echo $_POST['txt_mobilenumber'];?>" maxlength="10"/>
                  </div>
				  <div class="col-sm-4" id="mobile" style="color:#FF0000;">
					<?php echo $n11; ?>
					</div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input7" class="col-sm-3 control-label form-label">Email Address :</label>
                  <div class="col-sm-5">
                      <input type="text" name="txt_emailaddress" class="form-control" id="mail" onblur="return c12()" value="<?php echo $_POST['txt_emailaddress'];?>" />
                  </div>
				  <div class="col-sm-4" id="email" style="color:#FF0000;">
					<?php echo $n12; ?>
					</div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input7" class="col-sm-3 control-label form-label">Occupation :</label>
                  <div class="col-sm-5">
                      <input type="text" name="txt_occupation" class="form-control" id="occ" onblur="return c13()" value="<?php echo $_POST['txt_occupation'];?>" />
                  </div>
				  <div class="col-sm-4" id="occupation" style="color:#FF0000;">
					<?php echo $n13; ?>
					</div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input7" class="col-sm-3 control-label form-label">Blood Group :</label>
                  <div class="col-sm-5">
                      <select name="ddl_bloodgroup" class="form-control" id="boo" onblur="return c14()">
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
					<?php echo $n14; ?>
					</div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input7" class="col-sm-3 control-label form-label">Allergies (if any) :</label>
                  <div class="col-sm-5">
                      <input type="text" name="txt_details" class="form-control" id="det" onblur="return c15()" value="<?php echo $_POST['txt_details'];?>" />
                  </div>
				  <div class="col-sm-4" id="details" style="color:#FF0000;">
					<?php echo $n15; ?>
					</div>
                </div>
				
				
				<div class="form-group has-success">
                  <label for="input7" class="col-sm-3 control-label form-label">Password :</label>
                  <div class="col-sm-5">
                      <input type="password" name="txt_password" class="form-control" id="pass" maxlength="16" onblur="return c16()" value="<?php echo $_POST['txt_password'];?>" /><p style="color:#996600">1. Atleast One Capital Letter (A-Z)<br />2. Atleast One Digit (0-9)<br />3. Atleast One Special Character (!@#$%)<br />4. Length Between 8-16 Characters</p>
                  </div>
				  <div class="col-sm-4" id="password"style="color:#FF0000;">
					<?php echo $n16; ?>
					</div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input7" class="col-sm-3 control-label form-label">Confirm Password :</label>
                  <div class="col-sm-5">
                      <input type="password" name="txt_confirmpassword" class="form-control" id="conpass" maxlength="16" onblur="return c17()" value="<?php echo $_POST['txt_confirmpassword'];?>" />
                  </div>
				  <div class="col-sm-4" id="conpassword" style="color:#FF0000;">
					<?php echo $n17; ?>
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
