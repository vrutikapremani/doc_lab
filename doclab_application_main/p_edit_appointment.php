<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <title>Edit Appointment</title>
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


}
?>

<?php
if(isset($_POST['btn_submit']) && $count==0)
{
$tim=$_POST['ddl_hour'].':'.$_POST['ddl_min'].':'.$_POST['ddl_ap'];
$update="update tbl_appointment set appointment_date='$_POST[txt_date]' , appointment_time='$tim' where appointment_id='$_GET[edit_id]'";
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
    <h1 class="title">Make An Appointment</h1>

    <!-- Start Page Header Right Div -->
    <div class="right">
      <div class="btn-group" role="group" aria-label="...">
      </div>
    </div>
    <!-- End Page Header Right Div -->

  </div>
  <!-- End Page Header -->
  
<?php
 $sel="select * from tbl_appointment c1  ,tbl_doctor_fos c3 , tbl_doctor c4  where c1.appointment_id='$_GET[edit_id]' and c1.doc_id=c4.doc_id and c1.fos_id=c3.fos_id ";
 $query=mysql_query($sel);
 $ro=mysql_fetch_array($query);
 if($ro['member_id']==0)
 {
 $select="select * from tbl_appointment c1 , tbl_patient c3  where c1.pat_id=c3.pat_id  and c1.appointment_id='$_GET[edit_id]'";
 $q=mysql_query($select);
 $r=mysql_fetch_array($q);
 $name=$r['pat_first_name'];
 }
 else
 {
 $select="select * from tbl_appointment c1 , tbl_patient_member c3  where c1.member_id=c3.member_id  and c1.appointment_id='$_GET[edit_id]'";
 $q=mysql_query($select);
 $r=mysql_fetch_array($q);
 $name=$r['member_first_name'];
 
 }

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
			
              <form method="post" class="form-horizontal" name="p_appo" enctype="multipart/form-data">
			  
			  <div class="form-group has-success">
                  <label for="input7" class="col-sm-3 control-label form-label">Doctor's Specialization :</label>
                  <div class="col-sm-5">
                   <input type="text" name="ddl_fos" class="form-control" id="spe" value="<?php echo $ro['fos_type']; ?>" readonly>
                  </div>
				  	<div class="col-sm-4" id="special" style="color:#FF0000;">
					<?php echo $n1; ?>
					</div>
                </div>
			  
			 <div class="form-group has-success">
                  <label for="input7" class="col-sm-3 control-label form-label">Doctor :</label>
                  <div class="col-sm-5">
                   <input type="text" name="ddl_doc" class="form-control" id="doc" value="Dr.&nbsp;&nbsp;<?php echo ucfirst($ro['doc_first_name']);?>&nbsp;&nbsp;<?php echo ucfirst($ro['doc_last_name']);?>" readonly>
                  </div>
				  	<div class="col-sm-4" id="doctor" style="color:#FF0000;">
					<?php echo $n2; ?>
					</div>
                </div>
				
		
				<div class="form-group has-success" id="member">
                  <label for="input7" class="col-sm-3 control-label form-label">Patient Name :</label>
                  <div class="col-sm-5">
				  <input type="text" name="ddl_patient" class="form-control" id="pat" value="<?php echo ucfirst($name);?>" readonly>
                  </div>
				  <div class="col-sm-4" id="patient" style="color:#FF0000;">
					<?php echo $n3; ?>
					</div>
                </div>
				
				
				<div class="form-group has-success">
                  <label for="input7" class="col-sm-3 control-label form-label">Appointment Date :</label>
                  <div class="col-sm-5">
                            <input type="text" id="date-picker" class="form-control" name="txt_date" value="<?php echo $ro['appointment_date']; ?>"/> 
                    </div>
					<div class="col-sm-4" id="date" style="color:#FF0000;">
					<?php echo $n4; ?>
					</div>
       			 </div>
				
				<div class="form-group has-success">
                  <label for="input7" class="col-sm-3 control-label form-label">Appointment Time :</label>
                  <div class="col-sm-5">
				  <?php echo $a=$ro['appointment_time'];?>
				
				   <select name="ddl_hour"  id="hr" style="width:50px;">
                    <option></option>
					<option
					<?php
					  if(isset($_POST['ddl_hour']) && $_POST['ddl_hour']=='1')
					  {
					  echo "selected='selected'";
					  }
					  ?>
					>1</option>
					<option
					<?php
					  if(isset($_POST['ddl_hour']) && $_POST['ddl_hour']=='2')
					  {
					  echo "selected='selected'";
					  }
					  ?>
					>2</option>
					<option
					<?php
					  if(isset($_POST['ddl_hour']) && $_POST['ddl_hour']=='3')
					  {
					  echo "selected='selected'";
					  }
					  ?>
					>3</option>
					<option
					<?php
					  if(isset($_POST['ddl_hour']) && $_POST['ddl_hour']=='4')
					  {
					  echo "selected='selected'";
					  }
					  ?>
					>4</option>
					<option
					<?php
					  if(isset($_POST['ddl_hour']) && $_POST['ddl_hour']=='5')
					  {
					  echo "selected='selected'";
					  }
					  ?>
					>5</option>
					<option
					<?php
					  if(isset($_POST['ddl_hour']) && $_POST['ddl_hour']=='6')
					  {
					  echo "selected='selected'";
					  }
					  ?>
					>6</option>
					<option
					<?php
					  if(isset($_POST['ddl_hour']) && $_POST['ddl_hour']=='7')
					  {
					  echo "selected='selected'";
					  }
					  ?>
					>7</option>
					<option
					<?php
					  if(isset($_POST['ddl_hour']) && $_POST['ddl_hour']=='8')
					  {
					  echo "selected='selected'";
					  }
					  ?>
					>8</option>
					<option
					<?php
					  if(isset($_POST['ddl_hour']) && $_POST['ddl_hour']=='9')
					  {
					  echo "selected='selected'";
					  }
					  ?>
					>9</option>
					<option
					<?php
					  if(isset($_POST['ddl_hour']) && $_POST['ddl_hour']=='10')
					  {
					  echo "selected='selected'";
					  }
					  ?>
					>10</option>
					<option
					<?php
					  if(isset($_POST['ddl_hour']) && $_POST['ddl_hour']=='11')
					  {
					  echo "selected='selected'";
					  }
					  ?>
					>11</option>
					<option
					<?php
					  if(isset($_POST['ddl_hour']) && $_POST['ddl_hour']=='12')
					  {
					  echo "selected='selected'";
					  }
					  ?>
					>12</option>				    
					</select>&nbsp;: 
					<select name="ddl_min"  id="min" style="width:50px;" >
                    <option></option>
					<option
					<?php
					  if(isset($_POST['ddl_min']) && $_POST['ddl_min']=='00')
					  {
					  echo "selected='selected'";
					  }
					  ?>
					>00</option>
					<option
					<?php
					  if(isset($_POST['ddl_min']) && $_POST['ddl_min']=='30')
					  {
					  echo "selected='selected'";
					  }
					  ?>
					>30</option>
					</select>
					<select name="ddl_ap"  id="ap" onblur="return c5()" style="width:60px;" >
                    <option></option>
					<option
					<?php
					  if(isset($_POST['ddl_ap']) && $_POST['ddl_ap']=='AM')
					  {
					  echo "selected='selected'";
					  }
					  ?>
					>AM</option>
					<option
					<?php
					  if(isset($_POST['ddl_ap']) && $_POST['ddl_ap']=='PM')
					  {
					  echo "selected='selected'";
					  }
					  ?>
					>PM</option>
					</select>
					</div>
					<div class="col-sm-4" id="time" style="color:#FF0000;">
					<?php echo $n5; ?>
					</div>
        </div>
			
				<div class="form-group has-success">
                  <label for="input7" class="col-sm-3 control-label form-label">Appointment Specification :</label>
                  <div class="col-sm-5">
                      <textarea type="text" name="txt_specification" class="form-control" id="spec" readonly><?php echo $ro['appointment_specification'];?></textarea>
                  </div>
				  <div class="col-sm-4" id="specify" style="color:#FF0000;">
					<?php echo $n6; ?>
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
    format: 'YYYY-MM-DD h:mm A'
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
