<?php
include 'conexao.php';

if (isset($_GET['id'])) {
    $id_adm = $_GET['id'];

    // Seleciona os dados do funcionário com o ID fornecido
    $sql = "SELECT * FROM adm WHERE id_adm = $id_adm";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nome_adm = $row['nome_adm'];
        $email_adm = $row['email_adm'];
        $CPF_adm = $row['CPF_adm'];

        // Atualiza os dados se o formulário for enviado
        if (isset($_POST['atualizar'])) {
            $novo_nome = $_POST['nome_adm'];
            $novo_email = $_POST['email_adm'];
            $novo_CPF = $_POST['CPF_adm'];

            $sql_update = "UPDATE adm SET nome_adm = '$novo_nome', email_adm = '$novo_email', CPF_adm = '$novo_CPF' WHERE id_adm = $id_adm";

            if ($conn->query($sql_update) === TRUE) {
                echo "Dados atualizados com sucesso!";
            } else {
                echo "Erro ao atualizar: " . $conn->error;
            }
        }
    } else {
        echo "Funcionário não encontrado.";
    }
}
?>
<?php
include '../layout/cabecalho_adm.php';
?>
<form method="POST">
    <label>Nome:</label><br>
    <input type="text" name="nome_adm" value="<?php echo $nome_adm; ?>"><br>
    <label>Email:</label><br>
    <input type="text" name="email_adm" value="<?php echo $email_adm; ?>"><br>
    <label>CPF:</label><br>
    <input type="text" name="CPF_adm" value="<?php echo $CPF_adm; ?>"><br><br>
    <input type="submit" name="atualizar" value="Atualizar">
</form>
