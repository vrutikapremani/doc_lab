

<!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START SIDEBAR -->
<div class="sidebar sidebar-colorful clearfix">

<ul class="sidebar-panel nav">
  <li class="sidetitle"><i class="fa fa-user-md"></i>&nbsp; &nbsp;DOCTOR</li>
  <li><a href="home_doctor.php"><span class="icon color5"><i class="fa fa-home"></i></span>Home<span class="label label-default">8</span></a></li>

  <li><a href="d_appointment.php"><span class="icon color6"><i class="fa fa-calendar"></i></span>Appointments</a>
  </li>
  
   <li><a href="d_patient_info.php"><span class="icon color3"><i class="fa fa-file"></i></span>Patient Information</a>
  </li>
  
  <li><a href="display_d2d_report.php"><span class="icon color7"><i class="fa fa-file"></i></span>Patient Prescription</a>
  </li>
  
   <li><a href="laboratory_details.php"><span class="icon color9"><i class="fa fa-file"></i></span>Laboratory Details</a>
  </li>
  
   <li><a href="d_lab_reports.php"><span class="icon color6"><i class="fa fa-file"></i></span>Laboratory Reports</a>
  </li>
  
   <li><a href="d_medicine.php"><span class="icon color3"><i class="fa fa-plus-square"></i></span>Medicines</a>
  </li> 
  
 		<?php
		$select_pen="select * from tbl_doctor_invoice where doc_id='$_SESSION[doc_id]' and d_invoice_status=0";
		$query_pen=mysql_query($select_pen);
		$row_pen=mysql_num_rows($query_pen);
		?>
		<?php
		$select_paid="select * from tbl_doctor_invoice where doc_id='$_SESSION[doc_id]' and d_invoice_status=1";
		$query_paid=mysql_query($select_paid);
		$row_paid=mysql_num_rows($query_paid);
		?>
  
  <li><a href="#"><span class="icon color10"><i class="fa fa-credit-card"></i></span>Patient Charges<span class="caret"></span></a>
  <ul>
      <li><a href="dp_pending_payment.php">Pending Payment<span class="label label-default"><?php echo $row_pen;?></span></a></li>
	    <li><a href="dp_paid_payment.php">Paid Payment<span class="label label-default"><?php echo $row_paid;?></span></a></li>
      </ul>
  </li>
  
   <li><a href="dp_feedback.php"><span class="icon color7"><i class="fa fa-file"></i></span>Patient Feedback</a>
  </li>
  
  </ul>

<div class="sidebar-plan">
 
 
</div>

</div>
<!-- END SIDEBAR -->
<!-- //////////////////////////////////////////////////////////////////////////// --> 