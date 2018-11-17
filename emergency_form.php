<!DOCTYPE HTML>
<html>
<head>
<title>HUMAN BEAT || Emergency Admit</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" >
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/style_1.css" rel='stylesheet' type='text/css' />
<!--fonts-->
<link href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">
<!--//fonts-->

</head>
<body>
<!--background-->
    <div class="bg-agile">
	<div class="book-appointment">
	<h2>Medical Information</h2>
			<form action="func.php" method="post">
				<div class="left-agileits-w3layouts same">
					<div class="gaps">
						<p>First Name</p>
						<input type="text" name="fname" placeholder="" required=""/>
					</div>
					<div class="gaps">
						<p>Last Name</p>
							<input type="text" name="lname" placeholder="" required=""/>
					</div>
					<div class="gaps">
						<p>Gender</p>
							<select class="form-control" name="gender">
								<option></option>
								<option>Male</option>
								<option>Female</option>
							</select>
					</div>
					<div class="gaps">
						<p>Select Date</p>
						<input  id="datepicker1" name="date" type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'mm/dd/yyyy';}" required="">
					</div>
					<div class="gaps">
						<p>Patient ID</p>
						<input type="text" name="hpreference" placeholder="" required=""/>
					</div>

					<div class="gaps">
						<p>Physician's Name</p>
						<input type="text" name="phyname" placeholder="" required=""/>
					</div>
					<div class="gaps">
						<p>Phone Number</p>
						<input type="text" name="phonenumber" placeholder="" required=""/>
					</div>
				</div>

		<div class="right-agileinfo same">
					<div class="gaps">
						<p>Relationship Status</p>
						<input type="text" name="relationship" placeholder="" required=""/>
					</div>
					<div class="gaps">
						<p>Current Address</p>
						<textarea id="message" name="address" placeholder="" title="Please enter Your Comments"></textarea>
						</div>


					<div class="gaps">
						<p>City</p>
						<select class="form-control" name="city">
							<option></option>
							<option>Dhaka</option>
							<option>Chittagong</option>
							<option>Rajshahi</option>
							<option>Khulna</option>
							<option>Barishal</option>
              <option>Sylhet</option>
              <option>MymenSingh</option>
              <option>Brahmanbaria</option>
              <option>Khustia</option>
              <option>Comilla</option>
              <option>Gazipur</option>
              <option>Nilphamari</option>

						</select>
					</div>

					<div class="gaps">
						<p>Home Phone</p>
						<input type="text" name="homephone" placeholder="" required=""/>
					</div>
				</div>
				<div class="clear"></div>
				<input type="submit" name="pat_submit"value="Submit">
			</form>
		</div>
   </div>

		<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
		<!-- Calendar -->
				<link rel="stylesheet" href="css/jquery-ui.css" />
				<script src="js/jquery-ui.js"></script>
				  <script>
						  $(function() {
							$( "#datepicker,#datepicker1,#datepicker2,#datepicker3" ).datepicker();
						  });
				  </script>
			<!-- //Calendar -->

</body>
</html>
