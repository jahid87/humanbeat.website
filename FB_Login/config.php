<?php
if(!session_id()) {
    session_start();
}
require_once "Facebook/autoload.php";
$FB = new\Facebook\Facebook([
  'app_id' => '1724053800952772',
  'app_secret' => '09732e92b3f5c860d83cb14f6f0d042f',
  'default_graph_version' => 'v2.10'

]);

$helper = $FB->getRedirectLoginHelper();

 ?>
