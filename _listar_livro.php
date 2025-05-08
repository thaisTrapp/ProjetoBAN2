<!DOCTYPE html>
<html>
<head>
    <title>Listar Livros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container" style="margin-top: 50px;">
    <h3>Lista de Livros</h3>
    <a href="_inserir_livro.php" class="btn btn-success mb-3">Inserir Novo Livro</a>

    <?php
    include 'conexao.php';

    // Consulta simples com JOIN para mostrar autor e editora
    $sql = "SELECT l.id_estoque, l.titulo, l.ano, l.quantidade,
                   a.nome AS nome_autor,
                   a.is_deleted AS autor_deletado,
                   e.nome AS nome_editora,
                   e.is_deleted AS editora_deletada
            FROM livro l
            JOIN autor a ON l.id_autor = a.id_autor
            JOIN editora e ON l.id_editora = e.id_editora
            ORDER BY l.titulo";

    $result = $conexao->query($sql);

    if ($result->num_rows > 0) {
        echo "<table class='table table-bordered'>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Autor</th>
                        <th>Editora</th>
                        <th>Ano</th>
                        <th>Quantidade</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>";
        while ($row = $result->fetch_assoc()) {
            // Se o autor ou editora estiver deletado, exibe "Deletado"
            $autor = $row['autor_deletado'] ? "Deletado" : $row['nome_autor'];
            $editora = $row['editora_deletada'] ? "Deletada" : $row['nome_editora'];

            echo "<tr>
                    <td>{$row['id_estoque']}</td>
                    <td>{$row['titulo']}</td>
                    <td>{$autor}</td>
                    <td>{$editora}</td>
                    <td>{$row['ano']}</td>
                    <td>{$row['quantidade']}</td>
                    <td>
                        <a href='_editar_livro.php?id={$row['id_estoque']}' class='btn btn-primary'>Editar</a>
                        <a href='_deletar_livro.php?id={$row['id_estoque']}' class='btn btn-danger' onclick='return confirm(\"Tem certeza que deseja deletar este livro?\")'>Deletar</a>
                    </td>
                  </tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "<div class='alert alert-warning'>Nenhum livro encontrado.</div>";
    }

    $conexao->close();
    ?>
</div>
</body>
</html>
