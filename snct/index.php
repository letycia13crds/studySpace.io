<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #c0eafc;
            font-family: 'Roboto', sans-serif; /* Cor de fundo mais clara */
            margin: 0;
            padding: 0;
        }

        .container1 {
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
            color: #040857; /* Cor do texto dos rótulos */
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
            background-color: #000080; /* Cor de fundo do botão */
            color: white; 
            padding: 10px; 
            border: none; 
            border-radius: 5px; 
            cursor: pointer; 
            width: 100%;    
        }

        button:hover {
            background-color: #2f75ed; /* Cor ao passar o mouse */
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
    <div class="container1">
        <img class="logo" src="assets/if_logo.png" alt="Logo">
        <h1>Study Space</h1>
        <div class="divLogin">
            <form action="bd/verificar_login.php" method="POST" class="formulario">
                <label for="login st">Matrícula:</label><br>
                <input type="text" name="matricula" required placeholder="Digite seu login." autocomplete="off"><br>

                <label for="senha">Senha:</label><br>
                <input type="password" name="senha" required placeholder="Digite sua senha." autocomplete="off"><br><br>

                <button type="submit">Login</button><br>
                <a href="usuario/cadastro.php">Não tem uma conta? Cadastre-se!</a>                
            </form>
        </div>
    </div>
</body>

</html>
