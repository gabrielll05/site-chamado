<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
    font-family: Arial, Helvetica, sans-serif;
    background: linear-gradient(to bottom right, #007BFF, #ffffff); /* Degradê azul para branco */
    min-height: 100vh;
    margin: 0;
    padding: 0;


 .logo-bg 
        position: absolute;
        top: 50%; /* Ajuste a posição vertical */
        left: 50%; /* Ajuste a posição horizontal */
        transform: translate(-50%, -50%); /* Centraliza a imagem */
        width: 200px; /* Defina o tamanho da logo */
        opacity: 0.1; /* Ajuste a opacidade para um efeito suave */
        z-index: -1; /* Garante que a imagem ficará atrás do conteúdo */
      }
    </style>
  </head>
  <body>
    <!-- Logo como fundo -->
    <img src="img/chamados.jpg" alt="Logo" class="logo-bg">


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