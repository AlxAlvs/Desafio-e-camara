<?php
 
    require 'include/connection.php';

    

     
    if (!empty($_POST)){
         
        $name = $_POST["txtNome"];
        $lastName = $_POST["txtSobrenome"];
        $email = $_POST["txtEmail"];
        $senha = $_POST["txtSenha"];  

        
         
        $sql = "insert into usuariosnew (name, lastName, email, senha) values ('$name','$lastName','$email','$senha')";
         
       
                 
        $connection = mysqli_connect($server, $user, $password, $database);

             
        $result = mysqli_query($connection, $sql);
         
                    
        $id = mysqli_insert_id($connection);

        if($sql){
         echo  "success";
         
         
        } else {
         echo  "error";
        
        } 
        
         mysqli_close($connection);
    
        }
 
?>