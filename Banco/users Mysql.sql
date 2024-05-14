-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26/04/2024 às 05:09
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `users`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `logins`
--

CREATE TABLE `logins` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `data_login` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `data_cadastro`) VALUES
(10, 'Bruno Ferreira Benetti', 'xbenettix@gmail.com', '123456', '2024-04-21 21:06:39'),
(11, '', '', '', '2024-04-21 22:34:08'),
(12, 'xxxxxxxx', 'benettimotog4@gmail.com', '12345', '2024-04-21 22:48:16'),
(13, 'xxxxxx', 'xxxx@gmail.com', '111', '2024-04-22 00:27:25'),
(14, 'Smokey', 'smokey@gmail.com', 'supra', '2024-04-22 01:12:38'),
(16, 'Calleb Maddalena de Souza', 'Calleb@gmail.com', 'Halter', '2024-04-22 22:13:07'),
(17, 'naps', 'naps@gmail.com', '555', '2024-04-23 01:17:28'),
(18, 'Danilo Zona Norte', 'ZN@gmail.fodase', 'astra', '2024-04-24 01:06:42'),
(20, 'Lauis Gameplays', 'luis@gmail.com', 'choc', '2024-04-26 02:46:31'),
(22, 'Mahhtla judoca', 'judo@gmail.com', 'judoca', '2024-04-26 03:00:55'),
(23, 'Cabelo da folha', 'caleb@pcs.com', 'paulista', '2024-04-26 03:03:32'),
(24, 'Gater money ', 'Bacarat@gmail.com', '200k', '2024-04-26 03:04:46');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `logins`
--
ALTER TABLE `logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

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
-- AUTO_INCREMENT de tabela `logins`
--
ALTER TABLE `logins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `logins`
--
ALTER TABLE `logins`
  ADD CONSTRAINT `logins_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
