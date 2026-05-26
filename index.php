<?php
session_start();

require_once 'vendor/autoload.php';
require_once 'config/database.php';

$rota = $_GET['rota'] ?? 'login';

switch ($rota) {

    case 'login':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            require_once 'controllers/login_controller.php';
        } else {
            require_once 'views/login.php';
        }
        break;

    case 'cadastro':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            require_once 'controllers/cadastro_controller.php';
        } else {
            require_once 'views/cadastro.php';
        }
        break;

    case 'painel':
        require_once 'controllers/painel_controller.php';
        break;

    case 'nova_campanha':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            require_once 'controllers/nova_campanha_controller.php';
        } else {
            require_once 'views/nova_campanha.php';
        }
        break;

    case 'detalhes_campanha':
        require_once 'controllers/detalhes_controller.php';
        break;

    case 'nova_ficha':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            require_once 'controllers/salvar_ficha_controller.php';
        } else {
            require_once 'views/nova_ficha.php';
        }
        break;

    case 'ver_ficha':
        require_once 'controllers/ver_ficha_controller.php';
        break;

    case 'admin':
        require_once 'controllers/admin_controller.php';
        break;

    case 'logout':
        require_once 'controllers/logout_controller.php';
        break;

    case 'atualizar_status':
        require_once 'controllers/atualizar_status_controller.php';
        break;
        
    default:
        echo "<h1>Erro 404: Arquivo não encontrado nos registros da Ordem.</h1>";
        echo "<a href='/rpg-hub/login'>Voltar para a segurança</a>";
        break;
}