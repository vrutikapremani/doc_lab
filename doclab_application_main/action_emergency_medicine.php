<?php
include("connection.php");
error_reporting(0);
?>

<!-- DELETE -->

<?php
if(isset($_GET['type']))
{
$select1="select * from tbl_emedicine_name c1 , tbl_emedicine_type c2 where c1.emed_type_id=c2.emed_type_id and c1.emed_type_id='$_GET[type]'";
$query1=mysql_query($select1);
while($row1=mysql_fetch_array($query1))
{ 
?>
<li><?php echo $row1['emed_name'];?></li>
<?php
}
}
?>
					