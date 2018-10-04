<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <title>Patient's Members</title>
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
$select="select * from  tbl_patient_member where pat_id='$_SESSION[pat_id]'";
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
    <h1 class="title">Table View Of Patient's Members</h1>
     
  </div>
  <!-- End Page Header -->


 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTAINER -->





<div class="panel panel-default">
        <div class="panel-title">
          Patient Member Details
        <ul class="panel-tools">
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
            <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
          </ul>
        </div>
		<form method="post">
		<div class="div1"><input type="text" name="txt_search" placeholder="Name"/></div>
		<input type="submit" name="btn_search" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" class="search_button" title="Search"/>
		</form>
    	
		 <div class="panel-body table-responsive">

            <table id="example0" class="table display">
                <thead>
                    <tr>
                        
						<th>Unique Id</th>
						<th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
            
             	<tbody>
				
				<!-- SELECT -->
				<?php
				
				if($_POST['btn_search'])
				{
				$search=$_POST['txt_search'];
				$select_search="select * from tbl_patient_member where member_first_name like '%$search%' group by member_unique_id";
				$query=mysql_query($select_search);
				}
				else
				{
				$select="select * from  tbl_patient_member where pat_id='$_SESSION[pat_id]'".$limit;
				$query=mysql_query($select);
				}
				while($row=mysql_fetch_array($query))
				{
				?>
			    <tr>
                        
						<td><?php echo $row['member_unique_id']; ?></td>
						<td><?php echo $row['member_salutation']; ?>&nbsp;&nbsp;<?php echo ucfirst($row['member_first_name']); ?>&nbsp;&nbsp;<?php echo ucfirst($row['member_middle_name']); ?>&nbsp;&nbsp;<?php echo ucfirst($row['member_last_name']); ?></td>
						<td style="width:20px;"><a href="edit_patient_member.php?edit_id=<?php echo $row['member_id']; ?>" class="btn_edit"><img src="img/edit.jpg" width="20px" height="20px" title="Edit"/></a></td>
				</tr>
				<?php
				}
				?>
                </tbody>
            </table>
			
			<table  align="center" style= "width:400px">
				<tr>
					<td><a href="p_table_view_member.php?page=<?php echo $prepage; ?>" class="btn btn-rounded btn-default">Prepage</a></td>
					<td><a href="p_table_view_member.php?page=<?php echo $nextpage; ?>" class="btn btn-rounded btn-default">Nextpage</a></td>
					<td><a href="p_table_view_member.php?page=<?php echo $maxpage; ?>" class="btn btn-rounded btn-default">Maxpage</a></td>
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