<?php

// Inclui o arquivo do controlador de Login (responsável pela lógica de autenticação)
require_once __DIR__ . '/app/controllers/LoginController.php';

// Cria uma instância do controlador
$controller = new LoginController();

// Verifica se existe um parâmetro 'action' na URL
// Se não existir, assume 'index' como padrão
$action = $_GET['action'] ?? 'index';

// Estrutura de decisão para escolher o que executar baseado na ação
switch ($action) {
    
    case 'index':
        // Chama o método index() do controlador
        $controller->index();
        break; // Finaliza este caso do switch
        
    case 'logout':
        // Inclui o arquivo de logout (responsável por encerrar a sessão)
        require __DIR__ . '/app/views/logout.php';
        break; // Finaliza este caso do switch
}

?>

