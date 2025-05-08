<?php
include 'conexao.php';

if (isset($_GET['id'])) {
    $id_editora = $_GET['id'];

    $sql = "UPDATE editora SET is_deleted = TRUE WHERE id_editora = $id_editora";

    if (mysqli_query($conexao, $sql)) {
        echo "Editora marcada como deletada com sucesso!<br>";
        echo "<a href='_listar_editora.php'>Voltar para a lista de editoras</a>";
    } else {
        echo "Erro ao marcar editora como deletada: " . mysqli_error($conexao);
    }
} else {
    echo "ID da editora não fornecido.";
}
?>
