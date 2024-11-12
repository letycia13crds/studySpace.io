<?php
session_start();
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome_adm'];
    $email = $_POST['email_adm'];
    $senha = $_POST['senha_adm'];

    $query = "UPDATE adm SET nome_adm='$nome', email='$email', senha='$senha' WHERE email='{$_SESSION['email']}'";
    mysqli_query($conn, $query);

    $_SESSION['email'] = $email; // Atualiza sessão caso o email seja alterado
    header('Location: dashboard.php');
}
?>

<form method="post" action="">
    Nome: <input type="text" name="nome_adm" required><br>
    Email: <input type="email" name="email_adm" required><br>
    Senha: <input type="password" name="senha_adm" required><br>
    <button type="submit">Salvar</button>
</form>
