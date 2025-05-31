<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISTEMA CHAMADO</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-color: black;
            text-align: center;
            color: white;
        }
        .box{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            background-color: rgba(0, 0, 0, 0.6);
            padding: 30px;
            border-radius: 10px;
            
        }
        a{
            text-decoration: none;
            color: white;
            border: 3px solid rgb(255, 255, 255);
            border-radius: 10px;
            padding: 30px;
        }
        a:hover{
            background-color: rgb(255, 255, 255);
            color: black;
        }
    </style>
</head>
<body>
    <h1>SISTEMA DE CHAMADO</h1>
    <div class="box">
        <a href="chamado.php">Login</a>
        <a href="formulario.php">Cadastre-se</a>
    </div>
</body>
</html>