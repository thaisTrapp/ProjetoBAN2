<?php
include 'conexao.php';

$id = $_GET['id'];
$sql = "SELECT * FROM autor WHERE id = $id";
$result = $conexao->query($sql);
$row = $result->fetch_assoc();
?>

<form method="post" action="_atualizar_autor.php">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    Nome do Autor: <input type="text" name="nome" value="<?php echo $row['nome']; ?>" required><br>
    <input type="submit" value="Atualizar">
</form>
