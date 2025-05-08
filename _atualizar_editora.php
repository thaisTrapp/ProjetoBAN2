<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nome = $_POST['nome'];

    $sql = "UPDATE editora SET nome='$nome' WHERE id=$id";
    if ($conexao->query($sql) === TRUE) {
        echo "Editora atualizada com sucesso.";
    } else {
        echo "Erro: " . $conexao->error;
    }
    echo "<br><a href='_listar_editora.php'>Voltar para lista</a>";
}
