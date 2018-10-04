<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Kode is a Premium Bootstrap Admin Template, It's responsive, clean coded and mobile friendly">
  <meta name="keywords" content="bootstrap, admin, dashboard, flat admin template, responsive," />
  <title>Doctor Invoice</title>

  <!-- ========== Css Files ========== -->
  <link href="css/root.css" rel="stylesheet">

  </head>
  <body>
  <!-- Start Page Loading -->
  <div class="loading"><img src="img/loading.gif" alt="loading-img"></div>
  <!-- End Page Loading -->
 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<?php
error_reporting(0);
session_start();
include("connection.php");
include("header_patient.php");
include("sidebar_patient.php");
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
<!-- START CONTENT -->
<div class="content">

  <!-- Start Page Header -->
  <div class="page-header">
    <h1 class="title">Invoice</h1>
  </div>
  <!-- End Page Header -->

 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTAINER -->
<div class="container-padding">

	<?php
	$select="select * from tbl_doctor_invoice c1 , tbl_appointment c2 , tbl_doctor c4 where c1.appointment_id=c2.appointment_id and c1.doc_id=c4.doc_id and c1.d_invoice_id='$_GET[d_invoice_id]'";
	$query=mysql_query($select);
	$row=mysql_fetch_array($query);
	$_SESSION['d_invoice_id']=$_GET['d_invoice_id'];
	?>

  <!-- Start Invoice -->
  <div class="invoice row">
    <div class="invoicename">INVOICE</div>
    <div class="logo">
      <img src="img/doc.png" alt="logo"><br>
      <b>Dr.&nbsp;&nbsp;<?php echo strtoupper($row['doc_first_name']); ?>&nbsp;&nbsp;<?php echo strtoupper($row['doc_last_name']); ?></b><br>
      <?php echo strtoupper($row['doc_address']); ?><br>
      <?php echo strtoupper($row['doc_city']); ?>-<?php echo ucfirst($row['doc_pincode']); ?>,<?php echo ucfirst($row['doc_state']); ?>.
    </div>

    <div class="line row">
      <div class="col-md-6 col-xs-6 padding-0 text-left">
        <h4>DATE</h4>
        <h2><?php echo $row['appointment_date']; ?></h2>
      </div>
      <div class="col-md-6 col-xs-6 padding-0 text-right">
        <h4>INVOICE ID</h4>
        <h2><?php echo $row['d_invoice_id']; ?></h2>
      </div>
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
				 <?php echo $r['pat_salutation']; ?>&nbsp;&nbsp;<?php echo ucfirst($r['pat_first_name']); ?>&nbsp;&nbsp;<?php echo ucfirst($r['pat_middle_name']); ?>&nbsp;&nbsp;<?php echo ucfirst($r['pat_last_name']); ?>	<?php
				}
				else
				{
				$sel="select * from  tbl_patient_member where member_unique_id='$row[appo_unique_id]'";
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
        <h2><?php echo $row['appo_unique_id']; ?></h2>
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
      </thead>
      <tbody>
        <tr>
		<?php
		if($row['visit_no']==1)
		{
		?>
		<td>Consultation Charges<p>First Visit Charges</p></td>
		<?php
		}
		else
		{
		
		?>
		<td>Succeeding Charges<p>Secondary Visit Charges</p></td>
		<?php
		}
		
		?>
          
          <td></td>
          <td></td>
          <td class="text-right">Rs.<?php echo $row['d_total_amount']; ?></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td class="text-right"></td>
          <td class="text-right">TOTAL<h4 class="total">Rs.<?php echo $row['d_total_amount']; ?></h4></td>
        </tr>
		
		      </tbody>
			  
    </table>
	<br>
<?php
$paypal_id='daxa.iipl-facilitator@gmail.com ';
?>		
<form method="post" action="https://www.sandbox.paypal.com/cgi-bin/webscr">
<input type="hidden" name="business" value='<?php echo $paypal_id; ?>'>
<input type='hidden' name='cmd' value='_xclick'>
<input type='hidden' name='amount' value='<?php echo $row['d_total_amount']; ?>'>
<input type="hidden" name='tax' value='5'>
<input type="hidden" name='cbt' value="back to site">
<input type="hidden" name='item_name' value='Cards'>
<input type="hidden" name="quantity" value='1'>

<input type='hidden' name='return'  value='http://localhost/doc_lab/pd_success_payment.php'>
<table align="right">
	<div class="form-group has-success">
					
                  <label for="input6" class="col-sm-10 control-label form-label"></label>
                  <div class="col-sm-0">
				  <a href="p_print_doctor_invoice.php?d_invoice_id=<?php echo $row['d_invoice_id']; ?>"><button type="button" class="btn btn-primary"><i class="fa fa-print"></i>Print</button></a>
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