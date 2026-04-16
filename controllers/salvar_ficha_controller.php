<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once '../config/database.php';
require_once '../models/Ficha.php';

if (!isset($_SESSION['id_usuario'])) {
    die("Sessão expirada. Logue de novo na base.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fichaModel = new Ficha($pdo);
    
    $id_usuario      = (int)$_SESSION['id_usuario']; 
   $id_campanha = (int)($_POST['id_campanha'] ?? 0);

if ($id_campanha === 0) {
    die("Erro: O ID da campanha não foi enviado. Verifique o formulário.");
}
    $nome_personagem = trim($_POST['nome_personagem'] ?? '');
    $classe          = trim($_POST['classe'] ?? '');
    $nex             = (int)($_POST['nex'] ?? 5);
    $vida            = (int)($_POST['vida'] ?? 0);
    $sanidade        = (int)($_POST['sanidade'] ?? 0);
    $historia        = trim($_POST['historia'] ?? '');

    if ($fichaModel->criar($id_usuario, $id_campanha, $nome_personagem, $classe, $nex, $vida, $sanidade, $historia)) {
        header("Location: ../index.php?rota=painel&sucesso=ficha_criada");
        exit();
    } else {
        die("Erro ao salvar a ficha no banco.");
    }
}