<?php 

#conectar ao banco


$localhost = 'localhost';
$usuario = 'root';
$senha = '';
$database = 'todo_list';
$conn =mysqli_connect($localhost,$usuario,$senha,$database);

 if($conn -> connect_error){
    die('Deu erro ao conectar'.mysqli_connect_error());
 }
$tarefas = []
?>

<!DOCTYPE html>
<html lang="PT_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo-list</title>
</head>
<body>

    <h1>TO-DO List</h1>
    <form action="todo-list2.php" method="POST">
        <input type="text" placeholder="Descrição da sua tarefa" name="descricao"/>
        <button type="submit">Adicionar</button> 
    </form>

    <h2>Suas tarefas</h2>
    <?php if(!empty($tarefas)):?>
    <h3>Suas tarefas</h3>
    <?php else:?>
    <h3>Não tem tarefas</h3>
    <?php endif;?>

</body>
</html>