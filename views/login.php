<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>RPG Hub - Acesso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Special+Elite&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/rpg-hub/assets/css/login.css">
</head>
<body>
    <div class="card shadow text-center">
        <h1 class="mb-4">RPG HUB</h1>
        
        <form action="/rpg-hub/login" method="POST">
            <div class="mb-3">
                <span class="form-label-sm">Autenticação de Agente</span>
                <input name="email" type="email" class="form-control" placeholder="E-mail de acesso" required>
            </div>
            
            <div class="mb-3">
                <span class="form-label-sm">Senha de Acesso</span>
                <input name="senha" type="password" class="form-control" placeholder="Senha" required>
            </div>

            <div class="mb-4">
                <span class="form-label-sm">Modo de Operação</span>
                <select name="perfil" class="form-select" required>
                    <option value="jogador">Entrar como Jogador</option>
                    <option value="mestre">Entrar como Mestre</option>
                </select>
            </div>
            
            <button class="btn btn-primary w-100">INICIAR SESSÃO</button>
        </form>

        <hr class="my-4">
        <p>Credenciais não encontradas?</p>
        <a href="/rpg-hub/cadastro" class="btn btn-outline-info w-100">SOLICITAR ALISTAMENTO</a>
    </div>
</body>
</html>