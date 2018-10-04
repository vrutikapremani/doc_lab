<?php
include("connection.php");
$doc_id=18;
$sel="select * from tbl_doctor where doc_id=18";
$query=mysql_query($sel);
$row=mysql_fetch_array($query);
echo $sm=$row['doc_morning_start'];
echo $se=$row['doc_morning_end'];
echo $es=$row['doc_evening_start'];
echo $ee=$row['doc_evening_end'];

?>