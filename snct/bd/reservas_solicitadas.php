<!DOCTYPE html>
<html lang="pt-BR">
<link rel="stylesheet" href="../layout/style_global.css">
<?php
include '../layout/head.php'; 
include '../adm/session_adm.php';
?>

<body>
    <?php
    include('../bd/config.php');

    // Função para aceitar ou recusar uma reserva
    if (isset($_POST['acao'])) {
        $id_reserva = $_POST['id_reserva'];
        $status = $_POST['acao'] == 'aceitar' ? 'Aprovada' : 'Recusada';

        $query = "UPDATE reserva SET status='$status' WHERE ID_reserva='$id_reserva'";
        mysqli_query($conn, $query);
        header("Location: reservas_solicitadas.php");
        exit(); // Recomenda-se usar exit() após header redirection
    }
    ?>

    <?php include '../layout/cabecalho_adm.php'; ?>

    <h2>Gerenciar Reservas</h2>
    <table border="1">
        <tr>
            <th>ID Reserva</th>
            <th>Matrícula</th>
            <th>Data de Reserva</th>
            <th>Horário de Início</th>
            <th>Número de Pessoas</th>
            <th>Status</th>
            <th>Número da Sala</th>
            <th>Ação</th>
        </tr>
        <?php
        $query = "SELECT * FROM reserva ORDER BY ID_reserva desc";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>{$row['ID_reserva']}</td>";
            echo "<td>{$row['matricula']}</td>";
            echo "<td>{$row['data_reserva']}</td>";
            echo "<td>{$row['horario_inicio']}</td>";
            echo "<td>{$row['numero_pessoas']}</td>";
            echo "<td>{$row['status']}</td>";
            echo "<td>{$row['numero_sala']}</td>";
            echo "<td>
                  <form method='post'>
                      <input type='hidden' name='id_reserva' value='{$row['ID_reserva']}'>
                      <button type='submit' name='acao' value='aceitar'>Aceitar</button>
                      <button type='submit' name='acao' value='recusar'>Recusar</button>
                  </form>
                </td>";
            echo "</tr>";
        }
        ?>
    </table>
    <p>
        <a href="../adm/dashboard.php"><button type="button">Voltar ao Início</button></a>
    </p>

    <?php include '../layout/footer.php'; ?>
</body>

</html>
