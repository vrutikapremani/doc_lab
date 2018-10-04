<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <title>Make An Appointment</title>
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

//Symptom Selection
$sym=$_POST['ddl_sym'];
if($sym=="---------------Select---------------")
{
?>
<style>
#sym
{
border:solid 1px red;
}
</style>
<?php
$n0="Select The Symptom.";
$count++;
}

//Doctor Specialization
$fos=$_POST['ddl_fos'];
if($fos=="---------------Select---------------")
{
?>
<style>
#spe
{
border:solid 1px red;
}
</style>
<?php
$n1="Select The Doctor Type.";
$count++;
}


//Doctor Selection
$doctor=$_POST['ddl_doctor'];
if($doctor=="---------------Select---------------")
{
?>
<style>
#doc
{
border:solid 1px red;
}
</style>
<?php
$n2="Select The Doctor.";
$count++;
}

//Patient Selection
/*$patient=$_POST['ddl_patient'];
if($patient=="---------------Select---------------")
{
?>
<style>
#pat
{
border:solid 1px red;
}
</style>
<?php
$n3="Select The Patient.";
$count++;
}*/

//Appointment Date
$date=$_POST['txt_date'];
$d=date(m)."/".date(d)."/".date(Y);
if($date=="")
{
?>
<style>
#date-picker
{
border:solid 1px red;
}
</style>
<?php
$n4="Select The Date For Appointment.";
$count++;
}
elseif($date<$d)
{
?>
<style>
#date-picker
{
border:solid 1px red;
}
</style>
<?php
$n4="Select Appropriate Date For Appointment.";
$count++;
}

//Appointment Time
/*$time=$_POST['txt_time'];
if($time=="")
{
?>
<style>
#tim
{
border:solid 1px red;
}
</style>
<?php
$n5="Select Time.";
$count++;
}*/

//Appointment Specification
$specification=$_POST['txt_specification'];
if($specification=="")
{
?>
<style>
#spec
{
border:solid 1px red;
}
</style>
<?php
$n6="Enter The Reason For Appointment.";
$count++;
}

//Captcha 
$captcha=$_POST['txt_captcha'];
if($captcha=="")
{
?>
<style>
#cap
{
border:solid 1px red;
}
</style>
<?php
$n7="Enter The Captcha.";
$count++;
}
elseif($_SESSION['captcha']!=$_POST['txt_captcha'])
{
?>
<style>
#cap
{
border:solid 1px red;
}
</style>
<?php
$n7="Captcha Does Not Match.";
$count++;
}


}
?>

<!-- INSERT -->
<?php
if(isset($_POST['btn_submit']) && $count==0)
{
$d=date(d)."/".date(m)."/".date(Y);
$day=$_POST['txt_date'];
$sel="select * from tbl_patient_member where member_id='$_POST[ddl_patient]'";
$query=mysql_query($sel);
$ro=mysql_fetch_array($query);



$mem=$_POST['ddl_patient'];

if($mem=="---------------Select---------------")
{
$tim=$_POST['ddl_hour'].':'.$_POST['ddl_min'].' '.$_POST['ddl_ap'];


$se="select * from tbl_appointment where appointment_date='$_POST[txt_date]' and appointment_time='$tim' and doc_id='$_POST[ddl_doctor]'";
$q=mysql_query($se);
$n=mysql_num_rows($q);
if($n==0)
{

$se1="select * from tbl_appointment where appointment_date='$_POST[txt_date]' and doc_id='$_POST[ddl_doctor]'";
$q1=mysql_query($se1);
$n1=mysql_num_rows($q1);
if($n1<20)
{
$insert="insert into tbl_appointment values
(
'',
'$_SESSION[pat_unique]',
'$_POST[ddl_sym]',
'$_POST[ddl_fos]',
'$_POST[ddl_doctor]',
'$_SESSION[pat_id]',
'',
'$_POST[txt_date]',
'$tim',
'$_POST[txt_specification]',
'0'
)";
$query=mysql_query($insert);
?>
<script>
alert("Appointment Taken Successfully."); 
</script>
<?php
}
else
{
?>
<script>
alert("Appointment Is Full Today."); 
</script>
<?php

}
}
else
{
?>
<script>
alert("Appointment Already Taken"); 
</script>
<?php

}
}
else
{


$se="select * from tbl_appointment where appointment_date='$_POST[txt_date]' and appointment_time='$tim' and doc_id='$_POST[ddl_doctor]'";
$q=mysql_query($se);
$n=mysql_num_rows($q);
if($n==0)
{



$se1="select * from tbl_appointment where appointment_date='$_POST[txt_date]' and doc_id='$_POST[ddl_doctor]'";
$q1=mysql_query($se1);
$n1=mysql_num_rows($q1);
if($n1<20)
{
$tim=$_POST['ddl_hour'].':'.$_POST['ddl_min'].' '.$_POST['ddl_ap'];
$insert="insert into tbl_appointment values
(
'',
'$ro[member_unique_id]',
'$_POST[ddl_sym]',
'$_POST[ddl_fos]',
'$_POST[ddl_doctor]',
'$_SESSION[pat_id]',
'$_POST[ddl_patient]',
'$_POST[txt_date]',
'$tim',
'$_POST[txt_specification]',
'0'
)";
$query=mysql_query($insert);
?>
<script>
alert("Appointment Taken Successfully."); 
</script>
<?php
}
else
{
?>
<script>
alert("Appointment Is Full Today."); 
</script>
<?php

}
}
else
{
?>
<script>
alert("Appointment Already Taken."); 
</script>
<?php

}
}
}

?>

 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTENT -->
<div class="content">


  <!-- Start Page Header -->
  <div class="page-header">
   <h1 class="title">Make An Appointment</h1>

    <!-- Start Page Header Right Div -->
    <div class="right">
      <div class="btn-group" role="group" aria-label="...">
      </div>
    </div>
    <!-- End Page Header Right Div -->

  </div>
  <!-- End Page Header -->
<script type="text/javascript">
function doc_lab()
{

//alert();
var type=document.getElementById("spe").value;
$.ajax({
type:"GET",
url:"action_doctor_spec.php",
data:{type:type},
success:function(response){
$("#doc").html(response);
}
});
}

function select_sym()
{

//alert();
var type=document.getElementById("sym").value;
$.ajax({
type:"GET",
url:"action_doctor_sym.php",
data:{type:type},
success:function(response){
$("#spe").html(response);
}
});
}
</script>

<script>
$(document).ready(function(){
 $("#member").hide();
 $(".btn_radio").click(function (e) {
     var checked_option_radio = $("input[name=rbt_appointment]:checked").val();
     if(checked_option_radio===undefined){
          alert('Please select options!');
		  $("#member").hide();

     }else{
         $("#member").show();
          $('#valueee').html(checked_option_radio);  
     }
    });
});
</script>
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
			
              <form method="post" class="form-horizontal" name="p_appo" enctype="multipart/form-data">
			  
			  <div class="form-group has-success">
                  <label for="input7" class="col-sm-3 control-label form-label">Symptom :</label>
                  <div class="col-sm-5">
                  <select name="ddl_sym" class="form-control" id="sym"  onchange="select_sym()" autofocus>
				  <option>---------------Select---------------</option>
                    <?php
					$select="select * from tbl_symptom";
					$query=mysql_query($select);
					while($row=mysql_fetch_array($query))
					{
					?>
					<option value="<?php echo $row['sym_id'];?>"  
					><?php echo ucfirst($row['sym_name']);?></option>
					<?php
					}
					?>
					</select>
                  </div>
				  	<div class="col-sm-4" id="symptom" style="color:#FF0000;">
					<?php echo $n0; ?>
					</div>
                </div>
				
			  <div class="form-group has-success">
                  <label for="input7" class="col-sm-3 control-label form-label">Doctor's Specialization :</label>
                  <div class="col-sm-5">
                  <select name="ddl_fos" class="form-control" id="spe" onchange="doc_lab()" >
					</select>
                  </div>
				  	<div class="col-sm-4" id="special" style="color:#FF0000;">
					<?php echo $n1; ?>
					</div>
                </div>
			  
			 <div class="form-group has-success">
                  <label for="input7" class="col-sm-3 control-label form-label">Doctor :</label>
                  <div class="col-sm-5">
                  <select name="ddl_doctor" class="form-control" id="doc" >
				</select>
                  </div>
				  	<div class="col-sm-4" id="doctor" style="color:#FF0000;">
					<?php echo $n2; ?>
					</div>
                </div>
				
				
				<div class="form-group has-success">
                  <label for="input7" class="col-sm-3 control-label form-label">Appointment  :</label>
                  <div class="col-sm-5">
                  
				  	  <div class="radio radio-danger">
                        <input type="radio" name="rbt_appointment" id="radio3" checked>
                        <label for="radio3">
                            Self
                        </label>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="rbt_appointment" id="radio4" class="btn_radio" value="" >
                        <label for="radio4">
                            Family Member
                        </label>
                    </div>
					</div>
        </div>
		
		
				<div class="form-group has-success" id="member">
                  <label for="input7" class="col-sm-3 control-label form-label">Patient Name :</label>
                  <div class="col-sm-5">
				  	<select name="ddl_patient" class="form-control" id="pat">
                    <option>---------------Select---------------</option>
				    <?php
					$select1="select * from tbl_patient c1 , tbl_patient_member c2 where c1.pat_id=c2.pat_id and c1.pat_id='$_SESSION[pat_id]'";
					$query1=mysql_query($select1);
					while($row1=mysql_fetch_array($query1))
					{
					?>
					<option value="<?php echo $row1['member_id'];?>"><?php echo $row1['member_salutation'];?>&nbsp;<?php echo ucfirst($row1['member_first_name']);?>&nbsp;<?php echo ucfirst($row1['member_middle_name']);?>&nbsp;<?php echo ucfirst($row1['member_last_name']);?></option>
					<?php
					}
					?>
					</select>
                  </div>
				  <div class="col-sm-4" id="patient" style="color:#FF0000;">
					<?php echo $n3; ?>
					</div>
                </div>
				
				
				<div class="form-group has-success">
                  <label for="input7" class="col-sm-3 control-label form-label">Appointment Date :</label>
                  <div class="col-sm-5">
                            <input type="text" id="date-picker" class="form-control" name="txt_date"/> 
                    </div>
					<div class="col-sm-4" id="date" style="color:#FF0000;">
					<?php echo $n4; ?>
					</div>
       			 </div>
			
				
				<div class="form-group has-success">
                  <label for="input7" class="col-sm-3 control-label form-label">Appointment Time :</label>
                  <div class="col-sm-5">
				   <select name="ddl_hour"  id="hr" style="width:50px;">
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
					<select name="ddl_min"  id="min" style="width:50px;" >
                    <option></option>
					<option>00</option>
					<option>30</option>
					</select>
					<select name="ddl_ap"  id="ap" onblur="return c5()" style="width:60px;" >
                    <option></option>
					<option>AM</option>
					<option>PM</option>
					</select>
					</div>
					<div class="col-sm-4" id="time" style="color:#FF0000;">
					<?php echo $n5; ?>
					</div>
        </div>
			
				<div class="form-group has-success">
                  <label for="input7" class="col-sm-3 control-label form-label">Appointment Specification :</label>
                  <div class="col-sm-5">
                      <textarea type="text" name="txt_specification" class="form-control" id="spec"></textarea>
                  </div>
				  <div class="col-sm-4" id="specify" style="color:#FF0000;">
					<?php echo $n6; ?>
					</div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input7" class="col-sm-3 control-label form-label">Captcha:</label>
                  <div class="col-sm-5">
                      <img src="captcha.php" align="left" height="30px" alt="captcha image">
				<br /><br />
				<input type="text" name="txt_captcha" size="6" maxlength="6" class="form-control" id="cap">
                  </div>
				  <div class="col-sm-4" id="captcha" style="color:#FF0000;">
				  	<br /><br /><?php echo $n7; ?>
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


<!-- ================================================
jQuery Library
================================================ -->
<script type="text/javascript" src="js/jquery.min.js"></script>

<!-- ================================================
Bootstrap Core JavaScript File
================================================ -->
<script src="js/bootstrap/bootstrap.min.js"></script>

<!-- ================================================
Plugin.js - Some Specific JS codes for Plugin Settings
================================================ -->
<script type="text/javascript" src="js/plugins.js"></script>

<!-- ================================================
Bootstrap Select
================================================ -->
<script type="text/javascript" src="js/bootstrap-select/bootstrap-select.js"></script>

<!-- ================================================
Bootstrap Toggle
================================================ -->
<script type="text/javascript" src="js/bootstrap-toggle/bootstrap-toggle.min.js"></script>

<!-- ================================================
Moment.js
================================================ -->
<script type="text/javascript" src="js/moment/moment.min.js"></script>

<!-- ================================================
Bootstrap Date Range Picker
================================================ -->
<script type="text/javascript" src="js/date-range-picker/daterangepicker.js"></script>


<!-- Basic Date Range Picker -->
<script type="text/javascript">
$(document).ready(function() {
  $('#date-range-picker').daterangepicker(null, function(start, end, label) {
    console.log(start.toISOString(), end.toISOString(), label);
  });
});
</script>

<!-- Basic Single Date Picker -->
<script type="text/javascript">
$(document).ready(function() {
  $('#date-picker').daterangepicker({ singleDatePicker: true }, function(start, end, label) {
    console.log(start.toISOString(), end.toISOString(), label);
  });
});
</script>

<!-- Date Range and Time Picker -->
<script type="text/javascript">
$(document).ready(function() {
  $('#date-range-and-time-picker').daterangepicker({
    timePicker: true,
    timePickerIncrement: 30,
    format: 'h:mm A'
  }, function(start, end, label) {
    console.log(start.toISOString(), end.toISOString(), label);
  });
});
</script>


	<script src="assets/vendor/modernizr/modernizr.js"></script>

		<!-- Vendor -->
	
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
</body>
</html>