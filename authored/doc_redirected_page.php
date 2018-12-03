<?php
include_once 'resource/session.php';
echo '<pre>';print_r($_SESSION);echo '</pre>';
include_once 'resource/database.php';
include_once 'resource/utilities.php';
?>
<!--registration code starts -->
<?php
include_once 'resource/database.php';
include_once 'resource/utilities.php';
//proces the form
// login code starts
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

          </div>
      </div>
      </div>
      </body>
      </html>
