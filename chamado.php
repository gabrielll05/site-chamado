<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: black;

        }

        div {
            background-color: rgba(255, 255, 255, 0.8);
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 70px;
            border-radius: 15px;
            color: white;
        }

        input {
            padding: 15px;
            border: none;
        }

        .inputSubmit {
            padding: 15px;
            width: 100%;
        }

        .inputSubmit:hover {
            background-color: rgb(0, 0, 0);
            color: white;
        }

        h1 {
            color: black;
        }
    </style>
</head>

<body>
    <a href="home.php">Voltar a pagina anterior</a>
    <div>
        <h1>LOGIN</h1>
        <form action="testeLogin.php" method="POST">

            <input type="text" name="email" placeholder="Email">
            <br><br>
            <input type="password" name="senha" placeholder="Senha">
            <br><br>
            <input class="inputSubmit" type="submit" name="submit" value="Enviar">

        </form>
    </div>

</body>

</html>