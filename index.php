<?php
session_start();

$rota = $_GET['rota'] ?? 'login';

switch ($rota) {

    case 'login':
        require_once 'views/login.php';
        break;

    case 'cadastro':
        require_once 'views/cadastro.php';
        break;

    case 'painel':
        require_once 'controllers/painel_controller.php';
        break;

    case 'nova_campanha':
        require_once 'views/nova_campanha.php';
        break;

    case 'detalhes_campanha':
        require_once 'controllers/detalhes_controller.php';
        break

    case 'nova_ficha';
        require_once 'views/nova_ficha.php';
        break;

    case 'admin':
        require_once 'controllers/admin_controller.php';
        break;

    default:
        echo "<h1>Erro 404: Arquivo não encontrado nos registros da Ordem.</h1>";
        echo "<a href='index.php?rota=login'>Voltar para a segurança</a>";
        break;
}
