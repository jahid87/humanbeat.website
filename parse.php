<?php

session_start();
$_SESSION['uid'] = 2; //The default logged users
//Now lets get the users from our SQLiteDatabase
$db= new PDO('mysql:host=localhost;dbname=hospital_management','root','');
require 'friends.php';

if(isset($_POST['tags']))
{
  if($_POST['tags']) == "addFriend")
  {
    $friends=new Friends;
    $friends->add($_POST['uid'], $_SESSION['uid']);

  }
}
 ?>
