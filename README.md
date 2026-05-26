🎲 RPG Hub: Sistema de Gerenciamento Paranormal
RPG Hub é uma aplicação web desenvolvida em PHP 8+ seguindo a arquitetura MVC (Model-View-Controller). O sistema foi criado para que Mestres de RPG de mesa possam gerenciar suas campanhas de investigação e permitir que os jogadores criem, armazenem e gerenciem suas Fichas de Agente em tempo real.

🚀 Principais Funcionalidades
Arquitetura de Rotas Limpas: Sistema centralizado via index.php com URLs amigáveis (ex: /rpg-hub/painel), protegendo a estrutura física dos diretórios.

Controle de Acesso Dinâmico: Interfaces e permissões que se adaptam automaticamente ao perfil do usuário (Jogador, Mestre ou Administrador).

Gestão de Status Assíncrona: Atualização de Pontos de Vida (PV) e Sanidade (SAN) diretamente na ficha sem recarregar a página, utilizando JavaScript (Fetch API).

Terminal de Rolagem Integrado: Rolagem de dados (D4, D6, D8, D10, D12, D20) conectada à API pública do Rolz, com destaque automático para falhas e acertos críticos.

Terminal Overseer (Admin): Painel gerencial restrito para contagem e visão global de agentes, campanhas e fichas ativas no sistema.

📋 Requisitos do Sistema
Para rodar a aplicação localmente, você precisará de:

PHP (versão 8.0 ou superior)

Servidor Web (Apache embutido no XAMPP ou similar)

⚠️ Atenção: O módulo mod_rewrite do Apache deve estar ativado para que o arquivo .htaccess e o sistema de rotas limpas funcionem corretamente.

Banco de Dados (MySQL / MariaDB)

⚙️ Instalação e Configuração

1. Preparando o Ambiente
   Clone ou extraia os arquivos deste projeto para a pasta pública do seu servidor local (ex: htdocs no XAMPP).

⚠️ IMPORTANTE: O nome da pasta raiz do projeto no servidor deve ser exatamente rpg-hub (com hífen), pois o sistema de rotas absolutas depende desse caminho.

2. Configurando o Banco de Dados
   O sistema utiliza PDO para comunicação segura e blindada contra SQL Injection.

Abra o seu gerenciador do MySQL (ex: phpMyAdmin).

Localize o arquivo banco_dados.sql (disponível na raiz ou na pasta /database do projeto).

Importe ou execute o conteúdo desse arquivo SQL para criar o banco de dados rpg_hub e as tabelas estruturais (usuarios, campanhas, fichas).

Nota: O script já cria as credenciais de um usuário Administrador para testes.

3. Conexão com o Banco (Configuração de Ambiente)
   Se o seu MySQL possui uma senha de root diferente do padrão do XAMPP (sem senha), você precisará atualizar as credenciais:

Navegue até a pasta config/.

Abra o arquivo database.php.

Altere as variáveis $usuario e $senha conforme o seu ambiente local:

PHP
$host = 'localhost';
$dbname = 'rpg_hub';
$usuario = 'root'; // Altere se o seu usuário não for 'root'
$senha = ''; // Insira sua senha do MySQL aqui, se houver
