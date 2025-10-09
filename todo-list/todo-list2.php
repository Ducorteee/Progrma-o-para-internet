<?php 

#conectar ao banco

$localhost = 'localhost';
$usuario = 'root';
$senha = '';
$database = 'todo_list';
$conn =new mysqli($localhost,$usuario,$senha,$database);

 if($conn -> connect_error){
    die('Deu erro ao conectar'.mysqli_connect_error());
 }


 # criacao de tarefa

 if(isset($_POST['descricao']) && !empty(trim($_POST['descricao']))){
   $descricao = $conn -> real_escape_string($_POST['descricao']);
   $sqlcreate =  "INSERT INTO tarefas (descricao) VALUES ('$descricao')";
   
   if($conn -> query($sqlcreate) === TRUE){
      header("location: todo-list2.php");
   }
 }
 
 # lista tarefas  
 $tarefas = [];
 $sqlselect = "SELECT * FROM tarefas ORDER BY data_criacao DESC";
 $result = $conn -> query($sqlselect);

 if($result -> num_rows >0){
    while($row = $result -> fetch_assoc()){
   $tarefas [] = $row;

    } 
}
#APAGAR
if(isset($_GET['delete'])){
$id = intval($_GET['delete']);
$sqlDelete = "DELETE FROM tarefas WHERE id = $id";


if($conn->query($sqlDelete) === TRUE){
    header("location: todo-list2.php");
}
}
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

    <h2>Suas tarefas 🤪</h2>
    <?php if(!empty($tarefas)):?>
    <ul>
     <?php foreach($tarefas as $tarefas):?>
        <li>
        <?php echo $tarefas ['descricao']?>
        <a href="todo-list2.php?delete=<?php echo $tarefas ['id']?>">Excluir</a>

        </li>

     <?php endforeach;?>
    </ul>
    <?php else:?>
    <h3>Não tem tarefas</h3>
    <?php endif;?>

</body>
</html>