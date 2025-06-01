<?php
session_start();
include_once 'config.php'; // Conexão com o banco

if (!isset($_SESSION['usuario_id'])) {
    header('Location: chamado.php');
    exit;
}

$id_usuario = $_SESSION['usuario_id'];
$email = $_SESSION['email'];

// Preparar consulta usando $conexao
$sql = "SELECT * FROM chamados WHERE id_usuario = ?";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("i", $id_usuario);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Meus Chamados</title>
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
    <a class="navbar-brand btn btn-outline-light rounded-pill px-3" href="sistema.php">CHAMADO</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
         <a class="navbar-brand btn btn-outline-light rounded-pill px-3" href="meus_chamados.php">Meus chamados</a>
        </li>
      </ul>
    </div>
    </ul>
      <ul class="navbar-nav ms-auto profile-menu">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarProfile" data-bs-toggle="dropdown">
            <div class="profile-pic">
              <img src="img/configuracao.jpg" alt="nome">
            </div>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="chamado.php"><i class="fas fa-sign-out-alt fa-fw"></i> Sair</a></li>
          </ul>
        </li>
      </ul>
  </div>
</nav>  
</div> 
<div class="container mt-5">
    <h2>Meus Chamados</h2>
    <p>Usuário: <strong><?= htmlspecialchars($email) ?></strong></p>

    <table class="table table-bordered mt-4">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Descrição</th>
                <th>Status</th>
                <th>Data de Criação</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while($chamado = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $chamado['id'] ?></td>
                        <td><?= htmlspecialchars($chamado['titulo']) ?></td>
                        <td><?= htmlspecialchars($chamado['descricao']) ?></td>
                        <td><?= htmlspecialchars($chamado['status']) ?></td>
                        <td><?= $chamado['criado_em'] ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="5">Nenhum chamado encontrado.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

</body>
</html>