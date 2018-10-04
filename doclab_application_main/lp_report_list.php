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



 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTENT -->
<div class="content">

  <!-- Start Page Header -->
  <div class="page-header">
    <h1 class="title">Report Records</h1>
      
  </div>
  <!-- End Page Header -->


<!-- START CONTAINER -->
<div class="container-padding">

  <!-- Start Invoice -->
  <div class="invoice row">
    <div class="logo">
      <div class="panel-body">
             
		</div>
    </div>
	<?php
		
		$select4="select * from tbl_appointment c1 , tbl_doctor_prescription_report c2 , tbl_doctor c3 where c1.appointment_id='$_GET[appointment_id]' and c1.doc_id=c3.doc_id";
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
				 <?php echo $r['pat_salutation']; ?>&nbsp;&nbsp;<?php echo ucfirst($r['pat_first_name']); ?>&nbsp;&nbsp;<?php echo ucfirst($r['pat_middle_name']); ?>&nbsp;&nbsp;<?php echo ucfirst($r['pat_last_name']); ?>	<?php
				}
				else
				{
				$sel="select * from  tbl_patient_member where member_unique_id='$row4[appo_unique_id]'";
				$qu=mysql_query($sel);
				$rr=mysql_fetch_array($qu);
				?>
				 <?php echo $rr['member_salutation']; ?>&nbsp;&nbsp;<?php echo ucfirst($rr['member_first_name']); ?>&nbsp;&nbsp;<?php echo ucfirst($rr['member_middle_name']); ?>&nbsp;&nbsp;<?php echo ucfirst($rr['member_last_name']); ?>
				<?php
				}
				?></h2>
      </div>
	  <div class="col-md-6 col-xs-6 padding-0 text-right">
        <h4>UNIQUE ID</h4>
        <h2><?php echo $row4['appo_unique_id']; ?></h2>
      </div>
    </div>

    <div class="line row">
      <div class="col-md-6 col-xs-6 padding-0 text-left">
        <h4>REFERRED BY</h4>
        <h2>Dr.&nbsp;&nbsp;<?php echo ucfirst($row4['doc_first_name']); ?>&nbsp;&nbsp;<?php echo ucfirst($row4['doc_last_name']); ?></h2>
      </div>
	  
	  <div class="col-md-6 col-xs-6 padding-0 text-right">
        <h4>PRESCRIBED ON</h4>
        <h2><?php echo $row4['appointment_date']; ?></h2>
      </div>
    </div>

    <table class="table">
      <thead class="title">
        <tr>
          <td>NAME OF TEST</td>
        </tr>
      </thead>
      <tbody>
	  	<?php
		$select="select * from tbl_appointment c1 , tbl_doctor_prescription_report c3  
where c1.appointment_id=c3.appointment_id and c3.lab_id='$_SESSION[lab_id]' and c3.appointment_id='$_GET[appointment_id]'";
		$query=mysql_query($select);
		$row=mysql_fetch_array($query);
		$a=explode(',',$row['med_test_name']);
		?>
		<tr>
			<td><?php 
			
			foreach ($a as $c)
			{
			echo $c;
			echo "<br>";
			}
			 ?></td>
			
		</tr>
	</tbody>
    </table>
	<form method="post">
	<table align="right">
	<div class="form-group has-success">
					
                  <label for="input6" class="col-sm-10 control-label form-label"></label>
                  <div class="col-sm-2">
                 	<a href="l_report_value.php?appointment_id=<?php echo $_GET['appointment_id']; ?>" ><input type="button" name="btn_submit" value="Create Report" class="btn-default" style="width:120px; text-align:center;" ></a>
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
</div>
<!-- End Footer -->
</div>
<!-- End Content -->
 <!-- //////////////////////////////////////////////////////////////////////////// --> 



<?php
include("footer.php");
?>