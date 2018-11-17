<?php require_once('inc/header.php') ?>
<body>
<div class="Main-agile">
<!-- banner -->
	<div class="banner">
		<div class="container">
			<div class="col-md-4 agile1">
				<nav class="navbar navbar-default">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
					  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					  </button>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
						<nav class="stroke">
							<ul class="nav navbar-nav">
								<li class="active"><a href="index.php">Home</a></li>
								<li><a href="about.php">About Us</a></li>
								<li class="dropdown menu__item menu__item--current">
									<a href="#" class="dropdown-toggle menu__link"  data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Patient<span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li><a href="emergency_form.php">Emergency Admit</a></li>
										<li><a href="patient_registration.php">Patient Registration</a></li>
									</ul>
								</li>
								<li class="dropdown menu__item menu__item--current">
									<a href="#" class="dropdown-toggle menu__link"  data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Doctors<span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li><a href="doctors_login.php">Doctors Login</a></li>
										<li><a href="doctors_information.php">Doctors Information</a></li>
									</ul>
								</li>
								<li><a href="mail.php">Mail Us</a></li>
							</ul>
						</nav>
					</div>
					<!-- /.navbar-collapse -->
				</nav>
			</div>
			<div class="col-md-4 logo">
				<div class="logo-w3l">
					<i class="fa fa-stethoscope" aria-hidden="true"></i>
				</div>
				<h1><a href="index.php">Human Beat<span>Care For you</span></a></h1>
			</div>
			<div class="col-md-4 ph-agile">
				<p><i class="fa fa-phone" aria-hidden="true"></i><span>+8801740284027</span></p>
			</div>
			<div class="clearfix"> </div>
			<!-- banner-text -->
			<div class="slider">
				<div class="callbacks_container">
					<ul class="rslides callbacks callbacks1" id="slider4">
						<li>
							<div class="w3layouts-banner-top">
								<div class="container">
									<div class="agileits-banner-info">
										<h3>Best Treatments</h3>
										<p>We Provide the Best Medical Services.</p>
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="w3layouts-banner-top">
								<div class="container">
									<div class="agileits-banner-info">
										<h3>We Provide</h3>
										<p>Medical Services that you can Trust.</p>
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="w3layouts-banner-top">
								<div class="container">
									<div class="agileits-banner-info">
										<h3>Better Technology</h3>
										<p>We Care About Your Health.</p>
									</div>
								</div>
							</div>
						</li>
					</ul>
				</div>
				<div class="clearfix"> </div>

				<!-- //banner-text -->
			</div>
		</div>
			<div class="app-w3">
				<h4>Book Your Appointment Now</h4>
				<div class="app-sub-w3">
					<form action="func.php" method="post">
						<input type="text" name="patient_name" placeholder="Patient Name" required=""/>
						<div class="ag-w3">
                  <a >Departments </a>
									<select  class="form-control" name="departments" aria-haspopup="true"  aria-expanded="false">
									<option></option>
									<option>Cardiology</option>
									<option>Ophthalmology</option>
									<option>Neurology</option>
									<option>Psychology</option>
									<option>Dermatology</option>
								</select>
						</div>


						<input  id="datepicker" name="date" type="text" value="mm/dd/yyyy" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'mm/dd/yyyy';}" required="">
						<input type="text" id="timepicker" name="time" class="timepicker form-control" value="Hrs:Min">
						<input type="submit" name="appointment" value="Make A Appointment">
					</form>
				</div>
			</div>
	</div>
</div>
<!-- //banner -->

<!-- main -->
<!-- About -->
	<div id="about" class="welcome">
		<div class="container">
			<div class="agile-title">
				<h3> About Us <span></span></h3>
			</div>
			<div class="w3ls-row">
				<div class="col-md-6 welcome-left">
					<div class="welcome-img">
						<img src="images/img1.jpg" class="img-responsive zoom-img" alt=""/>
					</div>
					<p>In addition to offering traditional and established medical care services, Humanbeat is distinguished with its tertiary and quaternary services. This means Humanbeat has the personnel and facilities to provide advanced medical inquiry and treatments that are not widely accessible in this region.</p>

				</div>
				<div class="col-md-6 welcome-right">
					<div class="open-hours-row">
						<div class="col-md-3 open-hours-left">
							<h4>OPENING HOURS </h4>
						</div>
						<div class="col-md-3 open-hours-left">
							<h6>Every Day</h6>
							<h5>7am - 12am</h5>
						</div>
						<div class="col-md-3 open-hours-left">
							<h6>Sunday</h6>
							<h5>10am - 1pm</h5>
						</div>
						<div class="col-md-3 open-hours-left">
							<h6>Night Time</h6>
							<h5>12am - 9am</h5>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="col-md-6 welcome-left-grids">
						<div class="welcome-img">
							<img src="images/img2.jpg" class="img-responsive zoom-img" alt=""/>
						</div>
					</div>
					<div class="col-md-6 welcome-left-grids">
						<div class="welcome-img">
							<img src="images/img3.jpg" class="img-responsive zoom-img" alt=""/>
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //About -->

<!-- what-we-do -->
	<div class="tips w3agile">
		<div class="container">
			<h3 class="tittle-one">What We Do <span></span></h3>
			<div class="tip-grids">
				<div class="col-md-6 tip-grid">
					<figure class="effect-julia">
						<img src="images/w1.jpg" alt="">
							<figcaption>
								<h4>Best Treatments</h4>
									<p>We Provide the Best Medical Services.</p>
									<p>Medical Services that you can Trust.</p>
									<p>We Care About Your Health.</p>
							</figcaption>
					</figure>
				</div>
				<div class="col-md-6 tip-grid">
					<figure class="effect-julia">
						<img src="images/w2.jpg" alt="">
							<figcaption>
								<h4>Heart Specialist</h4>
									<p>We Provide the Best Medical Services.</p>
									<p>Medical Services that you can Trust.</p>
									<p>We Care About Your Health.</p>
							</figcaption>
					</figure>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
</div>
<!-- //what-we-do -->

<!-- Services -->
			<div class="feature-w3l">
				<div class="container">
					<h3 class="tittle">Our services <span></span></h3>
					<div class="feature-grids">
						<div class="col-md-3 feature-grid">
							<div class="icons-w3">
								<i class="fa fa-user-md" aria-hidden="true"></i>
							</div>
								<h4>Health Services For Our Region</h4>
								<span></span>
								<p>Humanbeat offering a wide range of quality healthcare services for the people of Bangladesh</p>
						</div>
						<div class="col-md-3 feature-grid">
							<div class="icons-w3">
								<i class="fa fa-medkit" aria-hidden="true"></i>
							</div>
								<h4>Find A Consultant</h4>
								<span></span>
								<p>Find a specialist health consultant to get better treatment</p>
						</div>
						<div class="col-md-3 feature-grid">
							<div class="icons-w3">
								<i class="fa fa-ambulance" aria-hidden="true"></i>
							</div>
								<h4>Book appointment</h4>
								<span></span>
								<p>Book an appointment with your preferred doctor at medical centres all over Bangladesh</p>
						</div>
						<div class="col-md-3 feature-grid">
							<div class="icons-w3">
								<i class="fa fa-hospital-o" aria-hidden="true"></i>
							</div>
								<h4>Medical professionals</h4>
								<span></span>
								<p>A wide variety of doctors are trained to provide special type of health care services</p>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
<!-- //Services -->

<!-- Testimonials -->
	<div id="review" class="jarallax reviews agile-1">
				<div class="test-monials" id="testimonials">
					<h3 class="tittle-two">Our Patients Says <span></span></h3>
						<div class="sreen-gallery-cursual">
						       <div id="owl-demo" class="owl-carousel">
					                 <div class="item-owl">
					                		<div class="test-review wow fadeInUp animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
											   <p><img src="images/left-quotes.png" alt=""> "Efficiency from all staff from the car park attendant right through to the nursing staff and doctors. A pleasant caring manner makes such a difference when you are receiving scary treatment. I cannot fault the Cromwell experience. Thank you.<img src="images/right-quotes.png" alt=""></p>
						                	  <img src="images/tt2.jpg" class="img-responsive" alt=""/>
											  <h5>Henry</h5>
					                	    </div>
					                </div>
					                 <div class="item-owl">
					                	<div class="test-review wow fadeInUp animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
										 <p> <img src="images/left-quotes.png" alt="">"The efficiency of all the staff in out-patients and on the ward and in theatres. Everyone I have been treated and nursed by has been charming and excellent at their job. The food and service is good too - every comfort and consideration of the patient - both day and night is taken care of superbly."<img src="images/right-quotes.png" alt=""></p>
						                	<img src="images/tt1.jpg" class="img-responsive" alt=""/>
											 <h5>Smith</h5>
					                	</div>
					                </div>
					                 <div class="item-owl">
					                	<div class="test-review wow fadeInUp animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
										     <p><img src="images/left-quotes.png" alt=""> "Very well organised. Very tidy. Friendly staff. Prompt attention. Consultants, sisters and nurses and other staff of high standard. Take a keen interest in patients. Very helpful." <img src="images/right-quotes.png" alt=""></p>
						                	<img src="images/tt3.jpg" class="img-responsive" alt=""/>
											 <h5>Steave</h5>
					                	</div>
					                </div>
				              </div>
						<!--//screen-gallery-->
					</div>
				</div>
				<div class="clearfix"> </div>
		</div>
<!-- //Testimonials -->
<!-- //main -->

<?php require_once('inc/footer.php') ?>
<!-- js-scripts -->

		<!-- js -->
			<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
			<script type="text/javascript" src="js/bootstrap.js"></script> <!-- Necessary-JavaScript-File-For-Bootstrap -->
		<!-- //js -->

		<!-- Baneer-js -->

			<script src="js/responsiveslides.min.js"></script>
			<script>
						// You can also use "$(window).load(function() {"
						$(function () {
						  // Slideshow 4
						  $("#slider4").responsiveSlides({
							auto: true,
							pager:true,
							nav:false,
							speed: 500,
							namespace: "callbacks",
							before: function () {
							  $('.events').append("<li>before event fired.</li>");
							},
							after: function () {
							  $('.events').append("<li>after event fired.</li>");
							}
						  });

						});
			</script>
			<script>
								// You can also use "$(window).load(function() {"
								$(function () {
								  // Slideshow 4
								  $("#slider3").responsiveSlides({
									auto: true,
									pager:false,
									nav:true,
									speed: 500,
									namespace: "callbacks",
									before: function () {
									  $('.events').append("<li>before event fired.</li>");
									},
									after: function () {
									  $('.events').append("<li>after event fired.</li>");
									}
								  });

								});
							 </script>


		<!-- //Baneer-js -->

			<!-- Calendar -->
				<script src="js/jquery-ui.js"></script>
				  <script>
						  $(function() {
							$( "#datepicker,#datepicker1,#datepicker2,#datepicker3" ).datepicker();
						  });
				  </script>
			<!-- //Calendar -->

		<!-- Time -->
		<script type="text/javascript" src="js/wickedpicker.js"></script>
			<script type="text/javascript">
				$('.timepicker').wickedpicker({twentyFour: false});
			</script>
		<!-- //Time -->

		<!-- jarallax-js -->
			<script src="js/jarallax.js"></script>
			<script src="js/SmoothScroll.min.js"></script>
			<script type="text/javascript">
				/* init Jarallax */
				$('.jarallax').jarallax({
					speed: 0.5,
					imgWidth: 1366,
					imgHeight: 768
				})
			</script>
		<!-- //jarallax-js -->

		<!-- for-Testimonials -->
			<!-- required-js-files-->
							<link href="css/owl.carousel.css" rel="stylesheet">
							    <script src="js/owl.carousel.js"></script>
							        <script>
							    $(document).ready(function() {
							      $("#owl-demo").owlCarousel({
							        items : 1,
							        lazyLoad : true,
							        autoPlay : true,
							        navigation : false,
							        navigationText :  false,
							        pagination : true,
							      });
							    });
							    </script>
			<!--//required-js-files-->
		<!-- //for-Testimonials -->

<!-- //js-scripts -->
</body>
</html>
