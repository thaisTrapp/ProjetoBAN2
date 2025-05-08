<?php

$servername = "localhost";
$database = "projeto";
$username = "root";
$password = "";

$conexao = mysqli_connect($servername, $username, $password, $database);

if (!$conexao) {
    die("Falha na conexão: " . mysqli_connect_error());
}
?>
