<?php

	require 'include/connection.php';

	$email = $_POST["formEntrarEmail"];
	$senha = $_POST['formEntrarSenha'];


	$sql = "SELECT * FROM usuariosnew WHERE email ='$email' AND senha = '$senha' ";

	$connection = mysqli_connect($server, $user, $password, $database);
    
    $arr = array();       
    $result = mysqli_query($connection, $sql);

    if ($result) {
        $dadosUsuario = mysqli_fetch_object($result);

        
            $arr['result'] = true;
        	$arr['name'] = $dadosUsuario->name;
            $arr['email'] = $dadosUsuario->email;
            
    }else{
        	$arr['result'] = false;
            
    }
  
   mysqli_close($connection);
   echo json_encode($arr);

?>

