<?php
session_start();
require_once '../config/database.php';
require_once '../models/Usuario.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email'] ?? '');
    $senha = trim($_POST['senha'] ?? '');
    $perfil = $_POST['perfil'] ?? 'jogador';

    $usuarioModel = new Usuario($pdo); 
    $usuario = $usuarioModel->buscarPorEmail($email);

    if ($usuario && $usuario['senha'] === $senha) {
        $_SESSION['logado'] = true;
        $_SESSION['id_usuario'] = $usuario['id'];
        $_SESSION['nome_usuario'] = $usuario['nome'];
        $_SESSION['perfil_atual'] = $perfil;
        $_SESSION['nivel'] = $usuario['nivel'];

        header("Location: ../index.php?rota=painel");
        exit();
    } else {
        header("Location: ../index.php?rota=login&erro=credenciais");
        exit();
    }
}