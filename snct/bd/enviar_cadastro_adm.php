<?php
include 'config.php';

// Pega os dados do formulário
$nome_adm = $_POST['nome_adm'];
$email_adm = $_POST['email_adm'];
$CPF_adm = $_POST['CPF_adm'];
$senha_adm = $_POST['senha_adm'];

// Criptografa a senha antes de inserir no banco de dados
$senha_adm_hashed = password_hash($senha_adm, PASSWORD_DEFAULT);

$query = "INSERT INTO adm (nome_adm, email_adm, CPF_adm, senha_adm) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("ssss", $nome_adm, $email_adm, $CPF_adm, $senha_adm_hashed);

if ($stmt->execute()) {
    echo "Cadastro realizado com sucesso!";
} else {
    echo "Erro ao cadastrar: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
