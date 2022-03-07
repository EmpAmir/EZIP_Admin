-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 01, 2022 at 06:59 AM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `armentum_2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(255) NOT NULL,
  `admin_id` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_name`, `admin_id`, `admin_pass`) VALUES
(1, 'Empire Admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `usdt_rate` float NOT NULL,
  `usdt_total` bigint NOT NULL,
  `inr_total` bigint NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `usdt_rate`, `usdt_total`, `inr_total`, `order_date`) VALUES
(11, 'amir1', 75.85, 2500, 25000, '2022-02-28 15:38:34'),
(15, 'amir1', 73.5, 1000, 520000, '2022-03-01 06:42:13'),
(16, 'amir1', 75, 1000, 520000, '2022-03-01 06:42:20');

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

DROP TABLE IF EXISTS `sale`;
CREATE TABLE IF NOT EXISTS `sale` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `inr_total` bigint NOT NULL,
  `utr` bigint NOT NULL,
  `sale_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`id`, `user_id`, `inr_total`, `utr`, `sale_date`) VALUES
(11, 'amir1', 60000, 758656124578, '2022-02-28 15:02:33'),
(15, 'amir1', 39000, 457896321545, '2022-03-01 06:26:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `userPass` varchar(255) NOT NULL,
  `mobile` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `user_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `username`, `userPass`, `mobile`, `user_date`) VALUES
(1, 'amir1', 'amir khan', '123', '8866008738', '2022-02-28 10:35:30'),
(2, 'gear2', 'Gear', '123', '1234567890', '2022-02-28 11:24:26'),
(3, 'tamjit', 'Tamjit Islam', 'password', '93328564411', '2022-02-28 18:08:47');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
