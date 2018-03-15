<?php

	require 'include/connection.php';

	$email = $_POST['email'];
	$senha = $_POST['senha'];


	$sql = "SELECT * FROM usuariosnew WHERE email ='$email' AND senha = '$senha' ";

	$connection = mysqli_connect($server, $user, $password, $database);

             
    $result = mysqli_query($connection, $sql);

    if ($result) {
        $dadosUsuario = mysqli_fetch_array($result);

        if (isset($dadosUsuario['email'])) {
            $name = $dadosUsuario['name'];
            $emailUser = $dadosUsuario['email'];
        	
        }else{
        	$name = null;
            $emailUser = null;
        }
    }else{
    	echo "erro na execução da consulta, favor contate o administrador do app.";
    }
                  
   mysqli_close($connection);

?>
<script>

var emailPhp = "<?php echo $emailUser;?>";
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
