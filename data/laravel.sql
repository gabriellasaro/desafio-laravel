-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 30/04/2020 às 18:57
-- Versão do servidor: 8.0.19-0ubuntu5
-- Versão do PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `laravel`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `collection`
--

CREATE TABLE `collection` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `release_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `collection`
--

INSERT INTO `collection` (`id`, `name`, `description`, `release_date`) VALUES
(1, 'Primavera/Verão 2020', 'O melhor da moda.', '2020-09-22'),
(4, 'Outono/Inverno 2021', 'O melhor da moda.', '2021-03-20');

-- --------------------------------------------------------

--
-- Estrutura para tabela `model`
--

CREATE TABLE `model` (
  `id` int UNSIGNED NOT NULL,
  `collection_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `quant` int NOT NULL,
  `img` text NOT NULL,
  `code` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `model`
--

INSERT INTO `model` (`id`, `collection_id`, `name`, `description`, `quant`, `img`, `code`) VALUES
(1, 1, 'Camisa Spring I', 'Camisa...', 10000, 'camisa.png', 'ca-sp1'),
(2, 1, 'Camisa Summer I', 'Camisa...', 10000, 'camisa.png', 'ca-su1'),
(3, 4, 'Camisa Outono I', 'Camisa...', 5000, 'camisa.png', 'ca-ou1'),
(4, 4, 'Camisa Inverno I', 'Camisa...', 3000, 'camisa.png', 'ca-in1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `process`
--

CREATE TABLE `process` (
  `id` int UNSIGNED NOT NULL,
  `task_id` int NOT NULL,
  `user_id` int NOT NULL,
  `model_id` int NOT NULL,
  `quant` int UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `process`
--

INSERT INTO `process` (`id`, `task_id`, `user_id`, `model_id`, `quant`) VALUES
(1, 3, 1, 1, 0),
(2, 3, 1, 2, 0),
(3, 3, 1, 3, 0),
(4, 3, 1, 4, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `session`
--

CREATE TABLE `session` (
  `id` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `user_id` int NOT NULL,
  `register` bigint NOT NULL,
  `last_change` bigint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `session`
--

INSERT INTO `session` (`id`, `user_id`, `register`, `last_change`) VALUES
('1b521ef60e9bc5d8be617bdc5116c5de3a7dc2a6d678f11917dc8cb549df7e52', 1, 1588272739, 1588272813),
('7172f9ac8b679be7bc91f686bb5be57101cf1fb3a05f3475f43b7f567cd4e640', 1, 1588272458, 1588272635);

-- --------------------------------------------------------

--
-- Estrutura para tabela `task`
--

CREATE TABLE `task` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(120) NOT NULL,
  `description` varchar(255) NOT NULL,
  `average_time` float NOT NULL,
  `cost` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `task`
--

INSERT INTO `task` (`id`, `name`, `description`, `average_time`, `cost`) VALUES
(1, 'Lavagem/Secagem I', 'O tecido é lavado antes de iniciar a costura para obter o tamanho real da peça final', 7, 0.9),
(2, 'Corte', 'O tecido é cortado nos moldes enviados pela fábrica matriz', 3, 1.2),
(3, 'Costura base', 'O tecido cortado é costurado, resultando na base da peça', 5, 5),
(4, 'Estampagem', 'A Estampa é aplicada na peça', 10, 2.9),
(5, 'Etiquetagem', 'As etiquetas da empresa são costuradas na peça', 1.1, 0.5),
(6, 'Lavagem/Secagem II', 'A peça é lavada após a confecção para ser embalada', 7, 1.1),
(7, 'Embalagem', 'A peça é embalada e está pronta para a distribuição nas lojas', 1, 0.3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `company` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `cnpj` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `pass` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(20) NOT NULL,
  `responsible` varchar(120) NOT NULL,
  `register` bigint NOT NULL,
  `task_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `user`
--

INSERT INTO `user` (`id`, `name`, `company`, `cnpj`, `pass`, `address`, `phone`, `responsible`, `register`, `task_id`) VALUES
(1, 'Laravel', 'Laravel LTDA', '73.520.256/0001-01', '$2y$10$8/RHraPQ3MCrdgJfIS43jub4oLuG1AbV9Uisa7wVzapZzE6aa1ORG', 'Colatina, Espírito Santo, Brasil', '(27) 9810-60165', 'Gabriel', 1588187643, 3);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `collection`
--
ALTER TABLE `collection`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Índices de tabela `process`
--
ALTER TABLE `process`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `CNPJ` (`cnpj`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `collection`
--
ALTER TABLE `collection`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `model`
--
ALTER TABLE `model`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `process`
--
ALTER TABLE `process`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `task`
--
ALTER TABLE `task`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
