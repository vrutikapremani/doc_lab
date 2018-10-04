<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <title>Patient Previous Reports</title>
  <link rel="stylesheet" type="text/css" href="css/custom1.css" />
</head>
</html>

<?php
error_reporting(0);
session_start();
include("header_patient.php");
include("sidebar_patient.php");
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


<!-- PAGINATION -->
<?php
$noofrecords=10;
$select="select * from  tbl_laboratory_report c1 , tbl_appointment c2 , tbl_doctor c3 , tbl_symptom c4 where c1.appointment_id=c2.appointment_id and c2.sym_id=c4.sym_id and c2.doc_id=c3.doc_id and c2.appo_unique_id='$_GET[appo_unique_id]' group by c1.appointment_id";
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
    <h1 class="title">Table View Of Patient's Reports</h1>
     
  </div>
  <!-- End Page Header -->


 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTAINER -->





<div class="panel panel-default">
        <div class="panel-title">
          Patient Report Details
        <ul class="panel-tools">
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
            <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
          </ul>
        </div>
		
			<?php
		$s="select * from  tbl_laboratory_report c1 , tbl_appointment c2  where c1.appointment_id=c2.appointment_id and c2.appo_unique_id='$_GET[appo_unique_id]'";
				$q=mysql_query($s);
				$row=mysql_fetch_array($q);
				?>
		   <div class="panel-title">
           <?php
				if($row['member_id']==0)
				{
					$sel="select * from  tbl_patient where unique_id='$row[appo_unique_id]'";
				$qu=mysql_query($sel);
				$r=mysql_fetch_array($qu);
				?>
				 Patient Name : <?php echo ucfirst($r['pat_first_name']); ?>&nbsp;&nbsp;<?php echo ucfirst($r['pat_middle_name']); ?>&nbsp;&nbsp;<?php echo ucfirst($r['pat_last_name']); ?>	<?php
				}
				else
				{
				$sel="select * from  tbl_patient_member where member_unique_id='$row[appo_unique_id]'";
				$qu=mysql_query($sel);
				$rr=mysql_fetch_array($qu);
				?>
				Patient Name :  <?php echo ucfirst($rr['member_first_name']); ?>&nbsp;&nbsp;<?php echo ucfirst($rr['member_middle_name']); ?>&nbsp;&nbsp;<?php echo ucfirst($rr['member_last_name']); ?>
				<?php
				}
				?>
		  <br />
		  Unique Id : <?php echo $_GET['appo_unique_id'];?>
		  
		          </div>
     
		
		<form  method="post" class="form-horizontal">
			  <script>
			  function sel_doctor(d)
			  {
				window.location.href="p_previous_report_details.php?appo_unique_id=<?php echo $_GET['appo_unique_id'];?>&doc_id="+d;
			  }
			  </script>
			 <div class="form-group has-success">
                  <label for="input7" class="col-sm-3 control-label form-label">Doctor Name :</label>
                  <div class="col-sm-5">
                  <select name="ddl_doctor" class="form-control" id="c1" autofocus onchange="sel_doctor(this.value)">
				  <option>---------------Select Doctor Name---------------</option>
                    <?php
					$select="select * from  tbl_laboratory_report c1 , tbl_appointment c2 , tbl_doctor c3 , tbl_symptom c4 where c1.appointment_id=c2.appointment_id and c2.sym_id=c4.sym_id and c2.doc_id=c3.doc_id and c2.appo_unique_id='$_GET[appo_unique_id]' group by c2.doc_id ";
					$query=mysql_query($select);
					while($row=mysql_fetch_array($query))
					{
					?>
					<option value="<?php echo $row['doc_id'];?>"  
					<?php
					if(isset($_POST['ddl_doctor']) && $_POST['ddl_doctor']==$doctor || $doctor==$row['doc_id'])
					{
					echo "selected='selected'";
					}
					?>
					
					>Dr.&nbsp;&nbsp;<?php echo ucfirst($row['doc_first_name']); ?>&nbsp;&nbsp;<?php echo ucfirst($row['doc_last_name']); ?></option>
					<?php
					}
					?>
					</select>
                  </div>
				  	<div class="col-sm-4" id="validation_alert">
					<?php echo $n0; ?>
					</div>
                </div>
				
				</form>
		
		 <div class="panel-body table-responsive">

            <table id="example0" class="table display">
                <thead>
                    <tr>
                        <th>Date/Time</th>
						<th>Referred By</th>
						<th>Symptom</th>
                        <th>Action</th>
                    </tr>
                </thead>
            
             	<tbody>
				
				<!-- SELECT -->
				<?php
				
				$select="select * from  tbl_laboratory_report c1 , tbl_appointment c2 , tbl_doctor c3 , tbl_symptom c4 where c1.appointment_id=c2.appointment_id and c2.sym_id=c4.sym_id and c2.doc_id=c3.doc_id and c2.appo_unique_id='$_GET[appo_unique_id]' group by c1.appointment_id".$limit;
				$query=mysql_query($select);
				while($row=mysql_fetch_array($query))
				{
				?>
			    <tr>
                        <td><?php echo $row['lab_report_date']; ?></td>
						<td>Dr.&nbsp;&nbsp;<?php echo ucfirst($row['doc_first_name']); ?>&nbsp;&nbsp;<?php echo ucfirst($row['doc_last_name']); ?></td>
						<td><?php echo $row['sym_name']; ?></td>
						<td style="width:20px;"><a href="p_report.php?appointment_id=<?php echo $row['appointment_id']; ?>"><img src="img/view.png"  align="middle"width="100px" height="30px" title="View"/></a></td>
				</tr>
				<?php
				}
				?>
                </tbody>
            </table>
			
			<table  align="center" style= "width:400px">
				<tr>
					<td><a href="p_previous_report_details.php?page=<?php echo $prepage; ?>" class="btn btn-rounded btn-default">Prepage</a></td>
					<td><a href="p_previous_report_details.php?page=<?php echo $nextpage; ?>" class="btn btn-rounded btn-default">Nextpage</a></td>
					<td><a href="p_previous_report_details.php?page=<?php echo $maxpage; ?>" class="btn btn-rounded btn-default">Maxpage</a></td>
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
include("footer.php");
?>