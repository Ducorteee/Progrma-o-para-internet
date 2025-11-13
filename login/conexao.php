<?php 

    $host = 'localhost'; 
    $usario = 'root'; 
    $senha = ''; 
    $banco = 'login'; 
   
     $mysqli = new mysqli($host,$usario, $senha, $banco); 
            if($mysqli->connect_error){
             die ("Algo deu errado com a conexão"); 
        }
?>