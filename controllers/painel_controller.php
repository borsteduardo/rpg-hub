<?php
require_once 'config/database.php';
require_once 'models/Campanha.php';

if (!isset($_SESSION['logado'])) {
    header("Location: index.php?rota=login");
    exit();
}

$campanhaModel = new Campanha($pdo);
$id_usuario = $_SESSION['id_usuario'];
$perfil = $_SESSION['perfil_atual'];

try {
    if ($perfil === 'mestre') {
        $campanhas = $campanhaModel->buscarPorMestre($id_usuario);
    } else {
$campanhas = $campanhaModel->listarTodasComMestre();
    }
} catch (Exception $e) {
    die("Erro ao carregar painel: " . $e->getMessage());
}

require_once 'views/painel.php';