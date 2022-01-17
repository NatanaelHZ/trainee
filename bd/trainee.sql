-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Jan-2022 às 00:26
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `trainee`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `codigo` int(10) UNSIGNED NOT NULL,
  `nome` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Categorias: receitas e despesas';

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`codigo`, `nome`, `tipo`) VALUES
(1, 'Outras Despesas', 'D'),
(2, 'Outras Receitas', 'R'),
(3, 'Compras', 'D'),
(4, 'Venda de Roupas', 'R'),
(5, 'Roupas', 'D');

-- --------------------------------------------------------

--
-- Estrutura da tabela `financas`
--

CREATE TABLE `financas` (
  `codigo` int(10) UNSIGNED NOT NULL,
  `descricao` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` date NOT NULL,
  `valor` decimal(15,2) NOT NULL,
  `codigo_categoria` int(11) NOT NULL,
  `data_insercao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `financas`
--

INSERT INTO `financas` (`codigo`, `descricao`, `data`, `valor`, `codigo_categoria`, `data_insercao`) VALUES
(1, 'Compras mercado', '2022-01-15', '100.00', 1, '2022-01-16 02:55:48'),
(2, 'Venda Camisa Azul', '2022-01-16', '50.00', 2, '2022-01-16 02:55:48'),
(29, 'Mercado', '2022-01-31', '2342.00', 3, '2022-01-16 02:55:48'),
(31, 'Roupas', '2022-01-26', '700.00', 1, '2022-01-16 02:55:48'),
(36, 'Teste', '2022-01-16', '150.00', 1, '2022-01-16 19:29:48'),
(37, 'Sorvete', '2022-01-25', '25.00', 1, '2022-01-16 21:38:16'),
(38, 'Seguro', '2022-01-17', '2300.88', 1, '2022-01-16 21:39:17'),
(39, 'Jantar', '2022-02-01', '150.00', 1, '2022-01-16 22:36:17'),
(40, 'Aluguel', '2022-02-17', '1500.00', 1, '2022-01-16 23:19:49'),
(41, 'Aluguel', '2022-03-02', '1500.00', 1, '2022-01-16 23:20:11'),
(42, 'Aluguel', '2022-04-02', '1500.00', 1, '2022-01-16 23:24:47');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `codigo` int(10) UNSIGNED NOT NULL,
  `nome` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`codigo`, `nome`, `email`, `senha`) VALUES
(1, 'Trainee Gamatec', 'teste@mail.com', '$2y$10$VRsB/EOftr/Nt65m4OVxlutifC4gx5dSREMSUaNEAJHHZPOIO7YJS');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices para tabela `financas`
--
ALTER TABLE `financas`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`codigo`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `codigo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `financas`
--
ALTER TABLE `financas`
  MODIFY `codigo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `codigo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
