<?php
include("connection.php");
?>


<select>
<option>---------------Select---------------</option>
<?php

$sel="select * from tbl_cities where 
	state_name='$_GET[s]'";
$query=mysql_query($sel);
while($row=mysql_fetch_array($query))
{
?>
<option value="<?php echo $row['city_name'];?>"
<?php
					  if(isset($_POST['txt_city']) && $_POST['txt_city']==$row['city_name'])
					  {
					  echo "selected='selected'";
					  }
					  ?>
><?php echo $row['city_name'];?></option>
<?php
}

?>
</select>