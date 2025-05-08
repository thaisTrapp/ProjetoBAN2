<!DOCTYPE html>
<html>
<head>
    <title>Menu Principal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container" style="margin-top: 80px;">
    <h2 class="mb-4">Menu Principal do Sistema</h2>

    <div class="row g-4">
        <!-- Cadastros -->
        <div class="col-md-4">
            <h4>Cadastros</h4>
            <ul class="list-group">
                <li class="list-group-item"><a href="_inserir_livro.php">Cadastrar Livro</a></li>
                <li class="list-group-item"><a href="_inserir_autor.php">Cadastrar Autor</a></li>
                <li class="list-group-item"><a href="_inserir_editora.php">Cadastrar Editora</a></li>
            </ul>
        </div>

        <!-- Listagens -->
        <div class="col-md-4">
            <h4>Listagens</h4>
            <ul class="list-group">
                <li class="list-group-item"><a href="_listar_livro.php">Listar Livros</a></li>
                <li class="list-group-item"><a href="_listar_autor.php">Listar Autores</a></li>
                <li class="list-group-item"><a href="_listar_editora.php">Listar Editoras</a></li>
            </ul>
        </div>

        <!-- Relatórios -->
        <div class="col-md-4">
            <h4>Relatórios</h4>
            <ul class="list-group">
                <li class="list-group-item"><a href="_relatorio_livros_por_autor.php">Livros por Autor</a></li>
                <li class="list-group-item"><a href="_relatorio_livros_por_editora.php">Livros por Editora</a></li>
                <li class="list-group-item"><a href="_relatorio_autores_por_editora.php">Autores por Editora</a></li>
            </ul>
        </div>
    </div>
</div>

</body>
</html>
