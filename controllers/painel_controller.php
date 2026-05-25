<?php
require_once 'config/database.php';
require_once 'models/Campanha.php';
require_once 'models/Ficha.php'; // Necessário para listar as fichas do jogador

if (!isset($_SESSION['logado'])) {
    header("Location: index.php?rota=login");
    exit();
}

$campanhaModel = new Campanha($pdo);
$id_usuario = $_SESSION['id_usuario'];
$perfil = $_SESSION['perfil_atual'];

$campanhasComFicha = [];

try {
    if ($perfil === 'mestre') {
        $campanhas = $campanhaModel->buscarPorMestre($id_usuario);
    } else {
        $campanhas = $campanhaModel->listarTodasComMestre();
        
        $fichaModel = new Ficha($pdo);
        $minhasFichas = $fichaModel->buscarPorUsuario($id_usuario);
        
        $campanhasComFicha = array_column($minhasFichas, 'id_campanha');
    }
} catch (Exception $e) {
    die("Erro ao carregar painel: " . $e->getMessage());
}

require_once 'views/painel.php';