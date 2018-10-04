<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <title>Doctor Registration</title>
</head>
</html>
<?php
error_reporting(0);
include("header_registration.php");
include("connection.php");
?>


<!------------------------------ VALIDATION ---------------------------->
<script type="text/javascript">

<!------------------------------------- FIRST NAME ----------------------------------->
function c1()
{
var fname=document.doc_registration.txt_firstname.value;
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
function c2()
{
var mname=document.doc_registration.txt_middlename.value;
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
function c3()
{
var lname=document.doc_registration.txt_lastname.value;
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

<!------------------------------------- ADDRESS ----------------------------------->
function c4()
{
var ad=document.doc_registration.txt_address.value;
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
function c5()
{
var st=document.doc_registration.ddl_state.value;
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
function c8()
{
var pi=document.doc_registration.txt_pincode.value;
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
function c9()
{
var mo=document.doc_registration.txt_mobilenumber.value;
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
function c10()
{
var em=document.doc_registration.txt_emailaddress.value;
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

<!------------------------------------- FIELD OF SPECIALIZATION ----------------------------------->
function c11()
{
var fo=document.doc_registration.ddl_fos.value;
if(fo=="---------------Select---------------")
{
document.getElementById("field").innerHTML="Select Your State.";
document.getElementById("field").style.color="red";
document.getElementById("fos").style.border="solid 1px red";
return false;
}
else
{
document.getElementById("field").innerHTML="";
}
}

<!------------------------------------- CERTIFICATION PROOF ----------------------------------->
function c12()
{
var ce=document.doc_registration.txt_certificationproof.value;
if(ce=="")
{
document.getElementById("cerproof").innerHTML="Upload Your Cetification Proof.";
document.getElementById("cerproof").style.color="red";
document.getElementById("proof").style.border="solid 1px red";
return false;
}
else
{
document.getElementById("cerproof").innerHTML="";
}
}

<!------------------------------------- CONSULTATION FEES ----------------------------------->
function c14()
{
var co=document.doc_registration.txt_fees.value;
if(co=="")
{
document.getElementById("fees").innerHTML="Enter Your Consultation Fees.";
document.getElementById("fees").style.color="red";
document.getElementById("fee").style.border="solid 1px red";
return false;
}
else if(isNaN(co)|| co.indexOf(" ")!=-1)
{ 
document.getElementById("fees").innerHTML="Enter Digits Only.";
document.getElementById("fees").style.color="red";
document.getElementById("fee").style.border="solid 1px red";
pi.focus(); 
return false;
} 
else
{
document.getElementById("fees").innerHTML="";
}
}

<!------------------------------------- FIRST VISIT FEES ----------------------------------->
function c15()
{
var fv=document.doc_registration.txt_1fees.value;
if(fv=="")
{
document.getElementById("fees1").innerHTML="Enter Your First Visit Fees.";
document.getElementById("fees1").style.color="red";
document.getElementById("fee1").style.border="solid 1px red";
return false;
}
else if(isNaN(fv)|| fv.indexOf(" ")!=-1)
{ 
document.getElementById("fees1").innerHTML="Enter Digits Only.";
document.getElementById("fees1").style.color="red";
document.getElementById("fee1").style.border="solid 1px red";
fv.focus(); 
return false;
} 
else
{
document.getElementById("fees1").innerHTML="";
}
}

<!------------------------------------- PASSWORD ----------------------------------->
function c16()
{
var pa=document.doc_registration.txt_password.value;
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
var cp=document.doc_registration.txt_confirmpassword.value;
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
	
<!---------------------------- END OF VALIDATION -------------------------------->



<!--PHP VALIDATION -->

<?php
$count="";
if(isset($_POST['btn_submit']))
{

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
$n1="Enter Your First Name.";
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
$n1="Enter Characters Only.";
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
$n1="Name Too Short.";
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
$n2="Enter Your Middle Name.";
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
$n2="Enter Characters Only.";
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
$n2="Name Too Short.";
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
$n3="Enter Your Last Name.";
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
$n3="Enter Characters Only";
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
$n3="Name Too Short.";
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
$n4="Enter Your Address.";
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
$n4="Address Too Short.";
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
$n5="Select Your State.";
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
$n8="Enter Your Pincode.";
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
$n8="Enter Digits Only.";
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
$n8="Pincode Should Be Of 6 Digits Only.";
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
$n9="Enter Your Mobile Number.";
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
$n9="Enter Digits Only.";
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
$n9="Mobile Number Should Be Of 10 Digits Only.";
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
$n10="Enter Your Email Address.";
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
$n10=" Enter A Valid Email Address.";
$count++;
}

//Field Of Specialization
$state=$_POST['ddl_fos'];
if($state=="---------------Select---------------")
{
?>
<style>
#fos
{
border:solid 1px red;
}
</style>
<?php
$n11="Select Your Field Of Specialization.";
$count++;
}

//Certification Proof
$proof=$_FILES['txt_certificationproof']['name'];
if($proof=="")
{
?>
<style>
#proof
{
border:solid 1px red;
}
</style>
<?php
$n12="Upload Your Certification Proof.";
$count++;
}

//Visiting Hours


//Consulatation Fees
$fees=$_POST['txt_fees'];
if($fees=="")
{
?>
<style>
#fee
{
border:solid 1px red;
}
</style>
<?php
$n14="Enter Your Consultation Fees.";
$count++;
}
else if(!preg_match('/^[0-9]*$/', $fees))
{
?>
<style>
#fee
{
border:solid 1px red;
}
</style>
<?php
$n14="Enter Digits Only.";
$count++;
}

//First Visit Fees
$fee1=$_POST['txt_1fees'];
if($fee1=="")
{
?>
<style>
#fee1
{
border:solid 1px red;
}
</style>
<?php
$n15="Enter Your First Visit Fees.";
$count++;
}
else if(!preg_match('/^[0-9]*$/', $fee1))
{
?>
<style>
#fee1
{
border:solid 1px red;
}
</style>
<?php
$n15="Enter Digits Only.";
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
<!-- END OF VALIDATION-->

<?php
if(isset($_POST['btn_submit']) && $count==0)
{
$file=$_FILES['txt_certificationproof']['name'];
$dest="upload/$file";
$src=$_FILES['txt_certificationproof']['tmp_name'];
move_uploaded_file($src,$dest);
$tim1=$_POST['ddl_1'].':'.$_POST['ddl_2'];
$tim2=$_POST['ddl_3'].':'.$_POST['ddl_4'];
$tim3=$_POST['ddl_5'].':'.$_POST['ddl_6'];
$tim4=$_POST['ddl_7'].':'.$_POST['ddl_8'];
$insert="insert into tbl_doctor values
(
'',
'Dr.',
'$_POST[txt_firstname]',
'$_POST[txt_middlename]',
'$_POST[txt_lastname]',
'$_POST[txt_address]',
'$_POST[ddl_state]',
'$_POST[txt_city]',
'$_POST[txt_pincode]',
'$_POST[txt_mobilenumber]',
'$_POST[txt_emailaddress]',
'$_POST[ddl_fos]',
'$dest',
'$tim1',
'$tim2',
'$tim3',
'$tim4',
'$_POST[txt_fees]',
'$_POST[txt_1fees]',
'$_POST[txt_password]',
'$_POST[txt_confirmpassword]',
'0'
)";
$query=mysql_query($insert);
?>
<script>window.location.href="login_doctor.php";</script>
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
var s=document.doc_registration.ddl_state.value;
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
         <img src="img/images.png" alt="icon" class="doclab_icon" style="margin-left:530px" width="150px" height="80px"><h1 style="margin-left:430px">DOCTOR REGISTRATION</h1>
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
			<?php echo $insert; ?>
              <form  method="post" class="form-horizontal" name="doc_registration" enctype="multipart/form-data" >
			  
			  <div class="form-group has-success">
                  <label for="input6" class="col-sm-3 control-label form-label">Salutation :</label>
                  <div class="col-sm-5">
                      <input class="form-control" type="text" placeholder="Dr." readonly>
                  </div>
                </div>
				
				
				<div class="form-group has-success">
                  <label for="input6" class="col-sm-3 control-label form-label">First Name :</label>
                  <div class="col-sm-5">
                      <input type="text" name="txt_firstname" class="form-control" id="fn" onblur="return c1()" value="<?php echo $_POST['txt_firstname'];?>"autofocus>
                  </div>
				   <div class="col-sm-4" id="firstname" style="color:#FF0000">
				   		 <?php echo $n1; ?>
					   </div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input6" class="col-sm-3 control-label form-label">Middle Name :</label>
                  <div class="col-sm-5">
                      <input type="text" name="txt_middlename" class="form-control" id="mn" onblur="return c2()" value="<?php echo $_POST['txt_middlename'];?>">
                  </div>
				   <div class="col-sm-4" id="middlename" style="color:#FF0000">
					   <?php echo $n2; ?>
					   </div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input6" class="col-sm-3 control-label form-label">Last Name :</label>
                  <div class="col-sm-5">
                      <input type="text" name="txt_lastname" class="form-control" id="ln" onblur="return c3()" value="<?php echo $_POST['txt_lastname'];?>">
                  </div>
				   <div class="col-sm-4" id="lastname" style="color:#FF0000">
					   <?php echo $n3; ?>
					   </div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input6" class="col-sm-3 control-label form-label">Address :</label>
                  <div class="col-sm-5">
                      <textarea type="text" name="txt_address" class="form-control" id="add" onblur="return c4()"><?php echo $_POST['txt_address'];?></textarea>
                  </div>
				  	   <div class="col-sm-4" id="address" style="color:#FF0000">
					   <?php echo $n4; ?>
					   </div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input6" class="col-sm-3 control-label form-label">State :</label>
                  <div class="col-sm-5">
                      <select name="ddl_state" class="form-control" id="sta" onblur="return c5()" onchange="fun_state()">
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
				  	   <div class="col-sm-4" id="state" style="color:#FF0000">
					   <?php echo $n5; ?>
					   </div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input7" class="col-sm-3 control-label form-label">City :</label>
                  <div class="col-sm-5">
                      <select name="txt_city" class="form-control" id="cit" onblur="return c6()"/>
					  <option>---------------Select---------------</option>
					  </select>
                  </div>
				  <div class="col-sm-4" id="city" style="color:#FF0000">
					<?php echo $n6; ?>
					</div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input6" class="col-sm-3 control-label form-label">Pincode :</label>
                  <div class="col-sm-5">
                      <input type="text" name="txt_pincode" class="form-control" id="pin" maxlength="6" onblur="return c8()" value="<?php echo $_POST['txt_pincode'];?>">
                  </div>
				  	   <div class="col-sm-4" id="pincode" style="color:#FF0000">
					   <?php echo $n8; ?>
					   </div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input6" class="col-sm-3 control-label form-label">Mobile Number :</label>
                  <div class="col-sm-5">
                      <input type="text" name="txt_mobilenumber" class="form-control" id="mob" maxlength="10" onblur="return c9()" value="<?php echo $_POST['txt_mobilenumber'];?>" >
                  </div>
				  	   <div class="col-sm-4" id="mobile" style="color:#FF0000">
					   <?php echo $n9; ?>
					   </div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input6" class="col-sm-3 control-label form-label">Email Address :</label>
                  <div class="col-sm-5">
                      <input type="text" name="txt_emailaddress" class="form-control" id="mail" onblur="return c10()" value="<?php echo $_POST['txt_emailaddress'];?>" >
                  </div>
				  	   <div class="col-sm-4" id="email" style="color:#FF0000">
					   <?php echo $n10; ?>
					   </div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input6" class="col-sm-3 control-label form-label">Field Of Specialization :</label>
                  <div class="col-sm-5">
				  	<select name="ddl_fos" class="form-control" id="fos" onblur="return c11()">
				  <option>---------------Select---------------</option>
                    <?php
					$select="select * from tbl_doctor_fos";
					$query=mysql_query($select);
					while($row=mysql_fetch_array($query))
					{
					?>
					<option value="<?php echo $row['fos_id'];?>"  
					<?php
					if(isset($_POST['ddl_fos']) && $_POST['ddl_fos']==$fos || $fos==$row['fos_id'])
					{
					echo "selected='selected'";
					}
					?>
					
					><?php echo ucfirst($row['fos_type']);?></option>
					<?php
					}
					?>
					</select>
                  </div>
				  	   <div class="col-sm-4" id="field" style="color:#FF0000">
					    <?php echo $n11; ?>
					   </div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input6" class="col-sm-3 control-label form-label">Certification Proof :</label>
                  <div class="col-sm-5">
                      <input type="file" name="txt_certificationproof" class="form-control" id="proof" onblur="return c12()" value="<?php echo $_POST['txt_certificationproof'];?>">
                  </div>
				  	   <div class="col-sm-4" id="cerproof" style="color:#FF0000">
					   <?php echo $n12; ?>
					   </div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input6" class="col-sm-3 control-label form-label">Visiting Hours :</label>
                  <div class="col-sm-5">
				   <select name="ddl_1"  id="hr" style="width:50px;">
                    <option></option>
					<option>1</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
					<option>5</option>
					<option>6</option>
					<option>7</option>
					<option>8</option>
					<option>9</option>
					<option>10</option>
					<option>11</option>
					<option>12</option>				    
					</select> &nbsp;: 
					<select name="ddl_2"  id="min" style="width:50px;" >
                    <option></option>
					<option>00</option>
					<option>30</option>
					</select>&nbsp; TO
					<select name="ddl_3"  id="hr" style="width:50px;">
                    <option></option>
					<option>1</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
					<option>5</option>
					<option>6</option>
					<option>7</option>
					<option>8</option>
					<option>9</option>
					<option>10</option>
					<option>11</option>
					<option>12</option>		
					<option>13</option>	
					<option>14</option>	
					<option>15</option>	
					<option>16</option>
					<option>17</option>
					<option>18</option>
					<option>19</option>
					<option>20</option>
					<option>21</option>
					<option>22</option>
					<option>23</option>
					<option>24</option>		    
					</select> &nbsp;: 
					<select name="ddl_4"  id="min" style="width:50px;" >
                    <option></option>
					<option>00</option>
					<option>30</option>
					</select><br /><br /><p style="margin-left:115px;">AND</p>
					<select name="ddl_5"  id="hr" style="width:50px;">
                    <option></option>
					<option>1</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
					<option>5</option>
					<option>6</option>
					<option>7</option>
					<option>8</option>
					<option>9</option>
					<option>10</option>
					<option>11</option>
					<option>12</option>
					<option>13</option>	
					<option>14</option>	
					<option>15</option>	
					<option>16</option>
					<option>17</option>
					<option>18</option>
					<option>19</option>
					<option>20</option>
					<option>21</option>
					<option>22</option>
					<option>23</option>
					<option>24</option>		 				    
					</select> &nbsp;: 
					<select name="ddl_6"  id="min" style="width:50px;" >
                    <option></option>
					<option>00</option>
					<option>30</option>
					</select>&nbsp; TO
					<select name="ddl_7"  id="hr" style="width:50px;">
                    <option></option>
					<option>1</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
					<option>5</option>
					<option>6</option>
					<option>7</option>
					<option>8</option>
					<option>9</option>
					<option>10</option>
					<option>11</option>
					<option>12</option>		
					<option>13</option>	
					<option>14</option>	
					<option>15</option>	
					<option>16</option>
					<option>17</option>
					<option>18</option>
					<option>19</option>
					<option>20</option>
					<option>21</option>
					<option>22</option>
					<option>23</option>
					<option>24</option>		 			    
					</select> &nbsp;: 
					<select name="ddl_8"  id="min" style="width:50px;" >
                    <option></option>
					<option>00</option>
					<option>30</option>
					</select>
					
                  </div>
				  	   <div class="col-sm-4" id="hours" style="color:#FF0000">
					   <?php echo $n13; ?>
					   </div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input6" class="col-sm-3 control-label form-label">Consultation Fees:</label>
                  <div class="col-sm-5">
				  	<input type="text" name="txt_fees" class="form-control" id="fee" onblur="return c14()" value="<?php echo $_POST['txt_fees'];?>">
                  </div>
				  	   <div class="col-sm-4" id="fees" style="color:#FF0000">
					   <?php echo $n14; ?>
					   </div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input6" class="col-sm-3 control-label form-label">Secondary Visit Fees:</label>
                  <div class="col-sm-5">
				  	<input type="text" name="txt_1fees" class="form-control" id="fee1" onblur="return c15()" value="<?php echo $_POST['txt_1fees'];?>">
                  </div>
				  	   <div class="col-sm-4" id="fees1" style="color:#FF0000">
					   <?php echo $n15; ?>
					   </div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input6" class="col-sm-3 control-label form-label">Password :</label>
                  <div class="col-sm-5">
                      <input type="password" name="txt_password" class="form-control" id="pass" maxlength="16 "onblur="return c16()" value="<?php echo $_POST['txt_password'];?>"><p style="color:#996600">1. Atleast One Capital Letter (A-Z)<br />2. Atleast One Digit (0-9)<br />3. Atleast One Special Character (!@#$%)<br />4. Length Between 8-16 Characters</p>
                  </div>
				  	   <div class="col-sm-4" id="password" style="color:#FF0000">
					   <?php echo $n16; ?>
					   </div>
                </div>
				
				
				
				<div class="form-group has-success">
                  <label for="input6" class="col-sm-3 control-label form-label">Confirm Password :</label>
                  <div class="col-sm-5">
                      <input type="password" name="txt_confirmpassword" class="form-control" id="conpass" maxlength="16 "onblur="return c17()" value="<?php echo $_POST['txt_confirmpassword'];?>">
                  </div>
				  	   <div class="col-sm-4" id="conpassword" style="color:#FF0000">
					   <?php echo $n17; ?>
					   </div>
                </div>
				
				

				<div class="form-group has-success">
                  <label for="input6" class="col-sm-3 control-label form-label"></label>
                  <div class="col-sm-5">
                     <center> <input type="submit" name="btn_submit" value="Submit" class="btn-default" onclick="return validation()">
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