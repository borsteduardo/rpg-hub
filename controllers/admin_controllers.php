<?php
require_once 'config/database.php';

if (!isset($_SESSION['nivel']) || $_SESSION['nivel'] !== 'admin') {
    header("Location: index.php?rota=painel");
    exit();
}

try {
    $totalUsers = $pdo->query("SELECT COUNT(*) FROM usuarios")->fetchColumn();
    $totalMesas = $pdo->query("SELECT COUNT(*) FROM campanhas")->fetchColumn();
    $totalFichas = $pdo->query("SELECT COUNT(*) FROM fichas")->fetchColumn();

    $listaUsuarios = $pdo->query("SELECT * FROM usuarios ORDER BY id DESC")->fetchAll();
    $listaMesas = $pdo->query("SELECT c.*, u.nome as mestre FROM campanhas c JOIN usuarios u ON c.id_mestre = u.id")->fetchAll();

} catch (PDOException $e) {
    die("Erro na Matrix: " . $e->getMessage());
}

require_once 'views/admin.php';