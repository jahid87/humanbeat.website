<?php
include_once 'resource/Database.php';
include_once 'resource/utilities.php';
//proces the form

if(isset($_POST['submit'])){
	//initialize an array to store any error message from the form
	$form_errors =array();
	//form validation
	$required_fields= array('email','username','password');
//call the function to check empty field and merge the return data into form_error array
$form_errors = array_merge($form_errors, check_empty_fields($required_fields));

//fields that requires checking for minimum length
$fields_to_check_length = array('username'=> 4, 'password'=> 6);

//call the function to check minimum required length and merge the return data into form_error array
$form_errors = array_merge($form_errors, check_min_length($fields_to_check_length));

//email validation/ merge the return data into for_error array
$form_errors = array_merge($form_errors, check_email($_POST));

//check if error array is emptu, if yes process form data and insert record

/*

	//loop through the required fields array
	foreach($required_fields as $name_of_field){
		if(!isset($_POST[$name_of_field]) || $_POST[$name_of_field]==NULL){

			$form_errors[]=$name_of_field;
		}
	}
*/
	//check if error array is empty, if yes process from data and insert record

	if(empty($form_errors)){
		//collect form data and store in variables
		$email =$_POST['email'];
		$username =$_POST['username'];
		$password =$_POST['password'];

		$hashed_password = password_hash($password, PASSWORD_DEFAULT);

	try{
		$sqlInsert ="INSERT INTO users (username,email,password,join_date) VALUES (:username, :email, :password, now())";

		$statement = $db->prepare($sqlInsert);
		$statement->execute(array(':username' => $username,':email' => $email,':password' => $hashed_password));
		if($statement->rowCount()==1){
			$result = "<p style='padding: 20px; color:green;'> Registration Successful</p>";
		}

	}catch(PDOException $ex){
	 $result = "<p style='padding: 20px; color:red;'>An Error Occured:".$ex->getMessage()."</p>";
}

}
else{
	if(count($form_errors) == 1){

	$result = "<p style='color:red;'>There was a error in the form <br>";
	$result .= "<ul style='color:red;'>";
	//loop through error array and display all items
	foreach($form_errors as $error){
		$result .="<li> {$error} </li>";
	}
	$result .="</ul></p>";
	}
	else{
		$result = "<p style='color: red;'>There were" .count($form_errors)."errors in the form <br>";

		$result .="<ul style='color:red;'";
		//loop through error array and display al items
		foreach($form_errors as $error){
			$result.="<li>{error}</li>";
		}
		$result .="</ul></p>";

	}
}


}




 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Meta tags -->
	<title>HUMAN BEAT || Patient Registration</title>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- stylesheets -->
	<link rel="stylesheet" href=../"css/font-awesome.css">
	<link rel="stylesheet" href="../css/style_2.css">
	<!-- google fonts  -->
	<link href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Josefin+Sans:300,400,400i,700" rel="stylesheet">
</head>
<body>
	<div class="w3ls-banner">
	<div class="heading" >
		<h1><a href="../index.php">New Patient Registration </a></h1>
<?php if(isset($result)) echo $result; ?>
	</div>
		<div class="container">
			<div class="heading">
				<h2>Please Enter Patients Details</h2>
				</div>
			<div class="agile-form">
				<?php /* var_dump($_POST);*/ ?>
				<form action="" method="post">
					<ul class="field-list">
						<li>
							<label class="form-label">
								User Name
								<span class="form-required"> * </span>
							</label>
							<div class="form-input">
								<input type="text" name="username" placeholder="Enter User Name" required >
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
							<label class="form-label">
							 Password
								<span class="form-required"> * </span>
							</label>
							<div class="form-input">
								<input type="text" name="password" placeholder="Enter Password" required >
							</div>
						</li>


					</ul>
					<input type="submit" name="submit" value="Register Yourself">
				</form>
			</div>
		</div>

	</div>
</body>
</html>
