<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "projeto_snct";

$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
    die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
}
?>
