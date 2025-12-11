<?php

class Database{
    private $host = "localhost";
    private $usuario = "root";
    private $senha = "";
    private $database = "login";
    public $conn; 
    public function Conectar(){
        $this->conn = new mysqli($this->host, $this->usuario, $this->senha, $this->database); 
        if($this->conn->connect_error){
            
            die ("Algo deu errado com a conexão: " . $this->conn->connect_error); 
        }
        return $this->conn; 
    }
}
?>