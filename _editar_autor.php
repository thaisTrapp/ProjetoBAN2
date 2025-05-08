<?php
include 'conexao.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM autor WHERE id_autor = $id";
    $result = $conexao->query($sql);
    $row = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nome = $_POST['nome'];

    $sql = "UPDATE autor SET nome='$nome' WHERE id_autor=$id";
    if ($conexao->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>Autor atualizado com sucesso.</div>";
    } else {
        echo "<div class='alert alert-danger'>Erro: " . $conexao->error . "</div>";
    }

    echo "<br><a href='_listar_autor.php' class='btn btn-primary'>Voltar para lista</a>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Autor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h3>Editar Autor</h3>
    <form method="post" action="">
        <input type="hidden" name="id" value="<?php echo isset($row['id_autor']) ? $row['id_autor'] : ''; ?>">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome do Autor</label>
            <input type="text" name="nome" id="nome" class="form-control" value="<?php echo isset($row['nome']) ? $row['nome'] : ''; ?>" required>
        </div>
        <button type="submit" class="btn btn-success">Atualizar</button>
    </form>

    <a href="_listar_autor.php" class="btn btn-primary mt-3">Voltar para lista</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
$conexao->close();
?>
