<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Verifica se o usuário está autenticado
if (!isset($_SESSION['nome_adm'])) {
    header("Location: ../adm/index.php"); // Verifique se o caminho está correto
    exit;
}

$nome_adm = $_SESSION['nome_adm'];
?>
