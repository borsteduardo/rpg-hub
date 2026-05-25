<?php

require_once 'config/database.php';
require_once 'models/Ficha.php';

if (!isset($_SESSION['logado'])) {
    header("Location: index.php?rota=login");
    exit();
}

$id_campanha = (int)($_GET['id_campanha'] ?? 0);
$id_usuario = (int)$_SESSION['id_usuario'];

if ($id_campanha === 0) {
    header("Location: index.php?rota=painel");
    exit();
}

$fichaModel = new Ficha($pdo);
$ficha = $fichaModel->buscarPorUsuarioECampanha($id_usuario, $id_campanha);

if (!$ficha) {
    header("Location: index.php?rota=nova_ficha&id_campanha=" . $id_campanha);
    exit();
}

require_once 'views/ver_ficha.php';