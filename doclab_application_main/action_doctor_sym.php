<?php
include("connection.php");
?>

<!-- DELETE -->
<select>
<option>---------------Select---------------</option>
<?php
if(isset($_GET['type']))
{
$sel="select *  from tbl_doctor_fos c1 , tbl_specialist c2 where
c1.fos_id=c2.fos_id and  
c2.sym_id='$_GET[type]'";
$query=mysql_query($sel);
while($row=mysql_fetch_array($query))
{
?>
<option value="<?php echo $row['fos_id'];?>"
><?php echo ucfirst($row['fos_type']);?></option>
<?php
}
}
?>
</select>