<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Inicie a sessão se não estiver já em andamento
}
?>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #2574c8 ;">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 nav-ul">
                <li class="nav-item">
                    <a class="nav-link" href="../usuario/menuPrincipal.php">Início</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../usuario/quiz.php">Quiz</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../bioma_360/bioma.php">Biomas em 360°</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../usuario/reservarSala.php">Solicitar Reserva</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../usuario/reservas.php">Reservas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../usuario/configuracoes_do_usuario.php">Configurações</a>
                </li>

            </ul>
            <div class="d-flex align-items-center">
                <span class="navbar-text me-3 text-white">
                    <?php
                    if (isset($_SESSION['nome_completo'])) {
                        echo 'Bem vindo(a) '; 
                        echo htmlspecialchars($_SESSION['nome_completo']); // Exibe o nome do usuário
                        echo '!';
                    } else {
                        echo "Usuário Desconhecido"; // Mensagem padrão se não estiver logado
                    }
                    ?>
                </span>
                <a href="../usuario/logout.php" class="btn btn-outline-light">Sair</a>
            </div>
        </div>
    </div>

    <style>
        /* Estilo Personalizado para o Navbar */
        .nav-ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            font-size: 20px;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }

        .nav-ul li {
            margin-right: 20px;
        }

        .nav-ul li a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            transition: background-color 0.3s ease;
            border-radius: 20px;
        }

        .nav-ul li a:hover {
            background-color: #0A1B6F;
            color: white;
        }

        .navbar-text {
            font-size: 18px;
            font-family: Arial, sans-serif;
        }

        @media (max-width: 768px) {
            .navbar-collapse {
                flex-direction: column;
                align-items: flex-start;
            }

            .nav-ul {
                width: 100%;
            }

            .nav-ul li {
                margin-right: 0;
                margin-bottom: 10px;
                width: 100%;
                text-align: left;
            }

            /* Ajuste para a área do usuário */
            .d-flex {
                justify-content: space-between;
                width: 100%;
            }
        }
    </style>
</nav>