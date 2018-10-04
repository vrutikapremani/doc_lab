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
	$select="select * from tbl_laboratory_invoice c1 , tbl_appointment c2 , tbl_laboratory c3 , tbl_doctor c4 where c1.appointment_id=c2.appointment_id and c2.doc_id=c4.doc_id and c1.lab_id=c3.lab_id and c1.appointment_id='$_GET[appointment_id]'";
	$query=mysql_query($select);
	$row=mysql_fetch_array($query);
	$_SESSION['appointment_id']=$_GET['appointment_id'];
	?>

  <!-- Start Invoice -->
  <div class="invoice row">
    <div class="invoicename">INVOICE</div>
    <div class="logo">
      <img src="img/lab_company.jpg" alt="logo"><br>
      <b><?php echo strtoupper($row['lab_name']); ?></b><br>
      <?php echo strtoupper($row['lab_address']); ?><br>
      <?php echo strtoupper($row['lab_city']); ?>-<?php echo $row['lab_pincode']; ?>,<?php echo $row['lab_state']; ?>.<br />
	   Ph. No. : <?php  echo $row['lab_contact_number']; ?>
    </div>

    <div class="line row">
      <div class="col-md-6 col-xs-6 padding-0 text-left">
        <h4>PATIENT NAME</h4>
        <h2> <?php
				if($row['member_id']==0)
				{
				$sel="select * from  tbl_patient where unique_id='$row[appo_unique_id]'";
				$qu=mysql_query($sel);
				$r=mysql_fetch_array($qu);
				?>
				 <?php echo ucfirst($r['pat_salutation']); ?>&nbsp;&nbsp;<?php echo ucfirst($r['pat_first_name']); ?>&nbsp;&nbsp;<?php echo ucfirst($r['pat_middle_name']); ?>&nbsp;&nbsp;<?php echo ucfirst($r['pat_last_name']); ?>	<?php
				}
				else
				{
				$sel="select * from  tbl_patient_member where member_unique_id='$row[appo_unique_id]'";
				$qu=mysql_query($sel);
				$rr=mysql_fetch_array($qu);
				?>
				 <?php echo ucfirst($rr['member_salutation']); ?>&nbsp;&nbsp;<?php echo ucfirst($rr['member_first_name']); ?>&nbsp;&nbsp;<?php echo ucfirst($rr['member_middle_name']); ?>&nbsp;&nbsp;<?php echo ucfirst($rr['member_last_name']); ?>
				<?php
				}
				?></h2>
      </div>
      <div class="col-md-6 col-xs-6 padding-0 text-right">
        <h4>UNIQUE ID</h4>
        <h2><?php echo $row['appo_unique_id']; ?></h2>
      </div>
    </div>

    <div class="line row">
      <div class="col-md-6 col-xs-6 padding-0 text-left">
        <h4>REFERRED BY</h4>
        <h2>Dr.&nbsp;&nbsp;<?php echo ucfirst($row['doc_first_name']); ?>&nbsp;&nbsp;<?php echo ucfirst($row['doc_last_name']); ?></h2>
      </div>
	  <div class="col-md-6 col-xs-6 padding-0 text-right">
        <h4>DATE</h4>
        <h2><?php echo $row['l_invoice_date']; ?></h2>
      </div>
    </div>

    <table class="table">
      <thead class="title">
        <tr>
          <td>DESCRIPTION</td>
		  <td></td>
          <td></td>
          <td class="text-right">AMOUNT</td>
        </tr>
      
	<?php
	$select1="select * from tbl_laboratory_invoice c1 , tbl_appointment c2 , tbl_laboratory c3 , tbl_doctor c4 , tbl_medical_test c5 where c1.appointment_id=c2.appointment_id and c2.doc_id=c4.doc_id and c1.lab_id=c3.lab_id and c1.appointment_id='$_GET[appointment_id]' and c5.med_test_name=c1.med_test_name";
	$query1=mysql_query($select1);
	while($row1=mysql_fetch_array($query1))
	{
	?>
	    <tr>
          <td><?php echo $row1['med_test_name'];?></td>
		  <td></td>
          <td></td>
          <td class="text-right">Rs.<?php echo $row1['med_test_price'];?></td>
        </tr>
    
	<?php
	}
	?>
	  </thead>
      <tbody>
    <?php
	$select1="select sum(c5.med_test_price) from tbl_laboratory_invoice c1 , tbl_appointment c2 , tbl_laboratory c3 , tbl_doctor c4 , tbl_medical_test c5 where c1.appointment_id=c2.appointment_id and c2.doc_id=c4.doc_id and c1.lab_id=c3.lab_id and c1.appointment_id='$_GET[appointment_id]' and c5.med_test_name=c1.med_test_name";
	$query1=mysql_query($select1);
	while($row1=mysql_fetch_array($query1))
	{
	$total=$row1[0];
	}
	?>
	    
        <tr>
          <td></td>
          <td></td>
          <td class="text-right"></td>
          <td class="text-right">TOTAL<h4 class="total">Rs.<?php echo $total; ?></h4></td>
        </tr>
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