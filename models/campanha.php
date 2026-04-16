<?php

class Campanha {

    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }
public function listarTodasComMestre(): array {
    $sql = "SELECT c.*, u.nome as nome_mestre 
            FROM campanhas c 
            JOIN usuarios u ON c.id_mestre = u.id 
            ORDER BY c.criado_em DESC";
    
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
    /**
     * Busca uma campanha específica pelo seu ID.
     *
     * @param int $id
     * @return array|false
     */
    public function buscarPorId(int $id): array|false {
        $stmt = $this->pdo->prepare("SELECT * FROM campanhas WHERE id = :id LIMIT 1");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Retorna todas as campanhas criadas por um determinado Mestre.
     * Usado pelo painel_controller quando o perfil é 'mestre'.
     *
     * @param int $id_mestre
     * @return array
     */
    public function buscarPorMestre(int $id_mestre): array {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM campanhas
             WHERE id_mestre = :id_mestre
             ORDER BY criado_em DESC"
        );
        $stmt->bindParam(':id_mestre', $id_mestre, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Retorna todas as campanhas do sistema, incluindo o nome do Mestre.
     * Usado pelo painel_controller quando o perfil é 'jogador'.
     *
     * @return array
     */
    public function buscarTodas(): array {
        $stmt = $this->pdo->prepare(
            "SELECT c.*, u.nome AS nome_mestre
             FROM campanhas c
             JOIN usuarios u ON c.id_mestre = u.id
             ORDER BY c.criado_em DESC"
        );
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Cria uma nova campanha no banco de dados.
     * Usado pelo nova_campanha_controller.
     *
     * @param int    $id_mestre
     * @param string $nome
     * @param string $sistema
     * @param string $descricao
     * @return bool
     */
    public function criar(int $id_mestre, string $nome, string $sistema, string $descricao): bool {
        $stmt = $this->pdo->prepare(
            "INSERT INTO campanhas (id_mestre, nome, sistema, descricao)
             VALUES (:id_mestre, :nome, :sistema, :descricao)"
        );
        $stmt->bindParam(':id_mestre', $id_mestre, PDO::PARAM_INT);
        $stmt->bindParam(':nome',      $nome);
        $stmt->bindParam(':sistema',   $sistema);
        $stmt->bindParam(':descricao', $descricao);
        return $stmt->execute();
    }

    /**
     * Remove uma campanha pelo seu ID.
     *
     * @param int $id
     * @return bool
     */
    public function deletar(int $id): bool {
        $stmt = $this->pdo->prepare("DELETE FROM campanhas WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
?>
