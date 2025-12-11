
<?php

require_once __DIR__ . '/../config/database.php';

class Usuario {
    private $conn;
    public function __construct() {
        $db = new Database();
        $this->conn = $db->Conectar();
    }
    public function buscarUsuario($email, $senha) {
        $email = $this->conn->real_escape_string($email);
        $senha = $this->conn->real_escape_string($senha);
        $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
        return $this->conn->query($sql); // ← RETORNA O OBJETO, não fetch_assoc
        //query() é um método usado para enviar um comando SQL diretamente para o banco de dados.
    }
    }

?>
<?php



