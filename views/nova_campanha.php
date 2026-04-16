<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>RPG Hub - Novo Inquérito</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Special+Elite&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-dark: #0a0a0a;
            --card-bg: #161616;
            --accent-gold: #ffc107;
            --input-bg: #222;
            --border-color: #333;
        }

        body { 
            background-color: var(--bg-dark); 
            color: #e0e0e0; 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding-top: 50px;
            background-image: radial-gradient(circle, #1a1a1a 1px, transparent 1px);
            background-size: 30px 30px;
        }

        .card { 
            background-color: var(--card-bg); 
            border: 1px solid var(--border-color); 
            border-top: 5px solid var(--accent-gold);
            padding: 40px; 
            border-radius: 8px; 
            box-shadow: 0 15px 35px rgba(0,0,0,0.6);
        }

        h2 { 
            font-family: 'Special Elite', cursive; 
            color: var(--accent-gold); 
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .form-label {
            font-family: 'Special Elite', cursive;
            font-size: 0.9rem;
            color: var(--accent-gold);
            margin-bottom: 8px;
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
            border-color: var(--accent-gold);
            color: #fff;
            box-shadow: 0 0 0 0.25rem rgba(255, 193, 7, 0.15);
        }

        .form-control::placeholder {
            color: #444;
            font-style: italic;
        }

        .btn-success {
            background-color: var(--accent-gold);
            border: none;
            color: #000;
            padding: 14px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 2px;
            transition: 0.3s;
        }

        .btn-success:hover {
            background-color: #e0a800;
            color: #000;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 193, 7, 0.3);
        }

        .btn-outline-secondary {
            border-color: #444;
            color: #888;
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 1px;
            margin-top: 10px;
        }

        .btn-outline-secondary:hover {
            background-color: #333;
            color: #fff;
        }

        .alert-danger {
            background-color: #2d0f0f;
            color: #ff7575;
            border: 1px solid #5c1e1e;
            font-family: 'Special Elite', cursive;
            font-size: 0.85rem;
        }

        .folder-tab {
            position: absolute;
            top: -30px;
            left: 20px;
            background: var(--accent-gold);
            color: #000;
            padding: 5px 20px;
            font-family: 'Special Elite', cursive;
            font-size: 0.8rem;
            border-radius: 5px 5px 0 0;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center mb-5">
        <div class="card shadow p-4 w-100 position-relative" style="max-width: 650px;">
            <div class="folder-tab">ORDEM_DOC_04</div>
            <h2 class="mb-4 text-center">📁 NOVO ARQUIVO DE INVESTIGAÇÃO</h2>
            
            <?php if(isset($_GET['erro']) && $_GET['erro'] == 'vazio'): ?>
                <div class="alert alert-danger text-center">ERRO: CAMPOS OBRIGATÓRIOS NÃO PREENCHIDOS.</div>
            <?php endif; ?>

            <form action="controllers/nova_campanha_controller.php" method="POST">
                <div class="mb-3">
                    <label class="form-label">TÍTULO DO CASO *</label>
                    <input type="text" name="nome" class="form-control" placeholder="Ex: Fragmentos do Silêncio" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">SISTEMA DE OPERAÇÃO *</label>
                    <input type="text" name="sistema" class="form-control" placeholder="Ex: Ordem Paranormal, D&D 5e..." required>
                </div>

                <div class="mb-4">
                    <label class="form-label">RESUMO CONFIDENCIAL / PREMISSA</label>
                    <textarea name="descricao" class="form-control" rows="5" placeholder="Descreva os fenômenos ou mistérios que os agentes enfrentarão..."></textarea>
                </div>

                <div class="pt-2">
                    <button type="submit" class="btn btn-success w-100">AUTORIZAR INÍCIO DA MISSÃO</button>
                    <a href="index.php?rota=painel" class="btn btn-outline-secondary w-100">ABORTAR OPERAÇÃO</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>