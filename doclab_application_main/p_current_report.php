<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <title>Prescription</title>
</head>
</html>

<?php
error_reporting(0);
include("header_patient.php");
include("sidebar_patient.php");
include("connection.php");
?>



 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTENT -->
<div class="content">

  <!-- Start Page Header -->
  <div class="page-header">
    <h1 class="title">Report And Medicine Prescription</h1>
      
  </div>
  <!-- End Page Header -->


<!-- START CONTAINER -->
<div class="container-padding">

  <!-- Start Invoice -->
  <div class="invoice row">
	<?php
		
		$select4="select * from tbl_appointment c1 , tbl_medical_test c2 , tbl_doctor_prescription_report c3  , tbl_doctor c4 , tbl_patient c5
where c1.appointment_id=c3.appointment_id and c2.med_test_id=c3.med_test_id and c5.pat_id='$_SESSION[pat_id]' and c4.doc_id=c1.doc_id";
		$query4=mysql_query($select4);
		$row4=mysql_fetch_array($query4);
		?>	

    <div class="line row">
      <div class="col-md-6 col-xs-6 padding-0 text-left">
        <h4>PATIENT NAME</h4>
        <h2><?php echo ucfirst($row4['pat_first_name']); ?>&nbsp;&nbsp;<?php echo ucfirst($row4['pat_middle_name']); ?>&nbsp;&nbsp;<?php echo ucfirst($row4['pat_last_name']); ?></h2>
      </div>
      <div class="col-md-6 col-xs-6 padding-0 text-right">
        <h4>PRESCRIBED ON</h4>
        <h2><?php echo ucfirst($row4['appointment_date']); ?></h2>
      </div>
    </div>

    <div class="line row">
      <div class="col-md-6 col-xs-6 padding-0 text-left">
        <h4>REFERRED BY</h4>
        <h2>Dr.&nbsp;&nbsp;<?php echo ucfirst($row4['doc_first_name']); ?>&nbsp;&nbsp;<?php echo ucfirst($row4['doc_last_name']); ?></h2>
      </div>
    </div>

    <table class="table">
      <thead class="title">
        <tr>
          <td>NAME OF TEST</td>
		  <td>NAME OF MEDICINE</td>
        </tr>
      </thead>
      <tbody>
	  	<?php
		$select="select * from tbl_appointment c1 , tbl_doctor_prescription_report c2 , tbl_doctor_prescription_medicine c3  where c1.appointment_id=c2.appointment_id and c1.appointment_id=c3.appointment_id and c1.pat_id='$_SESSION[pat_id]'";
		$query=mysql_query($select);
		$row=mysql_fetch_array($query);
	?>
		<tr>
			<td><?php echo $row['med_test_id']; ?></td>
			<td><?php echo $row['med_name_id']; ?></td>
		</tr>
		
	</tbody>
    </table>
	
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
    Design and Developed by <a href="http://themeforest.net/user/egemem/portfolio" target="_blank">Egemem</a>
  </div> 
</div>
<!-- End Footer -->
</div>
<!-- End Content -->
 <!-- //////////////////////////////////////////////////////////////////////////// --> 



<?php
include("footer.php");
?>