<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>RPG Hub - Base da Guilda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Special+Elite&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-dark: #0a0a0a;
            --card-bg: #161616;
            --accent-purple: #6200ff;
            --accent-admin: #ff0000;
        }

        body { 
            background-color: var(--bg-dark); 
            color: #e0e0e0; 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding-top: 50px; 
        }

        h1 { font-family: 'Special Elite', cursive; color: #fff; letter-spacing: 2px; }

        .card { 
            background-color: var(--card-bg); 
            border: 1px solid #333; 
            border-top: 4px solid var(--accent-purple);
            border-radius: 8px;
        }

        .perfil-badge { font-size: 0.9rem; padding: 5px 15px; border-radius: 20px; background: #222; border: 1px solid #444; }

        .table { --bs-table-bg: transparent; color: #e0e0e0; border-color: #333; }
        .table thead th { border-bottom: 2px solid var(--accent-purple); color: var(--accent-purple); font-size: 0.85rem; text-transform: uppercase; }

        .alert-success { background-color: #0f2d1a; color: #75ff9a; border: 1px solid #1e5c35; }
        hr { border-top: 1px solid #333; opacity: 1; }

        .btn-admin { 
            background: transparent; 
            border: 1px solid var(--accent-admin); 
            color: var(--accent-admin); 
            font-family: 'Special Elite', cursive;
            transition: 0.3s;
        }
        .btn-admin:hover { background: var(--accent-admin); color: #fff; }
    </style>
</head>
<body>
    <div class="container mb-5">
        <div class="card shadow-lg p-5">
            <h1 class="text-center mb-2">🛡️ BASE DA GUILDA</h1>
            <div class="text-center mb-4">
                <span class="perfil-badge text-info">
                    Agente: <strong><?php echo $_SESSION['nome_usuario']; ?></strong> 
                    <span class="text-muted">|</span> 
                    Modo: <span class="text-warning"><?php echo ucfirst($_SESSION['perfil_atual']); ?></span>
                </span>
            </div>
            
            <?php if(isset($_GET['sucesso'])): ?>
                <div class="alert alert-success text-center py-2 mb-4">
                    ✓ Operação confirmada e registrada nos arquivos.
                </div>
            <?php endif; ?>

            <div class="text-start mb-4">
                <h4 class="text-warning mb-4" style="font-family: 'Special Elite';">
                    <?php echo ($_SESSION['perfil_atual'] === 'mestre') ? '📂 Suas Campanhas' : '🔦 Mural de Missões Disponíveis'; ?>
                </h4>
                
                <?php if (empty($campanhas)): ?>
                    <div class="py-5 text-center bg-dark rounded border border-secondary border-dashed">
                        <p class="text-muted m-0">Nenhum registro encontrado nos arquivos da Ordem.</p>
                    </div>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table table-dark align-middle">
                            <thead>
                                <tr>
                                    <th>Nome do Caso</th>
                                    <th>Sistema</th>
                                    <?php if ($_SESSION['perfil_atual'] === 'jogador') echo '<th>Mestre</th>'; ?>
                                    <th class="text-center">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($campanhas as $campanha): ?>
                                    <tr>
                                        <td class="fw-bold text-white"><?php echo htmlspecialchars($campanha['nome']); ?></td>
                                        <td><span class="badge bg-secondary"><?php echo htmlspecialchars($campanha['sistema']); ?></span></td>
                                        
                                        <?php if ($_SESSION['perfil_atual'] === 'jogador'): ?>
                                            <td class="text-info"><?php echo htmlspecialchars($campanha['nome_mestre']); ?></td>
                                        <?php endif; ?>

                                        <td class="text-center">
                                            <?php if ($_SESSION['perfil_atual'] === 'mestre'): ?>
                                                <a href="index.php?rota=detalhes_campanha&id=<?php echo $campanha['id']; ?>" class="btn btn-sm btn-outline-warning px-3">Dossiê</a>
                                            <?php else: ?>
                                                <a href="index.php?rota=nova_ficha&id_campanha=<?php echo $campanha['id']; ?>" class="btn btn-sm btn-outline-info px-3">Alistar-se</a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
            
            <div class="row g-3 mt-2">
                <?php if ($_SESSION['perfil_atual'] === 'mestre'): ?>
                    <div class="col-md-6">
                        <a href="index.php?rota=nova_campanha" class="btn btn-success w-100 py-2 fw-bold">➕ INICIAR NOVA CAMPANHA</a>
                    </div>
                <?php endif; ?>

                <div class="<?php echo ($_SESSION['perfil_atual'] === 'mestre') ? 'col-md-6' : 'col-12'; ?>">
                    <a href="controllers/logout_controller.php" class="btn btn-outline-danger w-100 py-2 fw-bold">SAIR DA BASE</a>
                </div>

                <?php if (isset($_SESSION['nivel']) && $_SESSION['nivel'] === 'admin'): ?>
                    <div class="col-12 pt-3">
                        <a href="index.php?rota=admin" class="btn btn-admin w-100 py-2">⚙️ ACESSAR TERMINAL OVERSEER (ADMIN)</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>