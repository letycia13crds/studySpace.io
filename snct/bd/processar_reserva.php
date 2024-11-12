<?php
include 'config.php';
include 'session.php';

$matricula = $_SESSION['login'];
$numero_sala = $_POST['selecionar_sala'];
$participantes = $_POST['numeroPessoas'];
$data_reserva = $_POST['data_reserva'];
$horario_inicio = $_POST['data_inicio'];

// Obter as matrículas dos integrantes
$matricula_integrante_2 = isset($_POST['matricula_integrante_2']) ? $_POST['matricula_integrante_2'] : null;
$matricula_integrante_3 = isset($_POST['matricula_integrante_3']) ? $_POST['matricula_integrante_3'] : null;
$matricula_integrante_4 = isset($_POST['matricula_integrante_4']) ? $_POST['matricula_integrante_4'] : null;
$matricula_integrante_5 = isset($_POST['matricula_integrante_5']) ? $_POST['matricula_integrante_5'] : null;
$matricula_integrante_6 = isset($_POST['matricula_integrante_6']) ? $_POST['matricula_integrante_6'] : null;

// Verificar se a reserva já existe
$sql_check = "SELECT COUNT(*) FROM reserva 
              WHERE matricula = ? AND numero_sala = ? AND data_reserva = ? AND horario_inicio = ?";
$stmt_check = mysqli_prepare($conn, $sql_check);
mysqli_stmt_bind_param($stmt_check, "ssss", $matricula, $numero_sala, $data_reserva, $horario_inicio);
mysqli_stmt_execute($stmt_check);
mysqli_stmt_bind_result($stmt_check, $count);
mysqli_stmt_fetch($stmt_check);
mysqli_stmt_close($stmt_check);

if ($count > 0) {
    echo "<script>
            alert('Você já tem uma reserva semelhante registrada.');
            window.location.href = '../usuario/reservarSala.php';
          </script>";
} else {
    // Inserir nova reserva com as matrículas dos integrantes
    $sql_insert = "INSERT INTO reserva (numero_sala, matricula, data_reserva, horario_inicio, numero_pessoas, 
                   matricula_integrante_2, matricula_integrante_3, matricula_integrante_4, 
                   matricula_integrante_5, matricula_integrante_6) 
                   VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt_insert = mysqli_prepare($conn, $sql_insert);
    mysqli_stmt_bind_param($stmt_insert, "ssssisssss", $numero_sala, $matricula, $data_reserva, $horario_inicio, $participantes, 
                                               $matricula_integrante_2, $matricula_integrante_3, $matricula_integrante_4, 
                                               $matricula_integrante_5, $matricula_integrante_6);

    if (mysqli_stmt_execute($stmt_insert)) {
        echo "<script>
                alert('Solicitação de reserva efetuada com sucesso!');
                window.location.href = '../usuario/reservarSala.php';
              </script>";
    } else {
        echo "<script>
                alert('Erro ao efetuar reserva: " . mysqli_error($conn) . "');
                window.location.href = '../usuario/reservarSala.php';
              </script>";
    }
    mysqli_stmt_close($stmt_insert);
}

mysqli_close($conn);
?>
