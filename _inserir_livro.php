<?php
include 'conexao.php';

// Inserção dos dados
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $ano = $_POST['ano'];
    $quantidade = $_POST['quantidade'];
    $id_autor = $_POST['id_autor'];
    $id_editora = $_POST['id_editora'];

    $sql = "INSERT INTO livro (titulo, ano, quantidade, id_autor, id_editora)
            VALUES ('$titulo', '$ano', '$quantidade', '$id_autor', '$id_editora')";

    if ($conexao->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>Livro inserido com sucesso.</div>";
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
    <title>Cadastro de Livro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container" style="margin-top: 50px; max-width: 600px;">
    <h3>Cadastro de Livro</h3>
    <br>

    <form method="post">
        <!-- Título -->
        <div class="mb-3">
            <label class="form-label">Título</label>
            <input type="text" class="form-control" name="titulo" required>
        </div>

        <!-- Ano -->
        <div class="mb-3">
            <label class="form-label">Ano</label>
            <input type="text" class="form-control" name="ano" required>
        </div>

        <!-- Quantidade -->
        <div class="mb-3">
            <label class="form-label">Quantidade</label>
            <input type="number" class="form-control" name="quantidade" required>
        </div>

        <!-- Autor -->
        <div class="mb-3">
            <label class="form-label">Autor</label>
            <select class="form-select" name="id_autor" required>
                <option value="">Selecione</option>
                <?php while ($a = $autores->fetch_assoc()) { ?>
                    <option value="<?php echo $a['id_autor']; ?>"><?php echo $a['nome']; ?></option>
                <?php } ?>
            </select>
        </div>

    <!-- Editora -->
    <div class="mb-3">
        <label class="form-label">Editora</label>
        <select class="form-select" name="id_editora" required>
            <option value="">Selecione</option>
            <?php while ($e = $editoras->fetch_assoc()) { ?>
                <option value="<?php echo $e['id_editora']; ?>"><?php echo $e['nome']; ?></option>
            <?php } ?>
        </select>
    </div>


        <button type="submit" class="btn btn-primary">Cadastrar</button>
        <a href="menu.php" class="btn btn-secondary">Voltar</a>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
