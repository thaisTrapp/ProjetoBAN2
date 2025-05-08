<!DOCTYPE html>
<html>
<head>
    <title>Listar Autores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container" style="margin-top: 50px;">
    <h3>Lista de Autores</h3>
    <a href="_inserir_autor.php" class="btn btn-success mb-3">Inserir Novo Autor</a>

    <?php
    include 'conexao.php';

    $sql = "SELECT * FROM autor";
    $result = $conexao->query($sql);

    if ($result->num_rows > 0) {
        echo "<table class='table table-bordered table-striped'>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>";
        while ($row = $result->fetch_assoc()) {
            // Verifica se o autor está deletado
            $nome_autor = $row['is_deleted'] ? "Deletado" : $row['nome'];

            echo "<tr>
                    <td>{$row['id_autor']}</td>
                    <td>{$nome_autor}</td>
                    <td>";

            // Verifica se o autor está deletado para permitir a edição ou deleção
            if (!$row['is_deleted']) {
                echo "<a href='_editar_autor.php?id={$row['id_autor']}' class='btn btn-warning'>Editar</a>
                      <a href='_deletar_autor.php?id={$row['id_autor']}' class='btn btn-danger' onclick='return confirm(\"Tem certeza que deseja deletar este autor?\")'>Deletar</a>";
            } else {
                echo "<span class='text-muted'>Autor Deletado</span>";
            }

            echo "</td>
                  </tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "<div class='alert alert-warning'>Nenhum autor encontrado.</div>";
    }

    $conexao->close();
    ?>
</div>
</body>
</html>
