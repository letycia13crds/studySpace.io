<?php
include '../bd/conexao.php';
include '../bd/session.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<?php include '../layout/head.php'?>

<body>
<?php include '../layout/cabecalho.php'?>
    <h1>Cancelamento de Reserva</h1>
    <h2>Reservas Ativas</h2>
    <?php
    // Seleciona as reservas ativas (em aberto)
    $query = "SELECT * FROM reserva WHERE status = ''";
    $result = mysqli_query($conn, $query);

    // Exibe as reservas ativas em uma tabela
    if (mysqli_num_rows($result) > 0) {
        echo "<table>
                <tr>
                    <th>ID Reserva</th>
                    <th>Matrícula</th>
                    <th>Sala</th>
                    <th>Data de Início</th>
                    <th>Data de Término</th>
                    <th>Ação</th>
                </tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>{$row['ID_reserva']}</td>";
            echo "<td>{$row['matricula']}</td>";
            echo "<td>{$row['numero_sala']}</td>";
            echo "<td>{$row['data_inicio']}</td>";
            echo "<td>{$row['data_termino']}</td>";
            echo "<td>
                    <form method='post' action=''>
                        <input type='hidden' name='id_reserva' value='{$row['ID_reserva']}'>
                        <button type='submit' name='cancelar'>Cancelar</button>
                    </form>
                  </td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Você não tem reservas ativas.</p>";
    }

        // Processa o cancelamento da reserva
        if (isset($_POST['cancelar'])) {
            $id_reserva = $_POST['id_reserva'];
            $query_cancelar = "UPDATE reserva SET status = 'Cancelado' WHERE ID_reserva = '$id_reserva'";
            
            if (mysqli_query($conn, $query_cancelar)) {
                echo "<p>Reserva ID $id_reserva foi cancelada com sucesso.</p>";
            } else {
                echo "<p>Erro ao cancelar a reserva: " . mysqli_error($conn) . "</p>";
            }
        }

    // Fecha a conexão com o banco de dados
    mysqli_close($conn);
    ?>
</body>

</html>
