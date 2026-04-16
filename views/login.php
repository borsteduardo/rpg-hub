<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>RPG Hub - Acesso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Special+Elite&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-dark: #0a0a0a;
            --card-bg: #161616;
            --accent-purple: #6200ff;
            --input-bg: #1e1e1e;
            --border-color: #333;
        }

        body { 
            background-color: var(--bg-dark); 
            color: #e0e0e0; 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex; 
            align-items: center; 
            justify-content: center; 
            height: 100vh; 
            margin: 0;
            overflow: hidden;
        }

        body::before {
            content: " ";
            position: absolute;
            top: 0; left: 0; bottom: 0; right: 0;
            background: linear-gradient(rgba(18, 16, 16, 0) 50%, rgba(0, 0, 0, 0.25) 50%), 
                        linear-gradient(90deg, rgba(255, 0, 0, 0.06), rgba(0, 255, 0, 0.02), rgba(0, 0, 255, 0.06));
            background-size: 100% 2px, 3px 100%;
            pointer-events: none;
            z-index: 10;
        }

        .card { 
            background-color: var(--card-bg); 
            border: 1px solid var(--border-color); 
            border-bottom: 4px solid var(--accent-purple);
            padding: 40px; 
            border-radius: 8px; 
            width: 100%; 
            max-width: 400px; 
            box-shadow: 0 15px 35px rgba(0,0,0,0.7);
            z-index: 20;
        }

        h1 { 
            font-family: 'Special Elite', cursive; 
            color: #fff; 
            letter-spacing: 3px;
            font-size: 2.2rem;
            text-shadow: 0 0 10px var(--accent-purple);
        }

        .form-control, .form-select {
            background-color: var(--input-bg);
            border: 1px solid var(--border-color);
            color: #fff;
            padding: 12px;
        }

        .form-control:focus, .form-select:focus {
            background-color: #252525;
            border-color: var(--accent-purple);
            box-shadow: 0 0 0 0.25rem rgba(98, 0, 255, 0.25);
            color: #fff;
        }

        .btn-primary {
            background-color: var(--accent-purple);
            border: none;
            padding: 12px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 2px;
            transition: 0.3s;
        }

        .btn-primary:hover {
            background-color: #4b00c2;
            box-shadow: 0 0 15px rgba(98, 0, 255, 0.5);
            transform: translateY(-1px);
        }

        .btn-outline-info {
            border-color: #444;
            color: #0dcaf0;
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 1px;
        }

        .btn-outline-info:hover {
            background-color: #0dcaf0;
            color: #000;
            border-color: #0dcaf0;
        }

        hr { border-top: 1px solid #333; opacity: 1; }

        .form-label-sm {
            font-size: 0.7rem;
            color: var(--accent-purple);
            text-transform: uppercase;
            font-weight: bold;
            display: block;
            text-align: left;
            margin-bottom: 5px;
        }

        p { font-size: 0.85rem; color: #888; }
    </style>
</head>
<body>
    <div class="card shadow text-center">
        <h1 class="mb-4">RPG HUB</h1>
        
        <form action="controllers/login_controller.php" method="POST">
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
        <a href="index.php?rota=cadastro" class="btn btn-outline-info w-100">SOLICITAR ALISTAMENTO</a>
    </div>
</body>
</html>