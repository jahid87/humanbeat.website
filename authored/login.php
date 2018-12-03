<?php
include_once 'resource/session.php';
include_once 'resource/Database.php';
include_once 'resource/utilities.php';
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
      header("location:index.php");
    }
    else{
      $result = "<p style='padding:20px; color:red;'>Invalid Usernameor Password</p>";
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
<h3 ><a href="index.php">Login Now </a></h3>
<div class="container">
  <?php if(isset($result)) echo $result; ?>
  <?php if(!empty($form_errors)) echo show_errors($form_errors); ?>
  <form action="" method="post">
    <div class="row">
      <h2 style="text-align:center; ">Login with Social Media </h2>
			<h2 style="text-align:center;">Or </h2>
			 <h2 style="text-align:center;">Sign in Manually </h2>
      <div class="vl">
        <span class="vl-innertext">or</span>
      </div>

      <div class="col">
        <a href="#" class="fb btn">
          <i class="fa fa-facebook fa-fw"></i> Login with Facebook
         </a>
        <a href="#" class="twitter btn">
          <i class="fa fa-twitter fa-fw"></i> Login with Twitter
        </a>
        <a href="#" class="google btn"><i class="fa fa-google fa-fw">
          </i> Login with Google+
        </a>
      </div>

      <div class="col">
        <div class="hide-md-lg">
          <p>Or sign in manually:</p>
        </div>

        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit"  name="loginbtn" value="Login">
      </div>

    </div>
  </form>
</div>

<div class="bottom-container">
  <div class="row">
    <div class="col">
      <a href="patient_registration.php" style="color:white" class="btn">Sign up</a>
    </div>
    <div class="col">
      <a href="forgot_password.php" style="color:white" class="btn">Forgot password?</a>
    </div>
  </div>
</div>
</div>
</body>
</html>
