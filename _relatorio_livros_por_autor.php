<?php
include 'conexao.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Relatório - Livros por Autor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container" style="margin-top: 80px;">
    <h3>Relatório - Livros por Autor</h3>
    <br>
    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>Autor</th>
                <th>Livro</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT a.nome AS autor, l.nomeLivro AS livro
                    FROM livro_autor la
                    INNER JOIN autor a ON la.id_autor = a.id_autor
                    INNER JOIN estoque l ON la.id_livro = l.id_estoque
                    ORDER BY a.nome, l.nomeLivro";

            $busca = mysqli_query($conexao, $sql);

            while ($dados = mysqli_fetch_array($busca)) {
                echo "<tr>
                        <td>{$dados['autor']}</td>
                        <td>{$dados['livro']}</td>
                      </tr>";
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>
