-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 22-Set-2017 às 01:16
-- Versão do servidor: 10.1.26-MariaDB
-- PHP Version: 7.1.9

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
DROP TABLE `estoque`;
CREATE DATABASE `estoque` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
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
(9, 'zÃ©', 'ze@gmail.com', '123123123123'),
(10, 'Joel Santana', 'joel@gmail.com', '3129999112'),
(11, 'Steve ', 'steve@gmail.com', '99988844456'),
(12, 'Monica', 'monica@gmail.com', '6633224478');

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
(1, 'Notebook RF411', 'Samsung', 1600, 12),
(2, 'Mouse Naga', 'Razer', 384.44, 12),
(3, 'Headset', 'razer', 699.9, 20),
(4, 'Cabo de rede 10m', 'Local', 31.9, 200),
(5, 'PC Master Race 3000', 'Positivo', 3200, 5),
(6, 'Skol Lata', 'Skol', 2.85, 3),
(7, 'Chiclete', 'Babbaloo', 0.5, 3000);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `ID` int(11) NOT NULL,
  `USUARIO` varchar(250) DEFAULT NULL,
  `EMAIL` varchar(250) NOT NULL,
  `SENHA` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`ID`, `USUARIO`, `EMAIL`, `SENHA`) VALUES
(1, 'admin', 'admin@admin.com', '$1$lvqZbHjM$EOVSB607IGo.ULTi.7jqS.'),
(2, 'brunno', 'brunnokick@gmail.com', '$1$ExiX/s4o$wEtxoRTgsY2cmyYMTyKBy.'),
(3, 'vader', 'vader@gmail.com', '$1$jQ8WxeFJ$UWMbeQ6sSfeXVpoaEU75X0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda`
--

CREATE TABLE `venda` (
  `ID` int(11) NOT NULL,
  `CLIENTE_ID` int(11) NOT NULL,
  `PRODUTO_ID` int(11) NOT NULL,
  `QTDE` int(11) NOT NULL,
  `TOTAL` decimal(10,2) NOT NULL,
  `USUARIO_ID` int(11) NOT NULL,
  `VALOR` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `venda`
--

INSERT INTO `venda` (`ID`, `CLIENTE_ID`, `PRODUTO_ID`, `QTDE`, `TOTAL`, `USUARIO_ID`, `VALOR`) VALUES
(2, 9, 1, 3, '6000.00', 2, '2000.00'),
(3, 9, 2, 1, '380.00', 2, '380.00'),
(5, 9, 5, 1, '3200.00', 2, '3200.00'),
(6, 10, 4, 3, '95.70', 1, '31.90'),
(7, 10, 1, 3, '4800.00', 1, '1600.00'),
(8, 9, 2, 5, '1922.20', 1, '384.44'),
(9, 9, 1, 7, '11200.00', 1, '1600.00'),
(10, 10, 6, 20, '57.00', 1, '2.85'),
(11, 11, 6, 2, '5.70', 1, '2.85'),
(12, 11, 6, 2, '5.70', 1, '2.85'),
(13, 11, 2, 4, '1537.76', 1, '384.44'),
(14, 11, 2, 4, '1537.76', 1, '384.44'),
(15, 11, 2, 4, '1537.76', 1, '384.44'),
(16, 11, 3, 5, '3499.50', 1, '699.90'),
(17, 10, 4, 5, '159.50', 1, '31.90'),
(18, 12, 7, 121, '60.50', 3, '0.50'),
(19, 11, 3, 3, '2099.70', 3, '699.90'),
(20, 10, 6, 10, '28.50', 3, '2.85');

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
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_USUARIO` (`USUARIO_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `venda`
--
ALTER TABLE `venda`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `venda`
--
ALTER TABLE `venda`
  ADD CONSTRAINT `FK_USUARIO` FOREIGN KEY (`USUARIO_ID`) REFERENCES `usuario` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
