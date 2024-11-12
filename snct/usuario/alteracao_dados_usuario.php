<?php
include '../bd/session.php';

include '../bd/conexao.php';

$login = $_SESSION['login'];
$sql = "SELECT * FROM usuarios WHERE matricula = '$login'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $endereco = $row['endereco'];
    $bairro = $row['bairro'];
    $numero = $row['numero'];
} else {
    echo "Usuário não encontrado.";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<?php
include '../layout/head.php';
?>

<body>
    
    <?php
    include '../layout/cabecalho.php';
    ?>
    <br><br>
    <h1 class="h1_alteracao">Alteração de dados do usuário</h1>
    <form class="form_alteracao" action="../bd/update.php" method="POST" enctype="multipart/form-data">

        <label for="endereco">Endereço:</label><br>
        <input type="text" name="endereco" value="<?php echo $endereco; ?>" required><br>

        <label for="bairro">Bairro:</label><br>
        <input type="text" name="bairro" value="<?php echo $bairro; ?>" required><br>

        <label for="numero">Número:</label><br>
        <input type="text" name="numero" value="<?php echo $numero; ?>" required><br>

        <label for="senha_atual">Senha Atual:</label><br>
        <input type="password" name="senha_atual" required placeholder="Digite sua senha atual."><br>

        <label for="senha">Nova Senha:</label><br>
        <input type="password" name="senha" placeholder="Digite sua nova senha."><br><br>

        <button type="submit">Enviar alterações</button>
    </form>

    <?php
    include '../layout/footer.php';
    ?>
</body>

</html>