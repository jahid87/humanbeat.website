<!DOCTYPE html>
<html>
<head>
	<title></title>

	<!-- css files -->
<link rel="stylesheet" href="../css/bootstrap.css"> <!-- Bootstrap-Core-CSS -->
<link rel="stylesheet" href="../css/style.css" type="text/css" media="all" /> <!-- Style-CSS -->
<link rel="stylesheet" href="../css/font-awesome.css"> <!-- Font-Awesome-Icons-CSS -->
<link rel="stylesheet" href="../css/jquery-ui.css" /> <!-- Date-script-CSS -->
<link href="../css/wickedpicker.css" rel="stylesheet" type='text/css' media="all" /> <!-- Time-script-CSS -->
<!-- //css files -->

<!-- online-fonts -->
<link href="//fonts.googleapis.com/css?family=Convergence" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=ABeeZee:400,400i" rel="stylesheet">

</head>
<body>

</div>
			<div class="app-w3">
				<h4>Book Your Appointment Now</h4>
				<div class="app-sub-w3">
					<form action="../func.php" method="post">
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
</body>
</html>


