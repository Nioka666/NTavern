-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2023 at 02:31 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `nama` varchar(50) NOT NULL,
  `id` int(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`nama`, `id`, `username`, `password`) VALUES
('Administrator', 1, 'admin', 'admin'),
('Adhim Niokagi', 2, 'Nioka666', 'nioka38'),
('Caswini', 3, 'Winnie', 'winniecantik'),
('Alpha', 4, 'Alpha3', '12345678'),
('Asa Meitaka', 5, 'AsaMeitaka', '666'),
('Sigma', 6, 'Sigma male', 'sigma111'),
('Vladillena Milize', 7, 'BloodyReina', '111111111'),
('Makima', 8, 'Makima666', 'makima666'),
('Nino', 9, 'Nino33', 'nino325'),
('Aldi Frankenstein', 10, 'AldF', 'aldifrx'),
('Nicho eriksen', 11, 'thenike', '121111okok');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `name` varchar(100) NOT NULL,
  `id_menu` int(10) NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `category` enum('dessert','maincourse') NOT NULL,
  `gambar_menu` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`name`, `id_menu`, `price`, `image`, `category`, `gambar_menu`) VALUES
('Ratatouille', 24, '12.99', 'Ratatouille.jpg', 'maincourse', 'b2.jpg'),
('Confit de Canard', 25, '10.99', 'Confit de Canard.jpg', 'maincourse', NULL),
('Bouillabaisse', 26, '12.49', 'Bouillabaisse.jpg', 'maincourse', NULL),
('Langue de Boeuf', 28, '15.00', 'Langue de Boeuf.jpeg', 'maincourse', NULL),
('Cassoulet', 30, '11.38', 'Cassoulet.jpeg', 'maincourse', NULL),
('Coq Au Vin', 31, '12.00', 'Coq Au Vin.jpeg', 'maincourse', NULL),
('Creme Brulee', 32, '3.99', 'Creme Brulee.jpeg', 'dessert', NULL),
('Croissant', 33, '4.99', 'croissant.jpg', 'dessert', NULL),
('Creepes', 34, '2.55', 'Creepes.jpeg', 'dessert', NULL),
('Pain Au Chocolate', 35, '2.09', 'Pain Au Chocolate.jpeg', 'dessert', NULL),
('Tarte Tatin', 36, '6.99', 'Tarte Tatin.jpeg', 'dessert', NULL),
('Macaroon', 37, '3.99', 'Macron.jpg', 'dessert', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`) USING BTREE;

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
