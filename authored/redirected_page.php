<?php
include_once 'resource/session.php';
include_once 'resource/database.php';
include_once 'resource/utilities.php';
?>
<!--registration code starts -->
<?php
include_once 'resource/database.php';
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
	 $result = "<p style='padding: 50px; color:red;'>An Error Occured:".$ex->getMessage()."</p>";
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
<!--registration code ends -->


<!-- login code starts -->
<?php
if(isset($_POST['loginbtn'])){

  //array to hold errors
  $form_errors = array();

  //validate

  $required_fields = array('username', 'password');

  $form_errors =array_merge($form_errors,check_empty_fields($required_fields));

  if(empty($form_errors)){
    //collect form Data
    $user = $_POST['username'];
    $password = $_POST['password'];
    //check if user exist in the Database
    $sqlQuery = "SELECT * FROM users WHERE username = :username";
    $statement = $db->prepare($sqlQuery);
    $statement->execute(array('username' => $user));
    while($row = $statement->fetch()){
      $id = $row['id'];
      $hashed_password = $row['password'];
      $username= $row['username'];

      if(password_verify($password, $hashed_password)){
      $_SESSION['id']=$id;
      $_SESSION['username'] = $username;
      header("location:../user_view.php");
    }
    else{
      $result = "<p style='padding:20px; color:red;'>Invalid Username or Password</p>";
    }
  }
  }
  else {
    if(count($form_errors) ==1){
      $result = "<p style='color:red;'> There was a error in the form </p>";
    }else {
      $result = "<p style='color:red;'> There were".count($form_errors)."error in the form </p>";

    }
}

  }

 ?>

<!-- login code ends-->





<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../css/style_login.css" type="text/css" media="all" >
<title> HUMAN BEAT || PATIENT LOGIN </title>
</head>
<body>
<div class="login-main">
<h3 ><a href="index.php">Session Time Out </a></h3>
<div class="container">
    <div class="row">



      <div class="vl">
        <span class="vl-innertext">or</span>
      </div>
      <div class="col">
        <div class="hide-md-lg">
        </div>
        <form action="" method="post">
          <h2 style="text-align:left; ">You are not currently Logged In </h2>
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit"  name="loginbtn" value="Login">
      </form>
      </div>


      <div class="col-2">
        <div class="hide-md-lg">
        </div>
         <h2 style="text-align:left;">Not yet a member? Sign Up Now</h2>
           <form method="post" action="../patient_login.php">
        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Enter Password" required>
        <input type="submit" formnovalidate="formnovalidate" name="submit" value="Register Yourself">
      </form>
      </div>


    </div>
</div>
</div>
</body>
</html>
