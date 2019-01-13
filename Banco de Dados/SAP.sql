-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 13/01/2019 às 18:24
-- Versão do servidor: 5.7.20-0ubuntu0.16.04.1
-- Versão do PHP: 7.0.26-2+ubuntu16.04.1+deb.sury.org+2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `SAP`
--
CREATE DATABASE IF NOT EXISTS `SAP` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `SAP`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE `clientes` (
  `cli_id` int(11) NOT NULL,
  `cli_nome` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cli_endereco` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cli_email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cli_telefone` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cli_celular` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cli_estado` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cli_cidade` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionarios`
--

DROP TABLE IF EXISTS `funcionarios`;
CREATE TABLE `funcionarios` (
  `func_id` int(11) NOT NULL,
  `func_nome` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `func_senha` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `func_setor` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Fazendo dump de dados para tabela `funcionarios`
--

INSERT INTO `funcionarios` (`func_id`, `func_nome`, `func_senha`, `func_setor`) VALUES
(1, 'clovis', '333', 'dados'),
(2, 'clovis', 'ccc', 'dados'),
(3, 'flavio', '123', 'dados'),
(4, 'otilio', '45', 'secretaria'),
(6, 'atilio', 'rrr', 'dfd'),
(8, 'gustavo', '333', 'suporte'),
(10, 'gibertosilva', 'bbb', 'biblioteca'),
(12, 'paulo', 'vv', '23'),
(13, 'vera', 'jj', 'dd'),
(14, 'alex', 'bbb', 'ddd'),
(21, 'monique', 'ccc', 'gegt'),
(22, 'beltrao', 'vvv', 'rregre'),
(25, 'ezio', 'vvv', 'rfttg'),
(26, 'viola', 'hh', '4trete'),
(27, 'periquito', 'www', 'hj');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE `produtos` (
  `prod_id` int(11) NOT NULL,
  `prod_nome` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_valor` decimal(5,0) NOT NULL,
  `prod_qtde` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `vendas`
--

DROP TABLE IF EXISTS `vendas`;
CREATE TABLE `vendas` (
  `venda_id` int(11) NOT NULL,
  `venda_produto` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `venda_cliente` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `venda_data` datetime NOT NULL,
  `venda_qtde` int(11) NOT NULL,
  `venda_pago` enum('NAO','SIM','PENDENTE') COLLATE utf8mb4_unicode_ci NOT NULL,
  `venda_recebido` enum('NAO','SIM','PENDENTE') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`cli_id`),
  ADD KEY `cli_nome` (`cli_nome`);

--
-- Índices de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`func_id`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`prod_id`);

--
-- Índices de tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`venda_id`),
  ADD KEY `venda_cliente` (`venda_cliente`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `cli_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `func_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `venda_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `vendas`
--
ALTER TABLE `vendas`
  ADD CONSTRAINT `fk_vendas_cliente` FOREIGN KEY (`venda_cliente`) REFERENCES `clientes` (`cli_nome`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
