<?php
$con=mysqli_connect("localhost", "root","","hospital_management");

if(isset($_POST['mail_send']))
{
  $name=$_POST['Name'];
  $email=$_POST['Email'];
  $message=$_POST['Message'];
  $query = "insert into mail_list(name,email,message) values ('$name','$email','$message')";
  $result = mysqli_query($con, $query);
  if($result)
  {
    echo "<script>alert ('Message Sent')</script>";
    echo "<script>window.open('mail.php','_self')</script>";
  }

}



  ?>
