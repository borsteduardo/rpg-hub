<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>RPG Hub - Dossiê da Missão</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Special+Elite&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/rpg-hub/assets/css/detalhes.css">
</head>
<body>
    <div class="container pb-5">
        <div class="card p-4 mb-4 shadow border-warning-custom">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <h2 class="text-warning mb-1">📂 DOSSIÊ: <?php echo htmlspecialchars($campanha['nome']); ?></h2>
                    <p class="mb-3"><span class="badge bg-dark border border-secondary text-secondary uppercase">Sistema: <?php echo htmlspecialchars($campanha['sistema']); ?></span></p>
                </div>
                <a href="/rpg-hub/painel" class="btn btn-sm btn-outline-secondary">« Voltar à Base</a>
            </div>
            
            <div class="bg-dark p-3 rounded border border-secondary mt-2">
                <p class="text-muted-custom m-0"><?php echo nl2br(htmlspecialchars($campanha['descricao'])); ?></p>
            </div>
        </div>

        <div class="card p-4 shadow">
            <h4 class="mb-4 text-info"><span class="folder-icon">🕵️</span>AGENTES REGISTRADOS</h4>
            
            <?php if (empty($fichas)): ?>
                <div class="text-center py-5">
                    <p class="text-muted italic">Nenhum investigador se alistou para esta operation até o momento.</p>
                </div>
            <?php else: ?>
                <div class="table-responsive">
                    <table class="table table-dark align-middle">
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