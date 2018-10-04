<?php
error_reporting(0);
?>  
					<?php
					include("connection.php");
					$select2="select * from tbl_medical_test where med_report_id='$_GET[r_id]'";
					$query2=mysql_query($select2);
					while($row2=mysql_fetch_array($query2))
					{
					?>
					<div>
                   <input type="checkbox" name="chk_testname[]" value="<?php echo $row2['med_test_id'];?>" style=" position:absolute; margin-left:0px; margin-top:-5px;" /> &nbsp; &nbsp; &nbsp;
                         <?php echo $row2['med_test_name'];?>
                    </div>
                  
                    
					<?php
					}
					?>
					
					<?php
					include("connection.php");
					$select4="select * from tbl_medicine_name where med_type_id='$_GET[name_id]'";
					$query4=mysql_query($select4);
					while($row4=mysql_fetch_array($query4))
					{
					?>
					<div>
                   <input type="checkbox" name="chk_medname[]" value="<?php echo $row4['med_name_id'];?>" style=" position:absolute; margin-left:0px; margin-top:-5px;" /> &nbsp; &nbsp; &nbsp;
                         <?php echo $row4['med_name'];?>
                    </div>
                  
                    
					<?php
					}
					?>