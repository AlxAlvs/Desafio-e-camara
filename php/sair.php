<?php
	
	session_start();


	unset($_SESSION['facebook_access_token']);
	session_destroy();

?>
<script>
	
	window.localStorage.removeItem('usuario');
	window.localStorage.removeItem('emailUsuario');
	if (window.localStorage.getItem('usuario') == null){
    window.location = "../www/index.html";
	}else{
    alert('não foi possivel remover valores localmente.');
    window.location = "http://localhost/ecamaraProjeto/ecamara/ecamaraphonegap/www/index.html";
	}
	

</script>
