<?php
include 'conexao.php';


// Receber os dados do formulário
$matricula = $_POST['matricula'];
$nome_completo = $_POST['nome_completo'];

$imagemNome = $_FILES["imagem"]["name"];
$imagemTmpNome = $_FILES["imagem"]["tmp_name"];

$CPF = $_POST['cpf'];
$endereco = $_POST['endereco'];
$bairro = $_POST['bairro'];
$numero = $_POST['numero'];

// Criptografa a senha antes de armazená-la no banco
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

// Caminho para a pasta de upload
$pastaDestino = "../uploads/";


// Verifique se a pasta de destino existe, caso contrário, crie-a
if (!is_dir($pastaDestino)) {
    mkdir($pastaDestino, 0755, true);
}

// Nome único para a imagem para evitar conflitos
$imagemNovoNome = uniqid() . '-' . basename($imagemNome);
$caminhoImagem = $pastaDestino . $imagemNovoNome;

// Tente mover a imagem para a pasta de destino
if (move_uploaded_file($imagemTmpNome, $caminhoImagem)) {
    // Verificar se a matrícula já existe no banco de dados
    $sql_check = "SELECT * FROM usuarios WHERE matricula = '$matricula'";
    $result_check = $conn->query($sql_check);

    if ($result_check->num_rows > 0) {
        echo "<script>
                alert('Erro: A matrícula $matricula já está cadastrada.');
                window.location.href = '../usuario/cadastro.php';
              </script>";
    } else {
        // Inserir no banco de dados com o caminho da imagem
        $sql = "INSERT INTO usuarios (matricula, nome_completo, CPF, endereco, bairro, numero, senha, foto_perfil) 
                VALUES ('$matricula', '$nome_completo', '$CPF', '$endereco', '$bairro', '$numero', '$senha', '$caminhoImagem')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>
                    alert('Cadastro realizado com sucesso!');
                    window.location.href = '../index.php';
                  </script>";
        } else {
            echo "Erro ao cadastrar o usuário: " . $conn->error;
        }
    }
} else {
    echo "<script>
            alert('Erro ao fazer upload da imagem.');
            window.location.href = '../usuario/cadastro.php';
          </script>";
}

$conn->close();
?>
