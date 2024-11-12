<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #65b307;">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 nav-ul">
                <li class="nav-item me-3">
                    <a class="nav-link" href="../adm/dashboard.php">Dashboard</a>
                </li>
                <li class="nav-item me-3">
                    <a class="nav-link" href="../bd/listar_usuarios.php">Listar Usuarios</a>
                </li>
                <li class="nav-item me-3">
                    <a class="nav-link" href="../bd/listar_funcionarios.php">Listar Funcionarios</a>
                </li>
                <li class="nav-item me-3">
                    <a class="nav-link" href="../bd/reservas_solicitadas.php">Reservas Solicitadas</a>
                </li>
                <li class="nav-item me-3">
                    <a class="nav-link" href="../adm/configuracao_adm.php">Configurações</a>
                </li>
            </ul>
            <div class="d-flex align-items-center">
                <span class="navbar-text me-3 text-white">
                    <?php // Bloquinho de código para exibir o nome do adm
                    if (isset($_SESSION['nome_adm'])) {
                        echo 'Bem vindo(a) ';
                        echo htmlspecialchars($_SESSION['nome_adm']); // Exibe o nome do usuário(isso deu um belo trabalho, igual o usuário...)
                        echo '!';
                    } else {
                        echo "Usuário Desconhecido"; // Mensagem padrão se não estiver logado
                    }
                    ?>
                </span>
                <a href="../adm/logout_adm.php" class="btn btn-outline-light">Sair</a>
            </div>
        </div>
    </div>

    <style>
        /* Estilo do container da navbar */
        #navbarNav {
            display: flex;
            justify-content: flex-end;
            padding: 5px;
        }

        /* Estilo dos itens de navegação */
        .nav-ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            font-size: 20px;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }

        /* Estilo individual dos links */
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
            background-color: #228B22;
            color: white;
        }

        /* Estilo responsivo para telas menores */
        @media (max-width: 768px) {
            #navbarNav {
                flex-direction: column;
                align-items: flex-start;
            }

            .nav-ul li {
                margin-right: 0;
                margin-bottom: 10px;
            }
        }
    </style>
</nav>