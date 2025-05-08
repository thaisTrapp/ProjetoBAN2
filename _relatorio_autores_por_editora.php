<?php
include 'conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório - Autores por Editora</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container" style="margin-top: 50px;">
    <h3>Relatório - Autores por Editora</h3>

    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>Editora</th>
                <th>Autor</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "
                SELECT e.nome AS editora, a.nome AS autor 
                FROM livro l
                INNER JOIN autor a ON l.id_autor = a.id_autor
                INNER JOIN editora e ON l.id_editora = e.id_editora
                WHERE a.is_deleted = 0 AND e.is_deleted = 0
                ORDER BY e.nome, a.nome
            ";

            $busca = mysqli_query($conexao, $sql);

            if ($busca && mysqli_num_rows($busca) > 0) {
                while ($dados = mysqli_fetch_array($busca)) {
                    echo "<tr>
                            <td>{$dados['editora']}</td>
                            <td>{$dados['autor']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='2' class='text-center'>Nenhum resultado encontrado.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>
