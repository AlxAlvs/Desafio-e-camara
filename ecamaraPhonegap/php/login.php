<?php
if(!session_id()) {
    session_start();
}
require_once 'Facebook/autoload.php'; 
$fb = new Facebook\Facebook([
  'app_id' => '857844974394585', // Replace {app-id} with your app id
  'app_secret' => '4e7a9f875477e66ad1a1474deab06a06',
  'default_graph_version' => 'v2.2',
  ]);

$helper = $fb->getRedirectLoginHelper();
$redirectUrl = 'http://localhost/ecamaraProjeto/ecamara/ecamaraPhonegap/php/callback.php';
$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl($redirectUrl, $permissions);


?>