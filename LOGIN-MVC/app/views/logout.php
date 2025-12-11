<?php
session_start();     // Inicia a sessão

session_destroy();   // Destrói a sessão

header("Location: index.php"); // Redireciona
exit;        // Para tudo
?>
