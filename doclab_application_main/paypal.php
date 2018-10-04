<?php
$paypal_id='daxa.iipl-facilitator@gmail.com ';
?>		
<form method="post" action="https://www.sandbox.paypal.com/cgi-bin/webscr">
<input type="hidden" name="business" value='<?php echo $paypal_id; ?>'>
<input type='hidden' name='cmd' value='_xclick'>
<input type='hidden' name='amount' value='<?php echo $row['d_total_amount']; ?>'>
<input type="hidden" name='tax' value='5'>
<input type="hidden" name='discount_amount' value='5'>
<input type="hidden" name='handling' value='2'>
<input type="hidden" name='cbt' value="back to site">
<input type="hidden" name='item_name' value='Cards'>
<input type='hidden' name='no_shipping' value='1'>
<input type="hidden" name="quantity" value='1'>

<input type='hidden' name='return'  value='http://localhost/doc_lab/succes_payment.php'>
<table align="right">
	<div class="form-group has-success">
					
                  <label for="input6" class="col-sm-8 control-label form-label"></label>
                  <div class="col-sm-0">
					<button type="submit" class="btn btn-default"><i class="fa fa-paypal"></i>Pay Now</button>
					 &nbsp;&nbsp;&nbsp;
				  <a href="download_link.php?appointment_id=<?php echo $row4['appointment_id']; ?>"><button type="button" class="btn btn-primary"><i class="fa fa-download"></i>Download</button></a>
                  </div>
                </div>
</table>
</form>