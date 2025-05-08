<?php
include 'conexao.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Relatório - Livros por Editora</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container" style="margin-top: 80px;">
    <h3>Relatório - Livros por Editora</h3>
    <br>
    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>Livro</th>
                <th>Editora</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT l.nomeLivro, e.nome_editora
                    FROM estoque l
                    INNER JOIN editora e ON l.id_editora = e.id_editora
                    ORDER BY e.nome_editora, l.nomeLivro";

            $busca = mysqli_query($conexao, $sql);

            while ($dados = mysqli_fetch_array($busca)) {
                echo "<tr>
                        <td>{$dados['nomeLivro']}</td>
                        <td>{$dados['nome_editora']}</td>
                      </tr>";
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>
