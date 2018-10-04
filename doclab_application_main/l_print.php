<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <title>Final Report</title>
</head>
</html>
<?php
error_reporting(0);
session_start();
include("header_registration.php");
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



 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTAINER -->

<div class="content" style="margin-left:0px;">
 
<!-- START CONTAINER -->
<div class="container-padding">


  
  <!-- Start Row -->
  <div class="row">

    <div class="col-md-12">

		<div class="panel">
		 <!-- Start Invoice -->
  
  <div class="invoice row">
   <div class="panel-body">
  	<?php
	$select4="select * from tbl_laboratory_report c1 , tbl_appointment c2 , tbl_patient c3 , tbl_doctor c4 , tbl_laboratory c5 where c1.appointment_id=c2.appointment_id and c2.pat_id=c3.pat_id and c2.doc_id=c4.doc_id and c1.lab_id=c5.lab_id and  c1.appointment_id='$_GET[appointment_id]'";
	$query4=mysql_query($select4);
	$row4=mysql_fetch_array($query4);
	?>
	<div class="invoicename">REPORT</div>
	
    <div class="logo">
      <img src="img/lab_company.jpg" alt="logo"><br>
      <b><?php echo strtoupper($_SESSION['firstname']); ?></b><br>
      <?php echo strtoupper($row4['lab_address']); ?><br>
      <?php echo strtoupper($row4['lab_city']); ?>-<?php echo $row4['lab_pincode']; ?>,<?php echo $row4['lab_state']; ?><br />
	  Ph. No. : <?php echo $row4['lab_contact_number']; ?>
    </div>
   
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
        <h4>DATE/TIME</h4>
        <h2><?php echo ucfirst($row4['lab_report_date']); ?></h2>
      </div>
    </div>

    <div class="line row">
      <div class="col-md-6 col-xs-6 padding-0 text-left">
        <h4>REFERRED BY</h4>
        <h2>Dr.&nbsp;&nbsp;<?php echo ucfirst($row4['doc_first_name']); ?>&nbsp;&nbsp;<?php echo ucfirst($row4['doc_last_name']); ?></h2>
      </div>
	  <div class="col-md-6 col-xs-6 padding-0 text-right">
        <h4>AGE/GENDER</h4>
        <h2><?php echo $row4['pat_age']; ?>/<?php echo $row4['pat_gender']; ?></h2>
      </div>
    </div>

    <table class="table">
      <thead class="title">
        <tr>
          <td>NAME OF TEST</td>
		  <td>VALUE</td>
		  <td>UNIT</td>
        </tr>
      </thead>
      <tbody>
	  	<?php
		$select="select * from tbl_laboratory_report c1, tbl_medical_test c2 where c1.med_test_name=c2.med_test_name and c1.appointment_id='$_GET[appointment_id]'";
		$query=mysql_query($select);
		while($row=mysql_fetch_array($query))
		{
		?>
		<tr>
			<td><?php echo $row['med_test_name']; ?></td>
			<td><?php echo $row['lab_report_value']; ?></td>
			<td><?php echo $row['med_test_unit']; ?></td>
		</tr>
		<?php
		}
		?>
	</tbody>
    </table>
	
	<form method="post">
	<table align="right">
	<div class="form-group has-success">
					
                  <label for="input6" class="col-sm-10 control-label form-label"></label>
                  <div class="col-sm-0">
                  <a href="l_print.php"><button type="button" class="btn btn-primary" onClick="window.print();"><i class="fa fa-print"></i>Print</button></a> 
                  </div>
                </div>
				</table>
	</form>
	
  </div>
  </div>
  <!-- End Invoice -->

          
        </div>

            

     </div>
	</div>
</div>	 


<!-- END CONTAINER -->
<!-- //////////////////////////////////////////////////////////////////////////// -->

</div>
<!-- End Content -->
 <!-- //////////////////////////////////////////////////////////////////////////// --> 

<?php
include("footer.php");
?>