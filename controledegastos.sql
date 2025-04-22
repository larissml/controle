-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18/02/2025 às 01:41
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
-- Banco de dados: `controledegastos`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `pessoa`
--

CREATE TABLE `pessoa` (
  `Identificador` int(11) NOT NULL,
  `Nome` varchar(255) NOT NULL,
  `Idade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pessoa`
--

INSERT INTO `pessoa` (`Identificador`, `Nome`, `Idade`) VALUES
(1, 'Larissa Melo', 24),
(2, 'Jade Ferreira', 15),
(3, 'Sarah Faria', 21);

-- --------------------------------------------------------

--
-- Estrutura para tabela `transacao`
--

CREATE TABLE `transacao` (
  `Identificador` int(11) NOT NULL,
  `Descricao` varchar(255) NOT NULL,
  `Valor` decimal(10,2) NOT NULL,
  `Tipo` enum('despesa','receita') NOT NULL,
  `Pessoa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `transacao`
--

INSERT INTO `transacao` (`Identificador`, `Descricao`, `Valor`, `Tipo`, `Pessoa`) VALUES
(1, 'fatura cartao', 1500.00, 'despesa', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`Identificador`);

--
-- Índices de tabela `transacao`
--
ALTER TABLE `transacao`
  ADD PRIMARY KEY (`Identificador`),
  ADD KEY `Pessoa` (`Pessoa`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `Identificador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `transacao`
--
ALTER TABLE `transacao`
  MODIFY `Identificador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `transacao`
--
ALTER TABLE `transacao`
  ADD CONSTRAINT `transacao_ibfk_1` FOREIGN KEY (`Pessoa`) REFERENCES `pessoa` (`Identificador`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
