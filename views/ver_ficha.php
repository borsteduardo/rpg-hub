<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RPG Hub - Dossiê do Agente</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="assets/css/ver_ficha.css">
</head>
<body>
    <div class="container py-5 mb-5">
        <div class="dossier-card shadow p-4 mx-auto position-relative">
            
            <div class="d-flex justify-content-between align-items-center mb-4">
                <span class="text-muted small">OPERAÇÃO: <?= htmlspecialchars($ficha['nome_campanha']) ?></span>
                <a href="index.php?rota=painel" class="btn btn-sm btn-outline-secondary">« Retornar à Base</a>
            </div>

            <div class="text-center mb-5">
                <h1 class="agent-name mb-2"><?= htmlspecialchars($ficha['nome_personagem']) ?></h1>
                <h5 class="text-info mb-3"><?= htmlspecialchars($ficha['classe']) ?></h5>
                <span class="nex-badge">NEX <?= $ficha['nex'] ?>%</span>
            </div>

            <div class="row g-4 mb-5">
                <div class="col-md-6">
                    <div class="status-box status-pv shadow-sm">
                        <span class="status-label text-danger">PONTOS DE VIDA (PV)</span>
                        <h2 class="status-value text-white m-0"><?= $ficha['vida'] ?></h2>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="status-box status-san shadow-sm">
                        <span class="status-label text-info">SANIDADE (SAN)</span>
                        <h2 class="status-value text-white m-0"><?= $ficha['sanidade'] ?></h2>
                    </div>
                </div>
            </div>

            <div class="mb-2">
                <h6 class="text-muted border-bottom border-secondary pb-2 mb-3">📁 ARQUIVO MORTO / HISTÓRICO</h6>
                <div class="history-box">
                    <?= nl2br(htmlspecialchars($ficha['historia'] ?: 'Nenhum registro passado encontrado nos arquivos da Ordem.')) ?>
                </div>
            </div>
            
        </div>
    </div>
</body>
</html>