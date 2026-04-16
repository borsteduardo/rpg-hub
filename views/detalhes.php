<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>RPG Hub - Dossiê da Missão</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Special+Elite&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-dark: #0a0a0a;
            --card-bg: #161616;
            --accent-warning: #ffc107;
            --accent-info: #0dcaf0;
            --border-color: #333;
        }

        body { 
            background-color: var(--bg-dark); 
            color: #e0e0e0; 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding-top: 30px;
            background-image: linear-gradient(rgba(0,0,0,0.8), rgba(0,0,0,0.8)), url('https://www.transparenttextures.com/patterns/dark-leather.png');
        }

        .card { 
            background-color: var(--card-bg); 
            border: 1px solid var(--border-color);
            border-radius: 8px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.5);
        }

        h2, h4 { font-family: 'Special Elite', cursive; letter-spacing: 1px; }

        .border-warning-custom { border-left: 5px solid var(--accent-warning) !important; }

        .text-muted-custom { color: #888; font-style: italic; font-size: 0.95rem; line-height: 1.6; }

        .table { --bs-table-bg: transparent; color: #e0e0e0; margin-bottom: 0; }
        .table thead th { 
            border-bottom: 2px solid #444; 
            color: var(--accent-info); 
            text-transform: uppercase; 
            font-size: 0.75rem; 
            letter-spacing: 1px;
        }
        .table tbody tr { border-bottom: 1px solid #222; transition: 0.3s; }
        .table tbody tr:hover { background-color: rgba(255,255,255,0.02); }

        .badge-nex { 
            background-color: #333; 
            color: var(--accent-warning); 
            border: 1px solid var(--accent-warning);
            font-family: 'Special Elite', cursive;
            padding: 5px 10px;
        }

        .stat-val { font-family: 'Special Elite', cursive; font-size: 1.1rem; }
        
        .btn-outline-secondary {
            border-color: #444;
            color: #aaa;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 1px;
            font-weight: bold;
        }

        .btn-outline-secondary:hover { background-color: #333; color: #fff; }

        .folder-icon { font-size: 1.5rem; margin-right: 10px; vertical-align: middle; }
    </style>
</head>
<body>
    <div class="container pb-5">
        <div class="card p-4 mb-4 shadow border-warning-custom">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <h2 class="text-warning mb-1">📂 DOSSIÊ: <?php echo htmlspecialchars($campanha['nome']); ?></h2>
                    <p class="mb-3"><span class="badge bg-dark border border-secondary text-secondary uppercase">Sistema: <?php echo htmlspecialchars($campanha['sistema']); ?></span></p>
                </div>
                <a href="index.php?rota=painel" class="btn btn-sm btn-outline-secondary">« Voltar à Base</a>
            </div>
            
            <div class="bg-dark p-3 rounded border border-secondary mt-2">
                <p class="text-muted-custom m-0"><?php echo nl2br(htmlspecialchars($campanha['descricao'])); ?></p>
            </div>
        </div>

        <div class="card p-4 shadow">
            <h4 class="mb-4 text-info"><span class="folder-icon">🕵️</span>AGENTES REGISTRADOS</h4>
            
            <?php if (empty($fichas)): ?>
                <div class="text-center py-5">
                    <p class="text-muted italic">Nenhum investigador se alistou para esta operação até o momento.</p>
                </div>
            <?php else: ?>
                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th>Jogador</th>
                                <th>Codinome / Personagem</th>
                                <th>Classe</th>
                                <th class="text-center">NEX</th>
                                <th class="text-center">Status (PV / SAN)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($fichas as $ficha): ?>
                                <tr>
                                    <td><span class="text-muted small">ID_</span><?php echo htmlspecialchars($ficha['nome_jogador']); ?></td>
                                    <td><span class="fw-bold text-white"><?php echo htmlspecialchars($ficha['nome_personagem']); ?></span></td>
                                    <td><span class="text-info"><?php echo htmlspecialchars($ficha['classe']); ?></span></td>
                                    <td class="text-center">
                                        <span class="badge badge-nex"><?php echo $ficha['nex']; ?>%</span>
                                    </td>
                                    <td class="text-center">
                                        <span class="text-danger stat-val"><?php echo $ficha['vida']; ?></span> 
                                        <span class="text-muted mx-1">/</span> 
                                        <span class="text-primary stat-val"><?php echo $ficha['sanidade']; ?></span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>