

<!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START SIDEBAR -->
<div class="sidebar sidebar-colorful clearfix">

<ul class="sidebar-panel nav">
  <li class="sidetitle"><i class="fa fa-flask"></i>&nbsp; &nbsp;LABORATORY</li>
  <li><a href="home_laboratory.php"><span class="icon color5"><i class="fa fa-home"></i></span>Home<span class="label label-default">6</span></a></li>

  <li><a href="display_d2l_report.php"><span class="icon color6"><i class="fa fa-calendar"></i></span>Reports Requests</a>
  </li>
  
  <li><a href="l_report_table_view.php"><span class="icon color3"><i class="fa fa-file"></i></span>Patient Reports</a>
  </li>
  
   <li><a href="doctor_details.php"><span class="icon color7"><i class="fa fa-file"></i></span>Doctor Details</a>
  </li>
  
   <li><a href="l_test_name.php"><span class="icon color9"><i class="fa fa-file"></i></span>Name Of Tests</a>
  </li>
  
  		<?php
		$select_pen="select * from tbl_laboratory_invoice where lab_id='$_SESSION[lab_id]' and l_invoice_status=0";
		$query_pen=mysql_query($select_pen);
		$row_pen=mysql_num_rows($query_pen);
		?>
		<?php
		$select_paid="select * from tbl_laboratory_invoice where lab_id='$_SESSION[lab_id]' and l_invoice_status=1";
		$query_paid=mysql_query($select_paid);
		$row_paid=mysql_num_rows($query_paid);
		?>
  
   <li><a href="#"><span class="icon color10"><i class="fa fa-credit-card"></i></span>Patient Charges<span class="caret"></span></a>
  <ul>
      <li><a href="lp_pending_payment.php">Pending Payment<span class="label label-default"><?php echo $row_pen;?></span></a></li>
	    <li><a href="lp_paid_payment.php">Paid Payment<span class="label label-default"><?php echo $row_paid;?></span></a></li>
      </ul>
  </li>
  
  <li><a href="lp_feedback.php"><span class="icon color9"><i class="fa fa-file"></i></span>Patient Feedback</a>
  </li>

<div class="sidebar-plan">
 
 
</div>

</div>
<!-- END SIDEBAR -->
<!-- //////////////////////////////////////////////////////////////////////////// --> 

