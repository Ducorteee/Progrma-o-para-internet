<?php

require_once __DIR__ . '/../models/Usuario.php';

class LoginController {

    public function index() {
  //Porque qualquer coisa que envolva sessão 
  //(como salvar $_SESSION['id'] e $_SESSION['nome']) só funciona depois que a sessão é iniciada.
        session_start();

        if (!empty($_POST)) {

            if (empty($_POST['email']) || empty($_POST['senha'])) {
                return header("Location: app/views/erro.php");
            }

            $usuarioModel = new Usuario();
            //Quero usar as funções que estão dentro do model Usuario.
            $resultado = $usuarioModel->buscarUsuario($_POST['email'], $_POST['senha']);

            if ($resultado && $resultado->num_rows === 1) {
            // Verifica se a consulta ($resultado) foi executada com sucesso
            // e se exatamente 1 registro foi encontrado no banco de dados
                $usuario = $resultado->fetch_assoc();
            //fetch_assoc() é um método do MySQLi que serve para pegar uma linha do resultado da consulta e transformar em um array 
            //associativo.
                $_SESSION['id']   = $usuario['id'];
                $_SESSION['nome'] = $usuario['nome'];

                return header("Location: app/views/painel.php");
            }

            return header("Location: app/views/erro.php");
        }

        include __DIR__ . '/../views/login.php';
    }
}
?>
