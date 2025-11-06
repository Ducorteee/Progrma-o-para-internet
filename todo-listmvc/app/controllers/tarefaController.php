<?php
require_once __DIR__ . '/../models/tarefa.php';
class tarefaController {
    private $tarefaModel; 

    public function __construct(){
        $this->tarefaModel = new Tarefa(); 
    }

    public function index(){
        $tarefas = $this->tarefaModel->listar(); 
        include __DIR__ . '/../views/listar.php'; 
    }

    public function criar(){
        if(isset($_POST['descricao']) && !empty(trim($_POST['descricao']))){
            $this->tarefaModel->criar($_POST['descricao']); 
        }
        header("Location: index.php"); 
    }

    public function excluir(){
        if (isset($_GET['id'])) {
            $this->tarefaModel->excluir($_GET['id']); 
        }
        header("Location: index.php"); 
    }

    public function editar() {
        if (isset($_GET['id'])) {
            $tarefa = $this->tarefaModel->buscarPorId($_GET['id']);
            include __DIR__ . '/../views/editar.php';
        }
    }

    public function atualizar() {
        if (isset($_POST['id']) && isset($_POST['descricao'])) {
            $this->tarefaModel->editar($_POST['id'], $_POST['descricao']);
        }
        header("Location: index.php");
    }
}

?>
