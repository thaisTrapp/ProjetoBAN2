<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nome = $_POST['nome'];

    $sql = "UPDATE autor SET nome='$nome' WHERE id=$id";
    if ($conexao->query($sql) === TRUE) {
        echo "Autor atualizado com sucesso.";
    } else {
        echo "Erro: " . $conexao->error;
    }
    echo "<br><a href='_listar_autor.php'>Voltar para lista</a>";
}
