<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <title>Report Records</title>
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

<?php


if(isset($_POST['btn_submit']))
	{
		$test_value=$_POST['test_value'];
		$test_name=$_POST['test_name'];
		$test_prise=$_POST['test_prise'];
		for($i=0;$i<count($test_name);$i++)
			{	
				$t_value=$test_value[$i];
				$t_name=$test_name[$i];
			
				
				$sel="select * from tbl_laboratory_report where appointment_id='$_GET[appointment_id]' and lab_id='$_SESSION[lab_id]' and med_test_name='$t_name'";
				$q=mysql_query($sel);
				$n=mysql_num_rows($q);
				if($n==0)
				{
				
$insert2="insert into tbl_laboratory_report values
(
'',
'$_GET[appointment_id]',
'$_SESSION[lab_id]',
'$t_name',
'$t_value',
now(),
'0',
'0'
)";
$query3=mysql_query($insert2);

$s="select * from tbl_appointment c1 , tbl_patient c2 where c1.pat_id=c2.pat_id and  c1.appointment_id='$_GET[appointment_id]'";
$q=mysql_query($s);
$r=mysql_fetch_array($q);

$to=$r['pat_email_id'];
$subject="Appointment Confirmation Mail";
$txt="Your Appointment Is Confirm";
$headers="From:doclabapplication@gmail.com";
mail($to,$subject,$txt,$headers);

$insert1="insert into tbl_laboratory_invoice values
(
'',
'$_GET[appointment_id]',
'$_SESSION[lab_id]',
'$t_name',
now(),
now(),
'0'
)";
$query1=mysql_query($insert1);


				
				
		$up="update tbl_appointment set appointment_status=4 where appointment_id='$_GET[appointment_id]'";
		$qu=mysql_query($up);
		?>
		<script>window.location.href="l_report.php?appointment_id=<?php echo $_GET['appointment_id']; ?>";</script>
		<?php	}
				else
				{
			
				$msg="* Value Inserted Already!";
				
		}
	}
	}
?>

<!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTENT -->
<div class="content">

  <!-- Start Page Header -->
  <div class="page-header">
    <h1 class="title">Report Records</h1>
  </div>
  <!-- End Page Header -->

<form method="post">

<!-- START CONTAINER -->
<div class="container-padding">

  <!-- Start Invoice -->
  <div class="invoice row">

		<?php
		$select4="select * from tbl_appointment c1 , tbl_doctor_prescription_report c2 , tbl_doctor c3  where c1.appo_unique_id=c2.unique_id and c1.appointment_id=c2.appointment_id and c1.doc_id=c3.doc_id and c1.appointment_id='$_GET[appointment_id]'";
		$query4=mysql_query($select4);
		$row4=mysql_fetch_array($query4);
		?>	

    <div class="line row">
      <div class="col-md-6 col-xs-6 padding-0 text-left">
        <h4>PATIENT NAME</h4><?php echo $insert2;?><?php echo $insert1;?>
        <h2><?php
				if($row4['member_id']==0)
				{
				$sel="select * from  tbl_patient where unique_id='$row4[appo_unique_id]'";
				$qu=mysql_query($sel);
				$r=mysql_fetch_array($qu);
				?>
				 <?php echo ucfirst($r['pat_salutation']); ?>&nbsp;&nbsp;<?php echo ucfirst($r['pat_first_name']); ?>&nbsp;&nbsp;<?php echo ucfirst($r['pat_middle_name']); ?>&nbsp;&nbsp;<?php echo ucfirst($r['pat_last_name']); ?>	<?php
				}
				else
				{
				$sel="select * from  tbl_patient_member where member_unique_id='$row4[appo_unique_id]'";
				$qu=mysql_query($sel);
				$rr=mysql_fetch_array($qu);
				?>
				 <?php echo ucfirst($rr['member_salutation']); ?>&nbsp;&nbsp;<?php echo ucfirst($rr['member_first_name']); ?>&nbsp;&nbsp;<?php echo ucfirst($rr['member_middle_name']); ?>&nbsp;&nbsp;<?php echo ucfirst($rr['member_last_name']); ?>
				<?php
				}
				?></h2>
      </div>
      <div class="col-md-6 col-xs-6 padding-0 text-right">
        <h4>Date</h4>
        <h2><?php echo date(d)."/".date(m)."/".date(Y);?></h2>
      </div>
    </div>

    <div class="line row">
      <div class="col-md-6 col-xs-6 padding-0 text-left">
        <h4>REFERRED BY</h4>
        <h2>Dr.&nbsp;&nbsp;<?php echo ucfirst($row4['doc_first_name']); ?>&nbsp;&nbsp;<?php echo ucfirst($row4['doc_last_name']); ?></h2>
      </div>
    </div>

	<div class="group" id="validation_alert">
		<?php echo $msg; ?>
    </div>
	
    <table class="table">
      <thead class="title">
        <tr>
          <td>NAME OF TEST</td>
		  
		  <td>VALUE</td>
        </tr>
      </thead>
      <tbody>
	  	<?php
		$select="select * from tbl_appointment c1 , tbl_medical_test c2 , tbl_doctor_prescription_report c3  where c1.appointment_id=c3.appointment_id and c3.appointment_id='$_GET[appointment_id]'"; 
		$query=mysql_query($select);
		$row=mysql_fetch_array($query);
		$a=explode(',',$row['med_test_name']);
		?>
		<?php 
			
			foreach ($a as $c)
			{
			echo "<tr>";
			echo "<td>";
			echo $c;
			echo "</td>";
			echo "<td>";
			
			echo "<input type='hidden' name='test_name[]' value='$c'>";
			echo "<input type='text' name='test_value[]'>";
			echo "</td>";
			echo "</tr>";
			}
			 ?>
			    
	</tbody>
    </table>
	
	<table align="right">
	<div class="form-group has-success">
					
                  <label for="input6" class="col-sm-10 control-label form-label"></label>
                  <div class="col-sm-2">
                <input type="submit" name="btn_submit" value="Generate Report" class="btn-default" style="width:140px; text-align:center;" >
                  </div>
                </div>
				</table>
	</form>
	
  </div>
  
  <!-- End Invoice -->



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