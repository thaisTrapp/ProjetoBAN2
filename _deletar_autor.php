<?php
include 'conexao.php';

if (isset($_GET['id'])) {
    $id_autor = $_GET['id'];

    $sql = "UPDATE autor SET is_deleted = TRUE WHERE id_autor = $id_autor";

    if (mysqli_query($conexao, $sql)) {
        echo "Autor marcado como deletado com sucesso!<br>";
        echo "<a href='_listar_autor.php'>Voltar para a lista de autores</a>";
    } else {
        echo "Erro ao marcar autor como deletado: " . mysqli_error($conexao);
    }
} else {
    echo "ID do autor não fornecido.";
}
?>
