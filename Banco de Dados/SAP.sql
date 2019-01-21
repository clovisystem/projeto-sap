-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 21/01/2019 às 16:12
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
CREATE TABLE IF NOT EXISTS `clientes` (
  `cli_id` int(11) NOT NULL AUTO_INCREMENT,
  `cli_nome` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cli_endereco` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cli_email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cli_telefone` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cli_celular` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cli_estado` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cli_cidade` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`cli_id`),
  KEY `cli_nome` (`cli_nome`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionarios`
--

DROP TABLE IF EXISTS `funcionarios`;
CREATE TABLE IF NOT EXISTS `funcionarios` (
  `func_id` int(11) NOT NULL AUTO_INCREMENT,
  `func_nome` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `func_senha` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `func_setor` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`func_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Fazendo dump de dados para tabela `funcionarios`
--

INSERT INTO `funcionarios` (`func_id`, `func_nome`, `func_senha`, `func_setor`) VALUES(1, 'clovis', '333', 'dados');
INSERT INTO `funcionarios` (`func_id`, `func_nome`, `func_senha`, `func_setor`) VALUES(2, 'clovis', 'ccc', 'dados');
INSERT INTO `funcionarios` (`func_id`, `func_nome`, `func_senha`, `func_setor`) VALUES(3, 'flavio', '123', 'dados');
INSERT INTO `funcionarios` (`func_id`, `func_nome`, `func_senha`, `func_setor`) VALUES(4, 'otilio', '45', 'secretaria');
INSERT INTO `funcionarios` (`func_id`, `func_nome`, `func_senha`, `func_setor`) VALUES(6, 'atilio', 'rrr', 'dfd');
INSERT INTO `funcionarios` (`func_id`, `func_nome`, `func_senha`, `func_setor`) VALUES(8, 'gustavo', '333', 'suporte');
INSERT INTO `funcionarios` (`func_id`, `func_nome`, `func_senha`, `func_setor`) VALUES(10, 'gibertosilva', 'bbb', 'biblioteca');
INSERT INTO `funcionarios` (`func_id`, `func_nome`, `func_senha`, `func_setor`) VALUES(12, 'paulo', 'vv', '23');
INSERT INTO `funcionarios` (`func_id`, `func_nome`, `func_senha`, `func_setor`) VALUES(13, 'vera', 'jj', 'dd');
INSERT INTO `funcionarios` (`func_id`, `func_nome`, `func_senha`, `func_setor`) VALUES(14, 'alex', 'bbb', 'ddd');
INSERT INTO `funcionarios` (`func_id`, `func_nome`, `func_senha`, `func_setor`) VALUES(21, 'monique', 'ccc', 'gegt');
INSERT INTO `funcionarios` (`func_id`, `func_nome`, `func_senha`, `func_setor`) VALUES(22, 'beltrao', 'vvv', 'rregre');
INSERT INTO `funcionarios` (`func_id`, `func_nome`, `func_senha`, `func_setor`) VALUES(25, 'ezio', 'vvv', 'rfttg');
INSERT INTO `funcionarios` (`func_id`, `func_nome`, `func_senha`, `func_setor`) VALUES(26, 'viola', 'hh', '4trete');
INSERT INTO `funcionarios` (`func_id`, `func_nome`, `func_senha`, `func_setor`) VALUES(27, 'periquito', 'www', 'hj');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE IF NOT EXISTS `produtos` (
  `prod_id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_nome` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_valor` float(6,2) NOT NULL,
  `prod_qtde` int(6) NOT NULL,
  PRIMARY KEY (`prod_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Fazendo dump de dados para tabela `produtos`
--

INSERT INTO `produtos` (`prod_id`, `prod_nome`, `prod_valor`, `prod_qtde`) VALUES(1, 'livro', 30.00, 4);
INSERT INTO `produtos` (`prod_id`, `prod_nome`, `prod_valor`, `prod_qtde`) VALUES(3, 'livro de culinaria', 30.00, 3);
INSERT INTO `produtos` (`prod_id`, `prod_nome`, `prod_valor`, `prod_qtde`) VALUES(6, 'livro de pdf', 65.00, 4);
INSERT INTO `produtos` (`prod_id`, `prod_nome`, `prod_valor`, `prod_qtde`) VALUES(7, 'coletanea', 35.00, 43);
INSERT INTO `produtos` (`prod_id`, `prod_nome`, `prod_valor`, `prod_qtde`) VALUES(13, 'biblia', 56.00, 6);
INSERT INTO `produtos` (`prod_id`, `prod_nome`, `prod_valor`, `prod_qtde`) VALUES(14, 'apostila', 34.00, 2);
INSERT INTO `produtos` (`prod_id`, `prod_nome`, `prod_valor`, `prod_qtde`) VALUES(23, 'coletania datascience 7', 123.00, 3);
INSERT INTO `produtos` (`prod_id`, `prod_nome`, `prod_valor`, `prod_qtde`) VALUES(24, 'coletania data science3', 1253.01, 21);

-- --------------------------------------------------------

--
-- Estrutura para tabela `vendas`
--

DROP TABLE IF EXISTS `vendas`;
CREATE TABLE IF NOT EXISTS `vendas` (
  `venda_id` int(11) NOT NULL AUTO_INCREMENT,
  `venda_produto` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `venda_cliente` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `venda_data` datetime NOT NULL,
  `venda_qtde` int(11) NOT NULL,
  `venda_pago` enum('NAO','SIM','PENDENTE') COLLATE utf8mb4_unicode_ci NOT NULL,
  `venda_recebido` enum('NAO','SIM','PENDENTE') COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`venda_id`),
  KEY `venda_cliente` (`venda_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
