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
	$select="select * from tbl_appointment c1 , tbl_doctor c2 where c1.doc_id=c2.doc_id and c1.appointment_id='$_GET[appointment_id]'";
	$query=mysql_query($select);
	$row=mysql_fetch_array($query);
	?>

  <!-- Start Invoice -->
  <div class="invoice row">
    <div class="invoicename">PRESCRIPTION</div>
	
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


    <div class="line row">
      <div class="col-md-6 col-xs-6 padding-0 text-left">
        <h4>REFERRED BY</h4>
        <h2>Dr.&nbsp;&nbsp;<?php echo $row['doc_first_name']; ?>&nbsp;&nbsp;<?php echo $row['doc_last_name']; ?></h2>
      </div>
      <div class="col-md-6 col-xs-6 padding-0 text-right">
        <h4>DATE</h4>
        <h2><?php echo $row['appointment_date']; ?></h2>
      </div>
    </div>

   

    <table class="table">
      <thead class="title">
        <tr>
			<?php
		$select1="select * from tbl_appointment c1 , tbl_doctor_prescription_report c2  where c1.appointment_id=c2.appointment_id  and c1.appointment_id='$_GET[appointment_id]'";
		$query1=mysql_query($select1);
		$row1=mysql_fetch_array($query1);
		$a=explode(',',$row1['med_test_name']);
		$no1=mysql_num_rows($query1);
		if($no1>0)
		{
		?>
		  <td>NAME OF TEST</td>
		
		<?php
		}
	?>
          
	  	<?php
		$select2="select * from tbl_appointment c1 , tbl_doctor_prescription_medicine c2  where c1.appointment_id=c2.appointment_id  and c1.appointment_id='$_GET[appointment_id]'";
		$query2=mysql_query($select2);
		$row2=mysql_fetch_array($query2);
		$b=explode(',',$row2['med_name']);
		$no2=mysql_num_rows($query2);
		if($no2>0)
		{
		?>
		 <td>NAME OF MEDICINE</td>
		<?php
		}
	?>
		 
        </tr>
      </thead>
      <tbody>

		<tr>
		<?php
		$select1="select * from tbl_appointment c1 , tbl_doctor_prescription_report c2  where c1.appointment_id=c2.appointment_id  and c1.appointment_id='$_GET[appointment_id]'";
		$query1=mysql_query($select1);
		$row1=mysql_fetch_array($query1);
		$a=explode(',',$row1['med_test_name']);
		$no1=mysql_num_rows($query1);
		if($no1>0)
		{
		?>
		 <td><?php 
			foreach ($a as $c)
			{
			echo $c;
			echo "<br>";
			}
			 ?></td>
		
		<?php
		}
	    ?>
		
			<?php
		$select2="select * from tbl_appointment c1 , tbl_doctor_prescription_medicine c2  where c1.appointment_id=c2.appointment_id  and c1.appointment_id='$_GET[appointment_id]'";
		$query2=mysql_query($select2);
		$row2=mysql_fetch_array($query2);
		$b=explode(',',$row2['med_name']);
		$no2=mysql_num_rows($query2);
		if($no2>0)
		{
		?>
		 <td><?php 
			foreach ($b as $d)
			{
			echo $d;
			echo "<br>";
			}
			 ?></td>
		<?php
		}
	    ?>
		</tr>
		
	</tbody>
    </table>
	
	<br>
	<form method="post">
	<table align="right">
	<div class="form-group has-success">
					
                  <label for="input6" class="col-sm-10 control-label form-label"></label>
                  <div class="col-sm-0">
                  <a href="p_print_prescription.php"><button type="button" class="btn btn-primary" onClick="window.print();"><i class="fa fa-print"></i>Print</button></a> 
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