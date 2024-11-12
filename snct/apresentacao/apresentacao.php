<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Study Space - Gerenciamento de Salas de Estudo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Roboto', sans-serif;
    }

    .navbar {
      background-color: #fff;
    }

    .navbar-brand img {
      width: 80px;
      height: auto; /* Alterado para manter a proporção */
    }

    .btn-main {
      background-color: #fff;
      color: black;
      border-color: blueviolet;
    }

    .btn-main:hover {
      background-color: blueviolet;
      color: #fff;
    }

    .btn-secondary-custom {
      background-color: blueviolet;
      color: #fff;
    }

    .btn-secondary-custom:hover {
      background-color: #483D8B;
      color: #fff;
    }

    .link-container {
      display: flex;
      justify-content: center;
      margin-top: 50px;
    }

    .link-container a {
      display: inline-block;
      padding: 15px 40px;
      background-color: blueviolet;
      color: #fff;
      font-weight: bold;
      border-radius: 5px;
      font-size: 18px;
      text-align: center;
      transition: background-color 0.3s;
      text-decoration: none;
    }

    .link-container a:hover {
      background-color: #BA55D3;
    }

    h1,
    h2 {
      color: #333;
      text-align: center;
      font-family: sans-serif;
      
    }
    .h2-left{
      text-align: left;
      font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    }

    p {
      text-align: left;
      color: #555;
      font-family: 'Times New Roman', Times, serif;
      font-size: 20px;
    }

</style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="../apresentacao/apresentacao.php">
        <img src="../apresentacao/pessoa.png" alt="logo">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
        aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarContent">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link active" href="#">Quem somos</a>
          </li>
        </ul>
        <div class="d-flex">
          <button class="btn btn-main me-2" type="button"
            onclick="window.location.href='../index.php';">Entrar</button>
          <button class="btn btn-secondary-custom" type="button"
            onclick="window.location.href='../usuario/cadastro.php';">Cadastre-se</button>
        </div>
      </div>
    </div>
  </nav>

  <div class="container my-5">
    <h1>Study Space: Solução Completa para Gerenciamento de Salas de Estudo</h1>
    
    <div class="row align-items-center my-4">
      <div class="col-md-6">
        <img src="pessoa.png" alt="Imagem de uma pessoa estudando" class="img-fluid" />
      </div>
      <div class="col-md-6">
        <h2 class="h2-left">Introdução</h2>
        <p>
          Com o crescimento das demandas por ambientes de estudo organizados e eficientes, a falta de
          sistemas automatizados pode gerar confusões, atrasos e conflitos entre usuários.
        </p>
      </div>
    </div>

    <div class="row align-items-center my-4 flex-md-row-reverse">
      <div class="col-md-6">
        <img src="objetivo.png" alt="Imagem representando um objetivo de estudo" class="img-fluid" />
      </div>
      <div class="col-md-6">
        <h2 class="h2-left">Objetivo</h2>
        <p>
          O Study Space visa otimizar o uso de recursos e fornecer controle em tempo real para o gerenciamento completo
          de salas de estudo.
        </p>
      </div>
    </div>

    <h2 class="my-4">Principais Funcionalidades</h2>
    <ul class="list-group mb-4">
      <li class="list-group-item">Reserva de Salas de Estudo: Sistema de agendamento para verificar disponibilidade e
        solicitar reservas.</li>
      <li class="list-group-item">Controle por Administradores: Autorização e monitoramento de reservas.</li>
      <li class="list-group-item">Automação de Reservas: Finalização automática após uma hora de uso.</li>
      <li class="list-group-item">Regras e Penalidades: Limite de tempo e aplicação de penalidades.</li>
      <li class="list-group-item">Relatórios em Tempo Real: Geração de relatórios para análise de uso e feedback.</li>
    </ul>

    <h2 class="my-4">Vantagens do Study Space</h2>
    <ul class="list-group mb-4">
      <li class="list-group-item">Organização e Eficiência: Sistema que evita conflitos no uso das salas.</li>
      <li class="list-group-item">Experiência do Usuário: Interface amigável e fácil navegação.</li>
      <li class="list-group-item">Economia de Tempo: Automação de processos administrativos.</li>
      <li class="list-group-item">Controle Total: Regras claras e penalidades automáticas.</li>
    </ul>

    <h2 class="my-4">Exemplo de Funcionamento</h2>
    <ul class="list-group mb-4">
      <li class="list-group-item">Usuário verifica a disponibilidade e solicita a reserva.</li>
      <li class="list-group-item">Administrador autoriza ou ajusta a reserva conforme necessário.</li>
      <li class="list-group-item">A reserva é finalizada automaticamente e a disponibilidade é atualizada.</li>
    </ul>

    <div class="link-container">
      <a href="../index.php">Acessar Study Space</a>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>
