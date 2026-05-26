-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26/05/2026 às 16:41
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `rpg_hub`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `campanhas`
--

CREATE TABLE `campanhas` (
  `id` int(11) NOT NULL,
  `id_mestre` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `sistema` varchar(100) NOT NULL,
  `descricao` text DEFAULT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `campanhas`
--

INSERT INTO `campanhas` (`id`, `id_mestre`, `nome`, `sistema`, `descricao`, `criado_em`) VALUES
(5, 5, 'Fragmentos', 'Ordem Paranormal', 'Uma missão muito assustadora!', '2026-04-16 18:55:48'),
(6, 6, 'Pesadelos', 'Ordem Paranormal', 'Campanha sobre Pesadelos.', '2026-04-16 19:09:21'),
(7, 2, 'Lendas do Passado', 'Ordem Paranormal', 'Investigando as lendas do passado.', '2026-04-16 22:12:11'),
(8, 2, 'Testando', 'Ordem Paranormal', 'Testando', '2026-05-25 23:52:36'),
(9, 2, 'Tristeza sem fim', 'Ordem Paranormal', 'A tristeza que nunca acaba', '2026-05-26 14:31:34');

-- --------------------------------------------------------

--
-- Estrutura para tabela `fichas`
--

CREATE TABLE `fichas` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_campanha` int(11) NOT NULL,
  `nome_personagem` varchar(150) NOT NULL,
  `classe` varchar(100) NOT NULL,
  `nex` int(11) DEFAULT 5,
  `vida` int(11) NOT NULL,
  `sanidade` int(11) NOT NULL,
  `historia` text DEFAULT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `fichas`
--

INSERT INTO `fichas` (`id`, `id_usuario`, `id_campanha`, `nome_personagem`, `classe`, `nex`, `vida`, `sanidade`, `historia`, `criado_em`) VALUES
(3, 2, 5, 'Arthur Cervero', 'Combatente', 50, 150, 75, 'Um lutador forte e cheio de vontade.', '2026-04-16 19:02:48'),
(4, 5, 6, 'Juninho', 'Combatente Aniquilador', 30, 60, 25, 'Um grande lutador forte.', '2026-04-16 19:10:20'),
(5, 2, 5, 'Luciano', 'Ocultista', 60, 120, 150, 'Melhor Ocultista do mundo.', '2026-04-16 22:11:20'),
(6, 8, 7, '\\asdass', 'asdas', 53, 13, 23, 'dadaadsas', '2026-04-16 23:41:37'),
(7, 2, 7, 'Arthur Cervero', 'Ocultista', 99, 108, 50, 'Triste', '2026-05-25 20:15:18'),
(8, 10, 7, 'Luiz', 'Combatente', 59, 29, 35, 'Testando', '2026-05-25 23:52:04'),
(9, 11, 8, 'Matiass', 'Ocultistas', 67, 80, 67, 'Grandioso Matiass', '2026-05-26 12:11:43'),
(10, 2, 8, 'test2', 'Combatente', 41, 41, 42, '414141', '2026-05-26 14:29:25'),
(11, 12, 9, 'Junin do grau', 'Combatente Aniquilador', 67, 67, 67, 'SIX SEVENNNN', '2026-05-26 14:32:52');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `nivel` enum('usuario','admin') DEFAULT 'usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `criado_em`, `nivel`) VALUES
(2, 'Eduardo', 'borsteduardo@gmail.com', '123', '2026-04-14 22:57:46', 'admin'),
(5, 'Emanuel', 'logintelefone03@gmail.com', '123', '2026-04-16 18:48:54', 'usuario'),
(6, 'Matheus', 'mestre@fragmentos.com', '123', '2026-04-16 19:08:37', 'usuario'),
(7, 'Diego', 'diego@teste.com', '123', '2026-04-16 22:12:53', 'usuario'),
(8, 'testee', 'admin@teste.com', '123', '2026-04-16 23:40:08', 'usuario'),
(9, 'testeee', 'teste@gmail.com', '123', '2026-05-25 22:31:51', 'usuario'),
(10, 'Luiz', 'luiz@gmail.com', '123', '2026-05-25 23:51:35', 'usuario'),
(11, 'Matias', 'matias@gmail.com', '123', '2026-05-26 12:10:58', 'usuario'),
(12, 'junin', 'junin@gmail.com', '1234', '2026-05-26 14:32:11', 'usuario');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `campanhas`
--
ALTER TABLE `campanhas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_mestre` (`id_mestre`);

--
-- Índices de tabela `fichas`
--
ALTER TABLE `fichas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_campanha` (`id_campanha`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `campanhas`
--
ALTER TABLE `campanhas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `fichas`
--
ALTER TABLE `fichas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `campanhas`
--
ALTER TABLE `campanhas`
  ADD CONSTRAINT `campanhas_ibfk_1` FOREIGN KEY (`id_mestre`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `fichas`
--
ALTER TABLE `fichas`
  ADD CONSTRAINT `fichas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fichas_ibfk_2` FOREIGN KEY (`id_campanha`) REFERENCES `campanhas` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
