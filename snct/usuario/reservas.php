<!DOCTYPE html>
<html lang="pt-BR">
<?php
include '../layout/head.php';
include '../bd/session.php';
?>

<body>
    <?php include '../layout/cabecalho.php'; ?>
    <br><br>
    <div class="container-principal">
        <h1 class="titulo">Reservas</h1>

        <?php
        include '../bd/conexao.php';

        // Obtém a matrícula do usuário logado a partir da sessão
        $matricula_usuario = $_SESSION['matricula'];
        ?>

        <h2>Pendentes:</h2>
        <table>
            <tr>
                <th>ID Reserva</th>
                <th>Matrícula</th>
                <th>Data de Reserva</th>
                <th>Horário de Início</th>
                <th>Integrantes</th>
                <th>Ação</th>
            </tr>
            
            <?php
            // Consulta para exibir as reservas pendentes apenas do usuário logado
            $query = "SELECT * FROM reserva WHERE status = '' AND matricula = '$matricula_usuario'";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    // Extrair as matrículas dos integrantes
                    $integrantes = [];
                    for ($i = 2; $i <= 6; $i++) {
                        $coluna = "matricula_integrante_" . $i;
                        if (!empty($row[$coluna])) {
                            $integrantes[] = $row[$coluna];
                        }
                    }
                    // Exibir os dados da reserva, incluindo os integrantes
                    echo "<tr>";
                    echo "<td>{$row['ID_reserva']}</td>";
                    echo "<td>{$row['matricula']}</td>";
                    echo "<td>{$row['data_reserva']}</td>";
                    echo "<td>{$row['horario_inicio']}</td>";
                    echo "<td>" . implode(", ", $integrantes) . "</td>";  // Mostrar as matrículas dos integrantes
                    echo "<td>
                            <form method='post' action=''>
                                <input type='hidden' name='id_reserva' value='{$row['ID_reserva']}'>
                                <button type='submit' name='cancelar'>Cancelar</button>
                            </form>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Nenhuma reserva em aberto.</td></tr>";
            }

            // Cancela a reserva
            if (isset($_POST['cancelar'])) {
                $id_reserva = $_POST['id_reserva'];
                $query_cancelar = "UPDATE reserva SET status = 'Cancelado' WHERE ID_reserva = '$id_reserva'";

                if (mysqli_query($conn, $query_cancelar)) {
                    echo "<p>Reserva ID $id_reserva foi cancelada com sucesso.</p>";
                } else {
                    echo "<p>Erro ao cancelar a reserva: " . mysqli_error($conn) . "</p>";
                }
            }
            ?>
        </table>

        <h2>Anteriores:</h2>
        <table>
            <tr>
                <th>ID Reserva</th>
                <th>Matrícula</th>
                <th>Data de Reserva</th>
                <th>Horário de Início</th>
                <th>Integrantes</th>
                <th>Status</th>
            </tr>
            
            <?php
            // Consulta para exibir as reservas anteriores (Aprovada ou Recusada) apenas do usuário logado
            $query = "SELECT * FROM reserva WHERE status IN ('Aprovada', 'Recusada') AND matricula = '$matricula_usuario'";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    // Extrair as matrículas dos integrantes
                    $integrantes = [];
                    for ($i = 2; $i <= 6; $i++) {
                        $coluna = "matricula_integrante_" . $i;
                        if (!empty($row[$coluna])) {
                            $integrantes[] = $row[$coluna];
                        }
                    }
                    // Exibir os dados da reserva, incluindo os integrantes
                    echo "<tr>";
                    echo "<td>{$row['ID_reserva']}</td>";
                    echo "<td>{$row['matricula']}</td>";
                    echo "<td>{$row['data_reserva']}</td>";
                    echo "<td>{$row['horario_inicio']}</td>";
                    echo "<td>" . implode(", ", $integrantes) . "</td>";  // Mostrar as matrículas dos integrantes
                    echo "<td>{$row['status']}</td>";

                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Nenhuma reserva anterior encontrada.</td></tr>";
            }
            ?>
        </table>
    </div>
    <?php include '../layout/footer.php' ?>
</body>

</html>
