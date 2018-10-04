<?php
include("connection.php");
?>


<select>
<option>---------------Select---------------</option>
<?php
if(isset($_GET['type']))
{
$sel="select *  from tbl_doctor where 
	doc_field_of_specialization='$_GET[type]'";
$query=mysql_query($sel);
while($row=mysql_fetch_array($query))
{
?>
<option value="<?php echo $row['doc_id'];?>"

>Dr.&nbsp;&nbsp;<?php echo ucfirst($row['doc_first_name']);?>&nbsp;&nbsp;<?php echo ucfirst($row['doc_last_name']);?></option>
<?php
}
}
?>
</select>