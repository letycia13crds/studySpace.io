<?php
session_start();
include '../bd/conexao.php';

$matricula = $_SESSION['login'];

// Verifica se o arquivo foi enviado corretamente
if (isset($_FILES['foto_perfil']) && $_FILES['foto_perfil']['error'] === UPLOAD_ERR_OK) {
    $temp_name = $_FILES['foto_perfil']['tmp_name'];
    $file_name = uniqid() . '_' . basename($_FILES['foto_perfil']['name']);

    // Caminho relativo para a pasta 'uploads'
    $upload_dir = '../uploads/';
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    // Move o arquivo para a pasta 'uploads'
    if (move_uploaded_file($temp_name, $upload_dir . $file_name)) {
        
        // Atualiza o caminho da imagem no banco de dados
        $file_path = 'uploads/' . $file_name; // Caminho relativo que será salvo no banco
        $sql = "UPDATE usuarios SET foto_perfil = ? WHERE matricula = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $file_path, $matricula);
        
        if ($stmt->execute()) {
            // Redireciona de volta para a página de configurações com sucesso
            header("Location: configuracoes_do_usuario.php?foto_atualizada=1");
            exit();
        } else {
            echo "Erro ao atualizar o banco de dados.";
        }
    } else {
        echo "Erro ao mover o arquivo. Verifique as permissões da pasta.";
    }
} else {
    echo "Erro no upload da imagem. Código de erro: " . $_FILES['foto_perfil']['error'];
}

$conn->close();
?>
