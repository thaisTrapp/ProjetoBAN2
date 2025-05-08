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
<div class="container" style="margin-top: 50px;">
    <h3>Relatório - Livros por Editora</h3>
    <a href="menu.php" class="btn btn-secondary mb-3">Voltar ao Menu</a>

    <?php
        $sql = "
        SELECT l.titulo AS livro, e.nome AS editora
        FROM livro l
        INNER JOIN editora e ON l.id_editora = e.id_editora
        WHERE e.is_deleted = 0
        ORDER BY e.nome, l.titulo
        ";


    $result = mysqli_query($conexao, $sql);

    if ($result->num_rows > 0) {
        echo "<table class='table table-bordered table-striped'>
                <thead class='table-dark'>
                    <tr>
                        <th>Livro</th>
                        <th>Editora</th>
                    </tr>
                </thead>
                <tbody>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['livro']}</td>
                    <td>{$row['editora']}</td>
                  </tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "<div class='alert alert-warning'>Nenhum dado encontrado.</div>";
    }

    $conexao->close();
    ?>
</div>
</body>
</html>
