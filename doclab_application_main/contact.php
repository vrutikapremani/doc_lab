<?php
include('header.php');
?>
<?php
if(isset($_POST["btn_submit"]))
{
	$count=0;
	if($_POST['txt_name']=="")
	{
		$count++;
		$al_name="*";
	}
	if($_POST['txt_company']=="")
	{
		$count++;
		$al_com="*";
	}
	if($_POST['txt_email']=="")
	{
		$count++;
		$al_email="*";
	}
	
	if($_POST['txt_city']=="")
	{
		$count++;
		$al_ct="*";
	}
	
	if($_POST['txt_no']=="")
	{
		$count++;
		$al_no="*";
	}
	if($_POST['txt_message']=="")
	{
		$count++;
		$al_msg="*";
	}
	
	if($_POST['captcha']=="")
	{
		$count++;
		$al_captcha="Enter Captcha Code.";
	}
	elseif($_SESSION["captcha"]!=$_POST["captcha"])
	{
		$count++;
		$al_captcha='CAPTHCA is not valid; ignore submission';
	}
	if($count==0)
	{
		mysql_query("insert into tbl_contact values(
		'',
		'$_POST[txt_name]',
		'$_POST[txt_company]',
		'$_POST[txt_email]',
		'$_POST[txt_city]',
		'$_POST[txt_no]',
		'$_POST[txt_message]',
		'1'
		)");
		?>
		<script>
			alert("THANKS!! for your valuable message.");
		</script>
		<?php
	}

}
?>

	<div id="containt">
		<div id="set_cnt">
		<span id="cnt_head"><span class="fadeInUp all_cnt_head"> Lets Get In Touch </span>
		<br><br>
		<span style="font-size:17px; color:#00ADEF; font-weight:normal;">We would like to hear from your side.Feel free to contact us.</span>
		</span><br><br>
		<form method="post">
		<div id="contact_div">
			<div class="cont_field">
				<div class="field_left">
				Name:
				</div>
				<div class="field_right">
				<input type="text" name="txt_name" placeholder="Enter Your Name">
				</div>
				
				<div class="field_valid">
				<?php echo $al_name;?>
				</div>
				
				
				<div class="field_left">
				Company:
				</div>
				<div class="field_right">
				<input type="text" name="txt_company" placeholder="Enter Your Company Name">
				</div>
				
				<div class="field_valid">
				<?php echo $al_com;?>
				</div>
				
				<div class="field_left">
				Email:
				</div>
				<div class="field_right">
				<input type="text" name="txt_email" placeholder="Enter Your E-mail">
				</div>
				
				<div class="field_valid">
				<?php echo $al_email;?>
				</div>
				
				<div class="field_left">
				City:
				</div>
				<div class="field_right">
				<input type="text" name="txt_city" placeholder="Enter Your City">
				</div>
				
				<div class="field_valid">
				<?php echo $al_ct;?>
				</div>
				
				<div class="field_left">
				Contact No.:
				</div>
				<div class="field_right">
				<input type="text" name="txt_no" placeholder="Enter Your Contact Number">
				</div>
				
				<div class="field_valid">
				<?php echo $al_no;?>
				</div>
				
				<div class="field_left">
				Message:
				</div>
				<div class="field_right texta">
				<textarea name="txt_message" placeholder="Enter Your Thoughts Here" rows="5"></textarea>
				</div>
				
				<div class="field_valid">
				<?php echo $al_msg;?>
				</div>
				
				
				<div class="field_left">
				Captcha:
				</div>
				<div class="field_right captcha">
				<img src="captcha.php" align="left" height="30px" alt="captcha image">
				
				<input type="text" name="captcha" size="6" maxlength="6">
				
				</div>
				
				
				<div class="field_valid">
				
				</div>
				
				
				<div class="field_left">
				
				</div>
				<div class="field_right">
					<span style="color:red">
					<?php
					echo $al_captcha;
					?>
					</span>
				</div>
				<div class="field_valid">
				
				</div>
				
				<div class="field_left">
				
				</div>
				<div class="field_right texta">
				<input type="submit" value="Submit" class="btn_submit" name="btn_submit">
				<input type="reset" value="Clear" class="btn_submit" name="btn_clear">
				</div>
				
			</div>
		</div>
		</form>
		<div id="ref_our">
		<br>
		<center>
		<img src="images/marker-icon.png">
		<br>
		<span style="color:#0671D1">USA Office</span>
		<br>
		128 Carlton avenue,<br />
		First Floor,Jersey city,<br />
		NJ 07306, USA.
		<br /><br />
		<span style="color:#0671D1">India Office</span>
		<br />
		Rajat-2 ,First Floor Jalaram Society,
		University Road,<br />
		Rajkot-360005,Gujarat, India.
		<br />
		<img align="middle" src="images/mai.png" height="50px" width="50px">
		<br>
		info@paramsoftglobalsolutions.com
		</center>
		<center>
		
		<img src="images/call.png" height="50px" width="50px">
		<br>
		+91-9998092970<br />
		</center>
		</div>
		
		
		<div id="social_area">
			<label>Let's More Engage With Each Other</label>
			<div style="margin-top:100px;">
			<div id="real_gplus">
			<a href="https://plus.google.com/u/0/106396655238040844003" target="_blank" style="float:left; text-decoration:none; margin-top:10%; height:90%; width:100%;">
			<img src="images/gplus.jpg">
			<br /><u>Google+</u><br />
			<span style="color:#999999;">Add Us To Your Circles</span>
			</a>
			</div>
			<div id="gplus_social">
			
			</div>

			<div id="real_fb">
			<a href="https://www.facebook.com/paramsoftglobalsolutions" style="float:left; text-decoration:none; margin-top:10%; height:90%; width:100%;" target="_blank">
			<img src="images/fb.jpg">
			<br /><u>Facebook</u><br />
			<span style="color:#999999;">Like Our Page</span>
			</a>
			</div>
			<div id="fb_social">
			
			</div>
			
			<div id="real_twitter">
			<a href="https://twitter.com/ParamsoftG" style="float:left; text-decoration:none; margin-top:10%; height:90%; width:100%;" target="_blank">
			<img src="images/twitter.jpg">
			<br /><u>Twitter</u><br />
			<span style="color:#999999;">Follow Us</span>
			</a>
			</div>

			<div id="twitter_social">
			
			</div>
			
			<div id="real_linkidn">
			<a href="https://www.linkedin.com/groups/7029076" style="float:left; text-decoration:none; margin-top:10%; height:90%; width:100%;" target="_blank">
			<img src="images/linkidn.jpg">
			<br /><u>Linkidn</u><br />
			<span style="color:#999999;">Connect With Us</span>
			</a>
			</div>
			<div id="linkidn_social">
			
			</div>
			</div>
			
		</div>
		</div>
	
	</div>
<style>
      #map {
        width: 100%;
        height: 400px;
		background-color:#ccc;
		clear:both;
      }
    </style>
	 <script src="https://maps.googleapis.com/maps/api/js"></script>
<script>
  function initialize() {
   var position = new google.maps.LatLng(22.288563, 70.771237);
        var mapCanvas = document.getElementById('map');
        var mapOptions = {
          center: new google.maps.LatLng(22.288563, 70.771237),
          zoom: 16,
          mapTypeId: google.maps.MapTypeId.ROADMAP
		  
        };
		 
		
        var map = new google.maps.Map(mapCanvas, mapOptions);
		
	 var marker = new google.maps.Marker({
        position: position,
        map: map,
        title:"This is the place."
    });
     google.maps.event.addListener(marker, 'click', function() {
      infowindow.open(map,marker);
    });
 
}
$(window).load(function(){
 initialize();
});
</script>
<div id="map"></div>

<?php
include('footer.php');
?>
