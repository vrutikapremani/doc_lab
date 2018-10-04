<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <title>Patient Payment</title>
  <link rel="stylesheet" type="text/css" href="css/custom1.css" />
</head>
</html>

<?php
error_reporting(0);
session_start();
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
$select="select * from  tbl_doctor_invoice c1 , tbl_symptom c2 where c1.sym_id=c2.sym_id and c1.unique_id='$_GET[unique_id]' and d_invoice_status=0";
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
    <h1 class="title">Table View Of Patient's Payment</h1>
     
  </div>
  <!-- End Page Header -->


 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTAINER -->





<div class="panel panel-default">
        <div class="panel-title">
          Patient Payment Details
        <ul class="panel-tools">
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
            <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
          </ul>
        </div>
		
		<form method="post">
		<div class="div1"><input type="text" name="txt_search" placeholder="Symptom"/></div>
		<input type="submit" name="btn_search" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" class="search_button" title="Search"/>
		</form>
		<br />
		
		<?php
		$s="select * from  tbl_doctor_invoice c1 , tbl_symptom c2 where c1.sym_id=c2.sym_id and c1.unique_id='$_GET[unique_id]' and d_invoice_status=0";
				$q=mysql_query($s);
				$row=mysql_fetch_array($q);
				?>
		   <div class="panel-title">
           <?php
				if($row['member_id']==0)
				{
					$sel="select * from  tbl_patient where unique_id='$row[unique_id]'";
				$qu=mysql_query($sel);
				$r=mysql_fetch_array($qu);
				?>
				 Patient Name : <?php echo ucfirst($r['pat_salutation']); ?>&nbsp;&nbsp;<?php echo ucfirst($r['pat_first_name']); ?>&nbsp;&nbsp;<?php echo ucfirst($r['pat_middle_name']); ?>&nbsp;&nbsp;<?php echo ucfirst($r['pat_last_name']); ?>	<?php
				}
				else
				{
				$sel="select * from  tbl_patient_member where member_unique_id='$row[unique_id]'";
				$qu=mysql_query($sel);
				$rr=mysql_fetch_array($qu);
				?>
				Patient Name :  <?php echo ucfirst($rr['member_salutation']); ?>&nbsp;&nbsp;<?php echo ucfirst($rr['member_first_name']); ?>&nbsp;&nbsp;<?php echo ucfirst($rr['member_middle_name']); ?>&nbsp;&nbsp;<?php echo ucfirst($rr['member_last_name']); ?>
				<?php
				}
				?>
		  <br />
		  Unique Id : <?php echo $_GET['unique_id'];?>
     
        </div>


		 <div class="panel-body table-responsive">

            <table id="example0" class="table display">
                <thead>
                    <tr>
                        <th>Date</th>
						<th>Time</th>
						<th>Symptom</th>
                        <th>Action</th>
                    </tr>
                </thead>
            
             	<tbody>
				
				<!-- SELECT -->
				<?php
				
				if($_POST['btn_search'])
				{
				$search=$_POST['txt_search'];
				$select_search="select * from tbl_doctor_invoice c1 , tbl_symptom c2 where c1.sym_id=c2.sym_id and d_invoice_status=0 and c2.sym_name like '%$search%'";
				$query=mysql_query($select_search);
				}
				else
				{
				$select="select * from  tbl_doctor_invoice c1 , tbl_symptom c2 where c1.sym_id=c2.sym_id and c1.unique_id='$_GET[unique_id]' and d_invoice_status=0".$limit;
				$query=mysql_query($select);
				}
				while($row=mysql_fetch_array($query))
				{
				?>
			    <tr>
                        <td><?php echo $row['appointment_date']; ?></td>
						<td><?php echo $row['d_invoice_time']; ?></td>
						<td><?php echo $row['sym_name']; ?></td>
						<td style="width:20px;"><a href="dp_invoice.php?d_invoice_id=<?php echo $row['d_invoice_id']; ?>"><img src="img/view.png"  align="middle"width="100px" height="30px" title="View"/></a></td>
				</tr>
				<?php
				}
				?>
                </tbody>
            </table>
			
			<table  align="center" style= "width:400px">
				<tr>
					<td><a href="dp_invoice0.php?page=<?php echo $prepage; ?>" class="btn btn-rounded btn-default">Prepage</a></td>
					<td><a href="dp_invoice0.php?page=<?php echo $nextpage; ?>" class="btn btn-rounded btn-default">Nextpage</a></td>
					<td><a href="dp_invoice0.php?page=<?php echo $maxpage; ?>" class="btn btn-rounded btn-default">Maxpage</a></td>
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
  <div class="col-md-6 text-right">
  </div> 
</div>
<!-- End Footer -->


</div>
<!-- End Content -->
 <!-- //////////////////////////////////////////////////////////////////////////// --> 


<?php
include("footer1.php");
?>