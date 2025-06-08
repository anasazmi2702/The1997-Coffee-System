-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 08, 2025 at 11:39 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `the1997db`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `drink_name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `points_earned` int NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(20) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'PENDING'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `drink_name`, `price`, `points_earned`, `order_date`, `status`) VALUES
(1, 91, 'Vanilla\r\nLatte', '9.00', 9, '2025-01-11 06:57:08', 'PENDING'),
(2, 91, 'Kiosla\r\nAsia', '11.00', 11, '2025-01-11 06:59:58', 'PENDING'),
(3, 91, 'Kiosla\r\nAsia', '11.00', 11, '2025-01-11 07:06:20', 'PENDING'),
(4, 91, 'Pola\r\nUngu', '12.00', 12, '2025-01-11 07:06:29', 'PENDING'),
(5, 91, 'Pola\r\nUngu', '12.00', 12, '2025-01-11 07:07:01', 'PENDING'),
(6, 91, 'Pola\r\nUngu', '12.00', 12, '2025-01-11 07:07:08', 'PENDING'),
(7, 91, 'Kiosla\r\nAsia', '11.00', 11, '2025-01-11 07:09:12', 'PENDING'),
(8, 91, 'Vanilla\r\nLatte', '9.00', 9, '2025-01-11 07:09:16', 'PENDING'),
(9, 91, 'Kiosla\\nAsia', '11.00', 11, '2025-01-11 07:09:27', 'PENDING'),
(10, 91, 'Vanilla\\nLatte', '9.00', 9, '2025-01-11 07:09:27', 'PENDING'),
(11, 91, 'Kiosla\r\nAsia', '11.00', 11, '2025-01-11 07:17:05', 'PENDING'),
(12, 91, 'Pola\r\nUngu', '12.00', 12, '2025-01-11 07:17:32', 'PENDING'),
(13, 91, 'Pola\\nUngu', '12.00', 12, '2025-01-11 07:17:44', 'PENDING'),
(14, 91, 'Pola\r\nUngu', '12.00', 12, '2025-01-11 07:28:01', 'PENDING'),
(15, 91, 'Pola\r\nUngu', '12.00', 12, '2025-01-11 07:28:15', 'PENDING'),
(16, 91, 'Pola\\nUngu', '24.00', 24, '2025-01-11 07:28:35', 'PENDING'),
(17, 91, 'Kiosla\r\nAsia', '11.00', 11, '2025-01-11 07:47:03', 'PENDING'),
(18, 91, 'Kiosla\\nAsia', '11.00', 11, '2025-01-11 07:47:08', 'PENDING'),
(19, 91, 'Kiosla\r\nAsia', '11.00', 11, '2025-01-11 11:36:30', 'PENDING'),
(20, 91, 'Strawberry Lassi', '0.00', -100, '2025-01-11 11:52:49', 'REDEEMED'),
(21, 91, 'Kiosla\\nAsia', '11.00', 11, '2025-01-11 11:53:27', 'PENDING'),
(22, 91, 'Kiosla\r\nAsia', '11.00', 11, '2025-01-11 11:53:31', 'PENDING'),
(23, 91, 'Pola\r\nUngu', '12.00', 12, '2025-01-11 11:53:34', 'PENDING'),
(24, 91, 'Kiosla\\nAsia', '11.00', 11, '2025-01-11 11:53:38', 'PENDING'),
(25, 91, 'Pola\\nUngu', '12.00', 12, '2025-01-11 11:53:38', 'PENDING'),
(26, 91, 'Kiosla\r\nAsia', '11.00', 11, '2025-01-11 11:53:42', 'PENDING'),
(27, 91, 'Kiosla\\nAsia', '11.00', 11, '2025-01-11 11:53:47', 'PENDING'),
(28, 91, 'Kiosla\r\nAsia', '11.00', 11, '2025-01-11 11:53:53', 'PENDING'),
(29, 91, 'Kiosla\\nAsia', '11.00', 11, '2025-01-11 12:04:55', 'PENDING'),
(30, 91, 'Vanilla\\nLatte', '9.00', 9, '2025-01-11 12:04:55', 'PENDING'),
(31, 91, 'Strawberry Lassi', '0.00', -100, '2025-01-11 12:05:22', 'REDEEMED'),
(32, 91, 'Vanilla\\nLatte', '9.00', 9, '2025-01-11 12:26:17', 'PENDING'),
(33, 91, 'Strawberry Lassi', '0.00', -100, '2025-01-11 12:26:43', 'REDEEMED'),
(34, 91, 'Kiosla\\nAsia', '11.00', 11, '2025-01-11 12:26:57', 'PENDING'),
(35, 91, 'Kiosla\\nAsia', '11.00', 11, '2025-01-11 15:09:19', 'PENDING'),
(36, 91, 'Kiosla\\nAsia', '11.00', 11, '2025-01-11 15:44:41', 'PENDING'),
(37, 91, 'Kiosla\\nAsia', '11.00', 11, '2025-01-11 15:44:51', 'PENDING'),
(38, 91, 'Orang Kita', '0.00', -28, '2025-01-11 15:49:00', 'REDEEMED'),
(39, 91, 'Kiosla\\nAsia', '11.00', 11, '2025-01-11 19:34:02', 'PENDING'),
(40, 91, 'Vanilla Latte', '0.00', -26, '2025-01-11 19:37:30', 'REDEEMED'),
(41, 91, 'Vanilla Latte', '0.00', -26, '2025-01-14 04:20:53', 'REDEEMED'),
(42, 91, 'Secangkir\\nBersama', '33.00', 33, '2025-01-14 04:21:58', 'PENDING'),
(43, 91, 'Orang\\nKita', '8.00', 8, '2025-01-14 04:21:58', 'PENDING'),
(44, 91, 'Kiosla\\nAsia', '11.00', 11, '2025-01-14 04:21:58', 'PENDING'),
(45, 91, 'Vanilla\\nLatte', '9.00', 9, '2025-01-14 04:21:58', 'PENDING'),
(46, 91, 'Analisa', '9.00', 9, '2025-01-14 04:21:58', 'PENDING'),
(47, 91, 'Dibawah Matahari Terbit', '0.00', -42, '2025-01-14 04:22:11', 'REDEEMED'),
(48, 91, 'Orang Kita', '0.00', -28, '2025-01-14 04:22:14', 'REDEEMED');

-- --------------------------------------------------------

--
-- Table structure for table `points`
--

CREATE TABLE `points` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `points` int DEFAULT '0',
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `points`
--

INSERT INTO `points` (`id`, `user_id`, `points`, `last_updated`) VALUES
(1, 91, 17, '2025-01-14 04:22:14'),
(2, 1, 0, '2025-01-11 12:25:07');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `dateofbirth` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(10) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `name`, `dateofbirth`, `email`, `phone`, `username`, `password`, `status`) VALUES
(1, 'Anas Azmi', '27/02/02', 'anasazmi2702@gmail.com', '0199627223', 'admin', 'admin123', 'ADMIN'),
(91, 'Natasha', '2002-03-28', 'alnatasha28@gmail.com', '0134567890', 'NATASHA', '123456', 'USER');

-- --------------------------------------------------------

--
-- Table structure for table `user_badges`
--

CREATE TABLE `user_badges` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `badge_type` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `current_progress` int NOT NULL DEFAULT '0',
  `target_progress` int NOT NULL,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_badges`
--

INSERT INTO `user_badges` (`id`, `user_id`, `badge_type`, `current_progress`, `target_progress`, `last_updated`) VALUES
(1, 91, 'coffee_explorer', 0, 10, '2025-01-11 18:07:01'),
(4, 91, 'loyalty_star', 0, 20, '2025-01-11 18:07:01'),
(7, 91, 'premium_member', 0, 300, '2025-01-11 18:07:01'),
(10, 91, 'early_bird', 0, 5, '2025-01-11 18:07:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `points`
--
ALTER TABLE `points`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_badges`
--
ALTER TABLE `user_badges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `points`
--
ALTER TABLE `points`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `user_badges`
--
ALTER TABLE `user_badges`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `register` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `points`
--
ALTER TABLE `points`
  ADD CONSTRAINT `points_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `register` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_badges`
--
ALTER TABLE `user_badges`
  ADD CONSTRAINT `user_badges_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `register` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
