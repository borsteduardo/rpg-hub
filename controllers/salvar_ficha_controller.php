<?php

if (!isset($_SESSION['id_usuario'])) {
    header("Location: /rpg-hub/login?erro=sessao_expirada");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fichaModel = new Ficha($pdo);
    
    $id_usuario  = (int)$_SESSION['id_usuario']; 
    $id_campanha = (int)($_POST['id_campanha'] ?? 0);

    if ($id_campanha === 0) {
        header("Location: /rpg-hub/painel?erro=campanha_invalida");
        exit();
    }
    
    $nome_personagem = trim($_POST['nome_personagem'] ?? '');
    $classe          = trim($_POST['classe'] ?? '');
    $nex             = (int)($_POST['nex'] ?? 5);
    $vida            = (int)($_POST['vida'] ?? 0);
    $sanidade        = (int)($_POST['sanidade'] ?? 0);
    $historia        = trim($_POST['historia'] ?? '');

    if (empty($nome_personagem) || empty($classe)) {
        header("Location: /rpg-hub/nova_ficha?id_campanha=" . $id_campanha . "&erro=campos_vazios");
        exit();
    }

    if ($fichaModel->criar($id_usuario, $id_campanha, $nome_personagem, $classe, $nex, $vida, $sanidade, $historia)) {
        header("Location: /rpg-hub/painel?sucesso=ficha_criada");
        exit();
    } else {
        header("Location: /rpg-hub/nova_ficha?id_campanha=" . $id_campanha . "&erro=banco");
        exit();
    }
} else {
    header("Location: /rpg-hub/painel");
    exit();
}