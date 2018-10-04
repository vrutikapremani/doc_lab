<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <title>Home Laboratory</title>
  <link rel="stylesheet" type="text/css" href="css/custom1.css" />
</head>
</html>

<?php
error_reporting(0);
session_start();
include("connection.php");
include("header_laboratory.php");
include("sidebar_laboratory.php");
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
if(isset($_GET['s_id']))
{
$u="update tbl_doctor_prescription_report set pre_status=1 where appointment_id='$_GET[s_id]'";
$query=mysql_query($u);
}
?>
<!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTENT -->
<div class="content">

  <!-- Start Page Header -->
  <div class="page-header">
    <h1 class="title">LABORATORY</h1>
      <ol class="breadcrumb">
        <li class="active">When it comes to clinical laboratory needs, our job is to simplify yours.</li>
    </ol>
	<br />

<div style="height:800px" class="bg">

 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTAINER -->


<?php
			$day=date(d)/date(m)/date(Y);
			$select="select * from tbl_doctor_prescription_report c1,tbl_appointment c2, tbl_symptom c3,tbl_doctor c4 where c2.doc_id=c4.doc_id and c2.sym_id=c3.sym_id and c1.appointment_id=c2.appointment_id and c1.pre_status=0 and c1.lab_id='$_SESSION[lab_id]'  and c2.appointment_status=3 group by c1.appointment_id"; 
			$query=mysql_query($select);
			while($row=mysql_fetch_array($query))
			{
			?>
			<br />
			   <div class="kode-alert kode-alert-icon alert7-light" style="width:300px; float:left; height:200px; margin-left:20px; " >
           <i class="fa fa-file"></i>
            <a href="#" class="closed"><?php echo $row[''];?></a>
            <h4>Request For Lab Reports!</h4>
            <?php echo $row['appo_unique_id'];?>
		   <br />
		   
		   <?php
				if($row['member_id']==0)
				{
					$sel="select * from  tbl_patient where unique_id='$row[appo_unique_id]'";
				$qu=mysql_query($sel);
				$r=mysql_fetch_array($qu);
				?>
				 <?php echo ucfirst($r['pat_first_name']); ?>&nbsp;&nbsp;<?php echo ucfirst($r['pat_middle_name']); ?>&nbsp;&nbsp;<?php echo ucfirst($r['pat_last_name']); ?>	<?php
				}
				else
				{
				$sel="select * from  tbl_patient_member where member_unique_id='$row[appo_unique_id]'";
				$qu=mysql_query($sel);
				$rr=mysql_fetch_array($qu);
				?>
				 <?php echo ucfirst($rr['member_first_name']); ?>&nbsp;&nbsp;<?php echo ucfirst($rr['member_middle_name']); ?>&nbsp;&nbsp;<?php echo ucfirst($rr['member_last_name']); ?>
				<?php
				}
				?>
				
		<br />
		Dr.&nbsp;&nbsp;<?php echo ucfirst($row['doc_first_name']);?>&nbsp;&nbsp;<?php echo ucfirst($row['doc_last_name']);?><br />    
		<?php echo $row['sym_name'];?><br />
		<?php echo $row['med_test_name'];?><br /><br />
		    <a href="home_laboratory.php?s_id=<?php echo $row['appointment_id'];?>"><button class="btn_seen" style="color:#9933FF">Seen</button></a>
          
			<?php
			}
			?>

	
  </div>
  <!-- End Page Header -->



			
          </div>

</div>

<!-- END CONTAINER -->
<!-- //////////////////////////////////////////////////////////////////////////// -->
<!-- Start Footer -->
<div class="row footer">
  <div class="col-md-6 text-left">
  Copyright © 2016 <a href="index.php" target="_blank">Doc Lab Application</a> All rights reserved.
  </div>
</div>
<!-- End Footer -->

</div>
<!-- End Content -->
 <!-- //////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////// -->
<?php
include("footer.php");
?>

