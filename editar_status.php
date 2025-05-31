<?php
session_start();

if (!isset($_SESSION['usuario_id']) || ($_SESSION['tipo'] ?? '') !== 'admin') {
    header("Location: chamado.php");
    exit;
}

include 'config.php';

if (isset($_POST['id'], $_POST['status'])) {
    $id = intval($_POST['id']);
    $status = $_POST['status'];

    $status_validos = ['Aberto', 'Em andamento', 'Finalizado'];
    if (!in_array($status, $status_validos)) {
        die("Status inválido.");
    }

    $stmt = $conexao->prepare("UPDATE chamados SET status = ? WHERE id = ?");
    $stmt->bind_param("si", $status, $id);

    if ($stmt->execute()) {
        header("Location: admin.php?msg=Status atualizado com sucesso");
    } else {
        header("Location: admin.php?erro=Erro ao atualizar status");
    }
} else {
    header("Location: admin.php?erro=Dados incompletos");
}
exit;
?>