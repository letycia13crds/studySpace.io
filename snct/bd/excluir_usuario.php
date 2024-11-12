<?php
include 'conexao.php';

if (isset($_GET['matricula'])) {
    $matricula = $_GET['matricula'];

    // Deleta o usuário com a matrícula fornecida
    $sql_delete = "DELETE FROM usuarios WHERE matricula = '$matricula'";

    if ($conn->query($sql_delete) === TRUE) {
        echo "Usuário excluído com sucesso!";
    } else {
        echo "Erro ao excluir: " . $conn->error;
    }
}

$conn->close();
?>
