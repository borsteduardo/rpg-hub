<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once '../config/database.php';
require_once '../models/Campanha.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $campanhaModel = new Campanha($pdo);
    
    $nome = trim($_POST['nome'] ?? '');
    $sistema = trim($_POST['sistema'] ?? '');
    $descricao = trim($_POST['descricao'] ?? '');
    $id_mestre = (int)$_SESSION['id_usuario']; 

    if (empty($nome) || empty($sistema)) {
        header("Location: ../index.php?rota=nova_campanha&erro=vazio");
        exit();
    }

    if ($campanhaModel->criar($id_mestre, $nome, $sistema, $descricao)) {
        header("Location: ../index.php?rota=painel&sucesso=campanha_criada");
        exit();
    } else {
        die("Erro ao tentar abrir o arquivo de investigação.");
    }

} else {
    header("Location: ../index.php?rota=painel");
    exit();
}