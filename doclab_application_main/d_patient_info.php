<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <title>Patient Information</title>
  <link rel="stylesheet" type="text/css" href="css/custom1.css" />
</head>
</html>

<?php
error_reporting(0);
include("header_doctor.php");
include("sidebar_doctor.php");
include("connection.php");
?>

<?php
if($_SESSION['firstname']=="")
{
?>
<script>window.location.href="login_doctor.php";</script>
<?php
}
?>

<!-- PAGINATION -->
<?php
$noofrecords=10;
$select="select * from tbl_appointment c1, tbl_doctor c2 where c1.doc_id=c2.doc_id and c2.doc_id='$_SESSION[doc_id]' group by c1.appo_unique_id";
$query=mysql_query($select);
$row=mysql_num_rows($query);
$maxpage=ceil($row/$noofrecords);
if(isset($_GET['page']))
{
$page=$_GET['page'];
$prepage=$page-1;
$nextpage=$page+1;

if($page<1)
{
$page=1;
}

if($prepage<1)
{
$prepage=1;
}

if($nextpage>$maxpage)
{
$nextpage=$maxpage;
$prepage=$maxpage-1;
}
}
else
{
$page=1;
$prepage=1;
$nextpage=2;
}
$limit_page=$page-1;
$limit=" LIMIT ".$noofrecords*$limit_page.','.$noofrecords;
?>

 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTENT -->
<div class="content">

  <!-- Start Page Header -->
  <div class="page-header">
    <h1 class="title">Patient Information</h1>
  </div>
  <!-- End Page Header -->


 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTAINER -->


<div class="panel panel-default">
        <div class="panel-title">
          Patient Details
		  <ul class="panel-tools">
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
            <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
          </ul>
        </div>
		<form method="post">
		<div class="div1"><input type="text" name="txt_search"  placeholder="Unique Id"/></div>
		<input type="submit" name="btn_search" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" class="search_button" title="Search"/>
		</form>
		
        <div class="panel-body table-responsive">

            <table id="example0" class="table display">
                <thead>
                    <tr>
						<th>Unique Id</th>
                        <th>Patient Name</th>
                        <th>Gender</th>
                        <th>Age</th>
						<th>Email Address</th>
						<th>Mobile Number</th>

                    </tr>
                </thead>
             
                <tbody>
				
				<!-- SELECT -->
				
				<?php
				
				if($_POST['btn_search'])
				{
				$search=$_POST['txt_search'];
			 	$select_search="select * from  tbl_appointment c1 , tbl_doctor c2 where c2.doc_id='$_SESSION[doc_id]' and c1.appo_unique_id like '%$search%'group by c1.appo_unique_id";
				$query=mysql_query($select_search);
				}
				else
				{
				 $select="select * from tbl_appointment c1, tbl_doctor c2 where c1.doc_id=c2.doc_id and c2.doc_id='$_SESSION[doc_id]' group by c1.appo_unique_id".$limit;
				$query=mysql_query($select);
				}
				while($row=mysql_fetch_array($query))
				{
				?>
			    <tr>
                        <td><?php echo $row['appo_unique_id']; ?></td>
						<td> <?php
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
				?></td>
				<td> <?php
				if($row['member_id']==0)
				{
				$sel1="select * from  tbl_patient where unique_id='$row[appo_unique_id]'";
				$qu1=mysql_query($sel);
				$r1=mysql_fetch_array($qu1);
				?>
				 <?php echo $r['pat_gender']; ?>
				<?php
				}
				else
				{
				$sel="select * from  tbl_patient_member where member_unique_id='$row[appo_unique_id]'";
				$qu1=mysql_query($sel1);
				$rr1=mysql_fetch_array($qu1);
				?>
				 <?php echo $rr['member_gender']; ?>
				<?php
				}
				?></td>
				<td> <?php
				if($row['member_id']==0)
				{
				$sel2="select * from  tbl_patient where unique_id='$row[appo_unique_id]'";
				$qu2=mysql_query($sel2);
				$r2=mysql_fetch_array($qu2);
				?>
				 <?php echo $r['pat_age']; ?>
				<?php
				}
				else
				{
				$sel2="select * from  tbl_patient_member where member_unique_id='$row[appo_unique_id]'";
				$qu2=mysql_query($sel2);
				$rr2=mysql_fetch_array($qu2);
				?>
				 <?php echo $rr['member_age']; ?>
				<?php
				}
				?></td>
				<td> <?php
				if($row['member_id']==0)
				{
				$sel="select * from  tbl_patient where unique_id='$row[appo_unique_id]'";
				$qu=mysql_query($sel);
				$r=mysql_fetch_array($qu);
				?>
				 <?php echo $r['pat_email_id']; ?>
				<?php
				}
				else
				{
				$sel="select * from  tbl_patient_member where member_unique_id='$row[appo_unique_id]'";
				$qu=mysql_query($sel);
				$rr=mysql_fetch_array($qu);
				if($rr['member_email_id']=="")
				{
				?>
				 <?php echo $r['pat_email_id']; ?>
				<?php
				}
				else
				{
				?>
				 <?php echo $rr['member_email_id']; ?>
				<?php
				}
				}
				?></td>
				<td> <?php
				if($row['member_id']==0)
				{
				$sel="select * from  tbl_patient where unique_id='$row[appo_unique_id]'";
				$qu=mysql_query($sel);
				$r=mysql_fetch_array($qu);
				?>
				 <?php echo $r['pat_mobile_number']; ?>
				<?php
				}
				else
				{
				$sel="select * from  tbl_patient_member where member_unique_id='$row[appo_unique_id]'";
				$qu=mysql_query($sel);
				$rr=mysql_fetch_array($qu);
				if($rr['member_mobile_number']=="")
				{
				?>
				 <?php echo $r['pat_mobile_number']; ?>
				<?php
				}
				else
				{
				?>
				 <?php echo $rr['member_mobile_number']; ?>
				<?php
				}
				}
				?></td>
						
				</tr>
				<?php
				}
				?>
                </tbody>
            </table>
			
			<table align="center" style= "width:400px">
				<tr>
					<td><a href="d_patient_info.php?page=<?php echo $prepage; ?>" class="btn btn-rounded btn-default">Prepage</a></td>
					<td><a href="d_patient_info.php?page=<?php echo $nextpage; ?>" class="btn btn-rounded btn-default">Nextpage</a></td>
					<td><a href="d_patient_info.php?page=<?php echo $maxpage; ?>" class="btn btn-rounded btn-default">Maxpage</a></td>
				</tr>
			</table>

		</div>
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

<?php
include("footer1.php");
?>
