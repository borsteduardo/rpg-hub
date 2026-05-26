<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>RPG Hub - OVERSEER ADMIN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Special+Elite&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/rpg-hub/assets/css/admin.css">
</head>
<body>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-danger">⚠️ OVERSEER SYSTEM v1.0</h1>
            <a href="/rpg-hub/painel" class="btn btn-outline-light btn-sm">Sair do Modo Admin</a>
        </div>

        <div class="row mb-4">
            <div class="col-md-4"><div class="stat-box"><h2 class="text-white"><?php echo $totalUsers; ?></h2><small>AGENTES</small></div></div>
            <div class="col-md-4"><div class="stat-box"><h2 class="text-white"><?php echo $totalMesas; ?></h2><small>CAMPANHAS</small></div></div>
            <div class="col-md-4"><div class="stat-box"><h2 class="text-white"><?php echo $totalFichas; ?></h2><small>FICHAS</small></div></div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card-admin p-3 shadow">
                    <h4 class="text-danger mb-3">📂 BASE DE USUÁRIOS</h4>
                    <table class="table table-sm">
                        <thead><tr><th>ID</th><th>Nome</th><th>Nível</th></tr></thead>
                        <tbody>
                            <?php foreach($listaUsuarios as $u): ?>
                            <tr>
                                <td><?php echo $u['id']; ?></td>
                                <td><?php echo $u['nome']; ?></td>
                                <td><span class="badge <?php echo $u['nivel'] == 'admin' ? 'badge-admin' : 'bg-secondary'; ?>"><?php echo $u['nivel']; ?></span></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card-admin p-3 shadow">
                    <h4 class="text-danger mb-3">📂 CAMPANHAS ATIVAS</h4>
                    <table class="table table-sm">
                        <thead><tr><th>Nome</th><th>Mestre</th></tr></thead>
                        <tbody>
                            <?php foreach($listaMesas as $m): ?>
                            <tr>
                                <td><?php echo $m['nome']; ?></td>
                                <td><span class="text-info"><?php echo $m['mestre']; ?></span></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>