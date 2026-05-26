<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $campanhaModel = new Campanha($pdo);
    
    $nome = trim($_POST['nome'] ?? '');
    $sistema = trim($_POST['sistema'] ?? '');
    $descricao = trim($_POST['descricao'] ?? '');
    $id_mestre = (int)$_SESSION['id_usuario']; 

    if (empty($nome) || empty($sistema)) {
        header("Location: /rpg-hub/nova_campanha?erro=vazio");
        exit();
    }

    if ($campanhaModel->criar($id_mestre, $nome, $sistema, $descricao)) {
        header("Location: /rpg-hub/painel?sucesso=campanha_criada");
        exit();
    } else {
        header("Location: /rpg-hub/nova_campanha?erro=banco");
        exit();
    }

} else {
    header("Location: /rpg-hub/painel");
    exit();
}