<?php
include 'conexao.php';

$id = $_GET['id']; // Pegando o ID pela URL

$sql = "SELECT * FROM `estoque` WHERE id_estoque = $id"; 
$buscar = mysqli_query($conexao, $sql);

while ($array = mysqli_fetch_array($buscar)) {
    $id_estoque = $array['id_estoque'];
    $nomeLivro = $array['nomeLivro'];
    $genero = $array['genero'];
    $quantidade = $array['quantidade'];
    $fornecedor = $array['fornecedor'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Editar Livro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container" id="tamanhoContainer" style="margin-top: 40px">

    <h4>Formulário de Edição</h4>

    <form action="_atualizar_livro.php" method="post" style="margin-top: 20px">

        <input type="hidden" name="id_estoque" value="<?php echo $id_estoque ?>">

        <div class="form-group">
            <label class="form-label">Código</label>
            <input type="number" class="form-control" value="<?php echo $id ?>" readonly>
        </div>

        <div class="form-group">
            <label class="form-label">Título</label>
            <input type="text" class="form-control" name="nomeLivro" value="<?php echo $nomeLivro ?>">
        </div>

        <div class="form-group">
            <label class="form-label">Gênero</label>
            <select class="form-control" name="genero">
                <?php
                $generos = ["Romance", "Fantasia", "Ficção científica", "Horror", "Suspense", "Memórias/Biografia", "Gastronomia", "Autoajuda", "Religião"];
                foreach ($generos as $g) {
                    $selected = $g == $genero ? "selected" : "";
                    echo "<option $selected>$g</option>";
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label class="form-label">Quantidade</label>
            <input type="number" class="form-control" name="quantidade" value="<?php echo $quantidade ?>">
        </div>

        <div class="form-group">
            <label class="form-label">Editora</label>
            <input type="text" class="form-control" name="fornecedor" value="<?php echo $fornecedor ?>">
        </div>

        <div style="text-align: right; margin-top: 10px;">
            <button type="submit" id="botao" class="btn btn-primary">Atualizar</button>
        </div>

    </form>

</div>
</body>
</html>
<?php } ?>
