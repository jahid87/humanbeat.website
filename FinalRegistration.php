<?php
session_start();
?>
<html>

   <head>
      <title>HUMANBEAT || Sending Email</title>
   </head>

   <body>

      <?php

      include_once 'auth/resource/Database.php';
      include_once 'auth/resource/utilities.php';

        $con=mysqli_connect("localhost", "root","","hospital_management");

        echo session_id().'<br>';
        error_reporting(E_ALL ^ E_DEPRECATED);

        $v;
        $e="";


        $email = $_SESSION["email_id"];
        $passw = $_SESSION["password"];
        $p_name=$_SESSION["patientname"];
        $genr=$_SESSION["gder"];
        $mobile_no=$_SESSION["mobilenumber"];
        $da_y= $_SESSION["d"];
        $mont_h= $_SESSION["m"];
        $yea_r= $_SESSION["y"];
        $street_addr= $_SESSION["streetaddress"];
        $cit_y=$_SESSION["c"];
        $zip_= $_SESSION["zip"];
        $countr_y=$_SESSION["coun"];
        $test1=$_SESSION["test1"];
        $test2=$_SESSION["test2"];
        $test3=$_SESSION["test3"];
        $test4=$_SESSION["test4"];
        $test5=$_SESSION["test5"];
        $test6=  $_SESSION["test6"];

        $veri_code = $_POST["code"];

        echo $hashed_password = password_hash($passw, PASSWORD_DEFAULT);
        //print_r($_SESSION).'<br>';

         $retval = "select * from random where ran_num = $veri_code";

          $res = mysqli_query($con,$retval);

         while($temp=mysqli_fetch_assoc($res))
                {

                    		$e = $temp['emailid'];
                                $v = $temp['ran_num'];

                  }
         //echo $v.'<br>';
         //echo $e.'<br>';
         //echo $email.'<br>';
         // echo $passw.'<br>';
          //echo $veri_code;
         if($v == $veri_code and $e == $email)
          {
              $sql = "insert into patient_registration values (NULL,'$p_name','$passw','$genr','$mobile_no','$da_y','$mont_h','$yea_r','$street_addr','$cit_y','$zip_','$countr_y','$email','$test1','$test2','$test3','$test4','$test5','$test6')";
              mysqli_query($con,$sql);

              $sqlInsert ="INSERT INTO users VALUES (NULL,'$p_name', '$email', '$hashed_password', now())";
               mysqli_query($con,$sqlInsert);



              session_destroy();
              ?>
      <script type="text/javascript">
      alert("Successfully Registered");

      </script>
      <?php
      echo "<script>window.open('patient_login.php','_self')</script>";

          }
          else
          {
             echo "You have entered something wrong";
           }
//bh12loo7hk7f8m1bspb2mk83hk
//bh12loo7hk7f8m1bspb2mk83hk /storage/ssd5/220/6579220/tmp
      ?>

   </body>
</html>
