<?php

if (isset($_POST['submit'])) {
    // print_r('Nome: ' . $_POST['nome']);
// print_r('<br>');
// print_r('email: ' . $_POST['email']);
// print_r('<br>');
// print_r('telefone: ' . $_POST['telefone']);
// print_r('<br>');
// print_r('genero: ' . $_POST['genero']);
// print_r('<br>');
// print_r('data de nascimento: ' . $_POST['data_nascimento']);
// print_r('<br>');
// print_r('matricula: ' . $_POST['matricula']);
// print_r('<br>');
// print_r('cargo: ' . $_POST['cargo']);
// print_r('<br>');
// print_r('setor: ' . $_POST['setor']);

    include_once('config.php');

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $sexo = $_POST['genero'];
    $data_nasc = $_POST['data_nascimento'];
    $matricula = $_POST['matricula'];
    $cargo = $_POST['cargo'];
    $setor = $_POST['setor'];
    $tipo = $_POST['tipo'];

    //GERADOR DE SENHA AUTOMATICO QUE VAI SER REPASSADO PARA O USUARIO
    $senha = str_pad(rand(0, 99999), 5, '0', STR_PAD_LEFT);

    $result = mysqli_query($conexao, "INSERT INTO usuarios(nome,senha,email,telefone,sexo,data_nasc,matricula,cargo,setor,tipo)
        VALUES ('$nome','$senha','$email','$telefone','$sexo','$data_nasc','$matricula','$cargo','$setor','$tipo')");
    header('Location: chamado.php');

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            color: aliceblue;
            background-color: white;
        
            
        }

        .box {
            
            top: 65%;
            left: 50%;
            transform: translate(80%, 0%);
            background-color: #050034;
            padding: 20px;
            border-radius: 50px;
            width: 35%;
            color: white;
        }

        fieldset {
            border: 5px solid white;
            border-radius: 10px;
            
        }

        legend {
            font-size: 180%;
            border: 1px solid white;
            padding: 10px;
            text-align: center;
            width: 40%;
            border-radius: 5px;
        }

        .inputBox {
            position: relative;
        }

        .inputUser {
            background: none;
            border: none;
            border-bottom: 1px solid rgb(255, 255, 255);
            color: white;
            font-size: 15px;
            width: 100%;
            letter-spacing: 2px;

        }

        .Labelinput {
            position: absolute;
            top: 0px;
            left: 0px;
            pointer-events: none;
            transition: 5s;
        }

        #submit {
            background-color: rgb(255, 255, 255);
            width: 100%;
            border: none;
            padding: 15px;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
        }

        #submit:hover {
            background-color: rgb(255, 255, 255);
            color: aliceblue;
        }
        #data_nascimento{
            color: white;
        }
    </style>
    
</head>

<body>
    <a href="admin.php">Voltar a pagina anterior</a>
    <div class="box">
        <form action="formulario.php" method="post">
            <br><br><br>
            <fieldset>
                <legend><b>Cadastro</b></legend>
                <br><br>
                <div class="inputBox">
                    <label for="nome" class="LabelInput">Nome Completo</label>
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                </div>
                <br> <br>
                <div class="inputbox">
                    <label for="email" class="LabelInput">Email</label>
                    <input type="text" name="email" id="email" class="inputUser" required>
                </div>


                <br> <br>
                <div class="inputbox">
                    <label for="Telefone" class="LabelInput">Telefone</label>
                    <input type="tel" name="telefone" id="telefone" class="inputUser" required>
                </div>
                <br>
                <p>Sexo:</p>
                <input type="radio" id="feminino" name="genero" value="feminino" required>
                <label for="feminino">feminino</label>
                <br> <br>
                <input type="radio" id="Masculino" name="genero" value="Masculino" required>
                <label for="Masculino">Masculino</label>
                <br><br>
                <input type="radio" id="outro" name="genero" value="outro" required>
                <label for="outro">Outro</label>

                <p>Tipo de Usuário</p>

                <input type="radio" id="user" name="tipo" value="user" required>
                <label for="user">Usuário</label>
                <br><br>

                <input type="radio" id="admin" name="tipo" value="admin" required>
                <label for="admin">Administrador</label>
                <br><br>
                <br> <br>
                <div class="inputbox">
                    <label for="data_nascimento"><b>Data de Nascimento</b></label>
                    <br><br>
                    <input type="date" name="data_nascimento" id="data_nascimento" class="inputUser" required>

                </div>
                <br><br>
                <div class="inputbox">
                    <label for="n_matricula" class="LabelInput">Matricula</label>
                    <input type="number" name="matricula" id="matricula" class="inputUser" required>
                </div>
                <br><br>
                <div class="inputbox">
                    <label for="n_cargo" class="LabelInput">Cargo</label>
                    <input type="text" name="cargo" id="cargo" class="inputUser" required>
                </div>
                <br><br>
                <div class="inputbox">
                    <label for="n_setor" class="LabelInput">Setor</label>
                    <input type="text" name="setor" id="setor" class="inputUser" required>
                </div>
                <br><br>
                <input type="submit" name="submit" id="submit">
            </fieldset>
        </form>
    </div>
</body>

</html>