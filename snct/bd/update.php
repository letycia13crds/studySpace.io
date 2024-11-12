<?php
session_start();

// Verifica se o formulário foi enviado com a matrícula
if (!isset($_POST['matricula'])) {
    header("Location: ../usuario/configuracoes_do_usuario.php");
    exit;
}

include 'conexao.php';

// Receber dados do formulário
$matricula = $_POST['matricula'];
$senha_atual = $_POST['senha_atual'];
$novo_endereco = $_POST['endereco'];
$novo_bairro = $_POST['bairro'];
$novo_numero = $_POST['numero'];
$nova_senha = $_POST['senha'];

// Consulta segura para verificar a senha atual
$sql = "SELECT senha FROM usuarios WHERE matricula = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $matricula);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Verifica a senha atual usando password_verify
    if (password_verify($senha_atual, $row['senha'])) {
        // Inicia a parte da query de atualização
        $update_sql = "UPDATE usuarios SET endereco = ?, bairro = ?, numero = ?";

        // Atualiza a senha apenas se o usuário digitou uma nova senha
        if (!empty($nova_senha)) {
            // Se nova senha for fornecida, criptografa e adiciona à consulta
            $nova_senha_criptografada = password_hash($nova_senha, PASSWORD_DEFAULT);
            $update_sql .= ", senha = ?";
            // Prepara a consulta com os parâmetros da nova senha
            $stmt_update = $conn->prepare($update_sql . " WHERE matricula = ?");
            $stmt_update->bind_param("ssss", $novo_endereco, $novo_bairro, $novo_numero, $nova_senha_criptografada, $matricula);
        } else {
            // Caso contrário, prepara sem a senha
            $stmt_update = $conn->prepare($update_sql . " WHERE matricula = ?");
            $stmt_update->bind_param("sss", $novo_endereco, $novo_bairro, $novo_numero, $matricula);
        }

        // Executa a consulta de atualização
        if ($stmt_update->execute()) {
            echo "<script>
                    alert('Dados atualizados com sucesso.');
                    window.location.href = '../usuario/configuracoes_do_usuario.php';
                  </script>";
        } else {
            echo "Erro ao atualizar os dados: " . $conn->error;
        }
    } else {
        echo "<script>
                alert('Senha atual incorreta.');
                window.history.back();
              </script>";
    }
} else {
    echo "Usuário não encontrado.";
}

$conn->close();
?>
