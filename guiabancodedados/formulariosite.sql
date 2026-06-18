-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18/06/2026 às 02:03
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
-- Banco de dados: `formulariosite`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `competicoes`
--

CREATE TABLE `competicoes` (
  `idcompeticoes` int(11) NOT NULL,
  `Descricao` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `competicoes`
--

INSERT INTO `competicoes` (`idcompeticoes`, `Descricao`) VALUES
(2, 'Basquete'),
(3, 'Futebol'),
(4, 'Futsal'),
(5, 'Handebol'),
(6, 'Volei');

-- --------------------------------------------------------

--
-- Estrutura para tabela `genero_participante`
--

CREATE TABLE `genero_participante` (
  `idgenero` int(11) NOT NULL,
  `descricao` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `genero_participante`
--

INSERT INTO `genero_participante` (`idgenero`, `descricao`) VALUES
(1, 'Masculino'),
(2, 'Feminino');

-- --------------------------------------------------------

--
-- Estrutura para tabela `inscricao_participante`
--

CREATE TABLE `inscricao_participante` (
  `idinscricao` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` varchar(100) NOT NULL,
  `nascimento` varchar(100) NOT NULL,
  `idgenero` int(45) NOT NULL,
  `rua` varchar(45) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `cep` varchar(100) NOT NULL,
  `altura` decimal(10,0) NOT NULL,
  `peso` decimal(10,0) NOT NULL,
  `idcompeticoes` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `inscricao_participante`
--

INSERT INTO `inscricao_participante` (`idinscricao`, `nome`, `email`, `telefone`, `nascimento`, `idgenero`, `rua`, `cidade`, `estado`, `cep`, `altura`, `peso`, `idcompeticoes`) VALUES
(18, 'elionilson viana da silva', 'elionilson.cafu14@gmail.com', '94984497064', '1994-08-14', 1, 'e', '022.574.572-00', 'PA', '68458130', 125, 145, 4),
(19, 'Moises anatoino', 'elionilson14@gmail.com', '94984497064', '1994-08-14', 2, 'e', '022.574.572-00', 'PA', '68458130', 125, 145, 2);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `competicoes`
--
ALTER TABLE `competicoes`
  ADD PRIMARY KEY (`idcompeticoes`);

--
-- Índices de tabela `genero_participante`
--
ALTER TABLE `genero_participante`
  ADD PRIMARY KEY (`idgenero`);

--
-- Índices de tabela `inscricao_participante`
--
ALTER TABLE `inscricao_participante`
  ADD PRIMARY KEY (`idinscricao`),
  ADD KEY `idcompeticoes` (`idcompeticoes`),
  ADD KEY `idgenero` (`idgenero`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `competicoes`
--
ALTER TABLE `competicoes`
  MODIFY `idcompeticoes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `genero_participante`
--
ALTER TABLE `genero_participante`
  MODIFY `idgenero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `inscricao_participante`
--
ALTER TABLE `inscricao_participante`
  MODIFY `idinscricao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `inscricao_participante`
--
ALTER TABLE `inscricao_participante`
  ADD CONSTRAINT `inscricao_participante_ibfk_1` FOREIGN KEY (`idcompeticoes`) REFERENCES `competicoes` (`idcompeticoes`),
  ADD CONSTRAINT `inscricao_participante_ibfk_2` FOREIGN KEY (`idgenero`) REFERENCES `genero_participante` (`idgenero`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
