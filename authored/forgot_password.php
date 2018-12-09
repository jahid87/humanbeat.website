<?php
include_once 'resource/database.php';
include_once 'resource/utilities.php';

//process the form if the reset password button is clicked

if(isset($_POST['passwordResetBtn'])){
  //initialize an array to store any error message from th data
  $form_errors = array();

  //form validation
  $required_fields = array('email', 'new_password', 'confirm_password');

  //call the function to check empty field and merge the return data into form_error array
  $form_errors = array_merge($form_errors,check_empty_fields($required_fields));

  //fields that requires checking for minimum length
  $fields_to_check_length = array('new_password'=>6 , 'confirm_password'=>6);

  //call the function to check minimum required length and merge the return data into form_error array
  $form_errors = array_merge($form_errors, check_min_length($fields_to_check_length));

  //check if error array is empty, if yes process form data and insert record

  if(empty($form_errors)){
    //collect formdata and store in variables
    $email = $_POST['email'];
    $password1 = $_POST['new_password'];
    $password2 = $_POST['confirm_password'];
    //check if new password and confirmpassword is same
    if($password1 != $password2){
      $result = "<p style='padding:20px; color:red;'>New Password and Confirm Password does not match </p>";

    }else{
      try{
        //create SQL select statement to verify if email address input exist in the datbase
        $sqlQuery = "SELECT email FROM users WHERE email =:email";
        //use PDO prepared to sanitize data
        $statement = $db->prepare($sqlQuery);
        //execute the query
        $statement->execute(array(':email'=>$email));

        //check if the record exist
        if($statement->rowcount()==1){
          //hash the password
          $hashed_password = password_hash($password1, PASSWORD_DEFAULT);

          //SQL statement to update password
          $sqlUpdate = "UPDATE users SET password=:password WHERE email=:email";

          //use PDO prepared to sanitize SQL statement
          $statement = $db->prepare($sqlUpdate);

          //execute the statement
          $statement->execute(array('password'=> $hashed_password,':email'=>$email));
          $result= "<p style='padding:20px; color:green;'> Password Reset Success</p>";
        }
        else{
          $result ="<p style='padding:20px; color:red;'> The email address provided doesn't exist in our database,please try again</p>";

        }

      }catch(PDOException $ex){
        $result = "<p style='padding:20px; color:red;'> An error occured: ".$ex->getMessage()."</p>";

      }
    }
  }
  else{
    if(count($form_errors)==1){
      $result = "<p style='color:red;'> There was an error in the form <<br></p>";
    }
    else{
      $result="<p style= color:red;'> There were".count($form_errors)."errors in the form <br></p>";

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

       <div class="col-1">
         <div class="hide-md-lg">
           <p>Reset Password:</p>
         </div>

         <input type="text" name="email" placeholder="Email" required>
         <input type="password" name="new_password" placeholder="New Password" required>
         <input type="password" name="confirm_password" placeholder="Confirm New Password" required>
         <input type="submit"  name="passwordResetBtn" value="Reset Password">
       </div>

     </div>
   </form>
 </div>

 <div class="bottom-container">
   <div class="row">
     <div class="col-1">
       <a href="../index.php" style="color:white" class="btn">Back</a>
     </div>
   </div>
 </div>
 </div>
 </body>
 </html>
