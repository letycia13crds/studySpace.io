<?php
include 'session_adm.php'; // Inclua o arquivo de sessão
include '../bd/config.php';   // Inclua a configuração do banco de dados
include '../layout/head.php'; // Inclua o cabeçalho da página

// Verifica se o nome do administrador está disponível na sessão
if (isset($nome_adm)) {
    // Prepara a consulta para obter informações do administrador logado
    $stmt = $conn->prepare("SELECT * FROM adm WHERE nome_adm = ?");
    $stmt->bind_param("s", $nome_adm);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nome_adm = $row['nome_adm'];
    } else {
        echo "Erro: Dados do usuário não encontrados.";
        exit;
    }
} else {
    echo "Erro: Usuário não autenticado.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<link rel="stylesheet" href="../layout/style_global.css">
<?php include '../layout/head.php'; ?>

<body>
    <?php include '../layout/cabecalho_adm.php'; ?>

    <div class="container-principal">
        <h1 class="titulo">Reservas</h1>

        <h2>Pendentes:</h2>
        <table>
            <tr>
                <th>ID Reserva</th>
                <th>Matrícula</th>
                <th>Data de Reserva</th>
                <th>Horário de Início</th>
            </tr>
            <?php
            // Consulta para exibir as reservas em aberto
            $query = "SELECT * FROM reserva WHERE status = ''";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>{$row['ID_reserva']}</td>";
                    echo "<td>{$row['matricula']}</td>";
                    echo "<td>{$row['data_reserva']}</td>";
                    echo "<td>{$row['horario_inicio']}</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Nenhuma reserva em aberto.</td></tr>";
            }
            ?>
        </table>
    </div>

    <?php include '../layout/footer.php'; ?>
</body>
</html>