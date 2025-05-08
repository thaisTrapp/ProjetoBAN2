<?php
include 'conexao.php';

// Verifica se existe um ID passado na URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Buscar dados da editora para editar
    $sql = "SELECT * FROM editora WHERE id_editora = $id";
    $result = $conexao->query($sql);
    $row = $result->fetch_assoc();
}

// Atualizar os dados quando o formulário for submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nome = $_POST['nome'];

    // Atualizar a editora no banco de dados
    $sql = "UPDATE editora SET nome='$nome' WHERE id_editora=$id";
    if ($conexao->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>Editora atualizada com sucesso.</div>";
    } else {
        echo "<div class='alert alert-danger'>Erro: " . $conexao->error . "</div>";
    }

    // Link para voltar para a lista de editoras
    echo "<br><a href='_listar_editora.php' class='btn btn-primary'>Voltar para lista</a>";
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Editora</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h3>Editar Editora</h3>
    
    <!-- Formulário de Edição -->
    <form method="post" action="">
        <input type="hidden" name="id" value="<?php echo isset($row['id_editora']) ? $row['id_editora'] : ''; ?>">
        
        <div class="mb-3">
            <label for="nome" class="form-label">Nome da Editora</label>
            <input type="text" name="nome" id="nome" class="form-control" value="<?php echo isset($row['nome']) ? $row['nome'] : ''; ?>" required>
        </div>

        <button type="submit" class="btn btn-success">Atualizar</button>
    </form>

    <!-- Link de retorno -->
    <a href="_listar_editora.php" class="btn btn-primary mt-3">Voltar para lista</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// Fechar a conexão
$conexao->close();
?>
