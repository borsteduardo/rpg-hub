<?php
// models/Usuario.php

class Usuario {

    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    /**
     * Busca um usuário pelo seu endereço de e-mail.
     * Usado pelo login_controller para autenticar o acesso.
     *
     * @param string $email
     * @return array|false Retorna os dados do usuário ou false se não encontrado.
     */
    public function buscarPorEmail(string $email): array|false {
        $stmt = $this->pdo->prepare("SELECT * FROM usuarios WHERE email = :email LIMIT 1");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Busca um usuário pelo seu ID.
     *
     * @param int $id
     * @return array|false
     */
    public function buscarPorId(int $id): array|false {
        $stmt = $this->pdo->prepare("SELECT * FROM usuarios WHERE id = :id LIMIT 1");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Cria um novo usuário no banco de dados.
     * Usado pelo cadastro_controller.
     *
     * @param string $nome
     * @param string $email
     * @param string $senha  ATENÇÃO: aplicar password_hash() antes de chamar este método.
     * @return bool Retorna true em caso de sucesso.
     */
    public function criar(string $nome, string $email, string $senha): bool {
        $stmt = $this->pdo->prepare(
            "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)"
        );
        $stmt->bindParam(':nome',  $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);
        return $stmt->execute();
    }

    /**
     * Verifica se já existe um usuário cadastrado com o e-mail informado.
     * Útil para evitar duplicatas antes de chamar criar().
     *
     * @param string $email
     * @return bool
     */
    public function emailJaExiste(string $email): bool {
        $stmt = $this->pdo->prepare("SELECT id FROM usuarios WHERE email = :email LIMIT 1");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch() !== false;
    }
}
?>
