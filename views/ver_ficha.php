<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RPG Hub - Dossiê do Agente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/ver_ficha.css?v=2">
</head>
<body>
    <div class="container py-5 mb-5">
        <div class="row g-4 justify-content-center align-items-stretch">
            
            <div class="col-lg-7">
                <div class="dossier-card shadow p-4 position-relative h-100">
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
                                <div class="d-flex justify-content-center align-items-center gap-4">
                                    <button class="btn btn-outline-danger btn-stat" data-stat="vida" data-action="minus">➖</button>
                                    <h1 class="text-white m-0 fw-bold" id="val_vida"><?= $ficha['vida'] ?></h1>
                                    <button class="btn btn-outline-danger btn-stat" data-stat="vida" data-action="plus">➕</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="status-box status-san shadow-sm">
                                <span class="status-label text-info">SANIDADE (SAN)</span>
                                <div class="d-flex justify-content-center align-items-center gap-4">
                                    <button class="btn btn-outline-info btn-stat" data-stat="sanidade" data-action="minus">➖</button>
                                    <h1 class="text-white m-0 fw-bold" id="val_sanidade"><?= $ficha['sanidade'] ?></h1>
                                    <button class="btn btn-outline-info btn-stat" data-stat="sanidade" data-action="plus">➕</button>
                                </div>
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

            <div class="col-lg-5">
                <div class="card bg-dark border-secondary p-4 text-center shadow h-100 d-flex flex-column">
                    <h5 class="text-warning mb-4" style="font-family: 'Special Elite', cursive;">🎲 TERMINAL DE ROLAGEM</h5>
                    
                    <div class="row justify-content-center mb-4">
                        <div class="col-10">
                            <div class="input-group justify-content-center shadow-sm">
                                <span class="input-group-text bg-secondary text-light border-secondary fw-bold">Qtd:</span>
                                <button class="btn btn-dark border-secondary text-light px-3 fs-5" id="btn_menos">➖</button>
                                <input type="text" id="qtd_dados" class="form-control bg-dark text-warning fw-bold border-secondary text-center fs-4" value="1" readonly style="max-width: 70px;">
                                <button class="btn btn-dark border-secondary text-light px-3 fs-5" id="btn_mais">➕</button>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center gap-2 flex-wrap mb-4">
                        <button class="btn btn-outline-secondary dice-btn border-secondary text-light px-3 py-2" data-tipo="d4">D4</button>
                        <button class="btn btn-outline-secondary dice-btn border-secondary text-light px-3 py-2" data-tipo="d6">D6</button>
                        <button class="btn btn-outline-secondary dice-btn border-secondary text-light px-3 py-2" data-tipo="d8">D8</button>
                        <button class="btn btn-outline-secondary dice-btn border-secondary text-light px-3 py-2" data-tipo="d10">D10</button>
                        <button class="btn btn-outline-secondary dice-btn border-secondary text-light px-3 py-2" data-tipo="d12">D12</button>
                        <button class="btn btn-warning fw-bold dice-btn shadow px-3 py-2" data-tipo="d20">D20</button>
                    </div>

                    <div class="resultado-box mt-auto p-3 rounded" style="background-color: #111; border: 1px solid #333;">
                        <h2 id="resultado_dado" class="text-white m-0" style="font-size: 3rem;">-</h2>
                        <small id="detalhes_dado" class="text-muted d-block mt-2">Aguardando comando...</small>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        const inputQtd = document.getElementById('qtd_dados');
        const resultadoVisor = document.getElementById('resultado_dado');
        const detalhesVisor = document.getElementById('detalhes_dado');

        document.getElementById('btn_menos').addEventListener('click', () => {
            let qtd = parseInt(inputQtd.value);
            if (qtd > 1) {
                inputQtd.value = qtd - 1;
            }
        });

        document.getElementById('btn_mais').addEventListener('click', () => {
            let qtd = parseInt(inputQtd.value);
            if (qtd < 30) {
                inputQtd.value = qtd + 1;
            }
        });

        function executarRolagem(tipoDado) {
            let qtd = parseInt(inputQtd.value);
            let formula = `${qtd}${tipoDado}`;

            resultadoVisor.innerText = "⏳";
            resultadoVisor.className = "text-white m-0"; 
            detalhesVisor.innerText = `Rolando ${formula}...`;

            fetch(`https://rolz.org/api/?${formula}.json`)
                .then(response => {
                    if (!response.ok) throw new Error("Falha na rede.");
                    return response.json();
                })
                .then(data => {
                    resultadoVisor.innerText = data.result;
                    detalhesVisor.innerText = `Fórmula: ${formula} | Detalhes: ${data.details}`;
                    
                    if (formula === '1d20') {
                        if (data.result === 20) {
                            resultadoVisor.className = "text-success m-0 fw-bold";
                            detalhesVisor.innerText += " - CRÍTICO!";
                        } else if (data.result === 1) {
                            resultadoVisor.className = "text-danger m-0 fw-bold";
                            detalhesVisor.innerText += " - DESASTRE!";
                        }
                    }
                })
                .catch(error => {
                    console.error(error);
                    resultadoVisor.innerText = "ERRO";
                    resultadoVisor.className = "text-danger m-0";
                    detalhesVisor.innerText = "Interferência paranormal na conexão.";
                });
        }

        const botoesDados = document.querySelectorAll('.dice-btn');
        botoesDados.forEach(botao => {
            botao.addEventListener('click', function() {
                const tipoDado = this.getAttribute('data-tipo');
                executarRolagem(tipoDado);
            });
        });

        const idFichaAtual = <?= $ficha['id'] ?>; 

        document.querySelectorAll('.btn-stat').forEach(btn => {
            btn.addEventListener('click', function() {
                const stat = this.getAttribute('data-stat'); 
                const action = this.getAttribute('data-action'); 
                const display = document.getElementById(`val_${stat}`);
                let valorAtual = parseInt(display.innerText);

                if (action === 'plus') {
                    valorAtual++;
                } else if (action === 'minus') {
                    valorAtual--;
                }

                display.innerText = valorAtual;

                fetch('index.php?rota=atualizar_status', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body: `id_ficha=${idFichaAtual}&campo=${stat}&valor=${valorAtual}`
                }).catch(error => console.error("Erro ao salvar status:", error));
            });
        });

    </script>
</body>
</html>