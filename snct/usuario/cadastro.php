<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa; /* Fundo suave */
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .container {
            max-width: 400px;
            width: 100%;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
            text-align: center;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
            font-size: 24px;
        }

        .formulario {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            font-weight: bold;
            color: #555;
            margin-bottom: 5px;
            text-align: left;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #66afe9;
            outline: none;
        }

        button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .submit-button {
            background-color: #28a745;
            color: white;
        }

        .submit-button:hover {
            background-color: #218838;
        }

        .back-button {
            background-color: #007bff;
            color: white;
            margin-top: 10px;
        }

        .back-button:hover {
            background-color: #0056b3;
        }

        a {
            display: block;
            color: #007bff;
            text-decoration: none;
            margin-top: 15px;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body><br><br>
    <div class="container">
        <h1>Área de Cadastro</h1>
        <form action="../bd/enviar_cadastro.php" method="POST" class="formulario"  enctype="multipart/form-data">
            <label for="matricula">Matrícula:</label>
            <input type="text" id="matricula" name="matricula" required placeholder="Digite sua matrícula">

            <label for="nome_completo">Nome completo:</label>
            <input type="text" id="nome_completo" name="nome_completo" required placeholder="Digite seu nome completo">
            
            <label for="imagem">Foto de Perfil:</label>
            <input type="file" name="imagem" id="imagem" accept="../uploads*" required>
            
            <label for="cpf">CPF:</label>
            <input type="text" id="cpf" name="cpf" required placeholder="Digite seu CPF">

            <label for="endereco">Endereço:</label>
            <input type="text" id="endereco" name="endereco" required placeholder="Digite seu endereço">

            <label for="bairro">Bairro:</label>
            <input type="text" id="bairro" name="bairro" required placeholder="Digite seu bairro">

            <label for="numero">Número:</label>
            <input type="text" id="numero" name="numero" required placeholder="Digite o número">

            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required placeholder="Digite sua senha">

            <button type="submit" class="submit-button">Cadastrar</button>
            <button type="button" class="back-button" onclick="window.location.href='../index.php';">Voltar ao Login</button>
        </form>
    </div>
</body>
</html>