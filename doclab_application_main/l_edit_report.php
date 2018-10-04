<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <title>Report Records</title>
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
				
$update="update tbl_laboratory_report set lab_report_value=$t_value where med_test_name='$t_name' and appointment_id='$_GET[appointment_id]'";
$query=mysql_query($update);
			}
?>
<script>alert("Updated Successfully!");</script>
<?php
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
		$select4="select * from tbl_laboratory_report c1 , tbl_appointment c2 , tbl_doctor c4 , tbl_laboratory c5 where c1.appointment_id=c2.appointment_id and c2.doc_id=c4.doc_id and c1.lab_id=c5.lab_id and c1.appointment_id='$_GET[appointment_id]'";
		$query4=mysql_query($select4);
		$row4=mysql_fetch_array($query4);
		?>	

    <div class="line row">
      <div class="col-md-6 col-xs-6 padding-0 text-left">
        <h4>PATIENT NAME</h4>
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
        <h4>Date/Time</h4>
        <h2><?php echo $row4['lab_report_date']?></h2>
      </div>
    </div>

    <div class="line row">
      <div class="col-md-6 col-xs-6 padding-0 text-left">
        <h4>REFERRED BY</h4>
        <h2>Dr.&nbsp;&nbsp;<?php echo ucfirst($row4['doc_first_name']); ?>&nbsp;&nbsp;<?php echo ucfirst($row4['doc_last_name']); ?></h2>
      </div>
	  <div class="col-md-6 col-xs-6 padding-0 text-right">
        <h4>AGE/GENDER</h4>
        <h2><?php
				if($row4['member_id']==0)
				{
				$sel1="select * from  tbl_patient where unique_id='$row4[appo_unique_id]'";
				$qu1=mysql_query($se1l);
				$r1=mysql_fetch_array($qu1);
				?>
				 <?php echo $r['pat_age']; ?>/<?php echo ucfirst($r['pat_gender']); ?>
				<?php
				}
				else
				{
				$sel2="select * from  tbl_patient_member where member_unique_id='$row4[appo_unique_id]'";
				$qu2=mysql_query($sel2);
				$rr2=mysql_fetch_array($qu2);
				?>
				 <?php echo $rr2['member_age']; ?>/<?php echo ucfirst($rr2['member_gender']); ?>
				<?php
				}
				?></h2>
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
		$select="select * from tbl_laboratory_report where appointment_id='$_GET[appointment_id]'"; 
		$query=mysql_query($select);
		while($row=mysql_fetch_array($query))
		{
		?>
		<tr>
		<td >
		<?php echo $row['med_test_name'];?></td><td><input type="text" name="test_value[]" value="<?php echo $row['lab_report_value'];?>" />
		<input type="hidden" name="test_name[]" value="<?php echo $row['med_test_name'];?>" />
		</td>
		</tr>
		<?php
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