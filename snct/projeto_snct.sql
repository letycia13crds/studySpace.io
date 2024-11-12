-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09/11/2024 às 01:35
-- Versão do servidor: 8.0.20
-- Versão do PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projeto_snct`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `adm`
--

CREATE TABLE `adm` (
  `id_adm` int NOT NULL,
  `nome_adm` varchar(100) NOT NULL,
  `email_adm` varchar(100) NOT NULL,
  `senha_adm` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `CPF_adm` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `adm`
--

INSERT INTO `adm` (`id_adm`, `nome_adm`, `email_adm`, `senha_adm`, `CPF_adm`) VALUES
(3, 'kleberson veloso', 'kleberson2609@gmail.com', '123456', '123'),
(7, 'jorge', 'jorget4deu@gmail.com', '$2y$10$Yw7A73YEkiqLc', '2147483647'),
(8, 'Jorge Tadeu', 'jorget4deu@gmail.com', '$2y$10$fwb7kvurW6ai.', '92620'),
(9, 'Letycia Vilany Pereira de Sousa', 'letyciacardosoc@gmail.com', '$2y$10$C2CIvfyReB0XckktdDRaqu06RzDYgoaSMaDNhxCL6YgbgUqME4ux.', '05525588340');

-- --------------------------------------------------------

--
-- Estrutura para tabela `biomas_info`
--

CREATE TABLE `biomas_info` (
  `id` int NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descricao` text NOT NULL,
  `imagem` varchar(100) NOT NULL,
  `link` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `biomas_info`
--

INSERT INTO `biomas_info` (`id`, `nome`, `descricao`, `imagem`, `link`) VALUES
(1, 'Floresta Amazônica', 'A maior floresta tropical do mundo, rica em biodiversidade e lar de milhares de espécies.', 'imagens/amazonia.jpg', 'https://link-da-floresta-amazonica.com'),
(2, 'Cerrado', 'Um dos biomas mais antigos e biodiversos, conhecido pelas suas árvores tortas e resistência ao fogo.', 'imagens/cerrado.jpg', 'https://link-do-cerrado.com'),
(3, 'Pantanal', 'A maior planície alagável do planeta, com uma fauna e flora única e abundante.', 'imagens/pantanal.jpg', 'https://link-do-pantanal.com'),
(4, 'Caatinga', 'Bioma exclusivamente brasileiro, com vegetação adaptada à seca e alta temperatura.', 'imagens/caatinga.jpg', 'https://link-da-caatinga.com');

-- --------------------------------------------------------

--
-- Estrutura para tabela `reserva`
--

CREATE TABLE `reserva` (
  `ID_reserva` int NOT NULL,
  `matricula` varchar(15) NOT NULL,
  `data_reserva` date NOT NULL,
  `data_termino` date NOT NULL,
  `status` varchar(10) NOT NULL,
  `numero_sala` int NOT NULL,
  `numero_pessoas` int NOT NULL,
  `hora_inicio` time NOT NULL,
  `horario_inicio` time DEFAULT NULL,
  `matricula_integrante_2` varchar(20) DEFAULT NULL,
  `matricula_integrante_3` varchar(20) DEFAULT NULL,
  `matricula_integrante_4` varchar(20) DEFAULT NULL,
  `matricula_integrante_5` varchar(20) DEFAULT NULL,
  `matricula_integrante_6` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `reserva`
--

INSERT INTO `reserva` (`ID_reserva`, `matricula`, `data_reserva`, `data_termino`, `status`, `numero_sala`, `numero_pessoas`, `hora_inicio`, `horario_inicio`, `matricula_integrante_2`, `matricula_integrante_3`, `matricula_integrante_4`, `matricula_integrante_5`, `matricula_integrante_6`) VALUES
(41, 'dev', '2012-12-10', '0000-00-00', 'Aprovada', 1, 3, '00:00:00', '12:00:00', '121212', '09091201', NULL, NULL, NULL),
(42, 'dev2', '0000-00-00', '0000-00-00', 'Aprovada', 2, 5, '00:00:00', '09:00:00', '121212', '09090', 'uyu', 'kjk', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `sala`
--

CREATE TABLE `sala` (
  `numero_sala` int NOT NULL,
  `capacidade` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `matricula` varchar(15) NOT NULL,
  `nome_completo` varchar(100) NOT NULL,
  `CPF` varchar(15) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `bairro` varchar(30) NOT NULL,
  `numero` int NOT NULL,
  `senha` varchar(255) NOT NULL,
  `foto_perfil` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`matricula`, `nome_completo`, `CPF`, `endereco`, `bairro`, `numero`, `senha`, `foto_perfil`) VALUES
('2024214tads0002', 'Letycia Vilany Pereira de Sousa', '055.255.883-40', 'presidente dutra', 'centro', 280, '123', '../uploads/672e7d4f63b38-13681073193056349559.gif'),
('dev', 'Jorge Onfroy', '', 'Rua X', 'centro', 55, 'ifpi', NULL),
('dev2', 'Jorge Onfroy', '121212', 'meio', 'rrrrrrrr', 11, 'ifpi', '../uploads/6727c9cb05dcb-image-removebg-preview (5).png');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `adm`
--
ALTER TABLE `adm`
  ADD PRIMARY KEY (`id_adm`);

--
-- Índices de tabela `biomas_info`
--
ALTER TABLE `biomas_info`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`ID_reserva`),
  ADD KEY `idx_matricula_sala_data_hora` (`matricula`,`numero_sala`,`data_reserva`,`horario_inicio`);

--
-- Índices de tabela `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`numero_sala`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`matricula`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `adm`
--
ALTER TABLE `adm`
  MODIFY `id_adm` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `biomas_info`
--
ALTER TABLE `biomas_info`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `reserva`
--
ALTER TABLE `reserva`
  MODIFY `ID_reserva` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
