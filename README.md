# 🎲 RPG Hub

**RPG Hub** é uma aplicação web desenvolvida em PHP 8+ seguindo a arquitetura MVC (Model-View-Controller). O sistema foi criado para que Mestres de RPG de mesa possam gerenciar suas campanhas e permitir que os jogadores criem e armazenem suas Fichas de Investigador.

---

## 📋 Requisitos do Sistema

Para rodar a aplicação localmente, você precisará de:

- **PHP** (versão 8.0 ou superior)
- **Servidor Web** (Apache, embutido no XAMPP ou similar)
- **Banco de Dados** (MySQL / MariaDB)

---

## ⚙️ Instalação e Configuração

### 1. Preparando o Ambiente

1. Clone ou extraia os arquivos deste projeto para a pasta pública do seu servidor local (ex: `htdocs` no XAMPP ou `www` no WAMP).
2. O nome da pasta raiz do projeto deve ser `rpg_hub`.

### 2. Configurando o Banco de Dados

O sistema utiliza PDO para comunicação segura com o banco de dados.

1. Abra o seu gerenciador do MySQL (ex: phpMyAdmin).
2. Localize o arquivo `banco_dados.sql` (disponível na raiz ou na pasta `/database` do projeto).
3. Importe ou execute o conteúdo desse arquivo SQL para criar o banco `rpg_hub` e as tabelas necessárias (`usuarios`, `campanhas`, `fichas`).
4. _Nota:_ O script já cria um usuário administrador de teste.

### 3. Conexão com o Banco (Atualização de Arquivo)

Se o seu MySQL possui uma senha de root diferente do padrão do XAMPP, você precisará atualizar as credenciais:

1. Navegue até a pasta `config/`.
2. Abra o arquivo `database.php`.
3. Altere as variáveis `$usuario` e `$senha` conforme o seu ambiente local:
   ```php
   $host = 'localhost';
   $dbname = 'rpg_hub';
   $usuario = 'root'; // Altere se necessário
   $senha = '';       // Insira sua senha do MySQL aqui
   ```
