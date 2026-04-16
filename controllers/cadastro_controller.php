<?php
require_once '../config/database.php';
require_once '../models/Usuario.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = trim($_POST['nome'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $senha = trim($_POST['senha'] ?? '');

    $usuarioModel = new Usuario($pdo);

    if ($usuarioModel->emailJaExiste($email)) {
        die("Este e-mail já está registrado na base da Ordem.");
    }

    if ($usuarioModel->criar($nome, $email, $senha)) {
        header("Location: ../index.php?rota=login&sucesso=conta_criada");
        exit();
    }
}