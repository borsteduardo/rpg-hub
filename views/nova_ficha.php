<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>RPG Hub - Ficha de Agente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Special+Elite&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-dark: #0a0a0a;
            --card-bg: #161616;
            --accent-blue: #0dcaf0;
            --accent-red: #dc3545;
            --border-color: #333;
            --input-bg: #1f1f1f;
        }

        body { 
            background-color: var(--bg-dark); 
            color: #e0e0e0; 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding-top: 50px;
            background-image: radial-gradient(circle, #1a1a1a 1px, transparent 1px);
            background-size: 25px 25px;
        }

        .card { 
            background-color: var(--card-bg); 
            border: 1px solid var(--border-color); 
            border-top: 5px solid var(--accent-blue);
            padding: 40px; 
            border-radius: 8px; 
            box-shadow: 0 15px 35px rgba(0,0,0,0.6);
        }

        h2 { 
            font-family: 'Special Elite', cursive; 
            color: #fff; 
            letter-spacing: 1px;
            text-transform: uppercase;
            border-bottom: 1px solid var(--border-color);
            padding-bottom: 15px;
        }

        .form-label {
            font-family: 'Special Elite', cursive;
            font-size: 0.85rem;
            text-transform: uppercase;
            margin-bottom: 8px;
        }

        .label-general { color: var(--accent-blue); }
        .label-hp { color: var(--accent-red); }
        .label-san { color: #5bc0de; }

        .form-control {
            background-color: var(--input-bg);
            border: 1px solid var(--border-color);
            color: #fff;
            padding: 10px;
            transition: all 0.3s;
        }

        .form-control:focus {
            background-color: #252525;
            border-color: var(--accent-blue);
            color: #fff;
            box-shadow: 0 0 0 0.25rem rgba(13, 202, 240, 0.15);
        }

        .form-control::placeholder { color: #444; }

        input[type="number"] {
            font-family: 'Special Elite', cursive;
            font-size: 1.2rem;
            text-align: center;
        }

        .btn-info {
            background-color: var(--accent-blue);
            border: none;
            color: #000;
            padding: 14px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: 0.3s;
        }

        .btn-info:hover {
            background-color: #0baccc;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(13, 202, 240, 0.3);
        }

        .btn-outline-secondary {
            border-color: #444;
            color: #888;
            text-transform: uppercase;
            font-size: 0.8rem;
            margin-top: 10px;
        }

        .alert-danger {
            background-color: #2d0f0f;
            color: #ff7575;
            border: 1px solid #5c1e1e;
            font-family: 'Special Elite', cursive;
            font-size: 0.8rem;
        }

        .section-divider {
            height: 1px;
            background: linear-gradient(to right, transparent, var(--border-color), transparent);
            margin: 25px 0;
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center mb-5">
        <div class="card shadow p-4 w-100" style="max-width: 650px;">
            <h2 class="mb-4 text-center">📋 REGISTRO DE INVESTIGADOR</h2>
            
            <?php if(isset($_GET['erro']) && $_GET['erro'] == 'vazio'): ?>
                <div class="alert alert-danger text-center">AVISO: DADOS OBRIGATÓRIOS AUSENTES NO FORMULÁRIO.</div>
            <?php endif; ?>

            <form action="controllers/salvar_ficha_controller.php" method="POST">
                <input type="hidden" name="id_campanha" value="<?php echo htmlspecialchars($id_campanha); ?>">

                <div class="mb-3">
                    <label class="form-label label-general">IDENTIFICAÇÃO DO PERSONAGEM *</label>
                    <input type="text" name="nome_personagem" class="form-control" placeholder="Nome completo" required>
                </div>

                <div class="row mb-3">
                    <div class="col-md-7">
                        <label class="form-label label-general">CLASSE / TRILHA *</label>
                        <input type="text" name="classe" class="form-control" placeholder="Ex: Combatente / Aniquilador" required>
                    </div>
                    <div class="col-md-5">
                        <label class="form-label label-general">NEX (%)</label>
                        <input type="number" name="nex" class="form-control" value="5" min="0" max="99">
                    </div>
                </div>

                <div class="section-divider"></div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label label-hp">PONTOS DE VIDA (PV) *</label>
                        <input type="number" name="vida" class="form-control border-danger" placeholder="00" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label label-san">SANIDADE (SAN) *</label>
                        <input type="number" name="sanidade" class="form-control border-info" placeholder="00" required>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label text-muted">HISTÓRICO / ARQUIVO MORTO</label>
                    <textarea name="historia" class="form-control" rows="4" placeholder="Relate o passado do agente ou eventos traumáticos..."></textarea>
                </div>

                <div class="pt-2">
                    <button type="submit" class="btn btn-info w-100">FINALIZAR DOCUMENTO</button>
                    <a href="index.php?rota=painel" class="btn btn-outline-secondary w-100">CANCELAR REGISTRO</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>