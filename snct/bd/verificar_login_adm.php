<?php
session_start();
include 'config.php';

// Pega os dados do login
$email_adm = $_POST['email_adm'] ?? '';  // Use operador de coalescência nula para evitar erros
$senha_adm = $_POST['senha_adm'] ?? '';

// Consulta para verificar se o login do administrador está cadastrado
$sql = "SELECT nome_adm FROM adm WHERE email_adm = ? AND senha_adm = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $email_adm, $senha_adm);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $_SESSION['nome_adm'] = $row['nome_adm']; // Define a sessão com o nome do administrador
    
    header('Location: ../adm/dashboard.php'); // Redireciona para o dashboard
    exit;
} else {
    echo "<script>alert('Login ou senha incorretos! Verifique os dados ou cadastre-se.'); window.location.href='../adm/login_adm.php';</script>";
}
