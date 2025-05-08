<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];


    $sql = "INSERT INTO autor (nome) VALUES ('$nome')";
    if ($conexao->query($sql) === TRUE) {
        echo "Autor inserido com sucesso.";
    } else {
        echo "Erro: " . $conexao->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Autor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container" style="margin-top: 50px; max-width: 600px">
    <h3>Cadastro de Autor</h3>
    <br>

    <form method="post">
        <div class="mb-3">
            <label class="form-label">Nome do Autor</label>
            <input type="text" class="form-control" name="nome" required>
        </div>

        <button type="submit" class="btn btn-primary">Cadastrar</button>
        <a href=".php" class="btn btn-secondary">Voltar</a>
    </form>
</div>
</body>
</html>
