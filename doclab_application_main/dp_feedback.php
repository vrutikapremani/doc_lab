<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <title>Patient Feedback</title>
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
$select="select * from tbl_doctor_feedback";
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
    <h1 class="title">Patient Feedback</h1>
  </div>
  <!-- End Page Header -->


 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTAINER -->





<div class="panel panel-default">
        <div class="panel-title">
          Patient Feedback
        </div>
        <div class="panel-body table-responsive">

            <table id="example0" class="table display">
                <thead>
                    <tr>
                        <th>Patient Name</th>
                        <th>Subject</th>
                        <th>Feedback Message</th>
                    </tr>
                </thead>
             
                
                <tbody>
				
				
                    
				<!-- SELECT -->
				<?php
				$select="select * from tbl_doctor_feedback where doc_id='$_SESSION[doc_id]'".$limit;
				$query=mysql_query($select);

				while($row=mysql_fetch_array($query))
				{
				?>
			    <tr>
                        <td>Anonymous Patient</td>
						<td><?php echo $row['pdf_subject']; ?></td>
						<td><?php echo $row['pdf_message']; ?></td>
				</tr>
				<?php
				}
				?>
                </tbody>
            </table>
			
			<table align="center" style= "width:400px">
				<tr>
					<td><a href="dp_feedback.php?page=<?php echo $prepage; ?>" class="btn btn-rounded btn-default">Prepage</a></td>
					<td><a href="dp_feedback.php?page=<?php echo $nextpage; ?>" class="btn btn-rounded btn-default">Nextpage</a></td>
					<td><a href="dp_feedback.php?page=<?php echo $maxpage; ?>" class="btn btn-rounded btn-default">Maxpage</a></td>
				</tr>
			</table>



        </div>

      </div>










<!-- END CONTAINER -->
<!-- //////////////////////////////////////////////////////////////////////////// -->
<!-- Start Footer -->
<div class="row footer">
  <div class="col-md-6 text-left">
  Copyright &copy; 2016 <a href="home.php" target="_blank">Doc Lab Application</a> All rights reserved.
  </div>
</div>
<!-- End Footer -->
</div>
<!-- End Content -->
 <!-- //////////////////////////////////////////////////////////////////////////// --> 



<?php
include("footer1.php");
?>