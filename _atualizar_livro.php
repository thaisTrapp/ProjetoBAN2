<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $isbn = $_POST['isbn'];
    $ano = $_POST['ano'];
    $id_editora = $_POST['id_editora'];

    $sql = "UPDATE livro SET titulo='$titulo', isbn='$isbn', ano='$ano', id_editora='$id_editora' WHERE id=$id";
    if ($conexao->query($sql) === TRUE) {
        echo "Livro atualizado com sucesso.";
    } else {
        echo "Erro: " . $conexao->error;
    }
    echo "<br><a href='_listar_livro.php'>Voltar</a>";
}
