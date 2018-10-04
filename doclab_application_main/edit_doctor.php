<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <title>Edit Profile</title>
</head>
</html>

<?php
session_start();
error_reporting(0);
include("header_doctor.php");
include("connection.php");
include("sidebar_doctor.php");
?>
<?php
if($_SESSION['firstname']=="")
{
?>
<script>window.location.href="login_doctor.php";</script>
<?php
}
?>

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

//Secondary Visit Fees
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

}
?>
<!-- END OF VALIDATION-->


<?php
if(isset($_POST['btn_submit']) && $count==0)
{
$update="update tbl_doctor set doc_first_name='$_POST[txt_firstname]',doc_middle_name='$_POST[txt_middlename]', doc_last_name='$_POST[txt_lastname]', doc_address='$_POST[txt_address]', doc_state='$_POST[ddl_state]', doc_city='$_POST[ddl_city]', doc_pincode='$_POST[txt_pincode]', doc_mobile_number='$_POST[txt_mobilenumber]', doc_email_id='$_POST[txt_emailaddress]', doc_field_of_specialization='$_POST[txt_fieldofspecialization]', doc_certification_proof='$_POST[txt_certificationproof]', doc_consultation_fees='$_POST[txt_fees]', doc_first_visit_fee='$_POST[txt_1fees]' where doc_id='$_SESSION[doc_id]'";
$query=mysql_query($update);
?>
<script>alert("Updated Successfully");</script>
<?php
}
?>

<script type="text/javascript">
function fun_state()
{
var s=document.edit_doctor.ddl_state.value;
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
$select="select * from tbl_doctor where doc_id='$_SESSION[doc_id]'";
$query=mysql_query($select);
$row_doctor=mysql_fetch_array($query);
$st=$row_doctor['doc_state'];
$fos=$row_doctor['doc_field_of_specialization'];
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
              <form  method="post" class="form-horizontal" name="edit_doctor">
			  
			  <div class="form-group has-success">
                  <label for="input6" class="col-sm-3 control-label form-label">Salutation :</label>
                  <div class="col-sm-5">
                      <input class="form-control" type="text" name="salu" placeholder="Dr." readonly>
                  </div>
				       <div class="col-sm-4" id="salutation" style="color:#FF0000">
					   <?php echo $n1; ?>
					   </div>
                </div>
				
				
				<div class="form-group has-success">
                  <label for="input6" class="col-sm-3 control-label form-label">First Name :</label>
                  <div class="col-sm-5">
                      <input type="text" name="txt_firstname" class="form-control" id="fn" value="<?php echo $row_doctor['doc_first_name'];?>">
                  </div>
				  	   <div class="col-sm-4" id="firstname" style="color:#FF0000">
					   <?php echo $n2; ?>
					   </div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input6" class="col-sm-3 control-label form-label">Middle Name :</label>
                  <div class="col-sm-5">
                      <input type="text" name="txt_middlename" class="form-control" id="mn" value="<?php echo $row_doctor['doc_middle_name'];?>">
                  </div>
				  	   <div class="col-sm-4" id="middlename" style="color:#FF0000">
					   <?php echo $n3; ?>
					   </div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input6" class="col-sm-3 control-label form-label">Last Name :</label>
                  <div class="col-sm-5">
                      <input type="text" name="txt_lastname" class="form-control" id="ln" value="<?php echo $row_doctor['doc_last_name'];?>">
                  </div>
				  	   <div class="col-sm-4" id="lastname" style="color:#FF0000">
					   <?php echo $n4; ?>
					   </div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input6" class="col-sm-3 control-label form-label">Address :</label>
                  <div class="col-sm-5">
                      <textarea type="text" name="txt_address" class="form-control" id="add"><?php echo $row_doctor['doc_address'];?></textarea>
                  </div>
				  	   <div class="col-sm-4" id="address" style="color:#FF0000">
					   <?php echo $n5; ?>
					   </div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input6" class="col-sm-3 control-label form-label">State :</label>
                  <div class="col-sm-5">
                      <select name="ddl_state" class="form-control" id="sta" onblur="return c5()" onchange="fun_state()">
					  <option><?php echo $row_doctor['doc_state'];?></option>
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
					   <?php echo $n5; ?>
					   </div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input7" class="col-sm-3 control-label form-label">City :</label>
                  <div class="col-sm-5">
                      <select name="txt_city" class="form-control" id="cit" onblur="return c6()"/>
					  <option><?php echo $row_doctor['doc_city'];?></option>
					  </select>
                  </div>
				  <div class="col-sm-4" id="city" style="color:#FF0000">
					<?php echo $n6; ?>
					</div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input6" class="col-sm-3 control-label form-label">Pincode :</label>
                  <div class="col-sm-5">
                      <input type="text" name="txt_pincode" class="form-control" id="pin" maxlength="6" value="<?php echo $row_doctor['doc_pincode'];?>">
                  </div>
				  	   <div class="col-sm-4" id="pincode" style="color:#FF0000">
					   <?php echo $n9; ?>
					   </div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input6" class="col-sm-3 control-label form-label">Mobile Number :</label>
                  <div class="col-sm-5">
                      <input type="text" name="txt_mobilenumber" class="form-control" id="mob" maxlength="10" value="<?php echo $row_doctor['doc_mobile_number'];?>">
                  </div>
				  	   <div class="col-sm-4" id="mobile" style="color:#FF0000">
					   <?php echo $n10; ?>
					   </div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input6" class="col-sm-3 control-label form-label">Email Address :</label>
                  <div class="col-sm-5">
                      <input type="text" name="txt_emailaddress" class="form-control" id="mail" value="<?php echo $row_doctor['doc_email_id'];?>">
                  </div>
				  	   <div class="col-sm-4" id="email" style="color:#FF0000">
					   <?php echo $n11; ?>
					   </div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input6" class="col-sm-3 control-label form-label">Field Of Specialization :</label>
                  <div class="col-sm-5">
				  	<select name="ddl_fos" class="form-control" id="fos" >
				  <option><?php echo $fos;?></option>
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
				  	<input type="text" name="txt_fees" class="form-control" id="fee" value="<?php echo $row_doctor['doc_consultation_fees'];?>">
                  </div>
				  	   <div class="col-sm-4" id="fees" style="color:#FF0000">
					   <?php echo $n14; ?>
					   </div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input6" class="col-sm-3 control-label form-label">Secondary Visit Fees:</label>
                  <div class="col-sm-5">
				  	<input type="text" name="txt_1fees" class="form-control" id="fee1" value="<?php echo $row_doctor['doc_first_visit_fee'];?>">
                  </div>
				  	   <div class="col-sm-4" id="fees1" style="color:#FF0000">
					   <?php echo $n15; ?>
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
include("footer1.php");
?>