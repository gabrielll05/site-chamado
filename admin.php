<?php
session_start();

if (!isset($_SESSION['usuario_id']) || ($_SESSION['tipo'] ?? '') !== 'admin') {
  header("Location: chamado.php");
  exit;
}

include 'config.php';

$result = $conexao->query("SELECT chamados.*, usuarios.email FROM chamados JOIN usuarios ON chamados.id_usuario = usuarios.id ORDER BY criado_em DESC");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Adm</title>

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

    #chamadorealizado {
      text-align: center;
      color: #050034;

    }

    #tabela {
      margin-left: auto;
      margin-right: auto;
      width: 100%;
      border-width: 5px;
      border-style: solid;
      border-color: #050034;
      border-collapse: collapse;
    }

    img {

      text-align: center;
    }

    .custom-navbar {
      background-color: #050034;
    }

    #atendentelogo {
      transform: translate(200%, 0%);
      width: 20%;
    }
  </style>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark custom-navbar">
    <div class="container-fluid">
      <a class="navbar-brand btn btn-outline-primary rounded-pill px-3" href="#">CHAMADO</a>
      <a class="navbar-brand btn btn-outline-primary rounded-pill px-3" href="formulario.php">CADASTRAR USUARIO</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
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
  </nav>
  </div>
  <img src="img/atendente logo (2).png" alt="" id="atendentelogo">
  </div>
  </nav>
  <br><br>
  <h4 id="chamadorealizado">CHAMADOS REALIZADOS</h4>
  <table class="table table-bordered mt-4" id="tabela">
    <thead class="table-primary">
    <tr>
      <th>ID</th>
      <th>USUARIO</th>
      <th>TÍTULO</th>
      <th>STATUS</th>
      <th>DESCRIÇÃO</th>
      <th>ALTERAR</th>
      </thead>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['email'] ?></td>
        <td><?= $row['titulo'] ?></td>
        <td><?= $row['status'] ?></td>
        <td><?= $row['descricao'] ?></td>
        <td>
          <form method="POST" action="editar_status.php">
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <select name="status">
              <option <?= $row['status'] === 'Aberto' ? 'selected' : '' ?>>Aberto</option>
              <option <?= $row['status'] === 'Em andamento' ? 'selected' : '' ?>>Em andamento</option>
              <option <?= $row['status'] === 'Finalizado' ? 'selected' : '' ?>>Finalizado</option>
            </select>
            <button type="submit">Atualizar</button>
          </form>
        </td>
      </tr>
    <?php endwhile; ?>
  </table>
</body>

</html>