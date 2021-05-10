-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 07-Dez-2018 às 22:36
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
-- Database: `tcc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `contarecebimento`
--

CREATE TABLE `contarecebimento` (
  `id` int(6) NOT NULL,
  `vencimento` date NOT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `valor` decimal(10,2) NOT NULL,
  `categoria` varchar(16) DEFAULT NULL,
  `crtdate` date NOT NULL,
  `status` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `contarecebimento`
--

INSERT INTO `contarecebimento` (`id`, `vencimento`, `descricao`, `valor`, `categoria`, `crtdate`, `status`) VALUES
(47, '2018-11-28', '[2398] PDV, DINHEIRO', '80.00', 'PDV', '2018-12-07', 'true'),
(48, '2018-11-28', '[2399] PDV, CRÉDITO', '80.00', 'PDV', '2018-12-07', 'true'),
(49, '2018-11-28', '[2400] PDV, VOUCHER', '80.00', 'PDV', '2018-12-07', 'true'),
(50, '2018-11-29', '[2401] PDV, DÉBITO', '80.00', 'PDV', '2018-12-07', 'true'),
(51, '2018-11-29', '[2402] PDV, DÉBITO', '100.00', 'PDV', '2018-12-07', 'true'),
(52, '2018-11-29', '[2403] PDV, DINHEIRO', '80.00', 'PDV', '2018-12-07', 'true'),
(53, '2018-11-29', '[2404] PDV, DÉBITO', '100.00', 'PDV', '2018-12-07', 'true'),
(54, '2018-11-30', '[2405] PDV, VOUCHER', '80.00', 'PDV', '2018-12-07', 'true'),
(55, '2018-11-30', '[2406] PDV, CRÉDITO', '80.00', 'PDV', '2018-12-07', 'true'),
(56, '2018-11-30', '[2407] PDV, DINHEIRO', '80.00', 'PDV', '2018-12-07', 'true'),
(57, '2018-11-30', '[2408] PDV, CRÉDITO', '80.00', 'PDV', '2018-12-07', 'true'),
(58, '2018-11-30', '[2409] PDV, DINHEIRO', '80.00', 'PDV', '2018-12-07', 'true'),
(59, '2018-12-01', '[2410] PDV, CRÉDITO', '80.00', 'PDV', '2018-12-07', 'true'),
(60, '2018-12-01', '[2411] PDV, DINHEIRO', '80.00', 'PDV', '2018-12-07', 'true'),
(61, '2018-12-01', '[2412] PDV, CRÉDITO', '80.00', 'PDV', '2018-12-07', 'true'),
(62, '2018-12-01', '[2413] PDV, DINHEIRO', '300.00', 'PDV', '2018-12-07', 'true'),
(63, '2018-12-03', '[2414] PDV, VOUCHER', '300.00', 'PDV', '2018-12-07', 'true'),
(64, '2018-12-03', '[2415] PDV, DÉBITO', '300.00', 'PDV', '2018-12-07', 'true'),
(65, '2018-12-03', '[2416] PDV, DINHEIRO', '80.00', 'PDV', '2018-12-07', 'true'),
(66, '2018-12-04', '[2417] PDV, DÉBITO', '80.00', 'PDV', '2018-12-07', 'true'),
(67, '2018-12-04', '[2418] PDV, DINHEIRO', '80.00', 'PDV', '2018-12-07', 'true'),
(68, '2018-12-04', '[2419] PDV, CRÉDITO', '80.00', 'PDV', '2018-12-07', 'true'),
(69, '2018-12-04', '[2420] PDV, VOUCHER', '80.00', 'PDV', '2018-12-07', 'true'),
(70, '2018-12-05', '[2421] PDV, DÉBITO', '80.00', 'PDV', '2018-12-07', 'true'),
(71, '2018-12-05', '[2422] PDV, DÉBITO', '80.00', 'PDV', '2018-12-07', 'true'),
(72, '2018-12-05', '[2423] PDV, DINHEIRO', '80.00', 'PDV', '2018-12-07', 'true'),
(73, '2018-12-05', '[2424] PDV, CRÉDITO', '80.00', 'PDV', '2018-12-07', 'true'),
(74, '2018-12-06', '[2425] PDV, CRÉDITO', '80.00', 'PDV', '2018-12-07', 'true'),
(75, '2018-12-06', '[2426] PDV, DINHEIRO', '80.00', 'PDV', '2018-12-07', 'true');

-- --------------------------------------------------------

--
-- Estrutura da tabela `despesa`
--

CREATE TABLE `despesa` (
  `id` int(6) NOT NULL,
  `vencimento` date NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `categoria` varchar(16) NOT NULL,
  `crtdate` date NOT NULL,
  `status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `despesa`
--

INSERT INTO `despesa` (`id`, `vencimento`, `descricao`, `valor`, `categoria`, `crtdate`, `status`) VALUES
(13, '2018-11-29', 'Almoço Funcionário', '13.00', 'Refeições', '2018-12-07', 'true'),
(14, '2018-11-30', 'Almoço Funcionário', '13.00', 'Refeições', '2018-12-07', 'true'),
(15, '2018-12-01', 'Almoço Funcionário', '13.00', 'Refeições', '2018-12-07', 'true'),
(16, '2018-12-02', 'Almoço Funcionário', '13.00', 'Refeições', '2018-12-07', 'true'),
(17, '2018-12-03', 'Almoço Funcionário', '13.00', 'Refeições', '2018-12-07', 'true'),
(18, '2018-12-04', 'Almoço Funcionário', '13.00', 'Refeições', '2018-12-07', 'true'),
(19, '2018-12-05', 'Almoço Funcionário', '13.00', 'Refeições', '2018-12-07', 'true'),
(20, '2018-12-06', 'Almoço Funcionário', '13.00', 'Refeições', '2018-12-07', 'true'),
(21, '2018-11-29', 'Pedágio', '18.20', 'Refeições', '2018-12-07', 'true'),
(22, '2018-11-30', 'Pedágio', '18.20', 'Refeições', '2018-12-07', 'true'),
(23, '2018-12-01', 'Pedágio', '18.20', 'Refeições', '2018-12-07', 'true'),
(24, '2018-12-02', 'Pedágio', '18.20', 'Refeições', '2018-12-07', 'true'),
(25, '2018-12-03', 'Pedágio', '18.20', 'Refeições', '2018-12-07', 'true'),
(26, '2018-12-04', 'Pedágio', '18.20', 'Refeições', '2018-12-07', 'true'),
(27, '2018-12-05', 'Pedágio', '18.20', 'Refeições', '2018-12-07', 'true'),
(28, '2018-12-06', 'Pedágio', '18.20', 'Refeições', '2018-12-07', 'true'),
(29, '2018-12-05', 'VIVO REF', '213.45', 'Internet', '2018-12-07', 'true'),
(30, '2018-12-05', 'SANASA REF', '163.42', 'Água', '2018-12-07', 'true'),
(31, '2018-12-05', 'CFPL REF', '221.42', 'Luz', '2018-12-07', 'true'),
(32, '2018-12-15', 'Aluguel Unidade Mascarenhas', '2931.56', 'Aluguel', '2018-12-07', 'false');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `nome_usuario` varchar(20) NOT NULL,
  `login` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `id` int(3) NOT NULL,
  `perm` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`nome_usuario`, `login`, `password`, `id`, `perm`) VALUES
('Guilherme Estevam', 'Guilherme', '1174beaa3dcbfe0cb00b6d16bf65a12c', 13, 'true'),
('Asafe Toschi', 'admin', '21232f297a57a5a743894a0e4a801fc3', 17, 'true'),
('Emily', 'emily', '3216a63dfaaaa55b68a0ec8ccf337cb1', 22, 'false');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contarecebimento`
--
ALTER TABLE `contarecebimento`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `despesa`
--
ALTER TABLE `despesa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contarecebimento`
--
ALTER TABLE `contarecebimento`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT for table `despesa`
--
ALTER TABLE `despesa`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
