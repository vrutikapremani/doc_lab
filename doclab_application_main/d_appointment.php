<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <title>Today's Appointment</title>
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

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
//alert();

<!-- CONFIRM -->
$(".btn_confirm").click(function()
{
//alert();
var element=$(this);
var confirm_value=element.attr("confirm_id");
//alert(confirm_value);
$.ajax(
{
type:"GET",
data:{confirm_value:confirm_value},
url:"action_appointment.php",
success:function()
{
alert("Confirm Appointment?");
location.reload();
}
});
});

<!-- PENDING -->
$(".btn_pending").click(function()
{
//alert();
var element=$(this);
var pending_value=element.attr("pending_id");
//alert(pending_value);
$.ajax(
{
type:"GET",
data:{pending_value:pending_value},
url:"action_appointment.php",
success:function()
{
alert("Appointment Not Confirmed.");
location.reload();
}
});
});

<!-- CHECKED -->
$(".btn_checked").click(function()
{
//alert();
var element=$(this);
var checked_value=element.attr("checked_id");
//alert(checked_value);
$.ajax(
{
type:"GET",
data:{checked_value:checked_value},
url:"action_appointment.php",
success:function()
{
alert("Appointment Conducted.");
location.reload();
}
});
});

<!-- DELETE -->
$(".btn_delete").click(function()
{
//alert();
var element=$(this);
var delete_value=element.attr("delete_id");
//alert(checked_value);
$.ajax(
{
type:"GET",
data:{delete_value:delete_value},
url:"action_appointment.php",
success:function()
{
alert("Appointment Deleted.");
location.reload();
}
});
});


});
</script>


<!-- PAGINATION -->
<?php
$noofrecords=10;
$select="select * from tbl_appointment";
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
    <h1 class="title">Appointment</h1>
      

    

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
		<?php
		$select_pending="select * from tbl_appointment where doc_id='$_SESSION[doc_id]' and appointment_status=1";
		$query_pending=mysql_query($select_pending);
		$con_pending=mysql_num_rows($query_pending);
		?>
		<?php
		$select_confirm="select * from tbl_appointment where doc_id='$_SESSION[doc_id]' and appointment_status=2";
		$query_confirm=mysql_query($select_confirm);
		$con_confirm=mysql_num_rows($query_confirm);
		?>
		<?php
		$select_checked="select * from tbl_appointment where doc_id='$_SESSION[doc_id]' and appointment_status=3";
		$query_checked=mysql_query($select_checked);
		$con_checked=mysql_num_rows($query_checked);
		?>
		<button type="submit" class="kode-alert kode-alert-icon alert4-light" name="btn_pending_app">Declined Appointments<span class="badge"><?php echo $con_pending;?></span></button>
		<button type="submit" class="kode-alert kode-alert-icon alert1-light" name="btn_confirm_app">Accepted Appointments<span class="badge"><?php echo $con_confirm;?></span></button>
		<button type="submit" class="kode-alert kode-alert-icon alert2-light" name="btn_checked_app">Checked Appointments<span class="badge"><?php echo $con_checked;?></span></button>
		</form>
		<br />
        <!-- Start an Alert -->
		<?php
		
         ?>
		  <!-- End an Alert -->

    

            <table id="example0" class="table display">
                <thead>
                <?php
				if(isset($_POST['btn_checked_app']))
				{
				?>
				  <tr>
                        <th>Patient Name</th>
                        <th>Appointment Date</th>
                        <th>Appointment Time</th>
                        <th>Specification</th>
						<th>Status</th>
						<?php
						if(isset($_POST['btn_pending_app']) || isset($_POST['btn_confirm_app']))
						{
						?>
						<th><center>Action</center></th>
						<?php
						}
						elseif(isset($_POST['btn_checked_app']))
						{}
						else
						{
						?>
						<th colspan="3" width="50px"><center>Actions</center></th>
						<?php
						}
						?>
                    </tr>
               
				<?php
				}
				else if(isset($_POST['btn_confirm_app']))
				{
				?>
				  <tr>
                        <th>Patient Name</th>
                        <th>Appointment Date</th>
                        <th>Appointment Time</th>
                        <th>Specification</th>
						<th>Status</th>
						<?php
						if(isset($_POST['btn_pending_app']) || isset($_POST['btn_confirm_app']))
						{
						?>
						<th><center>Action</center></th>
						<?php
						}
						elseif(isset($_POST['btn_checked_app']))
						{}
						else
						{
						?>
						<th colspan="3" width="50px"><center>Actions</center></th>
						<?php
						}
						?>
                    </tr>
               
				<?php
				}
				else if(isset($_POST['btn_pending_app']))
				{
				?>
				  <tr>
                        <th>Patient Name</th>
                        <th>Appointment Date</th>
                        <th>Appointment Time</th>
                        <th>Specification</th>
						<th>Status</th>
						<?php
						if(isset($_POST['btn_pending_app']) || isset($_POST['btn_confirm_app']))
						{
						?>
						<th><center>Action</center></th>
						<?php
						}
						elseif(isset($_POST['btn_checked_app']))
						{}
						else
						{
						?>
						<th colspan="3" width="50px"><center>Actions</center></th>
						<?php
						}
						?>
                    </tr>
               
				<?php
				}
				?>
				   </thead>
             
                <tbody>
				
				<!-- SELECT -->
				
				<?php
				if(isset($_POST['btn_checked_app']))
				{
				/*checked*/
				$select0="select * from tbl_appointment c1 , tbl_patient c2 where c1.doc_id='$_SESSION[doc_id]' and c1.appointment_status=3 and c1.pat_id=c2.pat_id".$limit;
				$query=mysql_query($select0);
				while($row=mysql_fetch_array($query))
				{
				?>
			    <tr>
                        <td><?php echo ucfirst($row['pat_first_name']); ?></td>
						<td><?php echo $row['appointment_date']; ?></td>
						<td><?php echo $row['appointment_time']; ?></td>
						<td><?php echo $row['appointment_specification']; ?></td>
						<td><?php echo $row['appointment_status']; ?></td>
						<input type="hidden" id="m" value="<?php echo $row['pat_email_id']; ?>" />
						<?php
						if(isset($_POST['btn_pending_app']))
						{
						?>
						<td align="center"><a href="#" confirm_id=<?php echo $row['appointment_id']; ?> class="btn_confirm"><img src="img/confirm.png" width="25px" height="25px"/></a></td>
						<?php
						}
						elseif(isset($_POST['btn_confirm_app']))
						{
						?>
						<td align="center"><a href="d_button.php?checked_id=<?php echo $row['appointment_id']; ?>" ><img src="img/checked.png" width="25px" height="25px"/></a></td>
						<?php
						}
						elseif(isset($_POST['btn_checked_app']))
						{}
						else
						{
						?>
						<td style="width:20px;"><a href="#" pending_id=<?php echo $row['appointment_id']; ?> class="btn_pending"><img src="img/pending.png" width="25px" height="25px"/></a></td>
						
						<td style="width:20px;"><a href="#" confirm_id=<?php echo $row['appointment_id']; ?> class="btn_confirm"><img src="img/confirm.png" width="25px" height="25px"/></a></td>
						<?php
						}
						?>
				</tr>
				<?php
				}
				/*checked*/
				}
				else if(isset($_POST['btn_confirm_app']))
				{
				$select1="select * from tbl_appointment c1 , tbl_patient c2 where c1.doc_id='$_SESSION[doc_id]' and c1.appointment_status=2 and c1.pat_id=c2.pat_id".$limit;
				$query=mysql_query($select1);
				while($row=mysql_fetch_array($query))
				{
				?>
			    <tr>
                        
						  <?php
				if($row['member_id']==0)
				{
					$sel="select * from  tbl_patient where unique_id='$row[appo_unique_id]'";
				$qu=mysql_query($sel);
				$r=mysql_fetch_array($qu);
				?>
				<td>  <?php echo $r['pat_salutation']; ?>&nbsp;&nbsp;<?php echo ucfirst($r['pat_first_name']); ?>&nbsp;&nbsp;<?php echo ucfirst($r['pat_middle_name']); ?>&nbsp;&nbsp;<?php echo ucfirst($r['pat_last_name']); ?></td>	<?php
				}
				else
				{
				$sel="select * from  tbl_patient_member where member_unique_id='$row[appo_unique_id]'";
				$qu=mysql_query($sel);
				$rr=mysql_fetch_array($qu);
				?>
				<td> <?php echo $rr['member_salutation']; ?>&nbsp;&nbsp;<?php echo ucfirst($rr['member_first_name']); ?>&nbsp;&nbsp;<?php echo ucfirst($rr['member_middle_name']); ?>&nbsp;&nbsp;<?php echo ucfirst($rr['member_last_name']); ?></td>
				<?php
				}
				?>
						</td>
						<td><?php echo $row['appointment_date']; ?></td>
						<td><?php echo $row['appointment_time']; ?></td>
						<td><?php echo $row['appointment_specification']; ?></td>
						<td><?php echo $row['appointment_status']; ?></td>
						<?php
						if(isset($_POST['btn_pending_app']))
						{
						?>
						<td align="center"><a href="#" confirm_id=<?php echo $row['appointment_id']; ?> class="btn_confirm"><img src="img/confirm.png" width="25px" height="25px"/></a></td>
						<?php
						}
						elseif(isset($_POST['btn_confirm_app']))
						{
						?>
						<td align="center"><a href="d_button.php?checked_id=<?php echo $row['appointment_id']; ?>" ><img src="img/checked.png" width="25px" height="25px"/></a></td>
						<?php
						}
						elseif(isset($_POST['btn_checked_app']))
						{}
						else
						{
						?>
						<td style="width:20px;"><a href="#" pending_id=<?php echo $row['appointment_id']; ?> class="btn_pending"><img src="img/pending.png" width="25px" height="25px"/></a></td>
						
						<td style="width:20px;"><a href="#" confirm_id=<?php echo $row['appointment_id']; ?> class="btn_confirm"><img src="img/confirm.png" width="25px" height="25px"/></a></td>
						<?php
						}
						?>
				</tr>
				<?php
				}
				/*checked*/
				
				
				}
				else if(isset($_POST['btn_pending_app']))
				{
				$select2="select * from tbl_appointment c1 , tbl_patient c2 where c1.doc_id='$_SESSION[doc_id]' and c1.appointment_status=1 and c1.pat_id=c2.pat_id".$limit;
				$query=mysql_query($select2);
				while($row=mysql_fetch_array($query))
				{
				?>
			    <tr>
                        <td> 
						 <?php
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
				?>
				
				</td>
						<td><?php echo $row['appointment_date']; ?></td>
						<td><?php echo $row['appointment_time']; ?></td>
						<td><?php echo $row['appointment_specification']; ?></td>
						<td><?php echo $row['appointment_status']; ?></td>
						<?php
						if(isset($_POST['btn_pending_app']))
						{
						?>
						<td align="center"><a href="#" confirm_id=<?php echo $row['appointment_id']; ?> class="btn_confirm"><img src="img/confirm.png" width="25px" height="25px"/></a></td>
						<?php
						}
						elseif(isset($_POST['btn_confirm_app']))
						{
						?>
						<td align="center"><a href="d_button.php?checked_id=<?php echo $row['appointment_id']; ?>" ><img src="img/checked.png" width="25px" height="25px"/></a></td>
						<?php
						}
						elseif(isset($_POST['btn_checked_app']))
						{}
						else
						{
						?>
						<td style="width:20px;"><a href="#" pending_id=<?php echo $row['appointment_id']; ?> class="btn_pending"><img src="img/pending.png" width="25px" height="25px"/></a></td>
						
						<td style="width:20px;"><a href="#" confirm_id=<?php echo $row['appointment_id']; ?> class="btn_confirm"><img src="img/confirm.png" width="25px" height="25px"/></a></td>
						<?php
						}
						?>
				</tr>
				<?php
				}
				/*checked*/
				
				}
				else
				{
				
		$select="select * from tbl_appointment c1 , tbl_symptom c2 where appointment_status=0 and c1.sym_id=c2.sym_id and doc_id='$_SESSION[doc_id]'";
		$query=mysql_query($select);
		while($row=mysql_fetch_array($query))
		{
		?>
		  <div class="kode-alert kode-alert-icon alert2" style="width:300px; float:left; margin-left:10px; height:250px;">
            <a href="#" class="closed">&times;</a>
            <h4><i class="fa fa-google-wallet"></i>Appointment Request</h4>
           <?php echo $row['appo_unique_id'];?>
		   <br />
		   
		   <?php
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
				?>
				
		<br />    
		<?php echo $row['appointment_date'];?><br />
		<?php echo $row['appointment_time'];?><br />
		<?php echo $row['sym_name'];?><br /><br />
		 	<button confirm_id=<?php echo $row['appointment_id']; ?> class="btn_confirm" style="color:#000099">Accept</button>
            <button pending_id=<?php echo $row['appointment_id']; ?> class="btn_pending" style="color:#000099">Decline</button>
			<button delete_id=<?php echo $row['appointment_id']; ?> class="btn_delete" style="color:#000099">Delete</button>
          </div>
        
		<?php
		}
				}
				?>
                </tbody>
            </table>
			
			<table align="center" style= "width:400px">
				  <?php
				if(isset($_POST['btn_checked_app']))
				{
				?>
				<tr>
					<td><a href="manage_patient.php?page=<?php echo $prepage; ?>" class="btn btn-rounded btn-default">Prepage</a></td>
					<td><a href="manage_patient.php?page=<?php echo $nextpage; ?>" class="btn btn-rounded btn-default">Nextpage</a></td>
					<td><a href="manage_patient.php?page=<?php echo $maxpage; ?>" class="btn btn-rounded btn-default">Maxpage</a></td>
				</tr>
				<?php
				}
				else if(isset($_POST['btn_confirm_app']))
				{
				?>
				<tr>
					<td><a href="manage_patient.php?page=<?php echo $prepage; ?>" class="btn btn-rounded btn-default">Prepage</a></td>
					<td><a href="manage_patient.php?page=<?php echo $nextpage; ?>" class="btn btn-rounded btn-default">Nextpage</a></td>
					<td><a href="manage_patient.php?page=<?php echo $maxpage; ?>" class="btn btn-rounded btn-default">Maxpage</a></td>
				</tr>
				<?php
				}
				else if(isset($_POST['btn_pending_app']))
				{
				?>
			
				<tr>
					<td><a href="manage_patient.php?page=<?php echo $prepage; ?>" class="btn btn-rounded btn-default">Prepage</a></td>
					<td><a href="manage_patient.php?page=<?php echo $nextpage; ?>" class="btn btn-rounded btn-default">Nextpage</a></td>
					<td><a href="manage_patient.php?page=<?php echo $maxpage; ?>" class="btn btn-rounded btn-default">Maxpage</a></td>
				</tr>
				<?php
				}
				?>
				
			</table>

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