<?php

try{
$db= new PDO('mysql:host=localhost; dbname=hospital_management','root','');

$db ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


}
catch(PDOException $ex){
  echo "Connection Failed = .$ex->getMessage()";
}
 ?>
