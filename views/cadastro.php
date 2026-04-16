<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>RPG Hub - Alistamento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Special+Elite&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-dark: #0a0a0a;
            --card-bg: #161616;
            --accent-green: #198754;
            --input-bg: #222;
            --border-color: #333;
        }

        body { 
            background-color: var(--bg-dark); 
            color: #e0e0e0; 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex; 
            align-items: center; 
            justify-content: center; 
            min-height: 100vh; 
            margin: 0;
            background-image: radial-gradient(circle, #1a1a1a 1px, transparent 1px);
            background-size: 30px 30px; 
        }

        .card { 
            background-color: var(--card-bg); 
            border: 1px solid var(--border-color); 
            border-left: 4px solid var(--accent-green); 
            padding: 40px; 
            border-radius: 8px; 
            width: 100%; 
            max-width: 450px; 
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
        }

        h2 { 
            font-family: 'Special Elite', cursive; 
            color: #fff; 
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .form-control {
            background-color: var(--input-bg);
            border: 1px solid var(--border-color);
            color: #fff;
            padding: 12px;
            transition: all 0.3s;
        }

        .form-control:focus {
            background-color: #2a2a2a;
            border-color: var(--accent-green);
            color: #fff;
            box-shadow: 0 0 0 0.25 milrem rgba(25, 135, 84, 0.25);
        }

        .form-control::placeholder {
            color: #555;
            font-style: italic;
        }

        .btn-success {
            background-color: var(--accent-green);
            border: none;
            padding: 12px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: 0.3s;
        }

        .btn-success:hover {
            background-color: #157347;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(25, 135, 84, 0.3);
        }

        .btn-outline-secondary {
            border-color: #444;
            color: #aaa;
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 1px;
        }

        .btn-outline-secondary:hover {
            background-color: #333;
            color: #fff;
            border-color: #555;
        }

        hr { border-top: 1px solid #333; opacity: 1; }

        .form-label-sm {
            font-size: 0.75rem;
            color: var(--accent-green);
            text-transform: uppercase;
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="card shadow text-center">
        <h2 class="mb-4">📜 ALISTAMENTO</h2>
        <p class="text-muted small mb-4">Insira seus dados para registro na base de dados da Ordem.</p>
        
        <form action="controllers/cadastro_controller.php" method="POST">
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
        <a href="index.php?rota=login" class="btn btn-outline-secondary w-100">RETORNAR AO LOGIN</a>
    </div>
</body>
</html>