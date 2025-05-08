<!DOCTYPE html>
<html>
<head>
    <title>Relatório - Livros por Autor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container" style="margin-top: 50px;">
    <h3>Relatório - Livros por Autor</h3>
    <a href="menu.php" class="btn btn-secondary mb-3">Voltar ao Menu</a>

    <?php
    include 'conexao.php';

    $sql = "
    SELECT a.nome AS autor, l.titulo AS livro
    FROM livro l
    INNER JOIN autor a ON l.id_autor = a.id_autor
    INNER JOIN editora e ON l.id_editora = e.id_editora
    WHERE a.is_deleted = 0 AND e.is_deleted = 0
    ORDER BY a.nome, l.titulo
";

    $result = $conexao->query($sql);

    if ($result->num_rows > 0) {
        echo "<table class='table table-bordered table-striped'>
                <thead class='table-dark'>
                    <tr>
                        <th>Autor</th>
                        <th>Livro</th>
                    </tr>
                </thead>
                <tbody>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['autor']}</td>
                    <td>{$row['livro']}</td>
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
