<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <title>Laboratory Registration</title>
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
include("header_registration.php");
include("connection.php");
?>

<!------------------------------ VALIDATION ---------------------------->
<script type="text/javascript">

<!------------------------------------- NAME ----------------------------------->
function c1()
{
var name=document.lab_registration.txt_name.value;
if(name=="")
{
document.getElementById("name").innerHTML="Enter Your First Name.";
document.getElementById("name").style.color="red";
document.getElementById("nam").style.border="solid 1px red";
return false;
}
else if(!name.match(/^[a-zA-Z][a-zA-Z\\s]+$/)) 
{
document.getElementById("name").innerHTML="Enter Characters Only.";
document.getElementById("name").style.color="red";
document.getElementById("nam").style.border="solid 1px red";
return false;
}
else if(name.length<3)
{
document.getElementById("name").innerHTML="Name Too Short";
document.getElementById("name").style.color="red";
document.getElementById("nam").style.border="solid 1px red";
return false;
}
else
{
document.getElementById("name").innerHTML="";
}
}

<!------------------------------------- ADDRESS ----------------------------------->
function c2()
{
var ad=document.lab_registration.txt_address.value;
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
function c4()
{
var st=document.lab_registration.ddl_state.value;
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
function c6()
{
var pi=document.lab_registration.txt_pincode.value;
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

<!------------------------------------- CONTACT NUMBER ----------------------------------->
function c7()
{
var cont=document.lab_registration.txt_contactnumber.value;
if(cont=="")
{
document.getElementById("contact").innerHTML="Enter Your Contact Number.";
document.getElementById("contact").style.color="red";
document.getElementById("con").style.border="solid 1px red";
return false;
}
else if(isNaN(cont)|| cont.indexOf(" ")!=-1)
{ 
document.getElementById("contact").innerHTML="Enter Digits Only.";
document.getElementById("contact").style.color="red";
document.getElementById("con").style.border="solid 1px red";
cont.focus(); 
return false;
} 
else if(cont.length<10)
{
document.getElementById("contact").innerHTML="Should Be Of 10 Digits Only.";
document.getElementById("contact").style.color="red";
document.getElementById("con").style.border="solid 1px red";
return false;
}
else
{
document.getElementById("contact").innerHTML="";
}
}

<!------------------------------------- WORKING HOURS ----------------------------------->
function c8()
{
var wo=document.lab_registration.txt_workinghours.value;
if(wo=="")
{
document.getElementById("work").innerHTML="Enter Your Working Hours.";
document.getElementById("work").style.color="red";
document.getElementById("wor").style.border="solid 1px red";
return false;
}
else
{
document.getElementById("work").innerHTML="";
}
}


<!------------------------------------- EMAIL ADDRESS ----------------------------------->
function c9()
{
var em=document.lab_registration.txt_emailaddress.value;
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

<!------------------------------------- CERTIFICATION PROOF ----------------------------------->
function c10()
{
var ce=document.lab_registration.txt_certificationproof.value;
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

<!------------------------------------- PASSWORD ----------------------------------->
function c11()
{
var pa=document.lab_registration.txt_password.value;
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
function c12()
{
var cp=document.lab_registration.txt_confirmpassword.value;
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
$n10="Upload Your Certification Proof.";
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
$n11="Enter your password";
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
$n11="The Password Does Not Meet The Requirements.";
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
$n12="Re-enter your password";
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
$n12="The Password Does Not Meet The Requirements.";
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
$n12="Passwords Do Not Match.";
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

$insert="insert into tbl_laboratory values
(
'',
'$_POST[txt_name]',
'$_POST[txt_address]',
'$_POST[ddl_state]',
'$_POST[txt_city]',
'$_POST[txt_pincode]',
'$_POST[txt_contactnumber]',
'$_POST[txt_workinghours]',
'$_POST[txt_emailaddress]',
'$dest',
'$_POST[txt_password]',
'$_POST[txt_confirmpassword]',
'0'
)";
$query=mysql_query($insert);
?>
<script>window.location.href="login_laboratory.php";</script>
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
var s=document.lab_registration.ddl_state.value;
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

 <!-- START CONTENT -->
<div class="content">

  <!-- Start Page Header -->
  <div class="page-header">
    <div class="top">
         <img src="img/images.png" alt="icon" class="doclab_icon" style="margin-left:530px" width="150px" height="80px"><h1 style="margin-left:430px">LABORATORY REGISTRATION</h1>
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
              <form  method="post" class="form-horizontal" name="lab_registration" enctype="multipart/form-data">
			  
			 <div class="form-group has-success">
                  <label for="input8" class="col-sm-3 control-label form-label">Name :</label>
                  <div class="col-sm-5">
                      <input type="text" name="txt_name" class="form-control" id="nam" onblur="return c1()" value="<?php echo $_POST['txt_name'];?>" autofocus>
                  </div>
				  	   <div class="col-sm-4" id="name" style="color:#FF0000">
					   <?php echo $n1; ?>
					   </div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input8" class="col-sm-3 control-label form-label">Address :</label>
                  <div class="col-sm-5">
                      <input type="text" name="txt_address" class="form-control" id="add" onblur="return c2()" value="<?php echo $_POST['txt_address'];?>">
                  </div>
				  	   <div class="col-sm-4" id="address" style="color:#FF0000">
					   <?php echo $n2; ?>
					   </div>
                </div>
				
				
                  <div class="form-group has-success">
                  <label for="input6" class="col-sm-3 control-label form-label">State :</label>
                  <div class="col-sm-5">
                      <select name="ddl_state" class="form-control" id="sta" onblur="return c4()" onchange="fun_state()">
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
					   <?php echo $n4; ?>
					   </div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input7" class="col-sm-3 control-label form-label">City :</label>
                  <div class="col-sm-5">
                      <select name="txt_city" class="form-control" id="cit" onblur="return c5()"/>
					  <option>---------------Select---------------</option>
					  </select>
                  </div>
				  <div class="col-sm-4" id="city" style="color:#FF0000">
					<?php echo $n5; ?>
					</div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input8" class="col-sm-3 control-label form-label">Pincode :</label>
                  <div class="col-sm-5">
                      <input type="text" name="txt_pincode" class="form-control" id="pin" maxlength="6" onblur="return c6()" value="<?php echo $_POST['txt_pincode'];?>">
                  </div>
				  	   <div class="col-sm-4" id="pincode" style="color:#FF0000">
					   <?php echo $n6; ?>
					   </div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input8" class="col-sm-3 control-label form-label">Contact Number :</label>
                  <div class="col-sm-5">
                      <input type="text" name="txt_contactnumber" class="form-control" id="con" maxlength="10" onblur="return c7()" value="<?php echo $_POST['txt_contactnumber'];?>">
                  </div>
				  	   <div class="col-sm-4" id="contact" style="color:#FF0000">
					   <?php echo $n7; ?>
					   </div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input8" class="col-sm-3 control-label form-label">Working Hours :</label>
                  <div class="col-sm-5">
                      <input type="text" name="txt_workinghours" class="form-control" id="wor" onblur="return c8()" value="<?php echo $_POST['txt_workinghours'];?>">
                  </div>
				  	   <div class="col-sm-4" id="work" style="color:#FF0000">
					   <?php echo $n8; ?>
					   </div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input8" class="col-sm-3 control-label form-label">Email Address :</label>
                  <div class="col-sm-5">
                      <input type="text" name="txt_emailaddress" class="form-control" id="mail" onblur="return c9()" value="<?php echo $_POST['txt_emailaddress'];?>">
                  </div>
				  	   <div class="col-sm-4" id="email" style="color:#FF0000">
					   <?php echo $n9; ?>
					   </div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input8" class="col-sm-3 control-label form-label">Certification Proof :</label>
                  <div class="col-sm-5">
                      <input type="file" name="txt_certificationproof" class="form-control" id="proof" onblur="return c10()" value="<?php echo $_POST['txt_certificationproof'];?>">
                  </div>
				  	   <div class="col-sm-4" id="cerproof" style="color:#FF0000">
					   <?php echo $n10; ?>
					   </div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input8" class="col-sm-3 control-label form-label">Password :</label>
                  <div class="col-sm-5">
                      <input type="text" name="txt_password" class="form-control" id="pass" maxlength="16" onblur="return c11()" value="<?php echo $_POST['txt_password'];?>"><p style="color:#996600">1. Atleast One Capital Letter (A-Z)<br />2. Atleast One Digit (0-9)<br />3. Atleast One Special Character (!@#$%)<br />4. Length Between 8-16 Characters</p>
                  </div>
				  	   <div class="col-sm-4" id="password" style="color:#FF0000">
					   <?php echo $n11; ?>
					   </div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input8" class="col-sm-3 control-label form-label">Confirm Password :</label>
                  <div class="col-sm-5">
                      <input type="text" name="txt_confirmpassword" class="form-control" id="conpass" maxlength="16" onblur="return c12()" value="<?php echo $_POST['txt_confirmpassword'];?>">
                  </div>
				  	   <div class="col-sm-4" id="conpassword" style="color:#FF0000">
					   <?php echo $n12; ?>
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
 
</div>
<!-- End Footer -->


</div>
<!-- End Content -->
 <!-- //////////////////////////////////////////////////////////////////////////// --> 

<?php
include("footer.php");
?>