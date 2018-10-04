<?php
include("connection.php");
?>

<!-- PENDING -->
<?php
if(isset($_GET['pending_value']))
{
$update="update tbl_appointment set appointment_status=1 where  
appointment_id='$_GET[pending_value]'";
$query=mysql_query($update);
}
?>
				
<!-- CONFIRM -->
<?php
if(isset($_GET['confirm_value']))
{
$update="update tbl_appointment set appointment_status=2 where  
appointment_id='$_GET[confirm_value]'";
$query=mysql_query($update);

$to=$_GET['mail'];
$subject="Appointment Confirmation Mail";
$txt="Your Appointment Is Confirm";
$headers="From:doclabapplication@gmail.com";
mail($to,$subject,$txt,$headers);
}
?>
	
<!-- CHECKED -->
<?php
if(isset($_GET['checked_value']))
{
$update="update tbl_appointment set appointment_status=3 where  
appointment_id='$_GET[checked_value]'";
$query=mysql_query($update);
}
?>			

<!-- DELETE -->
<?php
if(isset($_GET['delete_value']))
{
$delete="delete from tbl_appointment where 
appointment_id='$_GET[delete_value]'";
$query=mysql_query($delete);
}
?>