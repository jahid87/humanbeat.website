<?php
require_once('config.php');



try {
  $accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Response returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

if(!$accessToken){
  header('Location: ../patient_login.php');
  exit();
}
$oAuth2Client = $FB->getOAuth2Client();
if(!$accessToken->isLongLived())
$accessToken= $oAuth2Client->getLongLivedAccessToken($accessToken);
$response = $FB->get('/me?fields=id,name,email,first_name,last_name,picture,gender',$accessToken->getValue());
$userData = $response->getGraphNode()->asArray();
$_SESSION['userData']=$userData;
$_SESSION['accessToken']=(string) $accessToken;
header('Location: user_view.php');
exit();
?>
