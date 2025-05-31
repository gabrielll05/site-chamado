<?php
session_start();
include 'config.php';

if (!isset($_SESSION['email']) || !isset($_SESSION['senha'])) {
    session_unset();
    session_destroy();
    header('Location: chamado.php');
    exit;
}

$logado = $_SESSION['email'];
$id_usuario = $_SESSION['usuario_id'];

$mensagem = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['titulo'], $_POST['descricao'])) {
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];

    $stmt =  $conexao->prepare("INSERT INTO chamados (id_usuario, titulo, descricao) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $id_usuario, $titulo, $descricao);
    if ($stmt->execute()) {
        $mensagem = "<div class='alert alert-success mt-3'>Chamado criado com sucesso!</div>";
    } else {
        $mensagem = "<div class='alert alert-danger mt-3'>Erro ao criar chamado.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Criar Chamado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .profile-pic {
            display: inline-block;
            vertical-align: middle;
            width: 50px;
            height: 50px;
            overflow: hidden;
            border-radius: 50%;
        }
        .profile-pic img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }
        .profile-menu .dropdown-menu {
            right: 0;
            left: unset;
        }
        .profile-menu .fa-fw {
            margin-right: 10px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="sistema.php">CHAMADO</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" href="meus_chamados.php">Meus chamados</a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto profile-menu">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarProfile" data-bs-toggle="dropdown">
            <div class="profile-pic">
              <img src="img/engrenagem.png" alt="nome">
            </div>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#"><i class="fas fa-user fa-fw"></i> Conta</a></li>
            <li><a class="dropdown-item" href="#"><i class="fas fa-cog fa-fw"></i> Configurações</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="chamado.php"><i class="fas fa-sign-out-alt fa-fw"></i> Sair</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container mt-5">
    <h2>Criar Chamado</h2>
    
    <?= $mensagem ?>

    <form method="POST" class="mt-3">
        <div class="mb-3">
            <label for="titulo" class="form-label">Título do Chamado</label>
            <input type="text" name="titulo" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea name="descricao" class="form-control" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Enviar Chamado</button>
    </form>
</div>

</body>
</html>