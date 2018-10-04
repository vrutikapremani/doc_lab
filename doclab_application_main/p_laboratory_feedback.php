<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <title>Laboratory Feedback</title>
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

<!------------------------------ VALIDATION ---------------------------->
<script type="text/javascript">

<!------------------------------------- SELECT LABORATORY ----------------------------------->
function c1()
{
var la=document.plf.ddl_laboratory.value;
if(la=="---------------Select Laboratory---------------")
{
document.getElementById("laboratory").innerHTML="Select Laboratory.";
document.getElementById("laboratory").style.color="red";
document.getElementById("lab").style.border="solid 1px red";
return false;
}
else
{
document.getElementById("laboratory").innerHTML="";
}
}

<!------------------------------------- SUBJECT ----------------------------------->
function c2()
{
var su=document.plf.txt_subject.value;
if(su=="")
{
document.getElementById("subject").innerHTML="Enter Your Subject.";
document.getElementById("subject").style.color="red";
document.getElementById("sub").style.border="solid 1px red";
return false;
}
else if(su.length<3)
{
document.getElementById("subject").innerHTML="Subject Too Short";
document.getElementById("subject").style.color="red";
document.getElementById("sub").style.border="solid 1px red";
return false;
}
else
{
document.getElementById("subject").innerHTML="";
}
}

<!------------------------------------- MESSAGE ----------------------------------->
function c3()
{
var me=document.plf.txt_message.value;
if(me=="")
{
document.getElementById("message").innerHTML="Enter Your Message.";
document.getElementById("message").style.color="red";
document.getElementById("mess").style.border="solid 1px red";
return false;
}
else if(me.length<3)
{
document.getElementById("message").innerHTML="Message Too Short";
document.getElementById("message").style.color="red";
document.getElementById("mess").style.border="solid 1px red";
return false;
}
else
{
document.getElementById("message").innerHTML="";
}
}

</script>

<!---------------- PHP VALIDATION ------------------>
<?php
$count="";
if(isset($_POST['btn_submit']))
{

//Laboratory Selection
$laboratory=$_POST['ddl_laboratory'];
if($laboratory=="---------------Select Laboratory---------------")
{
?>
<style>
#doc
{
border:solid 1px red;
}
</style>
<?php
$n1="Select Laboratory.";
$count++;
}

//Subject
$subject=$_POST['txt_subject'];
if($subject=="")
{
?>
<style>
#sub
{
border:solid 1px red;
}
</style>
<?php
$n2="Enter Your Subject.";
$count++;
}
else if(strlen($subject)<3)
{
?>
<style>
#sub
{
border:solid 1px red;
}
</style>
<?php
$n2="Subject Too Short.";
$count++;
}
	
//Message
$message=$_POST['txt_message'];
if($message=="")
{
?>
<style>
#mess
{
border:solid 1px red;
}
</style>
<?php
$n3="Enter Your Message.";
$count++;
}
else if(strlen($message)<3)
{
?>
<style>
#mess
{
border:solid 1px red;
}
</style>
<?php
$n3="Message Too Short.";
$count++;
}

}
?>

<!-- INSERT -->
<?php
if(isset($_POST['btn_submit']) && $count==0)
{
$date=date(Y)-date(m)-date(d);
$s="select * from tbl_laboratory_feedback where lab_id='$_POST[ddl_laboratory]'";
$q=mysql_query($s);
$n=mysql_num_rows($q);

if($n==0)
{
$insert="insert into tbl_laboratory_feedback values
(
'',
'$_POST[ddl_laboratory]',
'$_POST[txt_subject]',
'$_POST[txt_message]',
now(),
'0'
)";
$query=mysql_query($insert);
?>
<script>
alert("Feedback Submitted."); 
</script>
<?php
}
else
{
?>
<script>
alert("Feedback Already Submitted."); 
</script>
<?php

}
}

?>

 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTENT -->
<div class="content">


  <!-- Start Page Header -->
  <div class="page-header">
   <h1 class="title">Laboratory Feedback</h1>

    <!-- Start Page Header Right Div -->
    <div class="right">
      <div class="btn-group" role="group" aria-label="...">
      </div>
    </div>
    <!-- End Page Header Right Div -->

  </div>
 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTAINER -->

<div class="panel panel-default">

        <div class="panel-title">
		
          <ul class="panel-tools">
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
            <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
          </ul>
        </div>

            <div class="panel-body">
			
			<form method="post" class="form-horizontal" name="plf" enctype="multipart/form-data">
			  
			  <div class="form-group has-success">
                  <label for="input7" class="col-sm-3 control-label form-label">Laboratory Name :</label>
                  <div class="col-sm-5">
                  <select name="ddl_laboratory" class="form-control" id="lab" onBlur="return c1()" autofocus>
				  <option>---------------Select Laboratory---------------</option>
                    <?php
					$select="select * from tbl_doctor_prescription_report c1, tbl_laboratory c2 where c1.lab_id=c2.lab_id group by c1.lab_id";
					$query=mysql_query($select);
					while($row=mysql_fetch_array($query))
					{
					?>
					<option value="<?php echo $row['lab_id'];?>"
					<?php
					  if(isset($_POST['ddl_laboratory']) && $_POST['ddl_laboratory']==$row['lab_id'])
					  {
					  echo "selected='selected'";
					  }
					  ?>  
					><?php echo ucfirst($row['lab_name']);?></option>
					<?php
					}
					?>
					</select>
                  </div>
				  <div class="col-sm-4" id="laboratory" style="color:#FF0000;">
					<?php echo $n1; ?>
					</div>
                </div>

			 <div class="form-group has-success">
                  <label for="input7" class="col-sm-3 control-label form-label">Subject :</label>
                  <div class="col-sm-5">
                      <input type="text" name="txt_subject" class="form-control" id="sub" onBlur="return c2()" value="<?php echo $_POST['txt_subject'];?>">
                  </div>
				  	<div class="col-sm-4" id="subject" style="color:#FF0000;">
					<?php echo $n2; ?>
					</div>
                </div>
				
				<div class="form-group has-success">
                  <label for="input7" class="col-sm-3 control-label form-label">Message :</label>
                  <div class="col-sm-5">
                      <textarea type="text" name="txt_message" class="form-control" id="mess" onBlur="return c3()"><?php echo $_POST['txt_message'];?></textarea>
                  </div>
				  <div class="col-sm-4" id="message" style="color:#FF0000;">
					<?php echo $n3; ?>
					</div>
                </div>
				
				
					<div class="form-group has-success">
                  <label for="input6" class="col-sm-3 control-label form-label"></label>
                  <div class="col-sm-5">
                     <center> <input type="submit" name="btn_submit" value="Submit" class="btn-default" >
					  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					  <input type="reset" name="btn_reset" value="Clear" class="btn-default">
					  </center>
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
  <div class="col-md-6 text-right">
  </div> 
</div>
<!-- End Footer -->


<?php
include("footer.php");
?>