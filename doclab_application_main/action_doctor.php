<?php
include("connection.php");
?>

<!-- DELETE -->
<?php
if(isset($_GET['delete_value']))
{
$delete="delete from tbl_doctor where 
doc_id='$_GET[delete_value]'";
$query=mysql_query($delete);
}
?>
				
<!-- APPROVE -->
<?php
if(isset($_GET['approve_value']))
{
$update="update tbl_doctor set doc_status=1 where  
doc_id='$_GET[approve_value]'";
$query=mysql_query($update);
}
?>
				
<!-- REJECT -->
<?php
if(isset($_GET['reject_value']))
{
$update="update tbl_doctor set doc_status=0 where  
doc_id='$_GET[reject_value]'";
$query=mysql_query($update);
}
?>