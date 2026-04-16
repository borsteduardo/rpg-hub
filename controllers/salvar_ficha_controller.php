<?php
require_once '../config/database.php';
require_once '../models/Ficha.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fichaModel = new Ficha($pdo);
    
    $id_usuario      = (int)$_SESSION['id_usuario'];
    $id_campanha     = (int)$_POST['id_campanha'];
    $nome_personagem = trim($_POST['nome_personagem'] ?? '');
    $classe          = trim($_POST['classe'] ?? '');
    $nex             = (int)($_POST['nex'] ?? 5);
    $vida            = (int)($_POST['vida'] ?? 0);
    $sanidade        = (int)($_POST['sanidade'] ?? 0);
    $historia        = trim($_POST['historia'] ?? '');

    if (empty($nome_personagem) || empty($classe)) {
        header("Location: ../index.php?rota=nova_ficha&id_campanha=$id_campanha&erro=vazio");
        exit();
    }

    if ($fichaModel->criar($id_usuario, $id_campanha, $nome_personagem, $classe, $nex, $vida, $sanidade, $historia)) {
        header("Location: ../index.php?rota=painel&sucesso=ficha_criada");
        exit();
    } else {
        die("Erro ao tentar registrar o investigador nos arquivos da Ordem.");
    }

} else {
    header("Location: ../index.php?rota=painel");
    exit();
}