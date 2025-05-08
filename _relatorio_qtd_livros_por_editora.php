<?php
include 'conexao.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Relatório - Quantidade de Livros por Editora</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container" style="margin-top: 80px;">
    <h3>Relatório - Quantidade de Livros por Editora</h3>
    <br>
    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>Editora</th>
                <th>Total de Livros</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT e.nome_editora, COUNT(l.id_estoque) AS total
                    FROM estoque l
                    INNER JOIN editora e ON l.id_editora = e.id_editora
                    GROUP BY e.nome_editora
                    ORDER BY total DESC";

            $busca = mysqli_query($conexao, $sql);

            while ($dados = mysqli_fetch_array($busca)) {
                echo "<tr>
                        <td>{$dados['nome_editora']}</td>
                        <td>{$dados['total']}</td>
                      </tr>";
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>
