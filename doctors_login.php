<?php
include_once 'auth/resource/session.php';
include_once 'auth/resource/Database.php';
include_once 'auth/resource/utilities.php';
//echo $loginUrl;
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
    $sqlQuery = "SELECT * FROM doctors WHERE username = :username";
    $statement = $db->prepare($sqlQuery);
    $statement->execute(array('username' => $user));
    $data = $statement->fetch(PDO::FETCH_ASSOC);
    if($password == $data['password']) {
    $_SESSION['id'] = $data['id'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['password'] = $data['password'];
    echo '<pre>';print_r($_SESSION);echo '</pre>';
    header("location:doctors_profile_view.php");
    exit;
  }
   /*while($row = $statement->fetch()){
      $id = $row['id'];
      $to_be_hashed_password = $row['password'];
      $hashed_password = password_hash($to_be_hashed_password, PASSWORD_DEFAULT);
      $username= $row['username'];
      echo $username.PHP_EOL;
      echo $to_be_hashed_password;
      if(password_verify($password,$to_be_hashed_password)){
        $_SESSION['id']=$id;
        $_SESSION['username'] = $username;
          header("location:user_view.php");

              }
              else{
                $result = "<p style='padding:20px; color:red;'>Invalid Usernameor Password</p>";
              }
            }*/
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
<link rel="stylesheet" href="css/style_login.css" type="text/css" media="all" >
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
        <a href="<?php echo $loginUrl ?>" class="fb btn">
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
      <a href="auth/signup.php" style="color:white" class="btn">Sign up</a>
    </div>
    <div class="col">
      <a href="auth/forgot_password.php" style="color:white" class="btn">Forgot password?</a>
    </div>
  </div>
</div>
</div>
</body>
</html>
