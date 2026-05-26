<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>RPG Hub - Novo Inquérito</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Special+Elite&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/rpg-hub/assets/css/nova_campanha.css">
</head>
<body>
    <div class="container d-flex justify-content-center mb-5">
        <div class="card shadow p-4 w-100 position-relative" style="max-width: 650px;">
            <div class="folder-tab">ORDEM_DOC_04</div>
            <h2 class="mb-4 text-center">📁 NOVO ARQUIVO DE INVESTIGAÇÃO</h2>
            
            <?php if(isset($_GET['erro']) && $_GET['erro'] == 'vazio'): ?>
                <div class="alert alert-danger text-center">ERRO: CAMPOS OBRIGATÓRIOS NÃO PREENCHIDOS.</div>
            <?php elseif(isset($_GET['erro']) && $_GET['erro'] == 'banco'): ?>
                <div class="alert alert-danger text-center">ERRO: FALHA CRÍTICA AO SALVAR NO ARQUIVO DA ORDEM.</div>
            <?php endif; ?>

            <form action="/rpg-hub/nova_campanha" method="POST">
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
                    <a href="/rpg-hub/painel" class="btn btn-outline-secondary w-100 mt-2">ABORTAR OPERAÇÃO</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>