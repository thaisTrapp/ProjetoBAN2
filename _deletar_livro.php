
<?php
include 'conexao.php';

if (isset($_GET['id'])) {
    $id_livro = $_GET['id'];

    $sql = "DELETE FROM livro WHERE id_estoque = $id_livro";

    if (mysqli_query($conexao, $sql)) {
        echo "Livro deletado com sucesso!<br>";
        echo "<a href='_listar_livro.php'>Voltar para a lista de livros</a>";
    } else {
        echo "Erro ao deletar livro: " . mysqli_error($conexao);
    }
} else {
    echo "ID do livro não fornecido.";
}
?>
