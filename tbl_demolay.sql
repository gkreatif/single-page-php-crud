-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 14-Fev-2018 às 17:08
-- Versão do servidor: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_demolay`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_demolay`
--

CREATE TABLE `tbl_demolay` (
  `dem_id` int(11) NOT NULL,
  `dem_cid` int(30) NOT NULL,
  `dem_nome` varchar(100) NOT NULL,
  `dem_email` varchar(200) NOT NULL,
  `dem_estado` varchar(100) NOT NULL,
  `dem_cidade` varchar(100) NOT NULL,
  `dem_capitulo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbl_demolay`
--

INSERT INTO `tbl_demolay` (`dem_id`, `dem_cid`, `dem_nome`, `dem_email`, `dem_estado`, `dem_cidade`, `dem_capitulo`) VALUES
(1, 103339, 'Guilherme', 'gui.gui.guilhermec@hotmail.com', 'SP', 'Pindamonhangaba', 'Luzes do Futuro'),
(2, 12122247, 'Joaozinho', 'jaozinho@hotmail.com', 'CE', 'Pederneiras', 'Defensores de Pederneiras'),
(10, 19009, 'aleori', 'aveolo@hotmail.com', 'MT', 'DAondebixo', 'Kaloi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_demolay`
--
ALTER TABLE `tbl_demolay`
  ADD PRIMARY KEY (`dem_id`),
  ADD UNIQUE KEY `dem_cid` (`dem_cid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_demolay`
--
ALTER TABLE `tbl_demolay`
  MODIFY `dem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
