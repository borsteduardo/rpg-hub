<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = trim($_POST['nome'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $senha = trim($_POST['senha'] ?? '');

    $usuarioModel = new Usuario($pdo);

    if ($usuarioModel->emailJaExiste($email)) {
        header("Location: /rpg-hub/cadastro?erro=email_existe");
        exit();
    }

    if ($usuarioModel->criar($nome, $email, $senha)) {
        header("Location: /rpg-hub/login?sucesso=conta_criada");
        exit();
    }
}