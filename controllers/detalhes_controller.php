<?php
// Não precisa de session_start() aqui, o index.php já fez isso.
// Removido o require_once do banco, o index.php já injetou a variável $pdo.

// Trava de segurança: impede que usuários deslogados acessem os dossiês
if (!isset($_SESSION['logado'])) {
    header("Location: /rpg-hub/login");
    exit();
}

$id_campanha = $_GET['id'] ?? '';

try {
    $stmt = $pdo->prepare("SELECT * FROM campanhas WHERE id = :id");
    $stmt->bindParam(':id', $id_campanha);
    $stmt->execute();
    $campanha = $stmt->fetch(PDO::FETCH_ASSOC);

    $stmtFichas = $pdo->prepare("
        SELECT f.*, u.nome as nome_jogador 
        FROM fichas f 
        JOIN usuarios u ON f.id_usuario = u.id 
        WHERE f.id_campanha = :id
    ");
    $stmtFichas->bindParam(':id', $id_campanha);
    $stmtFichas->execute();
    $fichas = $stmtFichas->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Erro ao acessar os arquivos confidenciais: " . $e->getMessage());
}

require_once 'views/detalhes.php';