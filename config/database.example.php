<?php
/**
 * MOLDE DE CONEXÃO COM O BANCO DE DADOS
 * ---------------------------------------------------------
 * ATENÇÃO: Renomeie este arquivo para database.php e 
 * substitua as credenciais abaixo pelas do seu ambiente.
 * Este arquivo (.example) é seguro para envio ao GitHub.
 */

$host = 'localhost';
$dbname = 'rpg_hub';
$usuario = 'SEU_USUARIO_AQUI'; // Ex: root no XAMPP
$senha = 'SUA_SENHA_AQUI';     // Deixe vazio ('') se usar XAMPP padrão sem senha

try {
    // Instancia a conexão PDO blindada
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $usuario, $senha);
    
    // Configura o PDO para lançar exceções em caso de erros (facilita encontrar bugs)
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Define o retorno padrão das buscas como Array Associativo
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    // Trava de segurança caso o banco esteja fora do ar
    die("Erro crítico de conexão com os arquivos da Ordem: " . $e->getMessage());
}