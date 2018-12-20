<?php
session_start();
?>
<html>

   <head>
      <title>Sending HTML email using PHP</title>
   </head>

   <body>

      <?php

        $con=mysqli_connect("localhost", "root","","hospital_management");
        error_reporting(E_ALL ^ E_DEPRECATED);
echo session_id().'<br>';

        $password = $_POST["password"];
        $email = $_POST["email"];
        $patient_name = $_POST['patient_name'];
        $gender = $_POST['gender'];
        $mobile_number = $_POST['mobile_number'];
        $day = $_POST['day'];
        $month = $_POST['month'];
        $year = $_POST['year'];
        $street_address = $_POST['street_address'];
        $city = $_POST['city'];
        $zipcode = $_POST['zipcode'];
        $country = $_POST['country'];
        $test1 = $_POST['test1'];
        $test2 = $_POST['test2'];
        $test3 = $_POST['test3'];
        $test4 = $_POST['test4'];
        $test5 = $_POST['test5'];
        $test6 = $_POST['test6'];


          $_SESSION["email_id"]=$email;
          $_SESSION["password"]=$password;
          $_SESSION["patientname"]=$patient_name;
          $_SESSION["gder"]=$gender;
          $_SESSION["mobilenumber"]=$mobile_number;
          $_SESSION["d"]=$day;
          $_SESSION["m"]=$month;
          $_SESSION["y"]=$year;
          $_SESSION["streetaddress"]=$street_address;
          $_SESSION["c"]=$city;
          $_SESSION["zip"]=$zipcode;
          $_SESSION["coun"]=$country;
          $_SESSION["test1"]=$test1;
          $_SESSION["test2"]=$test2;
          $_SESSION["test3"]=$test3;
          $_SESSION["test4"]=$test4;
          $_SESSION["test5"]=$test5;
          $_SESSION["test6"]=$test6;



          $a = rand(100,999999);
           //echo $a;
            $_SESSION["random"]=$a;


         $to = $email;
         $subject = "Your Registration Varification Code";

         $message = $a;

         $header = "From:noreply@humanbeat.com \r\n";
        // $header = "Cc:hackingpro20161@gmail.com \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";

         $retval = mail ($to,$subject,$message,$header);

         if( $retval == true ) {
           // echo "Message sent successfully...";
              echo "check your email for verification code".'<br>';
              echo $email;

            $sql = "insert into random values (NULL,'$email',$a)";
            mysqli_query($con,$sql);

            include ('VerifyEmail.php');

         }else {
            echo "Message could not be sent...";
         }
      ?>

   </body>
</html>
