<?php
include 'conexao.php';

// Verifica se existe um ID passado na URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta os dados do livro
    $sql = "SELECT * FROM livro WHERE id_estoque = $id";
    $result = $conexao->query($sql);
    $row = $result->fetch_assoc();
}

// Atualiza os dados do livro
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $ano = $_POST['ano'];
    $quantidade = $_POST['quantidade'];
    $id_autor = $_POST['id_autor'];
    $id_editora = $_POST['id_editora'];
    $id_estoque = $_POST['id_estoque'];

    $sql = "UPDATE livro SET 
                titulo = '$titulo', 
                ano = '$ano', 
                quantidade = '$quantidade', 
                id_autor = '$id_autor', 
                id_editora = '$id_editora' 
            WHERE id_estoque = '$id_estoque'";

    if ($conexao->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>Livro atualizado com sucesso.</div>";
    } else {
        echo "<div class='alert alert-danger'>Erro: " . $conexao->error . "</div>";
    }
}

// Consulta autores e editoras
$autores = $conexao->query("SELECT * FROM autor");
$editoras = $conexao->query("SELECT * FROM editora");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Livro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container" style="margin-top: 50px; max-width: 600px;">
    <h3>Editar Livro</h3>
    <br>

    <form method="post">
        <!-- ID do livro (oculto) -->
        <input type="hidden" name="id_estoque" value="<?php echo $row['id_estoque']; ?>">

        <!-- Título -->
        <div class="mb-3">
            <label class="form-label">Título</label>
            <input type="text" class="form-control" name="titulo" value="<?php echo $row['titulo']; ?>" required>
        </div>

        <!-- Ano -->
        <div class="mb-3">
            <label class="form-label">Ano</label>
            <input type="text" class="form-control" name="ano" value="<?php echo $row['ano']; ?>" required>
        </div>

        <!-- Quantidade -->
        <div class="mb-3">
            <label class="form-label">Quantidade</label>
            <input type="number" class="form-control" name="quantidade" value="<?php echo $row['quantidade']; ?>" required>
        </div>

        <!-- Autor -->
        <div class="mb-3">
            <label class="form-label">Autor</label>
            <select class="form-select" name="id_autor" required>
                <option value="">Selecione</option>
                <?php while ($a = $autores->fetch_assoc()) { ?>
                    <option value="<?php echo $a['id_autor']; ?>" <?php if ($a['id_autor'] == $row['id_autor']) echo 'selected'; ?>>
                        <?php echo $a['nome']; ?>
                    </option>
                <?php } ?>
            </select>
        </div>

        <!-- Editora -->
        <div class="mb-3">
            <label class="form-label">Editora</label>
            <select class="form-select" name="id_editora" required>
                <option value="">Selecione</option>
                <?php while ($e = $editoras->fetch_assoc()) { ?>
                    <option value="<?php echo $e['id_editora']; ?>" <?php if ($e['id_editora'] == $row['id_editora']) echo 'selected'; ?>>
                        <?php echo $e['nome']; ?>
                    </option>
                <?php } ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="menu.php" class="btn btn-secondary">Voltar</a>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
$conexao->close();
?>
