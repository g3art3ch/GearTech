-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29/04/2024 às 02:37
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
-- Banco de dados: `cars`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `capacidadecarro`
--

CREATE TABLE `capacidadecarro` (
  `idCapacidade` int(11) NOT NULL,
  `idNome` int(11) DEFAULT NULL,
  `capacidade` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `capacidadecarro`
--

INSERT INTO `capacidadecarro` (`idCapacidade`, `idNome`, `capacidade`) VALUES
(1, 1, '5'),
(2, 2, '5'),
(3, 3, '5'),
(4, 4, '5'),
(5, 5, '5'),
(6, 6, '7'),
(7, 7, '5'),
(8, 8, '5'),
(9, 9, '5'),
(10, 10, '5'),
(11, 11, '2'),
(12, 12, '5'),
(13, 13, '5'),
(14, 14, '5'),
(15, 15, '5'),
(16, 16, '5'),
(17, 17, '5'),
(18, 18, '5');

-- --------------------------------------------------------

--
-- Estrutura para tabela `filtrocarros`
--

CREATE TABLE `filtrocarros` (
  `idFiltro` int(11) NOT NULL,
  `estilo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `filtrocarros`
--

INSERT INTO `filtrocarros` (`idFiltro`, `estilo`) VALUES
(1, 'SUV'),
(2, 'Hatch'),
(3, 'Sedan'),
(4, 'SUV'),
(5, 'Hatch'),
(6, 'Sedan');

-- --------------------------------------------------------

--
-- Estrutura para tabela `nomecarro`
--

CREATE TABLE `nomecarro` (
  `idNome` int(11) NOT NULL,
  `idFiltro` int(11) DEFAULT NULL,
  `nome` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `nomecarro`
--

INSERT INTO `nomecarro` (`idNome`, `idFiltro`, `nome`) VALUES
(1, 1, 'Honda Zr-V 2.0 Touring CVT 202'),
(2, 1, 'Volkswagen Nivus 1.0 200 TSI C'),
(3, 1, 'Hyundai Creta 1.6 Action (Aut)'),
(4, 1, 'Honda CR-V 1.5 Touring CVT 4wd'),
(5, 1, 'Chevrolet Tracker 1.0 Turbo (A'),
(6, 1, 'Volkswagen Tiguan Allspace 2.0'),
(7, 2, 'Chevrolet Onix 1.0 SPE/4 2024'),
(8, 2, 'Hyundai HB20 1.0 Comfort Plus '),
(9, 2, 'Chevrolet Celta  LT 1.0 (Flex)'),
(10, 2, 'Volkswagen Gol 1.0 MPI (Flex) '),
(11, 2, 'Smart Fortwo Coupe 1.0 62kw Pa'),
(12, 2, 'Chevrolet Astra Advantage 2.0 '),
(13, 3, 'Hyundai HB20S 1.0 Comfort 2024'),
(14, 3, 'Hyundai Azera 3.0 V6 (Aut) 202'),
(15, 3, 'Volkswagen Passat Highline 2.0'),
(16, 3, 'Toyota Corolla 2.0 GLi CVT 202'),
(17, 3, 'Honda City 1.5 EX CVT 2024'),
(18, 3, 'Chevrolet Onix Plus 1.0 LT 202');

-- --------------------------------------------------------

--
-- Estrutura para tabela `orcamentocarro`
--

CREATE TABLE `orcamentocarro` (
  `idOrcamento` int(11) NOT NULL,
  `idNome` int(11) DEFAULT NULL,
  `orcamento` decimal(10,3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `orcamentocarro`
--

INSERT INTO `orcamentocarro` (`idOrcamento`, `idNome`, `orcamento`) VALUES
(1, 1, 214.500),
(2, 2, 129.190),
(3, 3, 114.690),
(4, 4, 229.445),
(5, 5, 127.690),
(6, 6, 278.990),
(7, 7, 84.390),
(8, 8, 89.490),
(9, 9, 34.516),
(10, 10, 74.150),
(11, 11, 69.172),
(12, 12, 34.958),
(13, 13, 90.690),
(14, 14, 234.256),
(15, 15, 142.296),
(16, 16, 148.990),
(17, 17, 118.700),
(18, 18, 96.390);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipocombustivel`
--

CREATE TABLE `tipocombustivel` (
  `idCombustivel` int(11) NOT NULL,
  `idNome` int(11) DEFAULT NULL,
  `combustivel` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tipocombustivel`
--

INSERT INTO `tipocombustivel` (`idCombustivel`, `idNome`, `combustivel`) VALUES
(1, 1, 'Gasolina'),
(2, 2, 'Flex'),
(3, 3, 'Flex'),
(4, 4, 'Gasolina'),
(5, 5, 'Flex'),
(6, 6, 'Gasolina'),
(7, 7, 'Flex'),
(8, 8, 'Flex'),
(9, 9, 'Flex'),
(10, 10, 'Flex'),
(11, 11, 'Gasolina'),
(12, 12, 'Flex'),
(13, 13, 'Flex'),
(14, 14, 'Gasolina'),
(15, 15, 'Gasolina'),
(16, 16, 'Flex'),
(17, 17, 'Flex'),
(18, 18, 'Flex');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usocarro`
--

CREATE TABLE `usocarro` (
  `idUso` int(11) NOT NULL,
  `idNome` int(11) DEFAULT NULL,
  `tipoUso` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usocarro`
--

INSERT INTO `usocarro` (`idUso`, `idNome`, `tipoUso`) VALUES
(1, 1, 'Diário'),
(2, 2, 'Diário'),
(3, 3, 'Diário'),
(4, 4, 'Diário'),
(5, 5, 'Diário'),
(6, 6, 'Passeio'),
(7, 7, 'Diário'),
(8, 8, 'Diário'),
(9, 9, 'Diário'),
(10, 10, 'Diário'),
(11, 11, 'Diário'),
(12, 12, 'Passeio'),
(13, 13, 'Diário'),
(14, 14, 'Passeio'),
(15, 15, 'Passeio'),
(16, 16, 'Passeio'),
(17, 17, 'Diário'),
(18, 18, 'Diário');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `capacidadecarro`
--
ALTER TABLE `capacidadecarro`
  ADD PRIMARY KEY (`idCapacidade`),
  ADD KEY `idNome` (`idNome`);

--
-- Índices de tabela `filtrocarros`
--
ALTER TABLE `filtrocarros`
  ADD PRIMARY KEY (`idFiltro`);

--
-- Índices de tabela `nomecarro`
--
ALTER TABLE `nomecarro`
  ADD PRIMARY KEY (`idNome`),
  ADD KEY `idFiltro` (`idFiltro`);

--
-- Índices de tabela `orcamentocarro`
--
ALTER TABLE `orcamentocarro`
  ADD PRIMARY KEY (`idOrcamento`),
  ADD KEY `idNome` (`idNome`);

--
-- Índices de tabela `tipocombustivel`
--
ALTER TABLE `tipocombustivel`
  ADD PRIMARY KEY (`idCombustivel`),
  ADD KEY `idNome` (`idNome`);

--
-- Índices de tabela `usocarro`
--
ALTER TABLE `usocarro`
  ADD PRIMARY KEY (`idUso`),
  ADD KEY `idNome` (`idNome`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `capacidadecarro`
--
ALTER TABLE `capacidadecarro`
  MODIFY `idCapacidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `filtrocarros`
--
ALTER TABLE `filtrocarros`
  MODIFY `idFiltro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `nomecarro`
--
ALTER TABLE `nomecarro`
  MODIFY `idNome` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `orcamentocarro`
--
ALTER TABLE `orcamentocarro`
  MODIFY `idOrcamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `tipocombustivel`
--
ALTER TABLE `tipocombustivel`
  MODIFY `idCombustivel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `usocarro`
--
ALTER TABLE `usocarro`
  MODIFY `idUso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `capacidadecarro`
--
ALTER TABLE `capacidadecarro`
  ADD CONSTRAINT `capacidadecarro_ibfk_1` FOREIGN KEY (`idNome`) REFERENCES `nomecarro` (`idNome`);

--
-- Restrições para tabelas `nomecarro`
--
ALTER TABLE `nomecarro`
  ADD CONSTRAINT `nomecarro_ibfk_1` FOREIGN KEY (`idFiltro`) REFERENCES `filtrocarros` (`idFiltro`);

--
-- Restrições para tabelas `orcamentocarro`
--
ALTER TABLE `orcamentocarro`
  ADD CONSTRAINT `orcamentocarro_ibfk_1` FOREIGN KEY (`idNome`) REFERENCES `nomecarro` (`idNome`);

--
-- Restrições para tabelas `tipocombustivel`
--
ALTER TABLE `tipocombustivel`
  ADD CONSTRAINT `tipocombustivel_ibfk_1` FOREIGN KEY (`idNome`) REFERENCES `nomecarro` (`idNome`);

--
-- Restrições para tabelas `usocarro`
--
ALTER TABLE `usocarro`
  ADD CONSTRAINT `usocarro_ibfk_1` FOREIGN KEY (`idNome`) REFERENCES `nomecarro` (`idNome`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
