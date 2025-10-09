<?php
class Database{
    private $host = "localhost";
    private $usuario = "root";
    private $senha = "";
    private $banco = "todo_list";

      public $conn;

     public function conectar(){
      
         $this->conn = new mysqli($this->host,$this->usuario,$this->senha,$this->banco);
         if($this->conn->connect_error){
            die ("Algo deu errado,tente novamente...".$this->conn->connect_error);

         }
       return $this->conn;
     }
}


?>