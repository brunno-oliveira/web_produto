-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 07-Set-2017 às 01:09
-- Versão do servidor: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `estoque`
--
CREATE DATABASE IF NOT EXISTS `estoque` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `estoque`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `ID` int(11) NOT NULL,
  `NOME` varchar(250) NOT NULL,
  `EMAIL` varchar(250) NOT NULL,
  `CPF` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`ID`, `NOME`, `EMAIL`, `CPF`) VALUES
(1, 'Brunno', 'brunno@gmail.com', '12332145912'),
(2, 'Joao', 'joao@hotmail.com', '54654756454');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `ID` int(11) NOT NULL,
  `NOME` varchar(250) NOT NULL,
  `MARCA` varchar(250) NOT NULL,
  `VALOR` double NOT NULL,
  `QUANTIDADE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`ID`, `NOME`, `MARCA`, `VALOR`, `QUANTIDADE`) VALUES
(1, 'Fanta uva lata', 'Coca-cola', 2.46, 4),
(3, 'Fanta Laranja 2l', 'COCA-COLA', 6.99, 10),
(6, 'Skol Lata', 'Skol', 3.5, 2),
(7, 'Coxinha', 'ChinÃªs', 1, 9999),
(8, 'Cabo de rede', 'cisco', 20, 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda`
--

CREATE TABLE `venda` (
  `ID` int(11) NOT NULL,
  `CLIENTE_ID` int(11) NOT NULL,
  `PRODUTO_ID` int(11) NOT NULL,
  `QTDE` int(11) NOT NULL,
  `TOTAL` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `venda`
--

INSERT INTO `venda` (`ID`, `CLIENTE_ID`, `PRODUTO_ID`, `QTDE`, `TOTAL`) VALUES
(2, 1, 7, 2, '2.00'),
(3, 1, 3, 4, '27.96'),
(4, 2, 6, 10, '35.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`),
  ADD KEY `CLIENTE_ID` (`CLIENTE_ID`),
  ADD KEY `PRODUTO_ID` (`PRODUTO_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `venda`
--
ALTER TABLE `venda`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `venda`
--
ALTER TABLE `venda`
  ADD CONSTRAINT `venda_ibfk_1` FOREIGN KEY (`CLIENTE_ID`) REFERENCES `cliente` (`ID`),
  ADD CONSTRAINT `venda_ibfk_2` FOREIGN KEY (`PRODUTO_ID`) REFERENCES `produto` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
