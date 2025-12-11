
<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['id'])) {

    die("Você não pode acessar esta página porque 
    não está logado.<p><a href='../../index.php'>Entrar</a></p>");
}

?>
<!DOCTYPE html>
<html lang="pt-br"> 
<head>
    <meta charset="UTF-8"> 
    <title>Painel</title>
        </head>

<body>
    <h1>Bem-vindo ao painel, <?= $_SESSION['nome'] ?>!</h1>  
    <p>  
    <a href="/index.php?action=logout">Sair</a>

    </p>

</body>

</html>
