-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2020 at 01:47 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php0720e_demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `avatar` varchar(200) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `avatar`, `description`, `created_at`) VALUES
(1, 'New name', 'tivi.jpg', 'Mô tả cho tivi', '2020-10-06 12:53:42'),
(2, 'New name', 'tulanh.png', 'Mô tả cho tủ lạnh', '2020-10-06 12:53:42'),
(3, 'Tivi', 'tivi.jpg', 'Mô tả cho tivi', '2020-10-06 12:58:04'),
(4, 'Tủ lạnh', 'tulanh.png', 'Mô tả cho tủ lạnh', '2020-10-06 12:58:04'),
(5, 'Tivi', 'tivi.jpg', 'Mô tả cho tivi', '2020-10-06 12:58:04'),
(6, 'Tủ lạnh', 'tulanh.png', 'Mô tả cho tủ lạnh', '2020-10-06 12:58:04'),
(7, 'Tivi', 'tivi.jpg', 'Mô tả cho tivi', '2020-10-06 12:58:05'),
(8, 'Tủ lạnh', 'tulanh.png', 'Mô tả cho tủ lạnh', '2020-10-06 12:58:05'),
(9, 'Tivi', 'tivi.jpg', 'Mô tả cho tivi', '2020-10-06 12:58:05'),
(10, 'Tủ lạnh', 'tulanh.png', 'Mô tả cho tủ lạnh', '2020-10-06 12:58:05'),
(17, 'dsadsa', '1602163353image.jpg', 'dsadas', '2020-10-08 13:22:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
