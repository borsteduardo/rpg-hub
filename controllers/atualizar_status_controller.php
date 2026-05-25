<?php
require_once 'config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['id_usuario'])) {
    
    $id_ficha = (int)$_POST['id_ficha'];
    $campo = $_POST['campo']; 
    $valor = (int)$_POST['valor'];
    $id_usuario = (int)$_SESSION['id_usuario'];

    if (in_array($campo, ['vida', 'sanidade'])) {
        try {
            $stmt = $pdo->prepare("UPDATE fichas SET $campo = :valor WHERE id = :id_ficha AND id_usuario = :id_usuario");
            $stmt->bindParam(':valor', $valor, PDO::PARAM_INT);
            $stmt->bindParam(':id_ficha', $id_ficha, PDO::PARAM_INT);
            $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $stmt->execute();
            
            echo "Sucesso";
        } catch (PDOException $e) {
            http_response_code(500);
            echo "Erro no banco: " . $e->getMessage();
        }
    } else {
        http_response_code(400);
        echo "Campo inválido";
    }
} else {
    http_response_code(403);
    echo "Acesso negado";
}
?>