<?php
error_reporting(0);
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <title>Prescription</title>
</head>
</html>
	
		
<script type="text/javascript" src="js/jquery.min.js"></script>
<script>
$(document).ready(function(){
$("#display").hide();
$("#btn_lab").click(function(){
$("#display").show();
$("#display1").hide();
$("#next_appointment").hide();
});
$("#display1").hide();
$("#btn_med").click(function(){
$("#display1").show();
$("#display").hide();
$("#next_appointment").hide();
});

$("#next_appointment").hide();
$("#btn_appointment").click(function(){
$("#next_appointment").show();
$("#display").hide();
$("#display1").hide();
});
});
</script>		
		
		
		
		
		

<script type="text/javascript">
function change_report()
{
var r_id=document.getElementById("c2").value;
$.ajax({
type:"GET",
url:"action_test.php",
data:{r_id:r_id},
success:function(response){
$("#test").html(response);
}
});
}

function change_name()
{
var name_id=document.getElementById("c4").value;
alert(name_id);
$.ajax({
type:"GET",
url:"action_test.php",
data:{name_id:name_id},
success:function(response){
$("#name").html(response);
}
});
}
</script>

<?php
error_reporting(0);
session_start();
include("header_doctor.php");
include("sidebar_doctor.php");
include("connection.php");
?>
<?php
if($_SESSION['firstname']=="")
{
?>
<script>window.location.href="login_ldoctor.php";</script>
<?php
}
?>

<!-- CHECKED + INSERT -->
<?php
if(isset($_POST['btn_invoice']))
{
$update="update tbl_appointment set appointment_status=3 where  
appointment_id='$_GET[checked_id]'";
$query=mysql_query($update);


$sel="select * from tbl_appointment c1 , tbl_doctor c2 where c1.appointment_id='$_GET[checked_id]' and c1.doc_id=c2.doc_id";
$qu=mysql_query($sel);
$row=mysql_fetch_array($qu);


$select="select * from tbl_doctor_invoice where sym_id='$row[sym_id]'";
$q=mysql_query($select);
$n=mysql_num_rows($q);
if($n>0)
{

$select="select * from tbl_doctor where doc_id='$_SESSION[doc_id]'";
$q=mysql_query($select);
$r1=mysql_fetch_array($q);

$s="select * from tbl_doctor_invoice where appointment_date='$row[appointment_date]' and appointment_id='$row[appointment_id]'";
$q=mysql_query($s);
$r=mysql_num_rows($q);
if($r==0)
{
$ins="insert into tbl_doctor_invoice values
(
'',
'$row[appo_unique_id]',
'$row[pat_id]',
'$row[sym_id]',
'$row[member_id]',
'$row[doc_id]',
'$row[appointment_id]',
'$row[appointment_date]',
now(),
'$r1[doc_first_visit_fee]',
'2',
'0'
)";
$q=mysql_query($ins);
?>
<script>alert("Invoice Generated.");</script>
<?php
}
else
{
?>
<script>alert("Already Generated.");</script>
<?php

}
}
else
{
$select="select * from tbl_doctor where doc_id='$_SESSION[doc_id]'";
$q=mysql_query($select);
$r1=mysql_fetch_array($q);

$s="select * from tbl_doctor_invoice where appointment_date='$row[appointment_date]' and appointment_id='$row[appointment_id]'";
$q=mysql_query($s);
$r=mysql_num_rows($q);
if($r==0)
{

$ins="insert into tbl_doctor_invoice values
(
'',
'$row[appo_unique_id]',
'$row[pat_id]',
'$row[sym_id]',
'$row[member_id]',
'$row[doc_id]',
'$row[appointment_id]',
'$row[appointment_date]',
now(),
'$r1[doc_consultation_fees]',
'1',
'0'
)";
$q=mysql_query($ins);
?>
<script>alert("Invoice Generated.");</script>
<?php
}
else
{
?>
<script>alert("Already Generated.");</script>
<?php

}
}


}
?>	
<!-- VALIDATION -->
<?php
$count="";
if(isset($_POST['btn_submit']))
{

//Laboratory Name
/*$laboratory=$_POST['ddl_laboratory'];
if($laboratory=="---------------Select---------------")
{
?>
<style>
#c1
{
border:solid 1px red;
}
</style>
<?php
$n1="Select The Laboratory.";
$count++;
}

//Report Name
$report=$_POST['ddl_report'];
if($report=="---------------Select---------------")
{
?>
<style>
#c2
{
border:solid 1px red;
}
</style>
<?php
$n2="Select The Report.";
$count++;
}*/

//Test Name
$test=$_POST['chk_testname'];
if($test=="")
{
?>
<style>
#c3
{
border:solid 1px red;
}
</style>
<?php
$n3="Select Atleast One.";
$count++;
}

}
?>



<!-- INSERT -->

<?php
if(isset($_POST['btn_submit']))
{
		$test_id=implode(',',$_POST['ddl_test']);
	
				
$insert="insert into tbl_doctor_prescription_report values
(
'',
'$_GET[checked_id]',
'$_POST[unique_id]',
'$_POST[ddl_laboratory]',
'$test_id',
'0'
)";
$query=mysql_query($insert);


	}
?>


<?php
if(isset($_POST['btn_submit1']))
	{
		$type_id=implode(',',$_POST['ddl_type']);
	
				
$insert="insert into tbl_doctor_prescription_medicine values
(
'',
'$_GET[checked_id]',
'$type_id',
'0'
)";
$query=mysql_query($insert);


	}
?>
 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTENT -->
<div class="content">


  <!-- Start Page Header -->
  <div class="page-header">
    <h1 class="title">Choose A Prescription Method</h1>

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

<!-- SELECT -->
<?php
$select="select * from tbl_appointment c1, tbl_patient c2 where c1.appointment_id='$_GET[checked_id]' and c1.pat_id=c2.pat_id";
$query=mysql_query($select);
$row=mysql_fetch_array($query);
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
              <form  method="post" class="form-horizontal">
			  <input type="hidden" name="unique_id" value="<?php echo $row['appo_unique_id'];?>" />
				
				<div class="form-group has-success">
                  <label for="input7" class="col-sm-3 control-label form-label">Patient Name :</label>
                  <div class="col-sm-5">
                      <?php
				if($row['member_id']==0)
				{
				$sel="select * from  tbl_patient where unique_id='$row[appo_unique_id]'";
				$qu=mysql_query($sel);
				$r=mysql_fetch_array($qu);
				?>
				<input type="text" name="txt_patient_name" class="form-control" value="<?php echo ucfirst($r['pat_first_name']); ?>&nbsp;&nbsp;<?php echo ucfirst($r['pat_middle_name']); ?>&nbsp;&nbsp;<?php echo ucfirst($r['pat_last_name']); ?>" readonly style="text-align:left;"/>												  				<?php
				}
				else
				{
				$sel="select * from  tbl_patient_member where member_unique_id='$row[appo_unique_id]'";
				$qu=mysql_query($sel);
				$rr=mysql_fetch_array($qu);
				?>
				 <input type="text" name="txt_patient_name" class="form-control" value="<?php echo ucfirst($rr['member_first_name']); ?>&nbsp;&nbsp;<?php echo ucfirst($rr['member_middle_name']); ?>&nbsp;&nbsp;<?php echo ucfirst($rr['member_last_name']); ?>" readonly style="text-align:left;"/>		
				<?php
				}
				?>
                  </div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input7" class="col-sm-3 control-label form-label">Appointment Date :</label>
               	  <div class="col-sm-5">
 						<input type="text" name="txt_date" class="form-control" value="<?php echo $row['appointment_date'];?>" readonly/>
              </div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input7" class="col-sm-3 control-label form-label">Appointment Time :</label>
               	  <div class="col-sm-5">
 						<input type="text" name="txt_time" class="form-control" value="<?php echo $row['appointment_time'];?>" readonly/>
              </div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input7" class="col-sm-3 control-label form-label">Appointment Specification :</label>
               	  <div class="col-sm-5">
 						<input type="text" name="txt_specification" class="form-control" value="<?php echo $row['appointment_specification'];?>" readonly/>
              </div>
                </div>
				
					<div class="form-group has-success">
                  <div class="col-sm-2">
				</div>    
                  <div class="col-sm-10">
				  <center>
                    <button type="button" class="btn btn-danger btn-icon btn-sm" id="btn_lab"><i class="fa fa-file"></i><span class="badge">LAB REPORTS</span></button>
					  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					   <button type="button" class="btn btn-danger btn-icon btn-sm" id="btn_med"><i class="fa fa-plus-square"></i><span class="badge">MEDICINES</span></button>
					   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					   <button type="button" class="btn btn-danger btn-icon btn-sm" id="btn_appointment"><i class="fa fa-calendar"></i><span class="badge">NEXT APPOITMENT</span></button>
					    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					   <button type="submit" class="btn btn-danger btn-icon btn-sm" name="btn_invoice" id="btn_invoice"><i class="fa fa-credit-card"></i><span class="badge">GENERATE INVOICE</span></button>
					  </center>
              
                </div>
		<!----------------------------------LABORATORY REPORTS-----------------------------------------> 
				<br /><br />
				
				<div style="height:400px; width:1000px; border:solid 2px red; overflow:auto" id="display">
				<br /><br />
				
				<div class="form-group has-success">
                  <label for="input7" class="col-sm-3 control-label form-label">Laboratory Name :</label>
                  <div class="col-sm-5">
                  <select name="ddl_laboratory" class="form-control" id="c1" >
				  <option>---------------Select---------------</option>
                    <?php
					$select="select * from tbl_laboratory";
					$query=mysql_query($select);
					while($row=mysql_fetch_array($query))
					{
					?>
					<option value="<?php echo $row['lab_id'];?>"  
					<?php
					if(isset($_POST['ddl_laboratory']) && $_POST['ddl_laboratory']==$laboratory || $laboratory==$row['lab_id'])
					{
					echo "selected='selected'";
					}
					?>
					><?php echo ucfirst($row['lab_name']);?></option>
					<?php
					}
					?>
					</select>
                  </div>
				  	<div class="col-sm-4" id="validation_alert">
					<?php echo $n1; ?>
					</div>
                </div>
				
				
				<div class="form-group has-success">
                  <label for="input7" class="col-sm-3 control-label form-label">Test Name :</label>
                  <div class="col-sm-5">
                    <select multiple data-plugin-selectTwo style="width:400px;" name="ddl_test[]">
			   		<?php
					include("connection.php");
					$select2="select * from tbl_medical_test";
					$query2=mysql_query($select2);
					while($row2=mysql_fetch_array($query2))
					{
					?>
					<div>
                   <option value="<?php echo $row2['med_test_name'];?>"  /> 
                    <?php echo $row2['med_test_name'];?></option>
                    </div>
                 	<?php
					}
					?>							
					</select>
                  </div>
				  	<div class="col-sm-4" id="validation_alert">
					<?php echo $n1; ?>
					</div>
                </div>
				
				
				
					
							<div class="form-group has-success">
                  <label for="input7" class="col-sm-12 control-label form-label"></label>
                  <div class="col-sm-0" >
           <center> <input type="submit" name="btn_submit" value="Submit" class="btn-default" >
					  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					  <input type="reset" name="btn_reset" value="Clear" class="btn-default">
					  </center>
				
                  </div>
		
				
					
                </div>
				</div>
				</div>
				
				
				
				
				<!-----------------------------------------------MEDICINES------------------------------------------------->
				
				<div style="height:400px; width:1000px; border:solid 2px red; overflow:auto" id="display1">
				<br /><br />
				<div class="form-group has-success">
                   <label for="input7" class="col-sm-3 control-label form-label" style="">Medicine Name :</label>
                  <div class="col-sm-7">
                    <select multiple data-plugin-selectTwo style="width:400px;" name="ddl_type[]">
			   		<?php
					include("connection.php");
					$select3="select * from tbl_medicine_name where med_name_status=0";
					$query3=mysql_query($select3);
					while($row3=mysql_fetch_array($query3))
					{
					?>
					<div>
                   <option value="<?php echo $row3['med_name'];?>"  /> 
                    <?php echo $row3['med_name'];?></option>
                    </div>
                 	<?php
					}
					?>							
					</select>
                  </div>
				  	<div class="col-sm-2" id="validation_alert">
					<?php echo $n1; ?>
					</div>
                </div>
				
					<br /><br />
					<div class="form-group has-success">
                  <label for="input6" class="col-sm-12 control-label form-label"></label>
                  <div class="col-sm-0">
                     <center> <input type="submit" name="btn_submit1" value="Submit" class="btn-default" >
					  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					  <input type="reset" name="btn_reset" value="Clear" class="btn-default">
					  </center>
                  </div>
                </div>
                </div>
				
				
			
		
		<!-----------------------------------------------------------------next appointment---------------------------->
		
				<div style="height:400px; width:1000px; border:solid 2px red; overflow:auto" id="next_appointment">
				<br /><br />
				
				<div class="form-group has-success">
                  <label for="input7" class="col-sm-3 control-label form-label">Appointment Date :</label>
                  <div class="col-sm-5">
                            <input type="text" id="date-picker" class="form-control" name="txt_date" /> 
                    </div>
					<div class="col-sm-4" id="time" style="color:#FF0000;">
					<?php echo $n5; ?>
					</div>
        </div>
				<?php
				if(isset($_POST['btn_submit2']))
				{
				$sel1="select * from tbl_appointment c1 , tbl_doctor c2 , tbl_patient c3 where c1.appointment_id='$_GET[checked_id]' and c1.doc_id=c2.doc_id and c1.pat_id=c3.pat_id";
				$qu1=mysql_query($sel1);
				$row1=mysql_fetch_array($qu1);
 				$tim=$_POST['ddl_hour'].':'.$_POST['ddl_min'].':'.$_POST['ddl_ap'];
				
				$in="insert into tbl_appointment values
				(
				'',
				'$row1[unique_id]',
				'$row1[doc_field_of_specialization]',
				'$row1[doc_id]',
				'$row1[pat_id]',
				'',
				'$_POST[txt_date]',
				'$tim',
				'',
				'0'
				)";
				$qu2=mysql_query($in);
				}
				?>
				
				<div class="form-group has-success">
                  <label for="input7" class="col-sm-3 control-label form-label">Appointment Time :</label>
                  <div class="col-sm-5">
				   <select name="ddl_hour" id="hr" onblur="return c5()" style="width:50px;">
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
					</select>&nbsp;:  
					<select name="ddl_min" id="min" onblur="return c8()" style="width:50px;" >
                    <option></option>
					<option>00</option>
					<option>30</option>
					</select>
					<select name="ddl_ap" id="ap" onblur="return c9()" style="width:60px;" >
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
                  <label for="input7" class="col-sm-12 control-label form-label"></label>
                  <div class="col-sm-0" >
           <center> <input type="submit" name="btn_submit2" value="Submit" class="btn-default" >
					  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					  <input type="reset" name="btn_reset" value="Clear" class="btn-default">
					  </center>
				
                  </div>
		
					
				
				
				</div>
				</form> 
			</div>
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

				
		</div>
				<!----------------------------------multiple----------------------------------------->
	
		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />
		<link rel="stylesheet" type="text/css" href="assets/vendor/select2/select2.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css" />


		<!-- Head Libs -->
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
include("footer.php");
?>

<?php
include("footer1.php");
?>


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

</body>
</html>