<?php
error_reporting(0);
include("header_laboratory.php");
include("sidebar_laboratory.php");
include("connection.php");
?>

<!-- PAGINATION -->
<?php
$noofrecords=10;
$select="select * from tbl_patient";
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
    <h1 class="title">Patient Details</h1>
  </div>
  <!-- End Page Header -->


 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTAINER -->


<div class="panel panel-default">
        <div class="panel-title">
          Patient Details
        </div>
		
        <div class="panel-body table-responsive">

            <table id="example0" class="table display">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Gender</th>
                        <th>Age</th>
                        <th>Address</th>
                        <th>Mobile Number</th>
						<th>Email Address</th>
						<th>Status</th>
                    </tr>
                </thead>
             
                <tbody>
				
				<!-- SELECT -->
				
				<?php
				
				if($_POST['btn_search'])
				{
				$search=$_POST['btn_search'];
				$select_search="select * from tbl_patient where pat_first_name like '%$search%'";
				$query=mysql_query($select_search);
				}
				elseif($_POST['btn_asc'])
				{
				$select_asc="select * from tbl_patient order by pat_first_name asc";
				$query=mysql_query($select_asc);
				}
				elseif($_POST['btn_desc'])
				{
				$select_desc="select * from tbl_patient order by pat_first_name desc";
				$query=mysql_query($select_desc);
				}
				else
				{
				$select="select * from tbl_patient".$limit;
				$query=mysql_query($select);
				}
				while($row=mysql_fetch_array($query))
				{
				?>
			    <tr>
                        <td><?php echo $row['pat_first_name']; ?></td>
						<td><?php echo $row['pat_last_name']; ?></td>
						<td><?php echo $row['pat_gender']; ?></td>
						<td><?php echo $row['pat_age']; ?></td>
						<td><?php echo $row['pat_address']; ?></td>
						<td><?php echo $row['pat_mobile_number']; ?></td>
						<td><?php echo $row['pat_email_id']; ?></td>
						<td><?php echo $row['pat_status']; ?></td>
				</tr>
				<?php
				}
				?>
                </tbody>
            </table>
			
			<table align="center" style= "width:400px">
				<tr>
					<td><a href="manage_patient.php?page=<?php echo $prepage; ?>" class="btn btn-rounded btn-default">Prepage</a></td>
					<td><a href="manage_patient.php?page=<?php echo $nextpage; ?>" class="btn btn-rounded btn-default">Nextpage</a></td>
					<td><a href="manage_patient.php?page=<?php echo $maxpage; ?>" class="btn btn-rounded btn-default">Maxpage</a></td>
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