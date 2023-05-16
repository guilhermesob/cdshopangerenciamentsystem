-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10/05/2023 às 23:33
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `musictec`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `carrinho`
--

CREATE TABLE `carrinho` (
  `falso` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `nomep` varchar(50) NOT NULL,
  `preco` varchar(11) NOT NULL,
  `imagem` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cds`
--

CREATE TABLE `cds` (
  `id` int(250) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `titulo` varchar(30) NOT NULL,
  `genero` varchar(30) NOT NULL,
  `artista` varchar(30) NOT NULL,
  `tempo` decimal(5,2) NOT NULL,
  `ano` date NOT NULL,
  `procedencia` varchar(30) NOT NULL,
  `disponibilidade` varchar(20) NOT NULL,
  `descricao` varchar(30) NOT NULL,
  `preco` decimal(5,2) NOT NULL,
  `lancamento` varchar(3) NOT NULL,
  `promocao` varchar(3) NOT NULL,
  `comprados` int(250) NOT NULL,
  `img` varchar(250) NOT NULL,
  `midia` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cds`
--

INSERT INTO `cds` (`id`, `nome`, `titulo`, `genero`, `artista`, `tempo`, `ano`, `procedencia`, `disponibilidade`, `descricao`, `preco`, `lancamento`, `promocao`, `comprados`, `img`, `midia`) VALUES
(1, 'cd1', 'primeiro', 'funk', 'admin', 4.00, '2022-06-23', 'melhor de todos', '100', 'novo', 0.00, 'sim', 'sim', 0, 'uploads/cds.jpg', 'midias/audio.mp3'),
(2, 'cd2', 'segundo', 'rock', 'admin', 300.00, '2022-06-23', 'otimo', '50', 'novo', 2.00, 'nao', 'nao', 0, 'uploads/cds.jpg', 'midias/audio.mp3'),
(3, 'cd3', 'teceiro', 'sertanejo', 'admin2', 324.00, '2022-06-23', 'melhor', '200', 'novo', 2.99, 'nao', 'sim', 0, 'uploads/cds.jpg', 'midias/audio.mp3');

-- --------------------------------------------------------

--
-- Estrutura para tabela `playlist`
--

CREATE TABLE `playlist` (
  `idid` int(11) NOT NULL,
  `nomep` varchar(50) NOT NULL,
  `id` int(100) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `img` varchar(250) NOT NULL,
  `midia` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `telefone` int(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `cpf` int(11) NOT NULL,
  `imagem` varchar(250) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `admin` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `telefone`, `email`, `cpf`, `imagem`, `senha`, `admin`) VALUES
(1, 'admin', 123456789, 'admin@gmail.com', 987654321, 'uploads/perfil.png', 'YWRtaW4=', 'admin');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`falso`);

--
-- Índices de tabela `cds`
--
ALTER TABLE `cds`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`idid`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `carrinho`
--
ALTER TABLE `carrinho`
  MODIFY `falso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cds`
--
ALTER TABLE `cds`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `playlist`
--
ALTER TABLE `playlist`
  MODIFY `idid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
