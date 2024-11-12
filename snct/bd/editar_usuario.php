<?php
include 'conexao.php';

if (isset($_GET['matricula'])) {
    $matricula = $_GET['matricula'];

    // Seleciona os dados do usuário com a matrícula fornecida
    $sql = "SELECT * FROM usuarios WHERE matricula = '$matricula'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nome_completo = $row['nome_completo'];
        $CPF = $row['CPF'];
        $endereco = $row['endereco'];

        // Atualiza os dados se o formulário for enviado
        if (isset($_POST['atualizar'])) {
            $novo_nome = $_POST['nome_completo'];
            $novo_CPF = $_POST['CPF'];
            $novo_endereco = $_POST['endereco'];

            $sql_update = "UPDATE usuarios SET nome_completo = '$novo_nome', CPF = '$novo_CPF', endereco = '$novo_endereco' WHERE matricula = '$matricula'";

            if ($conn->query($sql_update) === TRUE) {
                echo "Dados atualizados com sucesso!";
            } else {
                echo "Erro ao atualizar: " . $conn->error;
            }
        }
    } else {
        echo "Usuário não encontrado.";
    }
}
?>
<?php
include '../layout/cabecalho_adm.php';
?>
<form method="POST">
    <label>Nome Completo:</label><br>
    <input type="text" name="nome_completo" value="<?php echo $nome_completo; ?>"><br>
    <label>CPF:</label><br>
    <input type="text" name="CPF" value="<?php echo $CPF; ?>"><br>
    <label>Endereço:</label><br>
    <input type="text" name="endereco" value="<?php echo $endereco; ?>"><br><br>
    <input type="submit" name="atualizar" value="Atualizar">
</form>
