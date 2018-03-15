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
$_SESSION['FBRLH_state']=$_GET['state'];
try {
  $accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}
if (isset($accessToken)) {
  // Logged in!
  $_SESSION['facebook_access_token'] = (string) $accessToken;
  // Now you can redirect to another page and use the
  // access token from $_SESSION['facebook_access_token']
    $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
    try {
      $response = $fb->get('/me?fields=first_name, email,last_name');
	    $user = $response->getGraphUser();
	  if($user){
	  $name = $user['first_name'];
	  $email = $user['email'];
    
	  }
    } catch(Facebook\Exceptions\FacebookResponseException $e) {
      // When Graph returns an error
      echo 'Graph returned an error: ' . $e->getMessage();
      exit;
    } catch(Facebook\Exceptions\FacebookSDKException $e) {
      // When validation fails or other local issues
      echo 'Facebook SDK returned an error: ' . $e->getMessage();
      exit;
    }
   
}
?>
<script>

var emailPhp = "<?php echo $email;?>";
var usuarioPhp = "<?php echo $name;?>";
// Cria um item "usuario" com valor da variavel "$name"
window.localStorage.setItem('usuario', usuarioPhp );
window.localStorage.setItem('emailUsuario', emailPhp);



if (window.localStorage.getItem('usuario')!= null){
    window.location = "http://localhost/ecamaraProjeto/ecamara/ecamaraphonegap/www/index.html";
}else{
    alert('não foi possivel armazenar valores localmente.');
    window.location = "http://localhost/ecamaraProjeto/ecamara/ecamaraphonegap/www/index.html";
}

</script>