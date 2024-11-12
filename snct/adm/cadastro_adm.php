<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style.css">
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

<body>
    <div class="container">
        <h1>Área de Cadastro</h1>
            <form action="../bd/enviar_cadastro_adm.php" method="POST" class="formulario">
                <label for="nome_adm">Nome completo:</label><br>
                <input type="text" name="nome_adm" required placeholder="Digite seu nome completo."><br>

                <label for="email_adm">Email:</label>
                <input type="email" name="email_adm" required placeholder="Digite seu email aqui."><br>

                <label for="CPF_adm">CPF:</label><br>
                <input type="text" name="CPF_adm" required placeholder="Digite seu CPF."><br>

                <label for="senha_adm">Senha:</label><br>
                <input type="text" name="senha_adm" required placeholder="Digite sua senha aqui."><br><br>


                <button type="submit">Cadastrar</button>

                <a href="login_adm.php"><button type="button">Voltar ao Início</button></a>
            </form>

    </div>
</body>

</html>