<!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START SIDEBAR -->
<div class="sidebar sidebar-colorful clearfix">
<ul class="sidebar-panel nav">
  <li class="sidetitle"><i class="fa fa-user"></i>&nbsp; &nbsp;PATIENT</li>
  <li><a href="home_patient.php"><span class="icon color5"><i class="fa fa-home"></i></span>Home<span class="label label-default">8</span></a></li>

  <li><a href="#"><span class="icon color6"><i class="fa fa-plus-square-o"></i></span>New Member<span class="caret"></span></a>
  <ul>
      <li><a href="p_add_member.php">Add New Member</a></li>
	    <li><a href="p_table_view_member.php">View Member Details</a></li>
      </ul>
  </li>
  
  <li><a href="#"><span class="icon color3"><i class="fa fa-calendar"></i></span>Appointments<span class="caret"></span></a>
  <ul>
      <li><a href="p_appointment.php">Make Appointment</a></li>
	    <li><a href="p_display_appointment.php">Display Appointment</a></li>
      </ul>
  </li>
  <li><a href="display_d2p_report.php"><span class="icon color7"><i class="fa fa-file"></i></span>Doctor Prescription</a>
  </li>
  
   <li><a href="p_previous_report.php"><span class="icon color9"><i class="fa fa-file"></i></span>Laboratory Reports</a>
  </li>
  
   <li><a href="emergency_medicine.php"><span class="icon color10"><i class="fa fa-plus-square"></i></span>Emergency Medicine</a>
  </li>
  
  
  		<?php
		$select_pen="select * from tbl_doctor_invoice where pat_id='$_SESSION[pat_id]' and d_invoice_status=0";
		$query_pen=mysql_query($select_pen);
		$row_pen=mysql_num_rows($query_pen);
		?>
		<?php
		$select_paid="select * from tbl_doctor_invoice where pat_id='$_SESSION[pat_id]' and d_invoice_status=1";
		$query_paid=mysql_query($select_paid);
		$row_paid=mysql_num_rows($query_paid);
		?>
		
   <li><a href="#"><span class="icon color6"><i class="fa fa-credit-card"></i></span>Doctor Invoice<span class="caret"></span></a>
   <ul>
      <li><a href="pd_pending_payment.php">Pending Payment<span class="label label-default"><?php echo $row_pen;?></span></a></li>
	    <li><a href="pd_paid_payment.php">Paid Payment<span class="label label-default"><?php echo $row_paid;?></span></a></li>
      </ul>
  </li>
  
  <?php
		$select_pen="select * from tbl_laboratory_invoice c1, tbl_appointment c2 where c2.pat_id='$_SESSION[pat_id]' and c1.appointment_id=c2.appointment_id and c1.l_invoice_status=0 group by c1.appointment_id";
		$query_pen=mysql_query($select_pen);
		$row_pen=mysql_num_rows($query_pen);
		?>
		<?php
		$select_paid="select * from tbl_laboratory_invoice c1, tbl_appointment c2 where c2.pat_id='$_SESSION[pat_id]' and c1.appointment_id=c2.appointment_id and c1.l_invoice_status=1 group by c1.appointment_id";
		$query_paid=mysql_query($select_paid);
		$row_paid=mysql_num_rows($query_paid);
		?>
  
   <li><a href="#"><span class="icon color3"><i class="fa fa-credit-card"></i></span>Laboratory Invoice<span class="caret"></span></a>
    <ul>
      <li><a href="pl_pending_payment.php">Pending Payment<span class="label label-default"><?php echo $row_pen;?></span></a></li>
	    <li><a href="pl_paid_payment.php">Paid Payment<span class="label label-default"><?php echo $row_paid;?></span></a></li>
      </ul>
  </li> 
  
  <li><a href="#"><span class="icon color7"><i class="fa fa-credit-card"></i></span>Feedback<span class="caret"></span></a>
    <ul>
      <li><a href="p_doctor_feedback.php">Doctor Feedback</a></li>
	    <li><a href="p_laboratory_feedback.php">Laboratory Feedback</li>
      </ul>
  </li> 
  </ul>
</div>
<!-- END SIDEBAR -->
<!-- //////////////////////////////////////////////////////////////////////////// --> 