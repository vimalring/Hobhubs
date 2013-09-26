<?php
require ("./../includes/fb/facebook.php");

$facebook = new Facebook(array(
  'appId'  => '189333361246931',   // Facebook App ID 
  'secret' => '652883e1cba8faa28baab352bce27192',  // Facebook App Secret
  'cookie' => true,	
));

$user = $facebook->getUser();
if ($user) {
  try {
    $user_profile = $facebook->api('/me');
  	    $fbid = $user_profile['id'];                 // To Get Facebook ID
 	    $fbuname = $user_profile['username'];  // To Get Facebook Username
 	    $fbfullname = $user_profile['name']; // To Get Facebook full name
	      $femail = $user_profile['email'];    // To Get Facebook email ID


print_r($user_profile);


  } catch (FacebookApiException $e) {
    error_log($e);
   $user = null;
  }
}
if ($user) {
  $logoutUrl = $facebook->getLogoutUrl(array(
		 'next' => 'http://demos.krizna.com/logout.php',  // Logout URL full path
		));
} else {
 $loginUrl = $facebook->getLoginUrl(array(
		'scope'		=> 'email,sms', // Permissions to request from the user
		));
}

?>
