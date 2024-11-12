<?php
session_start();
include 'conexao.php';

// Pega os dados do formulário de login
$matricula = $_POST['matricula'];
$senha = $_POST['senha'];

// Faz uma consulta para obter o nome e a senha criptografada do usuário com a matrícula fornecida
$sql = "SELECT nome_completo, senha FROM usuarios WHERE matricula = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $matricula); // Protege contra injeção de SQL
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $senha_criptografada = $row['senha'];

    // Compara a senha fornecida com o hash no banco
    if (password_verify($senha, $senha_criptografada)) {
        $_SESSION['login'] = $matricula;
        $_SESSION['matricula'] = $matricula;
        $_SESSION['nome_completo'] = $row['nome_completo'];

        // Redireciona para o menu principal
        header("Location: ../usuario/menuPrincipal.php");
        exit;
    } else {
        // Senha incorreta
        echo "<script>alert('Login ou senha incorretos! Verifique os dados ou cadastre-se.'); window.location.href='../index.php';</script>";
    }
} else {
    // Usuário não encontrado
    echo "<script>alert('Usuário não encontrado! Verifique os dados ou cadastre-se.'); window.location.href='../index.php';</script>";
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
