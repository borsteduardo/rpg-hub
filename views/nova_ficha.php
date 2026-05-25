<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>RPG Hub - Ficha de Agente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Special+Elite&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/nova_ficha.css">
</head>
<body>
    <div class="container d-flex justify-content-center mb-5">
        <div class="card shadow p-4 w-100" style="max-width: 650px;">
            <h2 class="mb-4 text-center">📋 REGISTRO DE INVESTIGADOR</h2>
            
            <?php if(isset($_GET['erro']) && $_GET['erro'] == 'vazio'): ?>
                <div class="alert alert-danger text-center">AVISO: DADOS OBRIGATÓRIOS AUSENTES NO FORMULÁRIO.</div>
            <?php endif; ?>

            <form action="controllers/salvar_ficha_controller.php" method="POST">
                <input type="hidden" name="id_campanha" value="<?php echo htmlspecialchars($_GET['id_campanha'] ?? $_GET['id'] ?? 0); ?>">

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