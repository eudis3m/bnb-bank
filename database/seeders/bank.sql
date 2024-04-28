-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 22/04/2024 às 15:09
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
-- Banco de dados: `laravel`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `bank`
--

CREATE TABLE `laravel.bank` (
  `customerId` int(11) NOT NULL,
  `customerName` varchar(3000) NOT NULL,
  `customerPin` int(11) NOT NULL,
  `customerAccountType` varchar(3000) NOT NULL,
  `customerAccountNo` int(11) NOT NULL,
  `customerAccountBalance` varchar(3000) NOT NULL,
  `customerAadhar"` int(11) NOT NULL,
  `customerPan` int(11) NOT NULL,
  `customerContac` int(11) NOT NULL,
  `customerEmail` varchar(3000) NOT NULL,
  `transactionId"` int(11) NOT NULL,
  `transactionDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `transactionAmount` int(11) NOT NULL,
  `transactionType` varchar(3000) NOT NULL
) ;

--
-- Despejando dados para a tabela `bank`
--

INSERT INTO `bank` (`customerId`, `customerName`, `customerPin`, `customerAccountType`, `customerAccountNo`, `customerAccountBalance`, `customerAadhar"`, `customerPan`, `customerContac`, `customerEmail`, `transactionId"`, `transactionDate`, `transactionAmount`, `transactionType`) VALUES
(1234, 'Raju', 9899, 'savings', 8765678, '12,450', 12345678, 12345678, 123456789, 'raju@email.com', 1466, '2023-02-12 13:05:45', 5500, 'debit'),
(1235, 'Raju', 9899, 'savings', 8765678, '12,450', 12345678, 12345678, 123456789, 'raju@email.com', 1466, '2023-02-12 13:05:45', 5500, 'debit');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`customerId`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `bank`
--
ALTER TABLE `bank`
  MODIFY `customerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1236;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
