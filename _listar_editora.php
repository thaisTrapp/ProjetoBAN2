<!DOCTYPE html>
<html>
<head>
    <title>Listar Editoras</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container" style="margin-top: 50px;">
    <h3>Lista de Editoras</h3>
    <a href="_inserir_editora.php" class="btn btn-success mb-3">Inserir Nova Editora</a>

    <?php
    include 'conexao.php';

    // Consulta para buscar todas as editoras
    $sql = "SELECT * FROM editora";
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
            // Verifica se a editora está deletada
            $nome_editora = $row['is_deleted'] ? "Deletada" : $row['nome'];

            echo "<tr>
                    <td>{$row['id_editora']}</td>
                    <td>{$nome_editora}</td>
                    <td>";

            // Verifica se a editora está deletada para permitir a edição ou deleção
            if (!$row['is_deleted']) {
                echo "<a href='_editar_editora.php?id={$row['id_editora']}' class='btn btn-warning'>Editar</a>
                      <a href='_deletar_editora.php?id={$row['id_editora']}' class='btn btn-danger' onclick='return confirm(\"Tem certeza que deseja deletar esta editora?\")'>Deletar</a>";
            } else {
                echo "<span class='text-muted'>Editora Deletada</span>";
            }

            echo "</td>
                  </tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "<div class='alert alert-warning'>Nenhuma editora encontrada.</div>";
    }

    $conexao->close();
    ?>
</div>
</body>
</html>
