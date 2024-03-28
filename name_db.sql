-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 28, 2024 at 06:41 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `name_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `name_tbl`
--

CREATE TABLE `name_tbl` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `age` int(11) NOT NULL,
  `phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `name_tbl`
--

INSERT INTO `name_tbl` (`id`, `name`, `age`, `phone`) VALUES
(12, 'REbaz', 0, '55555'),
(15, 'Shirin', 19, '777'),
(17, 'rebaz', 43, '232312'),
(19, 'Berivan', 20, '223445'),
(20, 'Baran', 19, '07701112222333'),
(22, 'Dosti', 23, '07232323'),
(23, 'Mirko', 22, '07232323'),
(24, 'Kosar', 22, '02382323'),
(28, 'Rolan R', 20, '07749011111222'),
(32, 'Smokewhite', 23, '232323'),
(33, 'Best', 2323, '23234234234'),
(34, 'jjssd', 23, '23232323'),
(35, 'shoot', 23, '23424334234'),
(36, 'host', 23, '2323232'),
(38, 'Delta', 23, '5454334'),
(39, 'name', 23, '232323');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `name_tbl`
--
ALTER TABLE `name_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `name_tbl`
--
ALTER TABLE `name_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
