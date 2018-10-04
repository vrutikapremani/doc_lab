<?php
error_reporting(0);
include("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
		<title>Doc Lab</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="css2/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css2/font-awesome.css">
		<link rel='stylesheet' id='camera-css'  href='css2/camera.css' type='text/css' media='all'>

		<link rel="stylesheet" type="text/css" href="css2/slicknav.css">
		<link rel="stylesheet" href="css2/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="css2/style.css">
		
		
		<script type="text/javascript" src="js2/jquery-1.8.3.min.js"></script>

		<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700|Open+Sans:700' rel='stylesheet' type='text/css'>
		<script type="text/javascript" src="js2/jquery.mobile.customized.min.js"></script>
		<script type="text/javascript" src="js2/jquery.easing.1.3.js"></script> 
		<script type="text/javascript" src="js2/camera.min.js"></script>
		<script type="text/javascript" src="js2/myscript.js"></script>
		<script src="js2/sorting.js" type="text/javascript"></script>
		<script src="js2/jquery.isotope.js" type="text/javascript"></script>
		<!--script type="text/javascript" src="js/jquery.nav.js"></script-->
		

		<script>
			jQuery(function(){
					jQuery('#camera_wrap_1').camera({
					transPeriod: 500,
					time: 3000,
					height: '490px',
					thumbnails: false,
					pagination: true,
					playPause: false,
					loader: false,
					navigation: false,
					hover: false
				});
			});
		</script>
		
	</head>
	<body>
    
    <!--home start-->
    
    <div id="home">
    	<div class="headerLine">
	<div id="menuF" class="default">
		<div class="container">
			<div class="row">
				<div class="logo col-md-4">
					<div>
						<a href="#">
							<img src="images/logo.png">						</a>					</div>
				</div>
				<div class="col-md-8">
					<div class="navmenu"style="text-align: center;">
						<ul id="menu">
							<li class="active" ><a href="#home">Home</a></li>
							<li><a href="#about">Login</a></li>
							<li><a href="#project">About Us</a></li>
							<li><a href="#news">Gallery</a></li>
							<li class="last"><a href="#contact">Contact Us</a></li>
							<!--li><a href="#features">Features</a></li-->
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
		<div class="container">
			<div class="row wrap">
				<div class="col-md-12 gallery"> 
						<div class="camera_wrap camera_white_skin" id="camera_wrap_1">
							<div data-thumb="" data-src="images/slides/blank.gif">
								<div class="img-responsive camera_caption fadeFromBottom">
									<img src="images/1 (3).jpg">								</div>
							</div>
							<div data-thumb="" data-src="images/slides/blank.gif">
								<div class="img-responsive camera_caption fadeFromBottom">
									<img src="images/home_patient.jpg">								</div>
							</div>
							<div data-thumb="" data-src="images/slides/blank.gif">
								<div class="img-responsive camera_caption fadeFromBottom">
									<img src="images/1 (1).jpg">								</div>
							</div>
						</div><!-- #camera_wrap_1 -->
				</div>
			</div>
		</div>
	</div>
		<div class="container">
			<div class="row">
				<div class="col-md-12 cBusiness">
					<h3>The Difference In Organization Is &ndash; DOC LAB APPLICATION</h3>
					<h4>Our application provides you with services that are fast, reliable and affordable.</h4>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-12 centPic">
					<img class="img-responsive"  src="images/home_doctorjpg.jpg"/>				</div>
			</div>
		</div>   
    </div>
    
    <!--about start-->    
    
    <div id="about">
    	<div class="line2">
			<div class="container">
				<div class="row Fresh">
					<div class="col-md-4 Des">
						<i class="fa fa-user"></i>
						<h4>Hopeful Patients</h4>
						<p>As long as a patient is concious, there is still a hope. </p>
					</div>
					<div class="col-md-4 Ver">
						<i class="fa fa-user-md"></i>
						<h4>Trustworthy Doctors</h4>
						<p>Doctors have an ethical duty to follow the practices and standards of care.</p>
					</div>
					<div class="col-md-4 Fully">
						<i class="fa fa-flask"></i>
						<h4>Fresh And Clean Laboratories</h4>
						<p>When it comes to clinical laboratory needs, their job is to simplify patients' jobs. </p>
					</div>		
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-12 wwa">
					<span name="about" ></span>
					<h3>LOGIN OPTIONS</h3>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row team">
				<div class="col-md-4 b1">
						<a href="login_patient.php" target="_blank"><img class="img-responsive" src="images/patient.jpg"></a>
						<h4><a href="login_patient.php" target="_blank" style="text-decoration:none">PATIENT</a></h4>
						<h5>LOGIN</h5>
				</div>
			
			
				<div class="col-md-4">
						<a href="login_doctor.php" target="_blank"><img class="img-responsive" src="images/doctor.jpg"></a>
						<h4><a href="login_doctor.php" target="_blank" style="text-decoration:none">DOCTOR</h4>
						<h5>LOGIN</h5>
				</div>
		
			
				<div class="col-md-4 b3">
						<a href="login_laboratory.php"  target="_blank"><img class="img-responsive" src="images/lab.jpg"></a>
						<h4><a href="login_laboratory.php"  target="_blank" style="text-decoration:none">LABORATORY</h4>
						<h5>LOGIN</h5>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-12 hr1">
					<hr/>
				</div>
			</div>
		</div>		
		
		
    <!--project start-->    
    <div id="project">    	
		<div class="line3">
			<div class="container">
				<div id="project1" ></div>
				<div class="row Ama">
					<div class="col-md-12">
					<span name="projects" id="projectss"></span>
					<h3>About Us</h3>
					<p>Right here we've got something about us.</p>
					</div>
				</div>
			</div>
		</div>          
    
    
       <div class="container">
		
				<div class="container">
			<div class="row aboutUs">
				<div class="col-md-12 ">
					<h3>What our application actually does?</h3>
				</div>
			</div>
		</div>
		
		<div style="position: relative;">
		
			<div class="container">
				<div class="row about">
					<div class="col-md-6">
						<div class="about1">
						<img class="pic1Ab" src="images/picAbout/aboutP1.png">
							<h3>Diagnosis</h3>
							<p>After making appointments from our apllication the patient could choose his date and time and could visit the doctor fot the diagnosis.</p>
						</div>
					</div>
					<div class="col-md-6">
						<div class="about2">
						<img class="pic2Ab" src="images/picAbout/aboutP2.png">
							<h3>Medical Counseling</h3>
							<p>Once the medical reports are made by the laboatory they would send the reports to the doctor as well as patients with a notification on it.</p>
						</div>
					</div>
				</div>
			</div>
		
			<div class="horL"></div>
		
			<div class="container">
				<div class="row about">
					<div class="col-md-6">
						<div class="about1">
						<img class="pic1Ab" src="images/picAbout/aboutP3.png">
							<h3>Medical Reports</h3>
							<p>Once the medical reports are made by the laboatory they would send the reports to the doctor as well as patients with a notification on it.</p>
						</div>
					</div>
					<div class="col-md-6">
						<div class="about2">
						<img class="pic2Ab" src="images/picAbout/aboutP4.png">
							<h3>Emergency Medication</h3>
							<p>Emergency medication could be provided by us when the particular doctors are not available and the patient is needs the medicines urgently. </p>
						</div>
					</div>
				</div>
			</div>
		
		</div>
    </div>
	  </div>
    </div>    
    
    <!--news start-->
    
    <div id="news">
    	<div class="line4">		
			<div class="container">
				<div class="row Ama">
					<div class="col-md-12">
					<h3>Our Picture Gallery</h3>
					<p>Get a glipmse of how our application actually looks like.</p>
					</div>
				</div>
			</div>
		</div>

				<div class="portfolio_block columns3   pretty" data-animated="fadeIn">	
					<div class="element col-sm-4   gall branding">
						<a class="plS" href="images/prettyPhotoImages/pic1.jpg" rel="prettyPhoto[gallery2]">
							<img class="img-responsive picsGall" src="images/prettyPhotoImages/thumb_pic1.jpg" alt="pic1 Gallery"/>
						</a>
						<div class="view project_descr ">
							
							<ul>
								<li><i class="fa fa-eye"></i>21</li>
								<li><a class="heart" href="#"><i class="fa-heart-o"></i>14</a></li>
							</ul>
						</div>
					</div>
					<div class="element col-sm-4  gall branding">
						<a class="plS" href="images/prettyPhotoImages/pic2.jpg" rel="prettyPhoto[gallery2]">
							<img class="img-responsive picsGall" src="images/prettyPhotoImages/thumb_pic2.jpg" alt="pic2 Gallery"/>
						</a>
						<div class="view project_descr center">
							
							<ul>
								<li><i class="fa fa-eye"></i>39</li>
								<li><a  class="heart" href="#"><i class="fa-heart-o"></i>86</a></li>
							</ul>
						</div>
					</div>
					<div class="element col-sm-4  gall web">
						<a class="plS" href="images/prettyPhotoImages/pic3.jpg" rel="prettyPhoto[gallery2]">
							<img class="img-responsive picsGall" src="images/prettyPhotoImages/thumb_pic3.jpg" alt="pic3 Gallery"/>
						</a>
						<div class="view project_descr ">
							
							<ul>
								<li><i class="fa fa-eye"></i>40</li>
								<li><a  class="heart" href="#"><i class="fa-heart-o"></i>24</a></li>
							</ul>
						</div>
					</div>
		
		
					<div class="element col-sm-4  gall  text_styles">
						<a class="plS" href="images/prettyPhotoImages/pic4.jpg" rel="prettyPhoto[gallery2]">
							<img class="img-responsive picsGall" src="images/prettyPhotoImages/thumb_pic4.jpg" alt="pic1 Gallery"/>
						</a>
						<div class="view project_descr ">
							
							<ul>
								<li><i class="fa fa-eye"></i>48</li>
								<li><a  class="heart" href="#"><i class="fa-heart-o"></i>69</a></li>
							</ul>
						</div>
					</div>
					<div class="element col-sm-4  gall  web">
						<a class="plS" href="images/prettyPhotoImages/pic5.jpg" rel="prettyPhoto[gallery2]">
							<img class="img-responsive picsGall" src="images/prettyPhotoImages/thumb_pic5.jpg" alt="pic1 Gallery"/>
						</a>
						<div class="view project_descr center">
							
							<ul>
								<li><i class="fa fa-eye"></i>21</li>
								<li><a  class="heart" href="#"><i class="fa-heart-o"></i>14</a></li>
							</ul>
						</div>
					</div>
					<div class="element col-sm-4  gall  polygraphy">
						<a class="plS" href="images/prettyPhotoImages/pic6.jpg" rel="prettyPhoto[gallery2]">
							<img class="img-responsive picsGall" src="images/prettyPhotoImages/thumb_pic6.jpg" alt="pic1 Gallery"/>
						</a>
						<div class="view project_descr ">
							<ul>
								<li><i class="fa fa-eye"></i>75</li>
								<li><a  class="heart" href="#"><i class="fa-heart-o"></i>23</a></li>
							</ul>
						</div>
					</div>		
					
					
					<script type="text/javascript">
				jQuery(window).load(function(){
					items_set = [
					
						{category : 'branding', lika_count : '77', view_count : '234', src : 'images/prettyPhotoImages/1(1).jpg', title : 'Foil Mini Badges', content : '' },
						
						{category : 'polygraphy', lika_count : '45', view_count : '100', src : 'images/prettyPhotoImages/1(2).jpg', title : 'Darko – Business Card Mock Up', content : '' },
						
						{category : 'text_styles', lika_count : '22', view_count : '140', src : 'images/prettyPhotoImages/1(3).jpg', title : 'Woody Poster Text Effect', content : '' }
						

					];
					jQuery('.portfolio_block').portfolio_addon({
						type : 1, // 2-4 columns simple portfolio
						load_count : 3,
						
						items : items_set
					});
					$('#container').isotope({
					  animationOptions: {
						 duration: 900,
						 queue: false
					   }
					});
				});
			</script>
	  </div>
	</div>
					
		
		
					
					
			

    <!--contact start-->
    
    <div id="contact">
    	<div class="line5">					
			<div class="container">
				<div class="row Ama">
					<div class="col-md-12">
					<h3>Got a Question? We&rsquo;re Here to Help!</h3>
					<p>Get in touch with us</p>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-9 col-xs-12 forma">
				<?php
				if(isset($_POST['btn_submit']))
				{
				$insert="insert into tbl_query values
				(
				'',
				'$_POST[name]',
				'$_POST[Email]',
				'$_POST[Subject]',
				'$_POST[Message]',
				'0'
				)";
				$query=mysql_query($insert);
				?>
				<script>alert("Your Query Successfully Added.");</script>
				<?php
				}
				?>
					<form method="post">
						<input type="text" class="col-md-6 col-xs-12 name" name='name' placeholder='Name *'/>
						<input type="text" class="col-md-6 col-xs-12 Email" name='Email' placeholder='Email *'/>
						<input type="text" class="col-md-12 col-xs-12 Subject" name='Subject' placeholder='Subject'/>
						<textarea type="text" class="col-md-12 col-xs-12 Message" name='Message' placeholder='Message *'></textarea>
						<div class="cBtn col-xs-12">
							<ul>
								<li><input type="submit" name="btn_submit" value="Submit"></li>
									<li><input type="reset" name="btn_reset" value="Clear"></li>
							</ul>
						</div>
					</form>
				</div>
				<div class="col-md-3 col-xs-12 cont">
					<ul>
						<li><i class="fa fa-home"></i>502, Niharika Appartments, Collegewadi, Rajkot, Gujarat, India</li>
						<li><i class="fa fa-phone"></i>+91-9429563295 , +91-9909127773</li>
						<li><a href="#"><i class="fa fa-envelope"></i>mail@compname.com</li></a>
						<li><i class="fa fa-skype"></i>compname</li>
						<li><a href="#"><i class="fa fa-twitter"></i>Twitter</li></a>
						<li><a href="#"><i class="fa fa-facebook-square"></i>Facebook</li></a>
						<li><a href="#"><i class="fa fa-dribbble"></i>Dribbble</li></a>
						<li><a href="#"><i class="fa fa-flickr"></i>Flickr</li></a>
						<li><a href="#"><i class="fa fa-youtube-play"></i>YouTube</li></a>
					</ul>
				</div>
			</div>
		</div>
		<div class="line6">
					<iframe src="https://www.google.co.in/maps/place/Rajkot,+Gujarat/@22.2734269,70.6812075,11z/data=!3m1!4b1!4m2!3m1!1s0x3959c98ac71cdf0f:0x76dd15cfbe93ad3b" width="100%" height="750" frameborder="0" style="border:0"></iframe>	https://www.google.co.in/maps/place/Rajkot,+Gujarat/@22.2734269,70.6812104,11z/data=!3m1!4b1!4m5!3m4!1s0x3959c98ac71cdf0f:0x76dd15cfbe93ad3b!8m2!3d22.3038945!4d70.8021599		
		</div>
		<div class="container">
			<div class="row ftext">
				<div class="col-md-12">
				<a id="features"></a>
				<h3>We Care About Our Clients and Can Make Their Life Easier!</h3>
				</div>
			</div>
		</div>
		<div class="lineBlack">
			<div class="container">
				<div class="row downLine">
					<div class="col-md-12 text-right">
						<!--input  id="searchPattern" type="search" name="pattern" value="Search the Site" onblur="if(this.value=='') {this.value='Search the Site'; }" onfocus="if(this.value =='Search the Site' ) this.value='';this.style.fontStyle='normal';" style="font-style: normal;"/-->
						<input  id="searchPattern" type="search" placeholder="Search the Site"/><i class="glyphicon glyphicon-search" style="font-size: 13px; color:#a5a5a5;" id="iS"></i>					</div>
					<div class="col-md-6 text-left copy">
						<p>Copyright &copy; 2016 Doc Lab Application. All Rights Reserved.</p>
					</div>
					<div class="col-md-6 text-right dm">
						<ul id="downMenu">
							<li class="active"><a href="#home">Home</a></li>
							<li><a href="#about">Login</a></li>
							<li><a href="#project1">About Us</a></li>
							<li><a href="#news">GAllery</a></li>
							<li class="last"><a href="#contact">Contact Us</a></li>
							<!--li><a href="#features">Features</a></li-->
						</ul>
					</div>
				</div>
			</div>
		</div>
    </div>		
		
		
	<script src="js2/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
	<script src="js2/bootstrap.min.js"></script>
	<script src="js2/jquery.slicknav.js"></script>
	<script>
			$(document).ready(function(){
			$(".bhide").click(function(){
				$(".hideObj").slideDown();
				$(this).hide(); //.attr()
				return false;
			});
			$(".bhide2").click(function(){
				$(".container.hideObj2").slideDown();
				$(this).hide(); // .attr()
				return false;
			});
				
			$('.heart').mouseover(function(){
					$(this).find('i').removeClass('fa-heart-o').addClass('fa-heart');
				}).mouseout(function(){
					$(this).find('i').removeClass('fa-heart').addClass('fa-heart-o');
				});
				
				function sdf_FTS(_number,_decimal,_separator)
				{
				var decimal=(typeof(_decimal)!='undefined')?_decimal:2;
				var separator=(typeof(_separator)!='undefined')?_separator:'';
				var r=parseFloat(_number)
				var exp10=Math.pow(10,decimal);
				r=Math.round(r*exp10)/exp10;
				rr=Number(r).toFixed(decimal).toString().split('.');
				b=rr[0].replace(/(\d{1,3}(?=(\d{3})+(?:\.\d|\b)))/g,"\$1"+separator);
				r=(rr[1]?b+'.'+rr[1]:b);

				return r;
}
				
			setTimeout(function(){
					$('#counter').text('0');
					$('#counter1').text('0');
					$('#counter2').text('0');
					setInterval(function(){
						
						var curval=parseInt($('#counter').text());
						var curval1=parseInt($('#counter1').text().replace(' ',''));
						var curval2=parseInt($('#counter2').text());
						if(curval<=707){
							$('#counter').text(curval+1);
						}
						if(curval1<=12280){
							$('#counter1').text(sdf_FTS((curval1+20),0,' '));
						}
						if(curval2<=245){
							$('#counter2').text(curval2+1);
						}
					}, 2);
					
				}, 500);
			});
	</script>
	<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('#menu').slicknav();
		
	});
	</script>
	
	<script type="text/javascript">
    $(document).ready(function(){
       
        var $menu = $("#menuF");
            
        $(window).scroll(function(){
            if ( $(this).scrollTop() > 100 && $menu.hasClass("default") ){
                $menu.fadeOut('fast',function(){
                    $(this).removeClass("default")
                           .addClass("fixed transbg")
                           .fadeIn('fast');
                });
            } else if($(this).scrollTop() <= 100 && $menu.hasClass("fixed")) {
                $menu.fadeOut('fast',function(){
                    $(this).removeClass("fixed transbg")
                           .addClass("default")
                           .fadeIn('fast');
                });
            }
        });
	});
    //jQuery
	</script>
	<script>
		/*menu*/
		function calculateScroll() {
			var contentTop      =   [];
			var contentBottom   =   [];
			var winTop      =   $(window).scrollTop();
			var rangeTop    =   200;
			var rangeBottom =   500;
			$('.navmenu').find('a').each(function(){
				contentTop.push( $( $(this).attr('href') ).offset().top );
				contentBottom.push( $( $(this).attr('href') ).offset().top + $( $(this).attr('href') ).height() );
			})
			$.each( contentTop, function(i){
				if ( winTop > contentTop[i] - rangeTop && winTop < contentBottom[i] - rangeBottom ){
					$('.navmenu li')
					.removeClass('active')
					.eq(i).addClass('active');				
				}
			})
		};
		
		$(document).ready(function(){
			calculateScroll();
			$(window).scroll(function(event) {
				calculateScroll();
			});
			$('.navmenu ul li a').click(function() {  
				$('html, body').animate({scrollTop: $(this.hash).offset().top - 80}, 800);
				return false;
			});
		});		
	</script>	
	<script type="text/javascript" charset="utf-8">

		jQuery(document).ready(function(){
			jQuery(".pretty a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:3000, autoplay_slideshow: true, social_tools: ''});
			
		});
	</script>
	</body>
	
</html>