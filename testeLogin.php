<?php
session_start();

if (isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
    include_once('config.php');

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
    $result = $conexao->query($sql);

    if (mysqli_num_rows($result) < 1) {
        // Login inválido
        session_unset();
        header('Location: chamado.php');
        exit;
    } else {
        // Login bem-sucedido
        $usuario = $result->fetch_assoc();

        $_SESSION['email'] = $usuario['email'];
        $_SESSION['senha'] = $usuario['senha']; 
        $_SESSION['usuario_id'] = $usuario['id']; 
        $_SESSION['tipo'] = $usuario['tipo']; // <-- pega o tipo do banco

        // Redireciona de acordo com o tipo
        if ($usuario['tipo'] === 'admin') {
            header('Location: admin.php');
        } else {
            header('Location: sistema.php');
        }
        exit;
    }
} else {
    header('Location: chamado.php');
    exit;
}