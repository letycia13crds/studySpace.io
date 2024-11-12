<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa; /* Cor de fundo mais clara */
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-decoration: none;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        .logo {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
            width: 300px;
        }

        .divLogin {
            background-color: white; 
            border-radius: 10px; 
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); 
            padding: 20px; 
            width: 300px; 
        }

        label {
            font-weight: bold; 
            color: #333; /* Cor do texto dos rótulos */
        }

        input[type="text"],
        input[type="password"] {
            width: 100%; 
            padding: 10px; 
            margin: 10px 0; 
            border: 1px solid #ccc; 
            border-radius: 5px; 
            box-sizing: border-box; 
        }

        button {
            background-color: blueviolet; /* Cor de fundo do botão */
            color: white; 
            padding: 10px; 
            border: none; 
            border-radius: 5px; 
            cursor: pointer; 
            width: 100%;    
        }

        button:hover {
            background-color: #483D8B; /* Cor ao passar o mouse */
        }

        a {
            text-decoration: none; 
            color: #007BFF; 
            display: block; 
            margin-top: 15px; 
            text-align: center; 
        }

        a:hover {
            text-decoration: underline; 
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="../assets/if_logo.png" alt="">
        <h1 style="color: Black">Study Space - ADM</h1>
        <div class="divLogin">
            <form action="../bd/verificar_login_adm.php" method="POST" class="formulario">
                <label for="login">Login:</label><br>
                <input type="text" name="email_adm" required placeholder="Digite seu login."><br>

                <label for="senha">Senha:</label><br>
                <input type="password" name="senha_adm" required placeholder="Digite sua senha."><br><br>

                <button type="submit">Login</button><br>
            </form>
        </div>
    </div>
</body>
</html>