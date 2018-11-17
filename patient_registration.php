<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Meta tags -->
	<title>HUMAN BEAT || Patient Registration</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- stylesheets -->
	<link rel="stylesheet" href="css/font-awesome.css">
	<link rel="stylesheet" href="css/style_2.css">
	<!-- google fonts  -->
	<link href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Josefin+Sans:300,400,400i,700" rel="stylesheet">
</head>
<body>
	<div class="w3ls-banner">
	<div class="heading" >
		<h1><a href="index.php">New Patient Registration </a></h1>
	</div>
		<div class="container">
			<div class="heading">
				<h2>Please Enter Patients Details</h2>
				</div>
			<div class="agile-form">
				<form action="func.php" method="post">
					<ul class="field-list">
						<li>
							<label class="form-label">
								Full Name
								<span class="form-required"> * </span>
							</label>
							<div class="form-input">
								<input type="text" name="patient_name" placeholder="Enter Patients Name" required  pattern="^[A-z . a-z]+">
							</div>
						</li>
						<li>
							<label class="form-label">
							   Gender
							   <span class="form-required"> * </span>
							</label>
							<div class="form-input">
								<select class="form-dropdown" name="gender" required>
									<option value="">&nbsp;</option>
									<option value="Male"> Male </option>
									<option value="Female"> Female </option>
									<option value="Transgender"> Transgender </option>
								</select>
							</div>
						<li>
						<li>
							<label class="form-label">
							   Mobile Number
							   <span class="form-required"> * </span>
							</label>
							<div class="form-input">
								<input type="text" name="mobile_number" placeholder="Mobile Number" required pattern="^[0-9]+">
							</div>
						</li>
						<li>
							<label class="form-label">
							   Date of Birth
							   <span class="form-required"> * </span>
							</label>
							<div class="form-input dob">
								<span class="form-sub-label">
									<select name="day" class="day">
										<option>&nbsp;</option>
										<option value="1"> 1 </option>
										<option value="2"> 2 </option>
										<option value="3"> 3 </option>
										<option value="4"> 4 </option>
										<option value="5"> 5 </option>
										<option value="6"> 6 </option>
										<option value="7"> 7 </option>
										<option value="8"> 8 </option>
										<option value="9"> 9 </option>
										<option value="10"> 10 </option>
										<option value="11"> 11 </option>
										<option value="12"> 12 </option>
										<option value="13"> 13 </option>
										<option value="14"> 14 </option>
										<option value="15"> 15 </option>
										<option value="16"> 16 </option>
										<option value="17"> 17 </option>
										<option value="18"> 18 </option>
										<option value="19"> 19 </option>
										<option value="20"> 20 </option>
										<option value="21"> 21 </option>
										<option value="22"> 22 </option>
										<option value="23"> 23 </option>
										<option value="24"> 24 </option>
										<option value="25"> 25 </option>
										<option value="26"> 26 </option>
										<option value="27"> 27 </option>
										<option value="28"> 28 </option>
										<option value="29"> 29 </option>
										<option value="30"> 30 </option>
										<option value="31"> 31 </option>
									</select>
									<label class="form-sub-label1"> Day </label>
								</span>
								<span class="form-sub-label">
									<select name="month">
										<option>&nbsp;</option>
										<option value="January"> January </option>
										<option value="February"> February </option>
										<option value="March"> March </option>
										<option value="April"> April </option>
										<option value="May"> May </option>
										<option value="June"> June </option>
										<option value="July"> July </option>
										<option value="August"> August </option>
										<option value="September"> September </option>
										<option value="October"> October </option>
										<option value="November"> November </option>
										<option value="December"> December </option>
									 </select>
									<label class="form-sub-label1"> Month </label>
								</span>
								<span class="form-sub-label">
									<input type="text" class="year" name="year" placeholder=" Enter Year" required pattern="^[0-9]+">
									<label class="form-sub-label1"> Year </label>
								</span>
							</div>
						</li>
						<li>
							<label class="form-label">
							   Address
							   <span class="form-required"> * </span>
							</label>
							<div class="form-input add">
								<span class="form-sub-label">
									<input type="text" name="street_address" placeholder=" " required>
									<label class="form-sub-label1"> Street Address </label>
								</span>
								<span class="form-sub-label">
									<input type="text" name="city" placeholder=" " required>
									<label class="form-sub-label1"> City </label>
								</span>
								<span class="form-sub-label">
									<input type="text" name="zipcode" placeholder=" " required>
									<label class="form-sub-label1"> Postal / Zip Code </label>
								</span>
								<span class="form-sub-label">
									<input type="text" name="country" placeholder=" " required>
									<label class="form-sub-label1"> Country </label>
								</span>
							</div>
						</li>
						<li>
							<label class="form-label">
							   E-Mail Address
							   <span class="form-required"> * </span>
							</label>
							<div class="form-input">
								<input type="email" name="email" placeholder="myname@example.com" required pattern="^[a-z0-9@a-z.a-z]+">

							</div>
						</li>
						<li>
							<label class="form-label1" name="textarea">
								Mention the details of previous consultings with us.
							</label>
							<div class="form-input2">
								<textarea rows="5" cols="20"></textarea>

							</div>
						</li>
						<li class="last-type">
							<label class="form-label1">
								Select which types of appointment you require.
								<span class="form-required"> * </span>
							</label>
							<div class="form-input2" >
								<input type="checkbox" name="test1" ><label class="type-of-test">Heart Checkup</label>
								<input type="checkbox" name="test2" ><label class="type-of-test">Eye Checkup</label>
								<input type="checkbox" name="test3" ><label class="type-of-test">Hearing Test</label>
								<input type="checkbox" name="test4" ><label class="type-of-test">Blood Test</label>
								<input type="checkbox" name="test5" ><label class="type-of-test">Normal Consulting</label>
								<input type="checkbox" name="test6" ><label class="type-of-test">Skin Care</label>
							</div>
						</li>
					</ul>
					<input type="submit" name="reg_submit" value="Register Yourself">
				</form>
			</div>
		</div>

	</div>
</body>
</html>
