<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <title> Emergency Medicine Name</title>
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


<!-- VALIDATION -->
<?php
$count="";
if(isset($_POST['btn_submit']))
{
$type=$_POST['ddl_type'];
if($type=="---------------Select Emergency Medicine Symptom---------------")
{
?>
<style>
#c1
{
border:solid 1px red;
}
</style>
<?php
$n1="Select The Symptom Of Emergency Medicine.";
$count++;
}

$name=$_POST['txt_name'];
if($name=="")
{
?>
<style>
#c2
{
border:solid 1px red;
}
</style>
<?php
$n2="Enter The Name Of Emergency Medicine.";
$count++;
}


}
?>

<?php
if(isset($_POST['btn_submit']) && $count==0)
{
$insert="insert into tbl_emedicine_name values
(
'',
'$_POST[ddl_type]',
'$_POST[txt_name]',
'0'
)";
$query=mysql_query($insert);
}
?>

<script type="text/javascript">
function emed()
{

//alert();
var type=document.getElementById("sym").value;
$.ajax({
type:"GET",
url:"action_emergency_medicine.php",
data:{type:type},
success:function(response){
$("#med").html(response);
}
});
}
</script>

 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTENT -->
<div class="content">

  <!-- Start Page Header -->
  <div class="page-header">
    <h1 class="title">Emergency Medicine Name</h1>
    
  </div>
  <!-- End Page Header -->


 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTAINER -->

<div class="panel panel-default">

        <div class="panel-title">
         Emergency Medicine Name 
          <ul class="panel-tools">
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
            <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
          </ul>
        </div>

            <div class="panel-body">
              <form method="post" class="form-horizontal">
				
				<div class="form-group has-success">
                  <label for="input7" class="col-sm-3 control-label form-label">Medicine Symptom :</label>
                  <div class="col-sm-5">
                      <select name="ddl_type" class="form-control" id="sym" autofocus onchange="emed()">
					  <option>---------------Select Medicine Symptom---------------</option>
					  <?php
					  $select="select * from tbl_emedicine_type";
					  $query=mysql_query($select);
					  while($row=mysql_fetch_array($query))
					  {
					  ?>
					  <option value="<?php echo $row['emed_type_id'];?>"><?php echo $row['emed_type'];?></option>
					  <?php
					  }
					  ?>
					  </select>
                  </div>
				  	<div class="col-sm-4" id="validation_alert">
					<?php echo $n1; ?>
					</div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input6" class="col-sm-3 control-label form-label">Emergency Medicine Name :</label>
                  <div class="col-sm-5">
				  <ul id="med">
			      </ul>
                  </div>
				  	<div class="col-sm-4" id="validation_alert">
					<?php echo $n2; ?>
					</div>
                </div>
	
				
				</form> 

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