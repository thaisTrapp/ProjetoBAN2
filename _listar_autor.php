<?php
include 'conexao.php';

$sql = "SELECT * FROM autor";
$result = $conexao->query($sql);

echo "<h2>Autores Cadastrados</h2>";
echo "<table border='1'>
<tr><th>ID</th><th>Nome</th><th>Ações</th></tr>";

while($row = $result->fetch_assoc()) {
    echo "<tr>
        <td>".$row['id']."</td>
        <td>".$row['nome']."</td>
        <td>
            <a href='_editar_autor.php?id=".$row['id']."'>Editar</a>
        </td>
    </tr>";
}
echo "</table>";
echo "<br><a href='_inserir_autor.php'>Novo Autor</a>";
