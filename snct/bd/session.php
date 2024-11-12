<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['login']) || !isset($_SESSION['matricula'])) {
    header("Location:../index.php");
    exit;
}

$matricula = $_SESSION['matricula'];
?>
