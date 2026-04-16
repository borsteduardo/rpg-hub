<?php
// models/Ficha.php

class Ficha {

    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    /**
     * Busca uma ficha específica pelo seu ID.
     *
     * @param int $id
     * @return array|false
     */
    public function buscarPorId(int $id): array|false {
        $stmt = $this->pdo->prepare("SELECT * FROM fichas WHERE id = :id LIMIT 1");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Retorna todas as fichas de uma campanha, incluindo o nome do jogador.
     * Usado pelo detalhes_controller para exibir a lista de investigadores.
     *
     * @param int $id_campanha
     * @return array
     */
    public function buscarPorCampanha(int $id_campanha): array {
        $stmt = $this->pdo->prepare(
            "SELECT f.*, u.nome AS nome_jogador
             FROM fichas f
             JOIN usuarios u ON f.id_usuario = u.id
             WHERE f.id_campanha = :id_campanha"
        );
        $stmt->bindParam(':id_campanha', $id_campanha, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Retorna todas as fichas criadas por um determinado usuário/jogador.
     * Útil para exibir os investigadores do jogador no painel.
     *
     * @param int $id_usuario
     * @return array
     */
    public function buscarPorUsuario(int $id_usuario): array {
        $stmt = $this->pdo->prepare(
            "SELECT f.*, c.nome AS nome_campanha
             FROM fichas f
             JOIN campanhas c ON f.id_campanha = c.id
             WHERE f.id_usuario = :id_usuario
             ORDER BY f.criado_em DESC"
        );
        $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Cria (salva) uma nova ficha de investigador no banco.
     * Usado pelo salvar_ficha_controller.
     *
     * @param int    $id_usuario
     * @param int    $id_campanha
     * @param string $nome_personagem
     * @param string $classe
     * @param int    $nex
     * @param int    $vida
     * @param int    $sanidade
     * @param string $historia
     * @return bool
     */
    public function criar(
        int    $id_usuario,
        int    $id_campanha,
        string $nome_personagem,
        string $classe,
        int    $nex,
        int    $vida,
        int    $sanidade,
        string $historia
    ): bool {
        $stmt = $this->pdo->prepare(
            "INSERT INTO fichas
                (id_usuario, id_campanha, nome_personagem, classe, nex, vida, sanidade, historia)
             VALUES
                (:id_usuario, :id_campanha, :nome_personagem, :classe, :nex, :vida, :sanidade, :historia)"
        );
        $stmt->bindParam(':id_usuario',      $id_usuario,      PDO::PARAM_INT);
        $stmt->bindParam(':id_campanha',     $id_campanha,     PDO::PARAM_INT);
        $stmt->bindParam(':nome_personagem', $nome_personagem);
        $stmt->bindParam(':classe',          $classe);
        $stmt->bindParam(':nex',             $nex,             PDO::PARAM_INT);
        $stmt->bindParam(':vida',            $vida,            PDO::PARAM_INT);
        $stmt->bindParam(':sanidade',        $sanidade,        PDO::PARAM_INT);
        $stmt->bindParam(':historia',        $historia);
        return $stmt->execute();
    }

    /**
     * Remove uma ficha pelo seu ID.
     * Útil para futuras funcionalidades de exclusão de personagem.
     *
     * @param int $id
     * @return bool
     */
    public function deletar(int $id): bool {
        $stmt = $this->pdo->prepare("DELETE FROM fichas WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
?>
