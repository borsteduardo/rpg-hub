<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>RPG Hub - Base da Guilda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Special+Elite&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/painel.css">
</head>
<body>
    <div class="container mb-5">
        <div class="card shadow-lg p-5">
            <h1 class="text-center mb-2">🛡️ BASE DA GUILDA</h1>
            <div class="text-center mb-4">
                <span class="perfil-badge text-info">
                    Agente: <strong><?= $_SESSION['nome_usuario']; ?></strong> 
                    <span class="text-muted">|</span> 
                    Modo: <span class="text-warning"><?= ucfirst($_SESSION['perfil_atual']); ?></span>
                </span>
            </div>
            
            <?php if(isset($_GET['sucesso'])): ?>
                <div class="alert alert-success text-center py-2 mb-4">
                    ✓ Operação confirmada e registrada nos arquivos.
                </div>
            <?php endif; ?>

            <div class="text-start mb-4">
                <h4 class="text-warning mb-4" style="font-family: 'Special Elite';">
                    <?= ($_SESSION['perfil_atual'] === 'mestre') ? '📂 Suas Campanhas' : '🔦 Mural de Missões Disponíveis'; ?>
                </h4>
                
                <?php if (empty($campanhas)): ?>
                    <div class="py-5 text-center bg-dark rounded border border-secondary border-dashed">
                        <p class="text-muted m-0">Nenhum registro encontrado nos arquivos da Ordem.</p>
                    </div>
                <?php else: ?>
                    <?php $campanhasComFicha = $campanhasComFicha ?? []; ?>
                    
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
                                        <td class="fw-bold text-white"><?= htmlspecialchars($campanha['nome']); ?></td>
                                        <td><span class="badge bg-secondary"><?= htmlspecialchars($campanha['sistema']); ?></span></td>
                                        
                                        <?php if ($_SESSION['perfil_atual'] === 'jogador'): ?>
                                            <td class="text-info"><?= htmlspecialchars($campanha['nome_mestre']); ?></td>
                                        <?php endif; ?>

                                        <td class="text-center">
                                            <?php if ($_SESSION['perfil_atual'] === 'mestre'): ?>
                                                <a href="index.php?rota=detalhes_campanha&id=<?= $campanha['id']; ?>" class="btn btn-sm btn-outline-warning px-3">Dossiê</a>
                                            <?php else: ?>
                                                
                                                <?php if (in_array($campanha['id'], $campanhasComFicha)): ?>
                                                    <a href="index.php?rota=ver_ficha&id_campanha=<?= $campanha['id']; ?>" class="btn btn-sm btn-success px-3">Ver Ficha</a>
                                                <?php else: ?>
                                                    <a href="index.php?rota=nova_ficha&id_campanha=<?= $campanha['id']; ?>" class="btn btn-sm btn-outline-info px-3">Alistar-se</a>
                                                <?php endif; ?>

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

                <div class="<?= ($_SESSION['perfil_atual'] === 'mestre') ? 'col-md-6' : 'col-12'; ?>">
                    <a href="index.php?rota=logout" class="btn btn-outline-danger w-100 py-2 fw-bold">SAIR DA BASE</a>
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