<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>RPG Hub - Alistamento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Special+Elite&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/rpg-hub/assets/css/cadastro.css">
</head>
<body>
    <div class="card shadow text-center">
        <h2 class="mb-4">📜 ALISTAMENTO</h2>
        <p class="text-muted small mb-4">Insira seus dados para registro na base de dados da Ordem.</p>
        
        <form action="/rpg-hub/cadastro" method="POST">
            <div class="mb-3">
                <span class="form-label-sm">Identificação do Agente</span>
                <input name="nome" type="text" class="form-control" placeholder="Nome Completo ou Codinome" required>
            </div>
            
            <div class="mb-3">
                <span class="form-label-sm">Canal de Comunicação</span>
                <input name="email" type="email" class="form-control" placeholder="Endereço de E-mail" required>
            </div>
            
            <div class="mb-4">
                <span class="form-label-sm">Código de Acesso</span>
                <input name="senha" type="password" class="form-control" placeholder="Senha de Segurança" required>
            </div>

            <button class="btn btn-success w-100">CRIAR CONTA</button>
        </form>

        <hr class="my-4">
        <a href="/rpg-hub/login" class="btn btn-outline-secondary w-100">RETORNAR AO LOGIN</a>
    </div>
</body>
</html>