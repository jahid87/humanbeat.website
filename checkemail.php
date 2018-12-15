<?php
include_once 'auth/resource/Database.php';
include_once 'auth/resource/utilities.php';
        session_start();

        error_reporting(E_ALL ^ E_DEPRECATED);

        $email = $_GET['email'];

        $data = "";


       $sql = "select * from users where email = '$email'";

       $resu = mysqli_query($con,$sql);

       $count = 0;

       while($temp = mysqli_fetch_assoc($resu))
       {
            $count ++;

        }

       if ($count > 0)
       {
            $data  = "email already exist";
       }
        else
       {
          $data = "you can register";
       }
         echo $data;
?>
