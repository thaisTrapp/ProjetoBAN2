<!DOCTYPE html>
<html>
<head>
    <title>Inserir Livro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container" style="margin-top: 50px; max-width: 600px">
    <h3>Inserir Novo Livro</h3>
    <br>
    <?php
    include 'conexao.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $titulo = $_POST['titulo'];
        $isbn = $_POST['isbn'];
        $ano = $_POST['ano'];
        $id_editora = $_POST['id_editora'];

        $sql = "INSERT INTO livro (titulo, isbn, ano, id_editora) VALUES ('$titulo', '$isbn', '$ano', '$id_editora')";
        if ($conexao->query($sql) === TRUE) {
            echo "<div class='alert alert-success'>Livro inserido com sucesso.</div>";
        } else {
            echo "<div class='alert alert-danger'>Erro: " . $conexao->error . "</div>";
        }
    }

    $editoras = $conexao->query("SELECT * FROM editora");
    ?>

    <form method="post">
        <div class="mb-3">
            <label class="form-label">Título</label>
            <input type="text" class="form-control" name="titulo" required>
        </div>

        <div class="mb-3">
            <label class="form-label">ISBN</label>
            <input type="text" class="form-control" name="isbn" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Ano</label>
            <input type="text" class="form-control" name="ano" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Editora</label>
            <select class="form-select" name="id_editora" required>
                <option value="">Selecione a Editora</option>
                <?php while ($e = $editoras->fetch_assoc()) {
                    echo "<option value='".$e['id']."'>".$e['nome']."</option>";
                } ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Inserir</button>
        <a href="_listar_livro.php" class="btn btn-secondary">Voltar</a>
    </form>
</div>
</body>
</html>
