<?php
require_once '../config/database.php';

if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header("Location: ../index.php?rota=login");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nome = trim($_POST['nome'] ?? '');
    $sistema = trim($_POST['sistema'] ?? '');
    $descricao = trim($_POST['descricao'] ?? '');
    
    $id_mestre = $_SESSION['id_usuario']; 

    if (empty($nome) || empty($sistema)) {
        header("Location: ../index.php?rota=nova_campanha&erro=vazio");
        exit();
    }

    try {
        $stmt = $pdo->prepare("INSERT INTO campanhas (id_mestre, nome, sistema, descricao) VALUES (:id_mestre, :nome, :sistema, :descricao)");
        
        $stmt->bindParam(':id_mestre', $id_mestre);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':sistema', $sistema);
        $stmt->bindParam(':descricao', $descricao);
        
        $stmt->execute();
        header("Location: ../index.php?rota=painel&sucesso=campanha_criada");
        exit();

    } catch (PDOException $e) {
        die("Erro ao arquivar a missão: " . $e->getMessage());
    }

} else {
    header("Location: ../index.php?rota=nova_campanha");
    exit();
}